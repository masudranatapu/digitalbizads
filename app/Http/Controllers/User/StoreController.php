<?php

namespace App\Http\Controllers\User;

use App\Plan;
use App\User;
use App\Theme;
use App\Setting;
use App\Currency;
use App\BusinessCard;
use App\StoreProduct;
use App\VariantOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Medias;
use App\ProductCategory;

class StoreController extends Controller
{
    // Create Store
    public function CreateStore()
    {

        $result = BusinessCard::where('user_id', Auth::id())->where('card_type', 'store')->count();

        if ($result > 0) {
            alert()->error(trans('Maximum store creation limit is exceeded.'));

            return redirect()->route('user.stores');
        }

        $themes = Theme::where('theme_description', 'WhatsApp Store')->where('status', 1)->get();
        $settings = Setting::where('status', 1)->first();
        $cards = BusinessCard::where('user_id', Auth::user()->user_id)->where('card_status', 'activated')->count();

        $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
        $currencies = Currency::orderBy('name', 'asc')->where('is_active', 1)->get();
        $plan_details = json_decode($plan->plan_details);

        if ($plan_details->no_of_vcards == 999) {
            $no_cards = 999999;
        } else {
            $no_cards = $plan_details->no_of_vcards;
        }

        if ($cards <= $no_cards) {
            return view('user.store.create-store', compact('themes', 'settings', 'plan_details', 'currencies'));
        } else {
            alert()->error(trans('Maximum card creation limit is exceeded, Please upgrade your plan.'));
            return redirect()->route('user.stores');
        }
    }

    // Save Store
    public function saveStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'theme_id'      => 'required',
            'card_color'    => 'required',
            'card_lang'     => 'required',
            'banner'        => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg',
            'logo'          => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg',
            'title'         => 'required',
            'currency'      => 'required',
            'subtitle'      => 'required',
            'whatsapp_no'   => 'required',
            'whatsapp_msg'  => 'required',
            'email'         => 'required',
            'personalized_link' => 'sometimes|max:124',
        ]);


        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user_details = User::where('user_id', Auth::user()->user_id)->first();
        $plan_details = json_decode($user_details->plan_details);

        $cardId = uniqid();

        if ($request->personalized_link && ($plan_details->personalized_link == '1')) {
            $personalized_link = $request->personalized_link;
        } else {
            $personalized_link = $cardId;
        }

        $cards = BusinessCard::where('user_id', Auth::user()->user_id)->where('card_status', 'activated')->count();

        if ($request->logo) {
            $logo = '/backend/img/vCards/' . 'IMG-' . uniqid() . '-' . str_replace(' ', '-', $request->logo->getClientOriginalName()) . '.' . $request->logo->extension();
            $request->logo->move(public_path('backend/img/vCards'), $logo);
        }

        if (isset($request->banner)) {
            $banner = '/backend/img/vCards/' . 'IMG-' . uniqid() . '-' . str_replace(' ', '-', $request->banner->getClientOriginalName()) . '.' . $request->banner->extension();
            $request->banner->move(public_path('backend/img/vCards'), $banner);
        }

        $store_details = [];
        $store_details['whatsapp_no']   = $request->whatsapp_no;
        $store_details['whatsapp_msg']  = $request->whatsapp_msg;
        $store_details['currency']      = $request->currency;
        $store_details['email']         = $request->email;
        $card_url       = strtolower(preg_replace('/\s+/', '-', $personalized_link));
        $current_card   = BusinessCard::where('card_url', $card_url)->count();

        if ($plan_details->no_of_vcards == 999) {
            $no_cards = 999999;
        } else {
            $no_cards = $plan_details->no_of_vcards;
        }

        if ($current_card == 0) {
            // Checking, If the user plan allowed card creation is less than created card.
            if ($cards < $no_cards) {
                try {
                    $card_id = $cardId;
                    $card = new BusinessCard();
                    $card->card_id      = $card_id;
                    $card->user_id      = Auth::user()->id;
                    $card->theme_id     = $request->theme_id;
                    $card->theme_color  = $request->card_color;
                    $card->card_lang    = $request->card_lang;
                    $card->cover        = $banner ?? null;
                    $card->profile      = $logo ?? null;
                    $card->card_url     = strtolower(preg_replace('/\s+/', '-', $personalized_link));
                    $card->card_type    = 'store';
                    $card->title        = $request->title;
                    $card->sub_title    = $request->subtitle;
                    $card->is_store_show        = 1;
                    $card->card_status          = "activated";
                    $card->description          = json_encode($store_details);
                    $card->header_backgroung    = $request->header_backgroung ?? '#fff';
                    $card->header_text_color    = $request->header_text_color ?? '#000';
                    $card->shop_link_name       = $request->shop_link_name ?? 'SHOP';
                    $card->save();

                    alert()->success(trans('New WhatsApp Store Created Successfully!'));
                    return redirect()->route('user.stores', $card_id);
                } catch (\Exception $th) {
                    // dd($th);
                    alert()->error(trans('Sorry, personalized link was already registered.'));
                    return redirect()->route('user.create.store');
                }
            } else {
                alert()->error(trans('Maximum store creation limit is exceeded, Please upgrade your plan to add more store(s).'));
                return redirect()->route('user.create.store');
            }
        } else {
            alert()->error(trans('Sorry, personalized link was already registered.'));
            return redirect()->route('user.create.store');
        }
    }

    // Products
    public function products()
    {
        $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
        $plan_details = json_decode($plan->plan_details);
        $media = Medias::where('user_id', Auth::user()->user_id)->orderBy('id', 'desc')->get();
        $settings = Setting::where('status', 1)->first();

        return view('user.products.store', compact('plan_details', 'media', 'settings'));
    }

    // Save Products
    public function saveProducts(Request $request, $id)
    {
        $business_card = BusinessCard::where('card_id', $id)->first();

        if ($business_card == null) {
            return view('errors.404');
        } else {
            $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
            $plan_details = json_decode($plan->plan_details);

            if ($request->badge != null) {
                if (count($request->badge) <= $plan_details->no_of_services) {

                    StoreProduct::where('card_id', $id)->delete();
                    for ($i = 0; $i < count($request->badge); $i++) {
                        $service = new StoreProduct();
                        $service->card_id = $id;
                        $service->product_id = uniqid();
                        $service->badge = $request->badge[$i];
                        $service->product_image = $request->product_image[$i];
                        $service->product_name = $request->product_name[$i];
                        $service->product_subtitle = $request->product_subtitle[$i];
                        $service->regular_price = $request->regular_price[$i];
                        $service->sales_price = $request->sales_price[$i];
                        $service->product_status = $request->product_status[$i];
                        $service->save();
                    }

                    alert()->success(trans('Products added'));
                    return redirect()->route('user.cards');
                } else {
                    alert()->error(trans('You have reached plan limit.'));
                    return redirect()->route('user.products', $id);
                }
            } else {
                alert()->error(trans('You must add atleast one product.'));
                return redirect()->route('user.products', $id);
            }
        }
    }






    // Edit Store
    public function editStore(Request $request, $id)
    {
        $themes = Theme::where('theme_description', 'WhatsApp Store')->where('status', 1)->get();
        $business_card = BusinessCard::where('card_id', $id)->first();
        if ($business_card == null) {
            return view('errors.404');
        } else {
            if ($business_card->card_type == "store") {
                $settings = Setting::where('status', 1)->first();
                $currencies = Currency::orderBy('name', 'asc')->where('is_active', 1)->get();

                $user_details = User::where('user_id', Auth::user()->user_id)->first();
                $plan_details = json_decode($user_details->plan_details);
                $store_details = json_decode($business_card->description);


                return view('user.edit-store.edit-store', compact('themes', 'business_card', 'settings', 'plan_details', 'store_details', 'currencies', 'user_details'));
            } else {
                return redirect()->route('user.edit.card', $id);
            }
        }
    }

    // Update store
    public function updateStore(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'card_color'        => 'required|string|max:124',
            'card_lang'         => 'required|string|max:124',
            'title'             => 'required|string|max:124',
            'subtitle'          => 'required|string|max:255',
            'currency'          => 'required|string|max:124',
            'whatsapp_no'       => 'required|string|max:20',
            'email'             => 'required|email|max:191',
            'shop_link_name'    => 'required|string|max:191',
            'whatsapp_msg'      => 'required|string|max:255',
            'personalized_link' => 'nullable|string|max:124',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $business_card = BusinessCard::where('card_id', $id)->first();
        $user_details = User::where('user_id', Auth::user()->user_id)->first();
        $plan_details = json_decode($user_details->plan_details);

        if ($business_card == null) {
            return view('errors.404');
        } else {
            $store_details = $data = [];
            $store_details['whatsapp_no']   = $request->whatsapp_no;
            $store_details['whatsapp_msg']  = $request->whatsapp_msg;
            $store_details['currency']      = $request->currency;
            $store_details['email']         = $request->email;

            if ($request->banner) {
                $banner = '/backend/img/vCards/' . 'IMG-' . $request->banner->getClientOriginalName() . '.' . $request->banner->extension();
                $request->banner->move(public_path('backend/img/vCards'), $banner);
                $data['cover']  = $banner;
            }

            if ($request->logo) {
                $logo = '/backend/img/vCards/' . 'IMG-' . uniqid() . '-' . str_replace(' ', '-', $request->logo->getClientOriginalName()) . '.' . $request->logo->extension();
                $request->logo->move(public_path('backend/img/vCards'), $logo);
                $data['profile'] = $logo;
            }

            $data['shop_link_name']     = $request->shop_link_name ?? 'SHOP';
            $data['theme_id']           = $request->theme_id;
            $data['theme_color']        = $request->card_color;
            $data['card_lang']          = $request->card_lang;
            $data['title']              = $request->title;
            $data['sub_title']          = $request->subtitle;
            $data['description']        = $store_details;
            $data['header_backgroung']  = $request->header_backgroung;
            $data['header_text_color']  = $request->header_text_color;

            if ($plan_details->personalized_link == '1') {
                $checkCardUrl = BusinessCard::where('card_url', $request->personalized_link)->whereNotIn('card_id', [$id])->first();
                if (!empty($checkCardUrl)) {
                    alert()->error(trans('Store link must be unique'));
                    return back()->withInput();
                }
                if (!empty($request->personalized_link)) {
                    $personalized_link = $request->personalized_link;
                    $data['card_url'] = strtolower(preg_replace('/\s+/', '-', $personalized_link));
                }
            }

            BusinessCard::where('card_id', $id)->update($data);
            alert()->success(trans('Store details updated'));
            return redirect()->route('user.stores');
        }
    }






    // // Products
    // public function editProducts(Request $request, $id)
    // {
    //     $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
    //     $plan_details = json_decode($plan->plan_details);
    //     $business_card = BusinessCard::where('card_id', $id)->first();

    //     if ($business_card == null) {
    //         return view('errors.404');
    //     } else {
    //         $products = StoreProduct::where('card_id', $id)->get();
    //         $media = Medias::where('user_id', Auth::user()->user_id)->orderBy('id', 'desc')->get();
    //         $settings = Setting::where('status', 1)->first();
    //         $productCategories = ProductCategory::orderBy('category_name', 'asc')
    //             ->where('user_id', Auth::id())->get();

    //         return view('user.edit-store.edit-products', compact('plan_details', 'products', 'media', 'settings', 'productCategories'));
    //     }
    // }


    // Update products
    //     public function updateProducts(Request $request, $id)
    //     {

    //         $business_card = BusinessCard::where('card_id', $id)->first();

    //         if ($business_card == null) {
    //             return view('errors.404');
    //         } else {
    //             $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
    //             $plan_details = json_decode($plan->plan_details);

    //             if (isset($request->badge) && isset($request->product_image) && isset($request->product_name) && isset($request->product_subtitle) && isset($request->regular_price) && isset($request->sales_price) && isset($request->product_status)) {
    //                 if (count($request->badge) <= $plan_details->no_of_services) {
    //                     StoreProduct::where('card_id', $id)->delete();
    //                     for ($i = 0; $i < count($request->badge); $i++) {
    //                         $product = new StoreProduct();
    //                         $product->card_id = $id;
    //                         $product->product_id = uniqid();
    //                         $product->badge = $request->badge[$i];
    //                         $product->product_image = $request->product_image[$i];
    //                         $product->product_name = $request->product_name[$i];
    //                         $product->product_subtitle = $request->product_subtitle[$i];
    //                         $product->regular_price = $request->regular_price[$i];
    //                         $product->sales_price = $request->sales_price[$i];
    //                         $product->product_status = $request->product_status[$i];
    //                         $product->category_id = $request->category[$i];
    //                         $product->save();
    //                     }

    //                     $activeCards = BusinessCard::where('user_id', Auth::user()->user_id)->where('card_status', 'activated')->count();

    //                     if ($activeCards <= $plan_details->no_of_vcards) {
    //                         BusinessCard::where('user_id', Auth::user()->user_id)->where('card_id', $id)->update([
    //                             'card_status' => 'activated',
    //                         ]);
    //                         alert()->success(trans('Products save successfully.'));
    //                         return redirect()->route('user.stores');
    //                     }
    //                     alert()->success(trans('Products save successfully.'));
    //                     return redirect()->route('user.stores');
    //                 } else {
    //                     alert()->error(trans('You have reached plan limit.'));
    //                     return redirect()->route('user.products.edit', $id);
    //                 }
    //             } else {
    //                 $activeCards = BusinessCard::where('user_id', Auth::user()->user_id)->where('card_status', 'activated')->count();

    //                 $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
    //                 $plan_details = json_decode($plan->plan_details);

    //                 if ($activeCards <= $plan_details->no_of_vcards) {
    //                     BusinessCard::where('user_id', Auth::user()->user_id)->where('card_id', $id)->update([
    //                         'card_status' => 'activated',
    //                     ]);
    //                     alert()->success(trans('Products updated.'));
    //                     return redirect()->route('user.stores');
    //                 }
    //                 alert()->error(trans('You have reached plan limit.'));
    //                 return redirect()->route('user.products.edit', $id);
    //             }
    //         }
    //     }

}
