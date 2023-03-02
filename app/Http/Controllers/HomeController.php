<?php

namespace App\Http\Controllers;

use App\Plan;
use App\User;
use Illuminate\Support\Facades\Validator;
use App\Gallery;
use App\Setting;
use App\Currency;
use App\Subscriber;
use App\BusinessCard;
use App\BusinessField;
use App\Mail\OrderEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use JeroenDesloovere\VCard\VCard;


class HomeController extends Controller
{
    public function index()
    {
        // Auth::logout();
        $homePage = DB::table('pages')->where('page_name', 'home')->get();
        $supportPage = DB::table('pages')->where('page_name', 'footer support email')->orWhere('page_name', 'footer')->get();
        $plans = Plan::where('status', 1)->where('is_private', '0')->get();
        $settings = Setting::where('status', 1)->first();
        $config = DB::table('config')->get();

        $currency = Currency::where('iso_code', $config['1']->config_value)->first();

        SEOTools::setTitle($settings->site_name);
        SEOTools::setDescription($settings->seo_meta_description);

        SEOMeta::setTitle($settings->site_name);
        SEOMeta::setDescription($settings->seo_meta_description);
        SEOMeta::addMeta('article:section', $settings->seo_site, 'property');
        SEOMeta::addKeyword([$settings->seo_keywords]);

        OpenGraph::setTitle($settings->site_name);
        OpenGraph::setDescription($settings->seo_meta_description);
        OpenGraph::setUrl(URL::to('/') . '/');
        OpenGraph::addImage([URL::to('/') . $settings->site_logo, 'size' => 300]);

        JsonLd::setTitle($settings->site_name);
        JsonLd::setDescription($settings->seo_meta_description);
        JsonLd::addImage(URL::to('/') . $settings->site_logo);

        return view('web', compact('homePage', 'supportPage', 'plans', 'settings', 'currency', 'config'));
    }

    public function faq()
    {
        $faqPage = DB::table('pages')->where('page_name', 'faq')->get();
        $supportPage = DB::table('pages')->where('page_name', 'footer support email')->orWhere('page_name', 'footer')->get();
        $config = DB::table('config')->get();
        $settings = Setting::where('status', 1)->first();

        return view('pages/faq', compact('faqPage', 'supportPage', 'settings', 'config'));
    }

    public function privacyPolicy()
    {
        $privacyPage = DB::table('pages')->where('page_name', 'privacy')->get();
        $supportPage = DB::table('pages')->where('page_name', 'footer support email')->orWhere('page_name', 'footer')->get();
        $config = DB::table('config')->get();
        $settings = Setting::where('status', 1)->first();

        return view('pages/privacy', compact('privacyPage', 'supportPage', 'settings', 'config'));
    }

    public function refundPolicy()
    {
        $refundPage = DB::table('pages')->where('page_name', 'refund')->get();
        $supportPage = DB::table('pages')->where('page_name', 'footer support email')->orWhere('page_name', 'footer')->get();
        $config = DB::table('config')->get();
        $settings = Setting::where('status', 1)->first();

        return view('pages/refund', compact('refundPage', 'supportPage', 'settings', 'config'));
    }

    public function termsAndConditions()
    {
        $termsPage = DB::table('pages')->where('page_name', 'terms')->get();
        $supportPage = DB::table('pages')->where('page_name', 'footer support email')->orWhere('page_name', 'footer')->get();
        $config = DB::table('config')->get();
        $settings = Setting::where('status', 1)->first();

        return view('pages/terms', compact('termsPage', 'supportPage', 'settings', 'config'));
    }

    public function about()
    {
        $aboutPage = DB::table('pages')->where('page_name', 'about')->get();
        $supportPage = DB::table('pages')->where('page_name', 'footer support email')->orWhere('page_name', 'footer')->get();
        $config = DB::table('config')->get();
        $settings = Setting::where('status', 1)->first();

        return view('pages/about', compact('aboutPage', 'supportPage', 'settings', 'config'));
    }

    public function contact()
    {
        $contactPage = DB::table('pages')->where('page_name', 'contact')->get();
        $supportPage = DB::table('pages')->where('page_name', 'footer support email')->orWhere('page_name', 'footer')->get();
        $config = DB::table('config')->get();
        $settings = Setting::where('status', 1)->first();

        return view('pages/contact', compact('contactPage', 'supportPage', 'settings', 'config'));
    }

    public function getPreview($cardurl)
    {
        $cardinfo = BusinessCard::select('business_cards.*', 'plans.plan_name', 'plans.hide_branding')
            ->where('business_cards.card_url', $cardurl)

            ->leftJoin('users', 'users.id', 'business_cards.user_id')
            ->leftJoin('plans', 'plans.id', 'users.plan_id')
            ->first();


        if ($cardinfo) {
            $store_details = BusinessCard::where('card_type', 'store')->where('status', 1)
                ->where('card_status', 'activated')
                ->where('user_id', $cardinfo->user_id)->first();



            if ($cardinfo->card_type == "vcard") {
                $cardinfo->gallery = Gallery::where('card_id', $cardinfo->id)->get();
                $cardinfo->contacts = BusinessField::where('card_id', $cardinfo->id)->get();
                $user = User::find($cardinfo->user_id);
                $url = url($cardinfo->card_url);



                if ($cardinfo->card_status == 'deactive') {
                    alert()->error(trans('This card is not active now'));
                    return redirect()->route('home-locale');
                }
                if ($cardinfo->card_status == 2) {
                    alert()->error(trans('This card is not available'));
                    return redirect()->route('home-locale');
                }
                $settings = getSetting();

                return view('card-preview', compact('cardinfo', 'user', 'settings', 'store_details'));
            } else {
                $card_details = $cardinfo;

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
                    } else {
                        $enquiry_button = null;
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
                        return view('vcard.modern-store-light', compact('card_details', 'plan_details', 'store_details', 'business_card_details', 'products', 'settings', 'shareComponent', 'shareContent', 'config', 'enquiry_button', 'whatsapp_msg', 'currency','store_card'));
                    } else if ($card_details->theme_id == "7ccc432a06hju") {
                        return view('vcard.modern-store-dark', compact('card_details', 'plan_details', 'store_details', 'business_card_details', 'products', 'settings', 'shareComponent', 'shareContent', 'config', 'enquiry_button', 'whatsapp_msg', 'currency','store_card'));
                    }
                }
            }
        }
    }


    // public function downloadVcard(Request $request, $id)
    // {
    //     $photo = '';
    //     $business_card = BusinessCard::query()->where('card_id', $id)->first();
    //     if ($business_card == null) {
    //         return view('errors.404');
    //     } else {
    //         $card = DB::table('business_cards')->select(
    //             'business_cards.id',
    //             'business_cards.profile',
    //             'business_cards.phone_number',
    //             'users.dob'
    //         )
    //             ->where('business_cards.card_id', $id)
    //             ->leftJoin('users', 'business_cards.user_id', '=', 'users.id')
    //             ->first();
    //         $contacts = DB::table('business_fields as bf')
    //             ->select('bf.type', 'bf.label', 'bf.icon_image', 'bf.content', 'bf.position')
    //             ->where('bf.card_id', $card->id)
    //             ->where('bf.status', 1)
    //             ->orderBy('bf.position', 'ASC')
    //             ->get();
    //         $vcard = new VCard();
    //         if (!empty($card->card_url)) {
    //             $vcard_url = URL::to($card->card_url);
    //             $vcard->addURL($vcard_url);
    //         }
    //         // define variables
    //         if (!empty($card->title2)) {
    //             $lastname = $card->title2;
    //         } else {
    //             $lastname = '';
    //         }
    //         $firstname = $card->title;
    //         $additional = '';
    //         $prefix = '';
    //         $suffix = '';
    //         $url = $card->company_websitelink;
    //         $vcard->addName($lastname, $firstname, $additional, $prefix, $suffix);
    //         $vcard->addEmail($card->card_email ?? Auth::user()->email);

    //         if (!empty($card->bio)) {
    //             $vcard->addNote($card->bio);
    //         }
    //         if (!empty($card->phone_number)) {
    //             $vcard->addPhoneNumber($card->phone_number, 'HOME');
    //         }

    //         if ($card->designation) {
    //             $vcard->addRole($card->designation);
    //             $vcard->addJobtitle($card->designation);
    //         }
    //         if (!empty($card->company_name)) {
    //             $vcard->addCompany($card->company_name);
    //         }
    //         if (!empty($card->dob)) {
    //             $vcard->addBirthday($card->dob);
    //         }

    //         if (!empty($card->profile) && file_exists(public_path($card->profile))) {
    //             $profile = str_replace(' ', '%20', public_path($card->profile));
    //             $vcard->addPhoto($profile);
    //         }
    //         // if(!empty($card->logo) && file_exists(public_path($card->logo))){
    //         //     $logo = str_replace(' ', '%20', public_path($card->logo));
    //         //     $vcard->addLogo($logo);
    //         // }

    //         if (!empty($contacts) && count($contacts) > 0) {
    //             //link,mail,mobile,number,text,username,file,address,app
    //             foreach ($contacts as $key => $contact) {
    //                 if ($contact->type == 'mail') {
    //                     $vcard->addEmail($contact->content, $contact->label);
    //                 } elseif ($contact->type == 'username') {
    //                     $vcard->addURL($contact->content, $contact->label);
    //                 }
    //             }
    //         }

    //         // DB::table('business_cards')->where('card_id', $id)->increment('total_vcf_download', 1);
    //         return Response::make($vcard->getOutput(), 200, $vcard->getHeaders(true));
    //     }
    // }
    public function downloadVcard(Request $request, $id)
    {
        $business_card = BusinessCard::select('business_cards.*', 'users.name', 'users.email')
            ->where('card_id', $id)->leftJoin('users', 'business_cards.user_id', 'users.id')->first();


        if ($business_card == null) {
            return view('errors.404');
        } else {




            $vcard_url = URL::to('/') . "/" . $business_card->card_url;

            // define vcard
            $vcard = new VCard();

            // define variables
            $lastname = '';
            $firstname = $business_card->name;
            $additional = '';
            $prefix = '';
            $suffix = '';
            $email = $business_card->email;
            $tel = '';
            $whatsapp = '';


            // add personal data
            $vcard->addName($lastname, $firstname, $additional, $prefix, $suffix);


            if (isset($business_card->email)) {
                $vcard->addEmail($business_card->email);
            }
            if (isset($business_card->phone_number)) {
                $vcard->addPhoneNumber($business_card->phone_number, 'WORK');
            }



            if ($business_card->profile == null) {
                $image = "";
            } else {
                $image = str_replace(' ', '%20', public_path($business_card->profile));
            }


            return Response::make($vcard->getOutput(), 200, $vcard->getHeaders(true));
        }
    }


    public function postSubscriber(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subscriber_email' => 'required|email|unique:subscribers,email,',
            'card_id' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        DB::beginTransaction();
        try {
            $subscriber = new Subscriber();
            $subscriber->email = $request->subscriber_email;
            $subscriber->card_id = $request->card_id;
            $subscriber->created_at = date('Y-m-d H:i:s');
            $subscriber->save();
            $email = $request->subscriber_email;
            // Mail::send('emails.subscriber',compact('email'), function($message)use($email) {
            //     $message->to($email, $email)
            //     // ->cc('asas@gmail.com')
            //     ->subject('Subscriber mail');
            //     });
            // Mail::send('emails.subcription',compact('email'), function($message)use($email) {
            //     $message->to('info@gmail.com')
            //     ->subject('Subscriber mail');
            //     });


        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
            alert()->error(trans('Unable to subscribe'));
            return redirect()->back();
        }
        DB::commit();
        alert()->success(trans('Thank you You have successfully subscribed.'));
        return redirect()->back();
    }


    public function placeEmailOrder(Request $request)
    {
        $settings = Setting::first();
        $owner = User::find($request->card_user_id);
        $customer_info = $request->customer_info;
        $cart = $request->cart;
        Mail::to($owner->email)->send(new OrderEmail($settings, $owner, $customer_info, $cart));

        return response()->json(['status' => 'success']);
    }
}
