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
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;



class CheckoutController extends Controller
{
    private $apiContext;

    public function __construct(Request $request)
    {
        $cardUrl = $request->segment(1);
        if (isset($cardUrl)) {

            $business_card_details = BusinessCard::where('card_url', $cardUrl)->first();
            $paypalConf = User::find($business_card_details->user_id);

            $this->apiContext = new ApiContext(new OAuthTokenCredential($paypalConf->paypal_public_key, $paypalConf->paypal_secret_key));

            $this->apiContext->setConfig(array(
                'mode' => "sandbox",
                'http.ConnectionTimeOut' => 30,
                'log.LogEnabled' => true,
                'log.FileName' => storage_path() . '/logs/product_puchase_paypal.log',
                'log.LogLevel' => 'DEBUG',
            ));
        }
    }


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
                $grandTotal = 0;
                foreach ($products as $key => $product) {

                    $totalPrice += $product['price'] * $product['quantity'];
                    $totalQuantity +=  $product['quantity'];
                }
                if (session()->has('tax')) {

                    $grandTotal = $totalPrice + session()->get('tax');
                }
                if (session()->has('shippingCost')) {
                    $grandTotal = $grandTotal + session()->get('shippingCost');
                }

                $order = new Order();
                $order->transaction_id = $productOrderTransaction->id;
                $order->store_id = $business_card_details->card_id;
                $order->order_number = uniqid('order_');
                $order->quantity = $totalQuantity;
                $order->total_price = $totalPrice;
                $order->payment_fee = 0;
                $order->vat = $tax;
                $order->shipping_cost = $shippingCost;
                $order->grand_total = $grandTotal;
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


                return redirect()->route('payment.invoice', ['cardUrl' => $business_card_details->card_url, 'orderid' => $order->order_number]);
            } catch (\Throwable $th) {

                alert()->error(trans('Something wrong.'));
                return redirect()->route('card.preview', $business_card_details->card_url);
            }
        } else {
            alert()->error(trans('Something wrong.'));
            return redirect()->route('card.preview', $business_card_details->card_url);
        }
    }


    public function checkoutPaymentPaypalStore(Request $request, $cardUrl)
    {
        $business_card_details = BusinessCard::where('card_url', $cardUrl)->first();
        $config = DB::table('config')->get();

        $iso_code = json_decode($business_card_details->description, true);
        $currency = Currency::where('iso_code', $iso_code['currency'])->first();
        $totalTransaction = ProductOrderTransaction::count();


        $products = Session::get('cart');
        $totalPrice = 0;
        $totalQuantity = 0;
        $grandTotal = 0;
        foreach ($products as $key => $product) {
            $totalPrice += $product['price'] * $product['quantity'];
            $totalQuantity +=  $product['quantity'];
        }

        if (session()->has('tax')) {

            $grandTotal = $totalPrice + session()->get('tax');
        }
        if (session()->has('shippingCost')) {
            $grandTotal = $grandTotal + session()->get('shippingCost');
        }
        $amountToBePaid = $grandTotal;

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item_1 = new Item();
        $item_1->setName("Product Purchase")
            /** item name **/
            ->setCurrency($currency->iso_code)
            ->setQuantity(1)
            ->setPrice($amountToBePaid);
        /** unit price **/

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency($currency->iso_code)
            ->setTotal($amountToBePaid);
        $redirect_urls = new RedirectUrls();
        /** Specify return URL **/
        $redirect_urls->setReturnUrl(URL::route('payment.success', ['cardUrl' => $business_card_details->card_url]))
            ->setCancelUrl(URL::route('payment.cancel', ['cardUrl' => $business_card_details->card_url]));

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription("Product Purchase");

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        try {
            $payment->create($this->apiContext);

            $productOrderTransaction = new ProductOrderTransaction();
            $productOrderTransaction->store_id = $business_card_details->card_id;
            $productOrderTransaction->transection_id = $payment->getId();
            $productOrderTransaction->transection_date = now();
            $productOrderTransaction->provider = "Paypal";
            $productOrderTransaction->currency = $currency->iso_code;
            $productOrderTransaction->trsnsection_amount = $amountToBePaid;
            $productOrderTransaction->invoice = $totalTransaction + 1;
            $productOrderTransaction->invoice_details = json_encode(Session::get('shipping'));
            $productOrderTransaction->payment_status = "created";
            $productOrderTransaction->status = true;
            $productOrderTransaction->save();

            Session::put('last_transection', $productOrderTransaction->id);
        } catch (Exception $ex) {
            Session::flash('alert', 'Something worng');
            return redirect()->route('card.preview', $cardUrl);
        }




        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        Session::put('paypal_payment_id', $payment->getId());
    }

    public function executePayment(Request $request, $cardUrl)
    {
        $payment_id = request()->paymentId;
        $business_card_details = BusinessCard::where('card_url', $cardUrl)->first();
        $productOrderTransaction = ProductOrderTransaction::where('transection_id', $payment_id)->first();
        $productOrderTransaction->payment_status = "success";
        $productOrderTransaction->save();


        try {

            $products = Session::get('cart');
            $totalPrice = 0;
            $totalQuantity = 0;
            $grandTotal = 0;
            foreach ($products as $key => $product) {
                $totalPrice += $product['price'] * $product['quantity'];
                $totalQuantity +=  $product['quantity'];
            }

            if (session()->has('tax')) {

                $grandTotal = $totalPrice + session()->get('tax');
            }
            if (session()->has('shippingCost')) {
                $grandTotal = $grandTotal + session()->get('shippingCost');
            }
            $tax = Session::has('tax') ? Session::get('tax') : 0;
            $shippingCost = Session::has('shippingCost') ? Session::get('shippingCost') : 0;

            $order = new Order();
            $order->transaction_id = $productOrderTransaction->id;
            $order->store_id = $business_card_details->card_id;
            $order->order_number = uniqid('order_');
            $order->quantity = $totalQuantity;
            $order->total_price = $totalPrice;
            $order->payment_fee = 0;
            $order->vat = $tax;
            $order->shipping_cost = $shippingCost;
            $order->grand_total = $grandTotal;
            $order->order_date = now();
            $order->shipping_details = json_encode(Session::get('shipping'));
            $order->billing_details = json_encode(Session::get('billing'));
            $order->payment_method = "Paypal";
            $order->payment_status = 1;
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
            Session::forget('paypal_payment_id');
            Session::forget('last_transection');


            Session::flash('success', 'Product Purchase Successfull');
            return redirect()->route('payment.invoice', ['cardUrl' => $business_card_details->card_url, 'orderid' => $order->order_number]);
        } catch (Exception $th) {

            Session::flash('alert', 'Something worng');
            return redirect()->route('card.preview', $cardUrl);
        }



        return redirect()->route('card.preview', $cardUrl);
    }
    public function cancelPayment(Request $request, $cardUrl)
    {

        $id = Session::get('last_transection');
        $productOrderTransaction = ProductOrderTransaction::find($id);
        $productOrderTransaction->payment_status = "cancel";
        $productOrderTransaction->save();
        Session::flash('success', 'Payment Cancel');

        return redirect()->route('card.preview', $cardUrl);
    }

    public function paymentInvoice(Request $request, $card_url, $order_id)
    {
        $orders = Order::with('orderDetails')->where('order_number', $order_id)->first();
        $shipping = json_decode($orders->shipping_details, true);
        $shippingArea = ShippingCost::find($shipping['ship_area']);
        $shippingState = State::find($shipping['ship_state']);
        $shipping['shipping_area'] = $shippingArea->name;
        $shipping['shipping_states'] = $shippingState->name;
        $business_card_details = BusinessCard::where('card_url', $card_url)->first();

        return view('pages.invoice', compact('orders', 'shipping', 'business_card_details'));
    }
}
