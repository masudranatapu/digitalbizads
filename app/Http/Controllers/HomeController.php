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
use App\ProductCategory;
use App\VariantOption;
use App\StoreProduct;
use App\Order;
use App\OrderDetail;
use App\ProductOrderTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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

    public function getPreview(Request $request, $cardurl)
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

                    $query = StoreProduct::with('hasCategory')->where('card_id', $card_details->card_id)->where('status', true);


                    if (isset($request->category)) {
                        $query = $query->where('category_id', $request->category);
                    }

                    if (isset($request->sort_order)) {

                        if ($request->sort_order == "1") {
                            $query = $query->orderBy('product_name', 'asc');
                        } elseif ($request->sort_order == "2") {
                            $query = $query->orderBy('product_name', 'desc');
                        } elseif ($request->sort_order == "3") {
                            $query = $query->orderBy('sales_price', 'asc');
                        } elseif ($request->sort_order == "4") {
                            $query = $query->orderBy('sales_price', 'desc');
                        }
                    }

                    $products = $query->get();



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
                    $productCategories = ProductCategory::orderBy('category_name', 'asc')
                        ->where('user_id', $business_card_details->user_id)->get();


                    if ($card_details->theme_id == "7ccc432a06hty") {
                        return view('vcard.modern-store-light', compact('card_details', 'productCategories', 'plan_details', 'store_details', 'business_card_details', 'products', 'settings', 'shareComponent', 'shareContent', 'config', 'enquiry_button', 'whatsapp_msg', 'currency', 'store_card'));
                    } else if ($card_details->theme_id == "7ccc432a06hju") {
                        return view('vcard.modern-store-dark', compact('card_details', 'productCategories', 'plan_details', 'store_details', 'business_card_details', 'products', 'settings', 'shareComponent', 'shareContent', 'config', 'enquiry_button', 'whatsapp_msg', 'currency', 'store_card'));
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


    public function productDetails($id)
    {
        $product = StoreProduct::with(['hasStore', 'hasVariant', 'hasCategory'])->find($id);

        $config = DB::table('config')->get();
        $currency = Currency::where('iso_code', $config['1']->config_value)->first();

        $business_card_details = BusinessCard::where('card_id', $product->card_id)->first();

        return view('pages.product_details', compact('product', 'currency', 'business_card_details'));
    }


    public function cartPage($card_id)
    {
        // Session::forget('cart');

        $business_card_details = BusinessCard::where('card_id', $card_id)->first();


        $cart = session()->get('cart');
        return view('pages.cart', compact('cart', 'business_card_details'));
    }

    public function checkout($card_id)
    {
        $business_card_details = BusinessCard::where('card_id', $card_id)->first();
        return view('pages.checkout', compact('business_card_details'));
    }

    public function checkoutBilling($card_id)
    {
        $business_card_details = BusinessCard::where('card_id', $card_id)->first();
        return view('pages.checkout_billing', compact('business_card_details'));
    }

    public function checkoutStore(Request $request, $card_id)
    {

        $request->validate([
            "ship_first_name" => 'required',
            "ship_last_name" => 'required',
            "ship_email" => 'required|email',
            "ship_phone" => 'required|numeric',
            "ship_address1" => 'required',
            "ship_city" => 'required',
            "ship_state" => 'required',
            "ship_zip" => 'required',
            "ship_country" => 'required',
            "order_note" => 'required'
        ]);

        Session::forget('shipping');

        $shipingData = [
            "ship_first_name" => trim($request->ship_first_name),
            "ship_last_name" => trim($request->ship_last_name),
            "ship_email" => trim($request->ship_email),
            "ship_phone" => trim($request->ship_phone),
            "ship_address1" => trim($request->ship_address1),
            "ship_city" => trim($request->ship_city),
            "ship_state" => trim($request->ship_state),
            "ship_zip" => trim($request->ship_zip),
            "ship_country" => trim($request->ship_country),
            "order_note" => trim($request->order_note),
        ];

        Session::put('shipping', $shipingData);



        return redirect()->route('checkout.billing', ['card_id' => $card_id]);
    }

    public function checkoutBillingStore(Request $request, $card_id)
    {

        $request->validate([

            "bill_first_name" => 'required',
            "bill_last_name" => 'required',
            "bill_email" => 'required|email',
            "bill_phone" => 'required|numeric',
            "bill_address1" => 'required',
            "bill_city" => 'required',
            "bill_state" => 'required',
            "bill_zip" => 'required',
            "bill_country" => 'required',
        ]);

        Session::forget('billing');

        $billingData = [
            "bill_first_name" => trim($request->bill_first_name),
            "bill_last_name" => trim($request->bill_last_name),
            "bill_email" => trim($request->bill_email),
            "bill_phone" => trim($request->bill_phone),
            "bill_address1" => trim($request->bill_address1),
            "bill_city" => trim($request->bill_city),
            "bill_state" => trim($request->bill_state),
            "bill_zip" => trim($request->bill_zip),
            "bill_country" => trim($request->bill_country),
        ];

        Session::put('billing', $billingData);
        return redirect()->route('checkout.payment', $card_id);
    }

    public function checkoutPayment($card_id)
    {
        $business_card_details = BusinessCard::where('card_id', $card_id)->first();
        $user = User::find($business_card_details->user_id);
        return view('pages.checkout_payment', compact('business_card_details', 'user'));
    }

    public function addToCart(Request $request)
    {

        $id = $request->productId;
        $product = StoreProduct::findOrFail($id);
        $cart = session()->get('cart', []);






        if (isset($cart[$id])) {
            if (isset($request->qty)) {
                $cart[$id]['quantity'] = $request->qty;
            } else {

                $cart[$id]['quantity']++;
            }
        } else {

            $option = [];
            $variantTotalPrice = 0;

            if (isset($request->option) && count($request->option) > 0) {

                $incomingVariant = $request->option;

                for ($i = 0; $i < count($incomingVariant); $i++) {

                    $productVariant = VariantOption::find($incomingVariant[$i]);
                    if (isset($productVariant)) {

                        $option[] = [
                            "id" => $productVariant->id,
                            "variant_id" => $productVariant->variant_id,
                            "name" => $productVariant->name,
                            "price" => $productVariant->price,

                        ];
                        $variantTotalPrice = $variantTotalPrice + $productVariant->price;
                    }
                }
            }

            $cart[$id] = [
                "name" => $product->product_name,
                "product_id" => $product->product_id,
                "quantity" => $request->qty,
                "price" => $product->sales_price != $product->regular_price ? ($product->sales_price + $variantTotalPrice) : ($product->regular_price + $variantTotalPrice),
                "image" => $product->product_image,
                "option" => $option,

            ];
        }

        session()->put('cart', $cart);
        alert()->success(trans('Proudct purchase successfully'));

        Session::flash('success', 'Add to cart successfully');
        return redirect()->back();
    }


    public function update(Request $request)

    {

        if ($request->id && $request->quantity) {

            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);
            Session::flash('success', 'Update cart successfully');
        }
    }

    public function remove(Request $request)

    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }

            Session::flash('success', 'Remove form the cart successfully');
        }
    }

    public function checkoutPaymentSrtipe($card_id)
    {
        $business_card_details = BusinessCard::where('card_id', $card_id)->first();
        $iso_code = json_decode($business_card_details->description, true);
        $currency = Currency::where('iso_code', $iso_code['currency'])->first();
        $shiping = Session::get('shipping');
        $total = 0;
        foreach (session('cart') as $id => $details) {


            $total += $details['price'] * $details['quantity'];
            $line_total = $details['price'] * $details['quantity'];
        }



        $user = User::find($business_card_details->user_id);

        \Stripe\Stripe::setApiKey($user->stripe_secret_key);
        $payment_intent = \Stripe\PaymentIntent::create([
            'description' => "Product purchase",
            'shipping' => [
                'name' => $shiping['ship_first_name'],
                'address' => [
                    'line1' => $shiping['ship_address1'],
                    'postal_code' => $shiping['ship_zip'],
                    'city' => $shiping['ship_city'],
                    'state' =>  $shiping['ship_state'],
                    'country' =>  $shiping['ship_city'],
                ],
            ],
            'amount' => intval($total) * 100,
            'currency' => $currency->iso_code,
            'payment_method_types' => ['card'],
        ]);
        $intent = $payment_intent->client_secret;
        $paymentId = $payment_intent->id;

        return view('pages.stripe', compact('business_card_details', 'intent', 'user', 'paymentId'));
    }

    public function checkoutPaymentSrtipeStore($card_id, $paymentId)
    {
        $business_card_details = BusinessCard::where('card_id', $card_id)->first();
        $user = User::find($business_card_details->user_id);
        $stripe = new \Stripe\StripeClient($user->stripe_secret_key);

        try {
            $payment = $stripe->paymentIntents->retrieve($paymentId, []);

            // $productOrderTransaction = new ProductOrderTransaction();
            // $productOrderTransaction->store_id = $card_id;
            // $productOrderTransaction->transection_id = ;
            // $productOrderTransaction->transection_date = now();
            // $productOrderTransaction->provider ="Stripe" ;
            // $productOrderTransaction->currency = ;
            // $productOrderTransaction->trsnsection_amount = ;
            // $productOrderTransaction->invoice = ;
            // $productOrderTransaction->invoice_details = json_encode(Session::get('shipping'));
            // $productOrderTransaction->payment_status = ;
            // $productOrderTransaction->status = ;

        } catch (\Exception $e) {
            $payment = new \stdClass();
            $payment->status = "error";
        }
        if ($payment->status == "succeeded") {

            $products = Session::get('cart');

            $totalPrice = 0;
            $totalQuantity = 0;
            foreach ($products as $key => $product) {

                $totalPrice += $product['price'] * $product['quantity'];
                $totalQuantity +=  $product['quantity'];
            }

            $orderDetails = new Order();
            $orderDetails->store_id = $card_id;
            $orderDetails->quantity = $totalQuantity;
            $orderDetails->total_price = $totalPrice;
            $orderDetails->payment_fee = 0;
            $orderDetails->vat = 0;
            $orderDetails->grand_total = $totalPrice;
            $orderDetails->order_date = now();
            $orderDetails->order_date = now();
            $orderDetails->shipping_details = json_encode(Session::get('shipping'));
            $orderDetails->billing_details = json_encode(Session::get('billing'));
            $orderDetails->payment_method = "Stripe";
            $orderDetails->payment_status = $payment->status == "succeeded" ? 1 : 0;
            $orderDetails->save();
            foreach ($products as $key => $product) {
                $totalPrice = 0;
                $totalQuantity = 0;
                $totalPrice += $product['price'] * $product['quantity'];
                $totalQuantity +=  $product['quantity'];

                $order_id = $orderDetails->id;
                $product_id = $key;

                if (count($product['option']) > 0) {
                    foreach ($product['option'] as $option) {
                        $orderDetails = new OrderDetail();
                        $orderDetails->order_id = $order_id;
                        $orderDetails->product_id = $product_id;
                        $orderDetails->quantity = $product['quantity'];
                        $orderDetails->unit_price = $product['price'];
                        $orderDetails->variant_id = $option['variant_id'];
                        $orderDetails->variant_option_id = $option['id'];
                        $orderDetails->save();
                    }
                }
            }
        }

        // Session::forget('shipping');
        // Session::forget('billing');
        // Session::forget('cart');




        alert()->success(trans('Proudct purchase successfully'));
        Session::flash('success', 'Proudct purchase successfully');


        return redirect()->route('card.preview', $business_card_details->card_url);
    }
}
