<?php

namespace App\Http\Controllers;


use App\User;


use App\Currency;

use App\BusinessCard;
use App\Mail\ProductPurchaseMail;
use App\Order;
use App\OrderDetail;
use App\ProductOrderTransaction;
use App\ShippingCost;
use App\State;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;



class CheckoutController extends Controller
{



    public function checkout($cardUrl)
    {


        if (!Session::has('cart')) {
            alert()->error(trans('No proudct in the cart'));
            return redirect()->route('card.preview', ['cardurl' => $cardUrl]);
        }

        $business_card_details = BusinessCard::where('card_url', $cardUrl)->first();
        $states = State::where('user_id', $business_card_details->user_id)->where('status', true)->get();
        $shippingAreas = ShippingCost::where('user_id', $business_card_details->user_id)->where('status', true)->get();



        return view('pages.product.checkout', compact('business_card_details', 'states', 'shippingAreas'));
    }

    public function checkoutBilling($cardUrl)
    {
        $business_card_details = BusinessCard::where('card_url', $cardUrl)->first();
        $shipping = Session::has('shipping');

        if (!$shipping) {
            Session::flash('alert', "Please provide the shipping address");
            return redirect()->route('checkout', ['cardUrl' => $cardUrl]);
        }

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
            "ship_area" => 'required',
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
            "ship_area" => trim($request->ship_area),
            "order_note" => trim($request->order_note),
            "same_as_shipping" => isset($request->same_as_shipping) ? true : false,
        ];

        $state = State::find($request->ship_state);
        $total = 0;
        if ($state->tax_type == "amount") {
            Session::forget('tax');
            Session::put('tax', $state->amount);
        } elseif ($state->tax_type == "percentage") {
            foreach (session('cart') as $id => $details) {


                $total += $details['price'] * $details['quantity'];
            }

            $taxAmount = ($total * $state->amount) / 100;
            Session::forget('tax');
            Session::put('tax', $taxAmount);
        }
        $shippingAreas = ShippingCost::find($request->ship_area);
        Session::forget('shippingCost');
        Session::put('shippingCost', $shippingAreas->amount);




        if (isset($request->same_as_shipping)) {
            $billingData = [
                "bill_first_name" => trim($request->ship_first_name),
                "bill_last_name" => trim($request->ship_last_name),
                "bill_email" => trim($request->ship_email),
                "bill_phone" => trim($request->ship_phone),
                "bill_address1" => trim($request->ship_address1),
                "bill_city" => trim($request->ship_city),
                "bill_state" => trim($state->name),
                "bill_zip" => trim($request->ship_zip),

            ];

            Session::put('billing', $billingData);
        } else {
            Session::forget('billing');
        }



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

        ];

        Session::put('billing', $billingData);
        return redirect()->route('checkout.payment', $cardUrl);
    }

    public function checkoutPayment($cardUrl)
    {

        $billing = Session::has('billing');




        if (!$billing) {
            Session::flash('alert', "Please set billing and shipping address");
            return redirect()->route('checkout.billing', ['cardUrl' => $cardUrl]);
        }

        $business_card_details = BusinessCard::where('card_url', $cardUrl)->first();
        $user = User::find($business_card_details->user_id);
        $iso_code = json_decode($business_card_details->description, true);
        $currency = Currency::where('iso_code', $iso_code['currency'])->first();
        $shipping = Session::get('shipping');
        $total = 0;
        foreach (session('cart') as $id => $details) {
            $total += $details['price'] * $details['quantity'];
        }

        //Todo Shipping And Vat Add Korte hobe

        if (session()->has('tax')) {
            $total = (int) $total + (int) session()->get('tax');
        }
        if (session()->has('shippingCost')) {

            $total = (int) $total + (int) session()->get('shippingCost');
        }

        $user = User::find($business_card_details->user_id);

        if (isset($user->stripe_secret_key)) {
            \Stripe\Stripe::setApiKey($user->stripe_secret_key);
            $payment_intent = \Stripe\PaymentIntent::create([
                'description' => "Product purchase",
                'shipping' => [
                    'name' => $shipping['ship_first_name'],
                    'address' => [
                        'line1' => $shipping['ship_address1'],
                        'postal_code' => $shipping['ship_zip'],
                        'city' => $shipping['ship_city'],
                        'state' =>  $shipping['ship_state'],
                        'country' =>  $shipping['ship_city'],
                    ],
                ],
                'amount' => intval($total) * 100,
                'currency' => $currency->iso_code,
                'payment_method_types' => ['card'],
            ]);
            $intent = $payment_intent->client_secret;
            $paymentId = $payment_intent->id;
        } else {
            $intent = null;
            $paymentId = null;
        }



        return view('pages.product.checkout_payment', compact('business_card_details', 'user', 'paymentId', 'intent'));
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
        }

        //Todo Shipping And Vat Add Korte hobe

        if (session()->has('tax')) {
            $total = (int) $total + (int) session()->get('tax');
        }
        if (session()->has('shippingCost')) {

            $total = (int) $total + (int) session()->get('shippingCost');
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
        $shippingCost = Session::has('shippingCost') ? Session::get('shippingCost') : 0;


        $tax = Session::has('tax') ? Session::get('tax') : 0;
        try {
            $stripe = new \Stripe\StripeClient($user->stripe_secret_key);
            $payment = $stripe->paymentIntents->retrieve($paymentId, []);


            $productOrderTransaction = new ProductOrderTransaction();
            $productOrderTransaction->store_id = $business_card_details->card_id;
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

            try {

                $products = Session::get('cart');

                $totalPrice = 0;
                $totalQuantity = 0;
                foreach ($products as $key => $product) {

                    $totalPrice += $product['price'] * $product['quantity'];
                    $totalQuantity +=  $product['quantity'];
                }

                $order = new Order();
                $order->transaction_id = $productOrderTransaction->id;
                $order->store_id = $business_card_details->card_id;
                $order->quantity = $totalQuantity;
                $order->total_price = $totalPrice;
                $order->payment_fee = 0;
                $order->vat = $tax;
                $order->shipping_cost = $shippingCost;
                $order->grand_total = $totalPrice;
                $order->order_date = now();
                $order->order_date = now();
                $order->shipping_details = json_encode(Session::get('shipping'));
                $order->billing_details = json_encode(Session::get('billing'));
                $order->payment_method = "Stripe";
                $order->payment_status = $payment->status == "succeeded" ? 1 : 0;
                $order->save();
                foreach ($products as $key => $product) {
                    $totalPrice = 0;
                    $totalQuantity = 0;
                    $totalPrice += $product['price'] * $product['quantity'];
                    $totalQuantity +=  $product['quantity'];

                    $order_id = $order->id;
                    $product_id = $key;

                    if (count($product['option']) > 0) {
                        $varints = [];
                        $optionsDetails = [];
                        foreach ($product['option'] as $option) {

                            $varints[] = [
                                "id" => $option['variant_id'],
                                "name" => $option['variant_name']
                            ];
                            $optionsDetails[] = [
                                "id" => $option['id'],
                                "name" => $option['name'],
                            ];
                        }
                        $orderDetails = new OrderDetail();
                        $orderDetails->order_id = $order->id;
                        $orderDetails->product_id = $product_id;
                        $orderDetails->quantity = $product['quantity'];
                        $orderDetails->unit_price = $product['price'];
                        $orderDetails->variant_id = json_encode($varints);
                        $orderDetails->variant_option_id = json_encode($optionsDetails);
                        $orderDetails->save();
                    } else {
                        $orderDetails = new OrderDetail();
                        $orderDetails->order_id = $order->id;
                        $orderDetails->product_id = $product_id;
                        $orderDetails->quantity = $product['quantity'];
                        $orderDetails->unit_price = $product['price'];
                        $orderDetails->variant_id = null;
                        $orderDetails->variant_option_id = null;
                        $orderDetails->save();
                    }
                }


                alert()->success(trans('Proudct purchase successfully'));

                Mail::to(Session::get('shipping')['ship_email'])->send(new ProductPurchaseMail($productOrderTransaction, $order, $orderDetails));
                Session::forget('shipping');
                Session::forget('billing');
                Session::forget('cart');
                Session::forget('tax');
                Session::forget('shippingCost');


                return redirect()->route('card.preview', $business_card_details->card_url);
            } catch (\Throwable $th) {

                dd($th->getMessage());
            }
        } else {
            alert()->error(trans('Something wrong.'));
            return redirect()->route('card.preview', $business_card_details->card_url);
        }
    }
}
