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


        if ($product->product_stock < $qty) {
            $data['status']  = false;
            $data['message']  = 'Out Of Stock';
            return Response::json($data);
        }

        if (session()->has('cart')) {

            $existingProducts = session()->get('cart');

            foreach ($existingProducts as $key => $existingProduct) {
                $cartProduct = StoreProduct::findOrFail($key);
                if ($cartProduct->card_id != $product->card_id) {
                    $data['status']  = false;
                    $data['message']  = 'You can not add to cart products from different store.Please remove your products from the cart.';
                    return Response::json($data);
                }
            }
        }


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
        $product = StoreProduct::findOrFail($request->id);

        if ($product->product_stock < $request->quantity) {
            $data['status']  = false;
            $data['message']  = 'Out Of Stock';
            return Response::json($data);
        }

        if ($request->id && $request->quantity) {

            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);
            Session::flash('success', 'Update cart successfully');
            $data['status']  = true;
            $data['message']  = 'Update cart successfully';
            return Response::json($data);
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
}
