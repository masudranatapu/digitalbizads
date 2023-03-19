<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Medias;
use App\Setting;
use App\VariantOption;
use App\Variants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VariantController extends Controller
{
    public function index($product_id)
    {
        $settings = Setting::first();
        $productVariants = Variants::where('product_id', $product_id)->get();

        return view('user.variants.index', compact('settings', 'product_id', 'productVariants'));
    }

    public function store(Request $request, $product_id)
    {

        $request->validate([
            'variant_name' => 'required'
        ]);

        $variant = new Variants();
        $variant->name = $request->variant_name;
        $variant->product_id = $request->product_id;
        $variant->save();
        alert()->success(trans('Product variant save successfully.'));
        return redirect()->back();
    }

    public function update(Request $request, Variants $variant)
    {
        $variant->name = $request->variant_name;
        $variant->save();
        alert()->success(trans('Product variant update successfully.'));
        return redirect()->back();
    }

    public function delete(Variants $variant)
    {
        $variant->delete();
        alert()->success(trans('Product variant delete successfully.'));
        return redirect()->back();
    }


    public function optionIndex($product_id, $variant)
    {
        $settings = Setting::first();
        $variantOptions = VariantOption::where('product_id', $product_id)->where('variant_id', $variant)->get();

        return view('user.variants.options', compact('settings', 'product_id', 'variant', 'variantOptions'));
    }
    public function optioncreate($product_id, $variant)
    {
        $settings = Setting::first();
        $media = Medias::where('user_id', Auth::user()->user_id)->orderBy('id', 'desc')->get();

        return view('user.variants.cerate-option', compact('settings', 'product_id', 'variant', 'media'));
    }

    public function optionStore(Request $request, $product_id, $variant)
    {
        $request->validate([
            "option_name" => 'required',
            "option_stock" => 'required|integer',
            "option_price" => 'required|integer',
            "option_image" => 'required',
        ]);

        $variantOption = new VariantOption();
        $variantOption->product_id = $product_id;
        $variantOption->variant_id = $variant;
        $variantOption->name = $request->option_name;
        $variantOption->stock = $request->option_stock;
        $variantOption->price = $request->option_price;
        $variantOption->photo = $request->option_image;
        $variantOption->save();
        alert()->success(trans('Product variant option save successfully.'));
        return redirect()->route('user.product.variants.option', ['product_id' => $product_id, 'variant' => $variant]);
    }


    public function optionedit(VariantOption $option)
    {
        $settings = Setting::first();
        $media = Medias::where('user_id', Auth::user()->user_id)->orderBy('id', 'desc')->get();
        return view('user.variants.edit-option', compact('settings', 'option', 'media'));
    }



    public function optionUpdate(Request $request, VariantOption $option)
    {
        $request->validate([
            "option_name" => 'required',
            "option_stock" => 'required|integer',
            "option_price" => 'required|integer',
            "option_image" => 'required',
        ]);
        $option->name = $request->option_name;
        $option->stock = $request->option_stock;
        $option->price = $request->option_price;
        $option->photo = $request->option_image;
        $option->save();
        alert()->success(trans('Product variant option update successfully.'));
        return redirect()->route('user.product.variants.option', ['product_id' => $option->product_id, 'variant' => $option->variant_id]);
    }
    public function optionDelete(VariantOption $option)
    {
        $option->delete();
        alert()->success(trans('Product variant option delete successfully.'));
        return redirect()->back();
    }
}
