<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Setting;
use App\Variants;
use Illuminate\Http\Request;

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
        return view('user.variants.options', compact('settings', 'product_id', 'variant'));
    }
    public function optionStore($product_id, $variant)
    {
        return redirect()->back();
    }
    public function optionUpdate(Request $request, $option)
    {
        return redirect()->back();
    }
    public function optionDelete($option)
    {
        return redirect()->back();
    }
}
