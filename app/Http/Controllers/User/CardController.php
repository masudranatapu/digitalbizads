<?php

namespace App\Http\Controllers\User;

use App\Plan;
use App\User;
use App\Theme;
use App\Medias;
use App\Gallery;
use App\Gateway;
use App\Payment;
use App\Service;
use App\Setting;
use App\Currency;
use Carbon\Carbon;
use App\Transaction;
use App\BusinessCard;
use App\BusinessHour;
use App\StoreProduct;
use App\BusinessField;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function getStores()
    {

        $plan = User::where('user_id', Auth::user()->user_id)->first();
        $active_plan =  json_decode($plan->plan_details);
        if ($active_plan != null) {
            if ($active_plan->is_whatsapp_store == 0) {
                return abort(404);
            }
            $business_cards = DB::table('business_cards')
                ->where('card_type', '=', 'store')
                ->join('users', 'business_cards.user_id', '=', 'users.id')
                ->select('users.id', 'users.plan_validity', 'business_cards.*')
                ->where('business_cards.user_id', Auth::user()->id)
                ->where('business_cards.status', 1)
                ->orderBy('business_cards.id', 'desc')->get();
            $settings = Setting::where('status', 1)->first();

            return view('user.cards.stores', compact('business_cards', 'settings'));
        } else {
            return redirect()->route('user.plans');
        }
    }

    // All user cards
    public function cards()
    {
        $active_plan = Plan::where('plan_id', Auth::user()->plan_id)->first();
        $plan = User::where('user_id', Auth::user()->user_id)->first();

        if ($active_plan != null) {
            $business_cards = DB::table('business_cards')
                ->join('users', 'business_cards.user_id', '=', 'users.id')
                ->select('users.user_id', 'users.plan_validity', 'business_cards.*')
                ->where('business_cards.user_id', Auth::user()->id)
                ->where('business_cards.card_type', 'vCard')
                ->orderBy('business_cards.id', 'desc')
                ->get();

            $settings = Setting::where('status', 1)->first();

            return view('user.cards.cards', compact('business_cards', 'settings'));
        } else {
            return redirect()->route('user.plans');
        }
    }



    // Create Card
    public function CreateCard()
    {
        $themes = Theme::where('theme_description', 'vCard')->where('status', 1)->get();
        $settings = Setting::where('status', 1)->first();
        $old_cards = BusinessCard::where('user_id', Auth::user()->id)->count();
        $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
        $plan_details = json_decode($plan->plan_details);

        if ($plan_details->no_of_vcards == 999) {
            $no_card_limit = 999999;
        } else {
            $no_card_limit = (int) $plan_details->no_of_vcards;
        }

        // dd($old_cards);


        if ($old_cards < $no_card_limit) {
            return view('user.cards.create-card', compact('themes', 'settings', 'plan_details'));
        } else {
            alert()->error(trans('Maximum card creation limit is exceeded, Please upgrade your plan.'));
            return redirect()->route('user.cards');
        }
    }

    // Save card
    public function postStore(Request $request)
    {

        $validity = checkPackageValidity(Auth::id());
        if ($validity == false) {
            alert()->error(trans('Your package is expired please upgrade'));
            return redirect()->route('user.plans');
        }
        $check = checkCardLimit(Auth::id());
        if ($check == false) {
            alert()->error(trans('Your card limit is over please upgrade your package for more card'));
            return redirect()->back();
        }
        $card_url = BusinessCard::where('card_url', $request->personalized_link)->first();
        if ($card_url != null) {
            alert()->error(trans('Personalized link must be unique'));
            return back()->withInput();
        }
        $user_details = User::where('user_id', Auth::user()->user_id)->first();
        $plan_details = json_decode($user_details->plan_details, true);
        if ($request->gallery_type == 'videosource') {
            $validator = Validator::make($request->all(), [
                'video' => 'required|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi | max:50000'
            ]);
        } elseif ($request->gallery_type == 'videourl') {
            $validator = Validator::make($request->all(), [
                'video' => 'required|url',
            ]);
        }
        $validator = Validator::make($request->all(), [
            'adsname' => 'required',
            'theme_color' => 'required|max:10',
            'logo' => 'nullable',
            'text' => 'nullable|string|min:3|max:191',
            'phone_number' => 'required',
            'email' => 'required|email|max:191',
            'website' => 'nullable|string|url|max:191',
            'facebook' => 'nullable|string|max:191',
            'instagram' => 'nullable|string|max:191',
            'cashapp' => 'nullable|string|max:191',
            'personalized_link' => 'nullable|string|max:191',
            'footer_text' => 'nullable|string|max:191',
            'banner' => 'required',
            'about_us' => 'sometimes'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $cardId = uniqid();

        if ($plan_details['personalized_link'] == '1') {
            if ($request->personalized_link) {
                $personalized_link = $request->personalized_link;
            } else {
                $personalized_link = $cardId;
            }
        } else {
            $personalized_link = $cardId;
        }
        $cards = BusinessCard::where('user_id', Auth::user()->user_id)->where('card_status', 'activated')->count();
        $user_details = User::where('user_id', Auth::user()->user_id)->first();
        $plan_details = json_decode($user_details->plan_details, true);
        $card_url = strtolower(preg_replace('/\s+/', '-', $personalized_link));
        $current_card = BusinessCard::where('card_url', $card_url)->count();
        if ($plan_details['no_of_vcards'] == 999) {
            $no_cards = 999999;
        } else {
            $no_cards = $plan_details['no_of_vcards'];
        }
        //     if ($current_card == 0) {
        //         // Checking, If the user plan allowed card creation is less than created card.
        //         if ($cards < $no_cards) {
        DB::beginTransaction();
        try {
            $card = new BusinessCard();
            $card->adsname = $request->adsname;
            $card->card_id = $cardId;
            $card->user_id = Auth::user()->id;
            $card->theme_id = 1;
            $card->theme_color = $request->theme_color;
            $card->card_lang = 'en';

            if ($request->headline == 'text') {
                $card->logo = NULL;
                $card->title = $request->text;
            } else {
                $card->title        = NULL;
                $card->logo         = $request->logo_path;
            }

            if (!empty($request->video) && $request->gallery_type == 'videosource') {
                $card->banner_type =  $request->gallery_type;
                $_video = $request->file('video');
                $base_name = preg_replace('/\..+$/', '', $_video->getClientOriginalName());
                $video_name = $base_name . "-" . uniqid() . "." . $_video->getClientOriginalExtension();
                $file_path = 'assets/uploads/videos';
                if (!File::exists($file_path)) {
                    File::makeDirectory($file_path);
                }
                $_video->move($file_path, $video_name);
                $card->banner_content = asset($file_path . '/' . $video_name);
            } elseif (!empty($request->video) && $request->gallery_type == 'videourl') {
                $card->banner_type =  $request->gallery_type;
                $card->banner_content  =  $this->getYoutubeEmbad($request->video);
            } elseif (!empty($request->banner) && $request->gallery_type == 'banner') {

                if (!is_null($request->file('banner'))) {
                    $image = $request->file('banner');
                    $extension = $image->getClientOriginalExtension();
                    $file_path = 'assets/uploads/banner';
                    $base_name = preg_replace('/\..+$/', '', $image->getClientOriginalName());
                    $base_name = explode(' ', $base_name);
                    $base_name = implode('-', $base_name);
                    $img       = Image::make($image->getRealPath());
                    $feature_image = $base_name . "-" . uniqid() . '.webp';
                    Image::make($img)->save($file_path . '/' . $feature_image);
                    $image_name = $file_path . '/' . $feature_image;
                    $card->banner_content = $image_name;
                }
                // $card->banner_content      = $request->profile_image_path ?? null;
                $card->banner_type =  $request->gallery_type;
            }
            $card->header_text_color = $request->header_text_color;
            $card->header_backgroung = $request->header_backgroung;
            $card->icon_border_color = $request->icon_border_color;
            $card->location = $request->location;
            $card->header_font_family = $request->header_font_family;
            $card->card_type = 'vcard';
            $card->card_url = $card_url;
            $card->phone_number = $request->phone_number;
            $card->email = $request->email ?? Auth::user()->email;
            if (isFreePlan(Auth::user()->id) == false) {
                $card->footer_text = $request->footer_text;
            }
            $card->cashapp = $request->cashapp;
            $card->about_us = $request->about_us;
            $card->website = $request->website;
            $card->card_status = 'activated';
            $card->created_at = date('Y-m-d H:i:s');
            $card->created_by = Auth::user()->id;
            $card->status = 1;
            $card->save();
            if (!empty($request->images)) {
                foreach ($request->images as $key => $gallery) {
                    if (!is_null($request->file('images')[$key])) {
                        $gallery_image = $request->file('images')[$key];
                        $file_path = 'assets/uploads/banner/';
                        $image_name = $this->uploadAndResize($gallery_image, $file_path, 850, 650);
                        $gallery_photo = new Gallery();
                        $gallery_photo->content = $image_name;
                        $gallery_photo->card_id = $card->id;
                        $gallery_photo->gallery_type = 'gallery';
                        $gallery_photo->save();
                    }
                }
            }

            if ($request->facebook) {
                DB::table('business_fields')->insert([
                    'card_id' => $card->id,
                    'type' => 'facebook',
                    'icon' => 'fab fa-facebook',
                    'label' => 'facebook',
                    'content' => $request->facebook,
                    'status' => 1,
                    'created_at' => date('Y-m-d H:i:s')
                ]);
            }
            if ($request->instagram) {
                DB::table('business_fields')->insert([
                    'card_id' => $card->id,
                    'type' => 'instagram',
                    'icon' => 'fab fa-instagram',
                    'label' => 'instagram',
                    'content' => $request->instagram,
                    'status' => 1,
                    'created_at' => date('Y-m-d H:i:s')
                ]);
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
            alert()->error(trans('Unable to create card'));
            return redirect()->back();
        }
        DB::commit();
        alert()->success(trans('Card successfully created'));
        return redirect()->route('user.cards');
    }


    public function editCard(Request $request, $id)
    {
        $card  = BusinessCard::where('card_id', $id)->first();
        $card->contacts = BusinessField::where('card_id', $card->id)->get();
        $card->gallery = Gallery::where('card_id', $card->id)->get();
        $settings = Setting::where('status', 1)->first();
        $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
        $plan_details = json_decode($plan->plan_details);
        return view('user.cards.edit-card', compact('card', 'settings', 'plan_details'));
    }


    public function postUpdate(Request $request, $id)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'adsname' => 'required',
            'theme_color' => 'required|max:10',
            // 'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'text' => 'nullable|string|min:3|max:191',
            'phone_number' => 'required',
            'email' => 'required|email|max:191',
            'website' => 'nullable|string|url|max:191',
            'facebook' => 'nullable|string|max:191',
            'instagram' => 'nullable|string|max:191',
            'cashapp' => 'nullable|string|max:191',
            'personalized_link' => 'nullable|string|max:191',
            'footer_text' => 'nullable|string|max:191',
            'banner' => 'nullable',
            'about_us' => 'sometimes'

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $checkCardUrl = BusinessCard::where('card_url', $request->personalized_link)->whereNotIn('id', [$id])->first();
        if (!empty($checkCardUrl)) {
            alert()->error(trans('Personalized link must be unique'));
            return back()->withInput();
        }

        if (!empty($request->personalized_link)) {
            $personalized_link = $request->personalized_link;
            $card_url = strtolower(preg_replace('/\s+/', '-', $personalized_link));
        }
        $user_details = User::where('user_id', Auth::user()->user_id)->first();
        $plan_details = json_decode($user_details->plan_details, true);
        DB::beginTransaction();
        try {
            $card = BusinessCard::findOrFail($id);
            $card->adsname = $request->adsname;
            $card->theme_id = $request->theme_id;
            $card->theme_color = $request->theme_color;
            $card->card_lang = 'en';
            if ($plan_details['personalized_link'] == '1' && !empty($card_url)) {
                $card->card_url = $card_url;
            } else {
                $card->card_url = $card->card_id;
            }
            if ($request->headline == 'text') {
                $card->title = $request->text;
                $card->logo = NULL;
            } elseif (!empty($request->logo_path)) {
                $card->title             = NULL;
                $card->header_text_color = NULL;
                $card->logo  = $request->logo_path;
            }
            if (!empty($request->video) && $request->gallery_type == 'videosource') {
                if (File::exists(public_path($card->banner_content))) {
                    File::delete(public_path($card->banner_content));
                }
                $card->banner_type =  $request->gallery_type;
                $_video = $request->file('video');
                $base_name = preg_replace('/\..+$/', '', $_video->getClientOriginalName());
                $video_name = $base_name . "-" . uniqid() . "." . $_video->getClientOriginalExtension();
                $file_path = 'assets/uploads/videos';
                if (!File::exists($file_path)) {
                    File::makeDirectory($file_path);
                }
                $_video->move($file_path, $video_name);
                $card->banner_content = asset($file_path . '/' . $video_name);
            } elseif (!empty($request->video) && $request->gallery_type == 'videourl') {
                $card->banner_type =  $request->gallery_type;
                $card->banner_content  =  $this->getYoutubeEmbad($request->video);
            } elseif (!empty($request->banner) && $request->gallery_type == 'banner') {
                if (!is_null($request->file('banner'))) {
                    if (File::exists(public_path($card->banner_content))) {
                        File::delete(public_path($card->banner_content));
                    }
                    $image = $request->file('banner');
                    $extension = $image->getClientOriginalExtension();
                    $file_path = 'assets/uploads/banner';
                    $base_name = preg_replace('/\..+$/', '', $image->getClientOriginalName());
                    $base_name = explode(' ', $base_name);
                    $base_name = implode('-', $base_name);
                    $img       = Image::make($image->getRealPath());
                    $feature_image = $base_name . "-" . uniqid() . '.webp';
                    Image::make($img)->save($file_path . '/' . $feature_image);
                    $image_name = $file_path . '/' . $feature_image;
                    $card->banner_content = $image_name;
                }
                // $card->banner_content      = $request->profile_image_path ?? null;
                $card->banner_type =  $request->gallery_type;
            }
            $card->card_type = 'vcard';
            $card->phone_number = $request->phone_number;
            $card->email = $request->email;
            if (isFreePlan(Auth::user()->id) == false) {
                $card->footer_text = $request->footer_text;
            }
            // $card->footer_text = $request->footer_text;
            $card->cashapp = $request->cashapp;
            $card->about_us = $request->about_us;
            $card->website = $request->website;
            $card->header_text_color = $request->header_text_color;
            $card->header_backgroung = $request->header_backgroung;
            $card->icon_border_color = $request->icon_border_color;
            $card->location = $request->location;
            $card->header_font_family = $request->header_font_family;
            $card->updated_at = date('Y-m-d H:i:s');
            $card->updated_by = Auth::user()->id;
            $card->update();

            if (!empty($request->images)) {
                foreach ($request->images as $key => $gallery) {
                    if (!is_null($request->file('images')[$key])) {
                        $gallery_image = $request->file('images')[$key];
                        $file_path = 'assets/uploads/banner/';
                        $image_name = $this->uploadAndResize($gallery_image, $file_path, 850, 650);
                        $gallery_photo = new Gallery();
                        $gallery_photo->content = $image_name;
                        $gallery_photo->card_id = $card->id;
                        $gallery_photo->gallery_type = 'gallery';
                        $gallery_photo->save();
                    }
                }
            }

            if (!empty($request->facebook)) {
                DB::table('business_fields')->where('card_id', $card->id)->where('type', 'facebook')->delete();
                DB::table('business_fields')->insert([
                    'card_id' => $card->id,
                    'type' => 'facebook',
                    'icon' => 'fab fa-facebook',
                    'label' => 'facebook',
                    'content' => $request->facebook,
                    'status' => 1,
                    'created_at' => date('Y-m-d H:i:s')
                ]);
            }
            if (!empty($request->instagram)) {
                DB::table('business_fields')->where('card_id', $card->id)->where('type', 'instagram')->delete();
                DB::table('business_fields')->insert([
                    'card_id' => $card->id,
                    'type' => 'instagram',
                    'icon' => 'fab fa-instagram',
                    'label' => 'instagram',
                    'content' => $request->instagram,
                    'status' => 1,
                    'created_at' => date('Y-m-d H:i:s')
                ]);
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
            alert()->error(trans('Unable to update card'));
            return redirect()->back();
        }
        DB::commit();
        alert()->success(trans('Card successfully updated'));
        return redirect()->route('user.cards');
    }

    public function getDelete(Request $request, $id)
    {

        DB::beginTransaction();
        try {

            $gallery =  DB::table('card_gallery')->where('card_id', $id)->first();
            if (!empty($gallery)) {
                if (File::exists(public_path($gallery->content))) {
                    File::delete(public_path($gallery->content));
                }
            }
            DB::table('business_fields')->where('card_id', $id)->delete();
            DB::table('business_cards')->where('card_id', $id)->delete();
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
            alert()->error(trans('Unable to delete'));
            return redirect()->back();
        }
        DB::commit();
        alert()->success(trans('Card successfully deleted'));
        return redirect()->route('user.cards');
    }


    public function getDeleteGallery(Request $request, $id)
    {

        DB::beginTransaction();
        try {

            $gallery =  DB::table('card_gallery')->where('id', $id)->first();
            if (File::exists(public_path($gallery->content))) {
                File::delete(public_path($gallery->content));
            }
            DB::table('card_gallery')->where('id', $id)->delete();
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
            return response()->json([
                'status' => 0,
                'msg' => 'Unable to delete'
            ]);
        }
        DB::commit();
        return response()->json([
            'status' => 1,
            'msg' => 'Card gallery image successfully deleted'
        ]);
    }


    public function plans()
    {
        $plans = DB::table('plans')->where('is_private', '0')->where('status', 1)->get();
        $config = DB::table('config')->get();
        $free_plan = Transaction::where('user_id', Auth::user()->id)->where('transaction_amount', '0')->count();
        $plan = User::where('user_id', Auth::user()->user_id)->first();
        $active_plan = json_decode($plan->plan_details);
        $settings = Setting::where('status', 1)->first();
        $currency = Currency::where('iso_code', $config[1]->config_value)->first();
        $remaining_days = 0;

        if (isset($active_plan)) {
            $plan_validity = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', Auth::user()->plan_validity);
            $current_date = Carbon::now();
            $remaining_days = $current_date->diffInDays($plan_validity, false);
        }

        return view('user.plans.plans', compact('plans', 'settings', 'currency', 'active_plan', 'remaining_days', 'config', 'free_plan'));
    }

    // View Card Preview
    public function viewPreview(Request $request, $id)
    {
        $card_details = DB::table('business_cards')->where('card_id', $id)->where('status', 1)->first();

        if (isset($card_details)) {
            if ($card_details->card_type == "store") {
                $enquiry_button = '#';

                $business_card_details = DB::table('business_cards')->where('business_cards.card_id', $card_details->card_id)
                    ->join('users', 'business_cards.user_id', '=', 'users.id')
                    ->select('business_cards.*', 'users.plan_details')
                    ->first();

                if ($business_card_details) {

                    $products = DB::table('store_products')->where('card_id', $card_details->card_id)->where('product_status', 'instock')->orderBy('id', 'desc')->get();

                    $settings = Setting::where('status', 1)->first();
                    $config = DB::table('config')->get();

                    $plan_details = json_decode($business_card_details->plan_details, true);
                    $store_details = json_decode($business_card_details->description, true);

                    if ($store_details['whatsapp_no'] != null) {
                        $enquiry_button = $store_details['whatsapp_no'];
                    }

                    $whatsapp_msg = $store_details['whatsapp_msg'];
                    $currency = $store_details['currency'];

                    $url = URL::to('/') . "/" . strtolower(preg_replace('/\s+/', '-', $card_details->card_url));
                    $business_name = $card_details->title;
                    $profile = URL::to('/') . "/" . $business_card_details->profile;

                    $shareContent = $config[30]->config_value;
                    $shareContent = str_replace("{ business_name }", $business_name, $shareContent);
                    $shareContent = str_replace("{ business_url }", $url, $shareContent);
                    $shareContent = str_replace("{ appName }", $config[0]->config_value, $shareContent);

                    // If branding enabled, then show app name.

                    if ($plan_details['hide_branding'] == "1") {
                        $shareContent = str_replace("{ appName }", $business_name, $shareContent);
                    } else {
                        $shareContent = str_replace("{ appName }", $config[0]->config_value, $shareContent);
                    }

                    $url = urlencode($url);
                    $shareContent = urlencode($shareContent);

                    Session::put('locale', $business_card_details->card_lang);
                    app()->setLocale(Session::get('locale'));

                    $qr_url = "https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=" . $url;

                    $shareComponent['facebook'] = "https://www.facebook.com/sharer/sharer.php?u=$url&quote=$shareContent";
                    $shareComponent['twitter'] = "https://twitter.com/intent/tweet?text=$shareContent";
                    $shareComponent['linkedin'] = "https://www.linkedin.com/shareArticle?mini=true&url=$url";
                    $shareComponent['telegram'] = "https://telegram.me/share/url?text=$shareContent&url=$url";
                    $shareComponent['whatsapp'] = "https://api.whatsapp.com/send/?phone&text=$shareContent";

                    $store_card = BusinessCard::where('is_store_show', 1)->where('user_id', $business_card_details->user_id)->first();

                    if ($card_details->theme_id == "7ccc432a06hty") {
                        return view('vcard.modern-store-light', compact('card_details', 'plan_details', 'store_details', 'business_card_details', 'products', 'settings', 'shareComponent', 'shareContent', 'config', 'enquiry_button', 'whatsapp_msg', 'currency', 'store_card'));
                    } else if ($card_details->theme_id == "7ccc432a06hju") {
                        return view('vcard.modern-store-dark', compact('card_details', 'plan_details', 'store_details', 'business_card_details', 'products', 'settings', 'shareComponent', 'shareContent', 'config', 'enquiry_button', 'whatsapp_msg', 'currency', 'store_card'));
                    }
                } else {
                    alert()->error(trans('Sorry, Please fill basic business details.'));
                    return redirect()->route('user.edit.card', $id);
                }
            } else {
                $enquiry_button = null;
                $business_card_details = DB::table('business_cards')->where('business_cards.card_id', $card_details->card_id)
                    ->join('users', 'business_cards.user_id', '=', 'users.user_id')
                    ->select('business_cards.*', 'users.plan_details')
                    ->first();

                if ($business_card_details) {

                    $feature_details = DB::table('business_fields')->where('card_id', $card_details->card_id)->orderBy('id', 'asc')->get();
                    $service_details = DB::table('services')->where('card_id', $card_details->card_id)->orderBy('id', 'asc')->get();
                    $galleries_details = DB::table('galleries')->where('card_id', $card_details->card_id)->orderBy('id', 'asc')->get();
                    $payment_details = DB::table('payments')->where('card_id', $card_details->card_id)->get();
                    $business_hours = DB::table('business_hours')->where('card_id', $card_details->card_id)->first();
                    $make_enquiry = DB::table('business_fields')->where('card_id', $card_details->card_id)->where('type', 'wa')->first();

                    if ($make_enquiry != null) {
                        $enquiry_button = $make_enquiry->content;
                    }

                    $settings = Setting::where('status', 1)->first();
                    $config = DB::table('config')->get();

                    $plan_details = json_decode($business_card_details->plan_details, true);

                    $url = URL::to('/') . "/" . strtolower(preg_replace('/\s+/', '-', $card_details->card_url));
                    $business_name = $card_details->title;
                    $profile = URL::to('/') . "/" . $business_card_details->profile;

                    $shareContent = $config[30]->config_value;
                    $shareContent = str_replace("{ business_name }", $business_name, $shareContent);
                    $shareContent = str_replace("{ business_url }", $url, $shareContent);
                    $shareContent = str_replace("{ appName }", $config[0]->config_value, $shareContent);

                    // If branding enabled, then show app name.

                    if ($plan_details['hide_branding'] == "1") {
                        $shareContent = str_replace("{ appName }", $business_name, $shareContent);
                    } else {
                        $shareContent = str_replace("{ appName }", $config[0]->config_value, $shareContent);
                    }

                    $url = urlencode($url);
                    $shareContent = urlencode($shareContent);

                    Session::put('locale', $business_card_details->card_lang);
                    app()->setLocale(Session::get('locale'));

                    $qr_url = "https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=" . $url;

                    $shareComponent['facebook'] = "https://www.facebook.com/sharer/sharer.php?u=$url&quote=$shareContent";
                    $shareComponent['twitter'] = "https://twitter.com/intent/tweet?text=$shareContent";
                    $shareComponent['linkedin'] = "https://www.linkedin.com/shareArticle?mini=true&url=$url";
                    $shareComponent['telegram'] = "https://telegram.me/share/url?text=$shareContent&url=$url";
                    $shareComponent['whatsapp'] = "https://api.whatsapp.com/send/?phone&text=$shareContent";

                    if ($card_details->theme_id == "7ccc432a06caa") {
                        return view('vcard.modern-vcard-light', compact('card_details', 'plan_details', 'business_card_details', 'feature_details', 'service_details', 'galleries_details', 'payment_details', 'business_hours', 'settings', 'shareComponent', 'shareContent', 'config', 'enquiry_button'));
                    } else if ($card_details->theme_id == "7ccc432a06vta") {
                        return view('vcard.modern-vcard-dark', compact('card_details', 'plan_details', 'business_card_details', 'feature_details', 'service_details', 'galleries_details', 'payment_details', 'business_hours', 'settings', 'shareComponent', 'shareContent', 'config', 'enquiry_button'));
                    } else if ($card_details->theme_id == "7ccc432a06cth") {
                        return view('vcard.classic-vcard-light', compact('card_details', 'plan_details', 'business_card_details', 'feature_details', 'service_details', 'galleries_details', 'payment_details', 'business_hours', 'settings', 'shareComponent', 'shareContent', 'config', 'enquiry_button'));
                    } else if ($card_details->theme_id == "7ccc432a06vyw") {
                        return view('vcard.classic-vcard-dark', compact('card_details', 'plan_details', 'business_card_details', 'feature_details', 'service_details', 'galleries_details', 'payment_details', 'business_hours', 'settings', 'shareComponent', 'shareContent', 'config', 'enquiry_button'));
                    } else if ($card_details->theme_id == "7ccc432a06ctw") {
                        return view('vcard.metro-vcard-light', compact('card_details', 'plan_details', 'business_card_details', 'feature_details', 'service_details', 'galleries_details', 'payment_details', 'business_hours', 'settings', 'shareComponent', 'shareContent', 'config', 'enquiry_button'));
                    } else if ($card_details->theme_id == "7ccc432a06vhd") {
                        return view('vcard.metro-vcard-dark', compact('card_details', 'plan_details', 'business_card_details', 'feature_details', 'service_details', 'galleries_details', 'payment_details', 'business_hours', 'settings', 'shareComponent', 'shareContent', 'config', 'enquiry_button'));
                    }
                } else {
                    alert()->error(trans('Sorry, Please fill basic business details.'));
                    return redirect()->route('user.company.details', $id);
                }
            }
        } else {
            http_response_code(404);
            return view('errors.404');
        }
    }




    // Save card
    public function saveBusinessCard(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'theme_id' => 'required',
            'card_color' => 'required',
            'card_lang' => 'required',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:' . env("SIZE_LIMIT") . '',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:' . env("SIZE_LIMIT") . '',
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            alert()->error(trans('Some fields missing or cover/logo size is large.'));
            return back();
        }

        $cardId = uniqid();
        if ($request->link) {
            $personalized_link = $request->link;
        } else {
            $personalized_link = $cardId;
        }
        $cards = BusinessCard::where('user_id', Auth::user()->user_id)->where('card_status', 'activated')->count();
        $user_details = User::where('user_id', Auth::user()->user_id)->first();
        $plan_details = json_decode($user_details->plan_details, true);

        $logo = '/backend/img/vCards/' . 'IMG-' . uniqid() . '-' . str_replace(' ', '-', $request->logo->getClientOriginalName()) . '.' . $request->logo->extension();
        $cover = '/backend/img/vCards/' . 'IMG-' . uniqid() . '-' . str_replace(' ', '-', $request->cover->getClientOriginalName()) . '.' . $request->cover->extension();

        $request->logo->move(public_path('backend/img/vCards'), $logo);
        $request->cover->move(public_path('backend/img/vCards'), $cover);

        $card_url = strtolower(preg_replace('/\s+/', '-', $personalized_link));

        $current_card = BusinessCard::where('card_url', $card_url)->count();

        if ($plan_details['no_of_vcards'] == 999) {
            $no_cards = 999999;
        } else {
            $no_cards = $plan_details['no_of_vcards'];
        }

        if ($current_card == 0) {
            // Checking, If the user plan allowed card creation is less than created card.
            if ($cards < $no_cards) {
                try {
                    $card_id = $cardId;
                    $card = new BusinessCard();
                    $card->card_id = $card_id;
                    $card->user_id = Auth::user()->user_id;
                    $card->theme_id = $request->theme_id;
                    $card->theme_color = $request->card_color;
                    $card->card_lang = $request->card_lang;
                    $card->cover = $cover;
                    $card->profile = $logo;
                    $card->card_url = $card_url;
                    $card->card_type = 'vcard';
                    $card->title = $request->title;
                    $card->sub_title = $request->subtitle;
                    $card->description = $request->description;
                    $card->save();

                    alert()->success(trans('New Business Card Created Successfully!'));
                    return redirect()->route('user.social.links', $card_id);
                } catch (\Exception $th) {
                    alert()->error(trans('Sorry, personalized link was already registered.'));
                    return redirect()->route('user.create.card');
                }
            } else {
                alert()->error(trans('Maximum card creation limit is exceeded, Please upgrade your plan to add more card(s).'));
                return redirect()->route('user.create.card');
            }
        } else {
            alert()->error(trans('Sorry, personalized link was already registered.'));
            return redirect()->route('user.create.card');
        }
    }

    // Social Links
    public function socialLinks()
    {
        $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
        $settings = Setting::where('status', 1)->first();
        $plan_details = json_decode($plan->plan_details);

        return view('user.cards.social-links', compact('plan_details', 'settings'));
    }

    // Save social links
    public function saveSocialLinks(Request $request, $id)
    {
        $business_card = BusinessCard::where('card_id', $id)->first();

        if ($business_card == null) {
            return view('errors.404');
        } else {
            if ($request->icon != null) {
                BusinessField::where('card_id', $id)->delete();
                $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
                $plan_details = json_decode($plan->plan_details);

                if (count($request->icon) <= $plan_details->no_of_features) {
                    for ($i = 0; $i < count($request->icon); $i++) {
                        if (isset($request->icon[$i]) && isset($request->label[$i]) && isset($request->value[$i])) {


                            $customContent = $request->value[$i];


                            if ($request->type[$i] == 'youtube') {
                                $customContent = str_replace('https://www.youtube.com/watch?v=', '', $request->value[$i]);
                            }

                            if ($request->type[$i] == 'map') {
                                if (substr($request->value[$i], 0, 3) == 'pb=') {
                                    $customContent = $request->value[$i];
                                } else {
                                    $customContent = str_replace('<iframe src="', '', $request->value[$i]);
                                    $customContent = substr($customContent, 0, strpos($customContent, '" '));
                                    $customContent = str_replace('https://www.google.com/maps/embed?', '', $customContent);
                                }
                            }


                            $field = new BusinessField();
                            $field->card_id = $id;
                            $field->type = $request->type[$i];
                            $field->icon = $request->icon[$i];
                            $field->label = $request->label[$i];
                            $field->content = $customContent;
                            $field->position = $i + 1;
                            $field->save();
                        } else {
                            alert()->error(trans('Atleast add one feature.'));
                            return redirect()->route('user.social.links', $id);
                        }
                    }
                    alert()->success(trans('Features details updated'));
                    return redirect()->route('user.payment.links', $id);
                } else {
                    alert()->error(trans('You have reached plan features limited.'));
                    return redirect()->route('user.social.links', $id);
                }
            } else {
                alert()->error(trans('Atleast add one feature.'));
                return redirect()->route('user.social.links', $id);
            }
        }
    }

    // Payment links
    public function paymentLinks()
    {
        $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
        $settings = Setting::where('status', 1)->first();
        $plan_details = json_decode($plan->plan_details);

        return view('user.cards.payment-links', compact('plan_details', 'settings'));
    }

    // Save payment links
    public function savePaymentLinks(Request $request, $id)
    {
        $business_card = BusinessCard::where('card_id', $id)->first();

        if ($business_card == null) {
            return view('errors.404');
        } else {
            if ($request->icon != null) {
                Payment::where('card_id', $id)->delete();
                $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
                $plan_details = json_decode($plan->plan_details);

                if (count($request->icon) <= $plan_details->no_of_payments) {
                    for ($i = 0; $i < count($request->icon); $i++) {
                        if (isset($request->icon[$i]) && isset($request->label[$i]) && isset($request->value[$i])) {
                            $payment = new Payment();
                            $payment->card_id = $id;
                            $payment->type = $request->type[$i];
                            $payment->icon = $request->icon[$i];
                            $payment->label = $request->label[$i];
                            $payment->content = $request->value[$i];
                            $payment->position = $i + 1;
                            $payment->save();
                        } else {
                            alert()->error(trans('Please fill all required fields.'));
                            return redirect()->route('user.payment.links', $id);
                        }
                    }
                    alert()->success(trans('Payment details updated'));
                    return redirect()->route('user.services', $id);
                } else {
                    alert()->error(trans('You have reached plan payments limited.'));
                    return redirect()->route('user.payment.links', $id);
                }
            } else {
                alert()->success(trans('Payment details updated'));
                return redirect()->route('user.services', $id);
            }
        }
    }

    // Services
    public function services()
    {
        $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
        $plan_details = json_decode($plan->plan_details);
        $media = Medias::where('user_id', Auth::user()->user_id)->orderBy('id', 'desc')->get();
        $settings = Setting::where('status', 1)->first();

        return view('user.cards.services', compact('plan_details', 'settings', 'media'));
    }

    // Save services
    public function saveServices(Request $request, $id)
    {
        $business_card = BusinessCard::where('card_id', $id)->first();

        if ($business_card == null) {
            return view('errors.404');
        } else {
            $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
            $plan_details = json_decode($plan->plan_details);

            if ($request->service_name != null) {

                if (count($request->service_name) <= $plan_details->no_of_services) {

                    for ($i = 0; $i < count($request->service_name); $i++) {
                        $service = new Service();
                        $service->card_id = $id;
                        $service->service_name = $request->service_name[$i];
                        $service->service_image =  $request->service_image[$i];
                        $service->service_description = $request->service_description[$i];
                        $service->enable_enquiry = $request->enquiry[$i];
                        $service->save();
                    }
                    alert()->success(trans('Services details updated'));
                    return redirect()->route('user.galleries', $id);
                } else {
                    alert()->error(trans('You have reached plan limit.'));
                    return redirect()->route('user.services', $id);
                }
            } else {
                //Skipping...
                alert()->success(trans('Services details updated'));
                return redirect()->route('user.galleries', $id);
            }
        }
    }

    // Galleries
    public function galleries()
    {
        $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
        $plan_details = json_decode($plan->plan_details);
        $media = Medias::where('user_id', Auth::user()->user_id)->orderBy('id', 'desc')->get();
        $settings = Setting::where('status', 1)->first();

        return view('user.cards.galleries', compact('plan_details', 'media', 'settings'));
    }

    // Save Gallery Images
    public function saveGalleries(Request $request, $id)
    {

        $business_card = BusinessCard::where('card_id', $id)->first();

        if ($business_card == null) {
            return view('errors.404');
        } else {
            $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
            $plan_details = json_decode($plan->plan_details);

            if ($request->caption != null) {

                if (count($request->caption) <= $plan_details->no_of_galleries) {
                    for ($i = 0; $i < count($request->caption); $i++) {
                        $gallery = new Gallery();
                        $gallery->card_id = $id;
                        $gallery->caption = $request->caption[$i];
                        $gallery->gallery_image = $request->gallery_image[$i];
                        $gallery->save();
                    }

                    alert()->success(trans('Gallery images updated'));
                    return redirect()->route('user.business.hours', $id);
                } else {
                    alert()->error(trans('You have reached plan limit.'));
                    return redirect()->route('user.galleries', $id);
                }
            } else {
                alert()->success(trans('Gallery images updated'));
                return redirect()->route('user.business.hours', $id);
            }
        }
    }

    // Business Hours
    public function businessHours()
    {
        $settings = Setting::where('status', 1)->first();

        return view('user.cards.business-hours', compact('settings'));
    }

    // Save business hours
    public function saveBusinessHours(Request $request, $id)
    {
        $business_card = BusinessCard::where('card_id', $id)->first();

        if ($business_card == null) {
            return view('errors.404');
        } else {
            if ($request->monday_closed == "on") {
                $monday = "Closed";
            } else {
                $monday = $request->monday_open . " - " . $request->monday_closing;
            }

            if ($request->tuesday_closed == "on") {
                $tuesday = "Closed";
            } else {
                $tuesday = $request->tuesday_open . " - " . $request->tuesday_closing;
            }

            if ($request->wednesday_closed == "on") {
                $wednesday = "Closed";
            } else {
                $wednesday = $request->wednesday_open . " - " . $request->wednesday_closing;
            }

            if ($request->thursday_closed == "on") {
                $thursday = "Closed";
            } else {
                $thursday = $request->thursday_open . " - " . $request->thursday_closing;
            }

            if ($request->friday_closed == "on") {
                $friday = "Closed";
            } else {
                $friday = $request->friday_open . " - " . $request->friday_closing;
            }

            if ($request->saturday_closed == "on") {
                $saturday = "Closed";
            } else {
                $saturday = $request->saturday_open . " - " . $request->saturday_closing;
            }

            if ($request->sunday_closed == "on") {
                $sunday = "Closed";
            } else {
                $sunday = $request->sunday_open . " - " . $request->sunday_closing;
            }

            if ($request->always_open == "on") {
                $always_open = "Opening";
            } else {
                $always_open = "Closed";
            }

            if ($request->is_display == "on") {
                $is_display = 0;
            } else {
                $is_display = 1;
            }

            $businessHours = new BusinessHour();
            $businessHours->card_id = $id;
            $businessHours->Monday = $monday;
            $businessHours->Tuesday = $tuesday;
            $businessHours->Wednesday = $wednesday;
            $businessHours->Thursday = $thursday;
            $businessHours->Friday = $friday;
            $businessHours->Saturday = $saturday;
            $businessHours->Sunday = $sunday;
            $businessHours->is_always_open = $always_open;
            $businessHours->is_display = $is_display;
            $businessHours->save();
            alert()->success(trans('Your Business Card is Ready.'));
            return redirect()->route('user.cards');
        }
    }

    // Skip business hours
    public function skipAndSave()
    {
        alert()->success(trans('Your Business Card is Ready.'));
        return redirect()->route('user.cards');
    }

    // Card Status Page
    public function cardStatus($id)
    {
        $businessCard = BusinessCard::where('card_id', $id)->first();


        if ($businessCard == null) {

            return view('errors.404');
        } else {
            $business_card = BusinessCard::where('user_id', Auth::user()->id)->where('card_id', $id)->first();




            if ($business_card == null) {
                return view('errors.404');
            } else {

                if ($business_card->card_status == 'inactive') {
                    $plan = User::where('user_id', Auth::user()->user_id)->first();
                    $active_plan = json_decode($plan->plan_details);
                    $no_of_features = BusinessField::where('card_id', $id)->count();
                    $no_of_galleries = Gallery::where('card_id', $id)->count();
                    $no_of_payments = Payment::where('card_id', $id)->count();
                    $no_of_services = Service::where('card_id', $id)->count();
                    $no_of_products = StoreProduct::where('card_id', $id)->count();
                    if ($no_of_services <= $active_plan->no_of_services && $no_of_galleries <= $active_plan->no_of_galleries && $no_of_features <= $active_plan->no_of_features && $no_of_payments <= $active_plan->no_of_payments && $no_of_products <= $active_plan->no_of_services) {
                        $cards = BusinessCard::where('user_id', Auth::user()->id)->where('card_status', 'activated')->count();

                        $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
                        $plan_details = json_decode($plan->plan_details);

                        if ($cards < $plan_details->no_of_vcards) {
                            $result =  BusinessCard::where('user_id', Auth::user()->id)->where('card_id', $id)->update([
                                'card_status' => 'activated',
                            ]);


                            if ($business_card->card_type == 'vcard') {

                                alert()->success(trans('Your Business Card Enabled'));
                                return redirect()->back();
                            } else {
                                alert()->success(trans('Your Whats\'s App Store Is Enabled'));

                                return redirect()->back();
                            }
                        } else {
                            alert()->error(trans('Maximum card creation limit is exceeded, Please upgrade your plan.'));
                            return redirect()->route('user.cards');
                        }
                    } else {
                        $cards = BusinessCard::where('user_id', Auth::user()->user_id)->where('card_status', 'activated')->count();

                        $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
                        $plan_details = json_decode($plan->plan_details);

                        if ($cards < $plan_details->no_of_vcards) {
                            return redirect()->route('user.edit.card', $id)->with('errors', 'Your plan was downgraded.');
                        } else {
                            alert()->error(trans('Maximum card creation limit is exceeded, Please upgrade your plan.'));
                            return redirect()->route('user.cards');
                        }
                    }
                } else {
                    BusinessCard::where('user_id', Auth::user()->id)->where('card_id', $id)->update([
                        'card_status' => 'inactive',
                    ]);



                    if ($business_card->card_type == 'vcard') {


                        alert()->success(trans('Your Business Card Disabled'));
                        return redirect()->back();
                    } else {
                        alert()->success(trans('Your Whats\'s App Store Is Disabled'));
                        return redirect()->back();
                    }
                }
            }
        }
    }

    public function cardStoreStatus($id, $status)
    {
        $auth_id = Auth::id();
        $card = BusinessCard::where('id', $id)->where('user_id', $auth_id)->first();
        BusinessCard::where('user_id', $card->user_id)->where('user_id', $auth_id)->update(['is_store_show' => '0']);
        BusinessCard::where('id', $id)->where('user_id', $auth_id)->update(['is_store_show' => 1]);
        alert()->success(trans('Your Business Card Updated'));
        return redirect()->back();
    }

    // Checkout Page
    public function checkout(Request $request, $id)
    {
        $selected_plan = Plan::where('plan_id', $id)->where('status', 1)->first();
        if ($selected_plan == null) {
            alert()->error(trans('Your current plan is not available. Choose another plan.'));
            return redirect()->route('user.plans');
        } else {
            $config = DB::table('config')->get();

            if ($selected_plan == null) {
                return view('errors.404');
            } else {

                if ($selected_plan->plan_price == 0) {
                    if (Auth::user()->billing_name == "") {
                        return redirect()->route('user.billing', $id);
                    } else {

                        $invoice_details = [];

                        $invoice_details['from_billing_name'] = $config[16]->config_value;
                        $invoice_details['from_billing_address'] = $config[19]->config_value;
                        $invoice_details['from_billing_city'] = $config[20]->config_value;
                        $invoice_details['from_billing_state'] = $config[21]->config_value;
                        $invoice_details['from_billing_zipcode'] = $config[22]->config_value;
                        $invoice_details['from_billing_country'] = $config[23]->config_value;
                        $invoice_details['from_vat_number'] = $config[26]->config_value;
                        $invoice_details['from_billing_phone'] = $config[18]->config_value;
                        $invoice_details['from_billing_email'] = $config[17]->config_value;
                        $invoice_details['to_billing_name'] = $request->billing_name;
                        $invoice_details['to_billing_address'] = $request->billing_address;
                        $invoice_details['to_billing_city'] = $request->billing_city;
                        $invoice_details['to_billing_state'] = $request->billing_state;
                        $invoice_details['to_billing_zipcode'] = $request->billing_zipcode;
                        $invoice_details['to_billing_country'] = $request->billing_country;
                        $invoice_details['to_billing_phone'] = $request->billing_phone;
                        $invoice_details['to_billing_email'] = $request->billing_email;
                        $invoice_details['to_vat_number'] = $request->vat_number;
                        $invoice_details['tax_name'] = $config[24]->config_value;
                        $invoice_details['tax_type'] = $config[14]->config_value;
                        $invoice_details['tax_value'] = $config[25]->config_value;
                        $invoice_details['invoice_amount'] = 0;
                        $invoice_details['subtotal'] = 0;
                        $invoice_details['tax_amount'] = 0;

                        $transaction = new Transaction();
                        $transaction->gobiz_transaction_id = uniqid();
                        $transaction->transaction_date = now();
                        $transaction->transaction_id = uniqid();
                        $transaction->user_id = Auth::user()->id;
                        $transaction->plan_id = $selected_plan->plan_id;
                        $transaction->desciption = $selected_plan->plan_name . " Plan";
                        $transaction->payment_gateway_name = "FREE";
                        $transaction->transaction_amount = $selected_plan->plan_price;
                        $transaction->transaction_currency = $config[1]->config_value;
                        $transaction->invoice_details = json_encode($invoice_details);
                        $transaction->payment_status = "SUCCESS";
                        $transaction->save();

                        $plan_validity = Carbon::now();
                        $plan_validity->addDays($selected_plan->validity);
                        User::where('user_id', Auth::user()->user_id)->update([
                            'plan_id' => $id,
                            'term' => "9999",
                            'plan_validity' => $plan_validity,
                            'plan_activation_date' => now(),
                            'plan_details' => $selected_plan,
                        ]);
                        // Making all cards inactive, For Plan change
                        BusinessCard::where('user_id', Auth::user()->user_id)->update([
                            'card_status' => 'inactive',
                        ]);
                        alert()->success(trans("FREE Plan activated!"));
                        return redirect()->back();
                    }
                } else {
                    $settings = Setting::where('status', 1)->first();
                    $config = DB::table('config')->get();
                    $currency = Currency::where('iso_code', $config[1]->config_value)->first();
                    $gateways = Gateway::where('is_status', 'enabled')->where('status', 1)->get();
                    $plan_price = $selected_plan->plan_price;
                    $tax = $config[25]->config_value;
                    $total = ((int)($plan_price) * (int)($tax) / 100) + (int)($plan_price);
                    return view('user.checkout.checkout', compact('settings', 'config', 'currency', 'selected_plan', 'gateways', 'total'));
                }
            }
        }
    }



    public function checkLink(Request $request)
    {
        $link = $request->link;
        $is_present = DB::table('business_cards')->where('card_url', $link)->count();
        $resp = [];
        $resp['status'] = 'failed';

        if ($is_present == 0) {
            $resp['status'] = 'success';
        } else {
            $resp['status'] = 'failed';
        }

        return response()->json($resp);
    }


    public function getYoutubeEmbad($url)
    {
        $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
        $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';
        if (preg_match($longUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }
        if (preg_match($shortUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }
        $video_file = 'https://www.youtube.com/embed/' . $youtube_id;
        return $video_file;
    }

    public function formatName($name)
    {
        $base_name = preg_replace('/\..+$/', '', $name);
        $base_name = explode(' ', $base_name);
        $base_name = implode('-', $base_name);
        $base_name = Str::lower($base_name);
        $name = $base_name . "-" . uniqid();
        return $name;
    }

    public function uploadBase64ToImage($file, $file_name, $file_prefix)
    {
        $file_path = sprintf("assets/uploads/banner/");
        if (!File::exists($file_path)) {
            File::makeDirectory($file_path);
        }
        $file_name = sprintf('%s.%s', $file_name, $file_prefix);
        $upload_path = public_path() . '/' . $file_path;
        if (stripos($file, 'data:image/jpeg;base64,') === 0) {
            $img = base64_decode(str_replace('data:image/jpeg;base64,', '', $file));
        } else if (stripos($file, 'data:image/png;base64,') === 0) {
            $img = base64_decode(str_replace('data:image/png;base64,', '', $file));
        } else {
            return false;
        }
        $result = file_put_contents($upload_path . $file_name, $img);
        return $file_path . $file_name;
    }



    function uploadAndResize($file, $_path, $width, $height)
    {
        $blank_img =  Image::canvas($width, $height, '#EBEEF7');
        $path = public_path($_path);
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }
        $fileName = preg_replace('/\..+$/', '', $file->getClientOriginalName());
        $fileName = explode(' ', $fileName);
        $fileName = implode('-', $fileName);
        $fileName = Str::lower($fileName);
        $fileName = $fileName . "-" . uniqid() . "." . $file->getClientOriginalExtension();
        $image = Image::make($file);
        $imageWidth = $image->width();
        $imageHeight = $image->height();
        if ($imageWidth > $width) {
            $image->resize($width, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        }
        if ($imageHeight > $height) {
            $image->resize(null, $height, function ($constraint) {
                $constraint->aspectRatio();
            });
        }
        $blank_img->insert($image, 'center');
        $blank_img->save($path . '/' . $fileName);
        return $_path . $fileName;
    }

    public function uploadImage(Request $request)
    {

        $data = $request->image;
        $image_array_1 = explode(";", $data);
        $image_array_2 = explode(",", $image_array_1[1]);
        $data = base64_decode($image_array_2[1]);
        $imageName = time() . '.png';
        if (!File::isDirectory('assets/uploads/logo/')) {
            File::makeDirectory('assets/uploads/logo/', 0777, true, true);
        }
        Image::make($data)->save('assets/uploads/banner/' . $imageName);
        $imagePath = asset('assets/uploads/banner/' . $imageName);
        $imagePath2 = 'assets/uploads/banner/' . $imageName;
        return response()->json([
            'html' => '<input type="hidden" name="profile_image_path" value="' . $imagePath2 . '">',
            'banner' => $imagePath
        ]);
    }

    public function uploadLogo(Request $request)
    {
        $data = $request->image;
        $image_array_1 = explode(";", $data);
        $image_array_2 = explode(",", $image_array_1[1]);
        $data = base64_decode($image_array_2[1]);
        $imageName = time() . '.png';
        if (!File::isDirectory('assets/uploads/logo/')) {
            File::makeDirectory('assets/uploads/logo/', 0777, true, true);
        }
        Image::make($data)->save('assets/uploads/logo/' . $imageName);
        $imagePath = asset('assets/uploads/logo/' . $imageName);
        $imagePath2 = 'assets/uploads/logo/' . $imageName;
        return response()->json(
            [
                'html' => '<input type="hidden" name="logo_path" value="' . $imagePath2 . '">',
                'logo' => $imagePath
            ]
        );
    }
}
