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


class CheckoutController extends Controller
{



    public function checkout($cardUrl)
    {
        $business_card_details = BusinessCard::where('card_url', $cardUrl)->first();


        return view('pages.product.checkout', compact('business_card_details'));
    }

    public function checkoutBilling($cardUrl)
    {
        $business_card_details = BusinessCard::where('card_url', $cardUrl)->first();

        return view('pages.product.checkout_billing', compact('business_card_details'));
    }

    public function checkoutStore(Request $request, $cardUrl)
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
            "order_note" => 'nullable'
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



        return redirect()->route('checkout.billing', ['cardUrl' => $cardUrl]);
    }

    public function checkoutBillingStore(Request $request, $cardUrl)
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
        return redirect()->route('checkout.payment', $cardUrl);
    }

    public function checkoutPayment($cardUrl)
    {
        $shipping = Session::has('shipping');
        $billing = Session::has('billing');



        if (!$shipping && !$billing) {
            Session::flash('alert', "Please set billing and shipping address");
            return redirect()->route('checkout', ['cardUrl' => $cardUrl]);
        }

        $business_card_details = BusinessCard::where('card_url', $cardUrl)->first();
        $user = User::find($business_card_details->user_id);

        return view('pages.product.checkout_payment', compact('business_card_details', 'user'));
    }





    public function checkoutPaymentSrtipe($cardUrl)
    {



        $business_card_details = BusinessCard::where('card_url', $cardUrl)->first();
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

        return view('pages.product.stripe', compact('business_card_details', 'intent', 'user', 'paymentId'));
    }



    public function checkoutPaymentSrtipeStore($cardUrl, $paymentId)
    {
        $business_card_details = BusinessCard::where('card_url', $cardUrl)->first();
        $user = User::find($business_card_details->user_id);
        $totalTransaction = ProductOrderTransaction::count();
        try {
            $stripe = new \Stripe\StripeClient($user->stripe_secret_key);
            $payment = $stripe->paymentIntents->retrieve($paymentId, []);


            $productOrderTransaction = new ProductOrderTransaction();
            $productOrderTransaction->store_id = $cardUrl;
            $productOrderTransaction->transection_id = $paymentId;
            $productOrderTransaction->transection_date = now();
            $productOrderTransaction->provider = "Stripe";
            $productOrderTransaction->currency = $payment['currency'];
            $productOrderTransaction->trsnsection_amount = $payment['amount'] / 100;
            $productOrderTransaction->invoice = $totalTransaction + 1;
            $productOrderTransaction->invoice_details = json_encode(Session::get('shipping'));
            $productOrderTransaction->payment_status = $payment['status'];
            $productOrderTransaction->status = true;
            $productOrderTransaction->save();
            Log::alert("success");
        } catch (\Exception $e) {
            $payment = new \stdClass();
            $payment->status = "error";
            dd($e->getMessage());
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
            $orderDetails->transaction_id = $productOrderTransaction->id;
            $orderDetails->store_id = $cardUrl;
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
