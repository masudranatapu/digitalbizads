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
use App\Variants;
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


class CartController extends Controller
{


    public function cartPage($cardUrl)
    {

        $business_card_details = null;

        $cart = session()->get('cart');





        if ($cart) {
            if (array_keys($cart)[0]) {
                $prd_id = array_keys($cart);
                $product = StoreProduct::find($prd_id[0]);
            }
        }

        $business_card_details = BusinessCard::where('card_url', $cardUrl)->first();


        return view('pages.product.cart', compact('cart', 'business_card_details'));
    }


    public function addToCart(Request $request)
    {




        $id = $request->pid;
        $qty = $request->qty;
        $product = StoreProduct::findOrFail($id);
        $cart = session()->get('cart', []);
        $data['status']  = true;
        $data['message'] = 'Add to cart successfully';
        $option = [];
        $variantTotalPrice = 0;


        if (isset($request->options)) {
            $incomingVariant = $request->options;
            for ($i = 0; $i < count($incomingVariant); $i++) {
                $productVariant = VariantOption::find($incomingVariant[$i]);
                $variant = Variants::find($productVariant->variant_id);

                if (isset($productVariant)) {
                    $option[] = [
                        "id" => $productVariant->id,
                        "variant_id" => $productVariant->variant_id,
                        "variant_name" => $variant->name,
                        "name" => $productVariant->name,
                        "price" => $productVariant->price,

                    ];
                    $variantTotalPrice = $variantTotalPrice + $productVariant->price;
                }
            }
        } else {
            if (isset($cart[$id])) {
                if ($cart[$id]['quantity'] == $qty) {
                    $data['message']  = 'Product already added';
                } else {
                    $cart[$id]['quantity'] = $cart[$id]['quantity'] + $qty;
                }
            } else {
                $cart[$id]['quantity'] = 1;
            }
        }

        if ($option) {
            $price = $product->sales_price != $product->regular_price ? ($product->sales_price + $variantTotalPrice) : ($product->regular_price + $variantTotalPrice);
        } else {
            $price = $product->sales_price;
        }

        $cart[$id] = [
            "product"       => $product,
            "product_id"    => $product->id,
            "quantity"      => $request->qty,
            "price"         => $price,
            "option"        => $option,

        ];

        session()->put('cart', $cart);
        $data['total_product']  = count(session()->get('cart'));

        return Response::json($data);
    }


    public function cartUpdate(Request $request)

    {

        if ($request->id && $request->quantity) {

            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);
            Session::flash('success', 'Update cart successfully');
        }
    }

    public function cartRemove(Request $request)

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
        }
        $shippingCost = Session::has('shippingCost') ? Session::get('shippingCost') : 0;
        $tax = Session::has('tax') ? Session::get('tax') : 0;



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
            'amount' => (intval($total) + intval($shippingCost) + intval($tax)) * 100,
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
        $totalTransaction = ProductOrderTransaction::count();
        $shippingCost = Session::has('shippingCost') ? Session::get('shippingCost') : 0;
        $tax = Session::has('tax') ? Session::get('tax') : 0;
        try {
            $stripe = new \Stripe\StripeClient($user->stripe_secret_key);
            $payment = $stripe->paymentIntents->retrieve($paymentId, []);


            $productOrderTransaction = new ProductOrderTransaction();
            $productOrderTransaction->store_id = $card_id;
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

            $order = new Order();
            $order->transaction_id = $productOrderTransaction->id;
            $order->store_id = $card_id;
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
        }

        // Session::forget('shipping');
        // Session::forget('billing');
        // Session::forget('cart');




        alert()->success(trans('Proudct purchase successfully'));
        Session::flash('success', 'Proudct purchase successfully');


        return redirect()->route('card.preview', $business_card_details->card_url);
    }
}
