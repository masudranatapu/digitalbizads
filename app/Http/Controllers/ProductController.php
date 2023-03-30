<?php

namespace App\Http\Controllers;

use App\BusinessCard;
use App\Currency;
use App\Medias;
use App\ProductCategory;
use App\Setting;
use App\StoreProduct;
use App\VariantOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function storeProductsList($card)
    {
        $business_cards = BusinessCard::with('hasProduct')->where('card_id', $card)->first();



        $iso_code = json_decode($business_cards->description, true);
        $currency = Currency::where('iso_code', $iso_code['currency'])->first();

        $settings = Setting::where('status', 1)->first();




        return view('user.cards.products', compact('business_cards', 'settings', 'currency'));
    }

    public function addProducts($id)
    {

        $business_card = BusinessCard::with('hasProduct')->where('card_id', $id)->first();
        $iso_code = json_decode($business_card->description, true);
        $currency = Currency::where('iso_code', $iso_code['currency'])->first();


        if ($business_card == null) {
            return view('errors.404');
        } else {
            $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
            $plan_details = json_decode($plan->plan_details);
            $media = Medias::where('user_id', Auth::user()->user_id)->orderBy('id', 'desc')->get();
            $settings = Setting::where('status', 1)->first();
            $productCategories = ProductCategory::orderBy('category_name', 'asc')
                ->where('user_id', Auth::id())->get();

            return view('user.cards.product_create', compact('plan_details',  'media', 'settings', 'productCategories', 'id', 'currency'));
        }
    }
    public function storeProducts(Request $request, $id)
    {
        $request->validate([
            'badge' => 'required',
            'product_image' => 'required',
            'product_name' => 'required',
            'product_subtitle' => 'required',
            'regular_price' => 'required',
            'sales_price' => 'required|lte:regular_price',
            'stock' => 'required',
            'product_type' => 'required',
            'category' => 'required',
            'status' => 'required',
        ]);

        $business_card = BusinessCard::with('hasProduct')->where('card_id', $id)->first();

        if ($business_card == null) {
            return view('errors.404');
        } else {
            $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
            $plan_details = json_decode($plan->plan_details);

            if (isset($request->badge) && isset($request->product_image) && isset($request->product_name) && isset($request->product_subtitle) && isset($request->regular_price) && isset($request->sales_price) && isset($request->stock)) {
                if (count($business_card->hasProduct) <= $plan_details->no_of_services) {


                    $product = new StoreProduct();
                    $product->card_id = $id;
                    $product->product_id = uniqid();
                    $product->badge = $request->badge;
                    $product->product_image = $request->product_image;
                    $product->product_name = $request->product_name;
                    $product->product_subtitle = $request->product_subtitle;
                    $product->regular_price = $request->regular_price;
                    $product->sales_price = $request->sales_price;
                    $product->product_stock = $request->stock;
                    $product->category_id = $request->category;
                    $product->is_variant = $request->product_type;
                    $product->status = $request->status;
                    $product->save();


                    $activeCards = BusinessCard::where('user_id', Auth::user()->user_id)->where('card_status', 'activated')->count();

                    if ($activeCards <= $plan_details->no_of_vcards) {
                        BusinessCard::where('user_id', Auth::user()->id)->where('card_id', $id)->update([
                            'card_status' => 'activated',
                        ]);
                        alert()->success(trans('Products save successfully.'));
                        return redirect()->route('user.products.list', ['id' => $business_card->card_id]);
                    }
                    alert()->success(trans('Products save successfully.'));
                    return redirect()->route('user.products.list', ['id' => $business_card->card_id]);
                } else {
                    alert()->error(trans('You have reached plan limit.'));
                    return redirect()->route('user.products.list', ['id' => $business_card->card_id]);
                }
            } else {
                $activeCards = BusinessCard::where('user_id', Auth::user()->id)->where('card_status', 'activated')->count();

                $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
                $plan_details = json_decode($plan->plan_details);

                if ($activeCards <= $plan_details->no_of_vcards) {
                    BusinessCard::where('user_id', Auth::user()->id)->where('card_id', $id)->update([
                        'card_status' => 'activated',
                    ]);
                    alert()->success(trans('Products save successfully'));
                    return redirect()->route('user.products.list', ['id' => $business_card->card_id]);
                }
                alert()->error(trans('You have reached plan limit.'));
                return redirect()->route('user.products.list', ['id' => $business_card->card_id]);
            }
        }
    }
    public function editProducts($id)
    {

        $products = StoreProduct::where('product_id', $id)->first();
        $business_card = BusinessCard::with('hasProduct')->where('card_id', $products->card_id)->first();
        $iso_code = json_decode($business_card->description, true);
        $currency = Currency::where('iso_code', $iso_code['currency'])->first();
        $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
        $plan_details = json_decode($plan->plan_details);
        $media = Medias::where('user_id', Auth::user()->user_id)->orderBy('id', 'desc')->get();
        $settings = Setting::where('status', 1)->first();
        $productCategories = ProductCategory::orderBy('category_name', 'asc')
            ->where('user_id', Auth::id())->get();

        return view('user.cards.product_edit', compact('plan_details', 'products', 'media', 'settings', 'productCategories', 'currency'));
    }


    public function updateProducts(Request $request, $id)
    {
        $request->validate([
            'badge' => 'required',
            'product_image' => 'required',
            'product_name' => 'required',
            'product_subtitle' => 'required',
            'regular_price' => 'required',
            'sales_price' => 'required|lte:regular_price',
            'stock' => 'required',
            'product_type' => 'required',
            'category' => 'required',
            'status' => 'required',
        ]);

        $product = StoreProduct::where('product_id', $id)->first();


        $business_card = BusinessCard::where('card_id', $product->card_id)->first();


        $plan = DB::table('users')->where('user_id', Auth::user()->user_id)->where('status', 1)->first();
        $plan_details = json_decode($plan->plan_details);
        $product->card_id = $business_card->card_id;
        $product->badge = $request->badge;
        $product->product_image = $request->product_image;
        $product->product_name = $request->product_name;
        $product->product_subtitle = $request->product_subtitle;
        $product->regular_price = $request->regular_price;
        $product->sales_price = $request->sales_price;
        $product->product_stock = $request->stock;
        $product->category_id = $request->category;
        $product->is_variant = $request->product_type;
        $product->status = $request->status;

        $product->save();


        $activeCards = BusinessCard::where('user_id', Auth::user()->id)->where('card_status', 'activated')->count();

        if ($activeCards <= $plan_details->no_of_vcards) {
            BusinessCard::where('user_id', Auth::user()->id)->where('card_id', $product->card_id)->update([
                'card_status' => 'activated',
            ]);
            alert()->success(trans('Products save successfully.'));
            return redirect()->route('user.products.list', ['id' => $business_card->card_id]);
        } else {
            alert()->error(trans('You have reached plan limit.'));
            return redirect()->route('user.products.list', ['id' => $business_card->card_id]);
        }
        alert()->success(trans('Products save successfully.'));
        return redirect()->route('user.products.list', ['id' => $business_card->card_id]);
    }

    public function deleteProducts($id)
    {
        $storeProduct = StoreProduct::where('product_id', $id)->first();
        $storeProduct->delete();
        $business_card = BusinessCard::where('card_id', $storeProduct->card_id)->first();
        alert()->success(trans('Products delete successfully.'));
        return redirect()->route('user.products.list', ['id' => $business_card->card_id]);
    }
}
