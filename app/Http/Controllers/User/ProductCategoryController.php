<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\ProductCategory;
use App\Setting;
use App\StoreProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::where('status', 1)->first();
        $productCategories = ProductCategory::orderBy('category_name', 'asc')
            ->where('user_id', Auth::id())->get();

        return view('user.category.index', compact('settings', 'productCategories'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
        ]);
        $result = ProductCategory::where('category_name', $request->category_name)->where('user_id', Auth::id())->first();

        if (isset($result)) {
            alert()->error(trans('Category Already Exist!'));
            return redirect()->route('user.product.category.index');
        }


        $productCategory = new ProductCategory();
        $productCategory->category_name = $request->category_name;
        $productCategory->user_id = Auth::id();
        $productCategory->status = true;
        $productCategory->created_by = Auth::id();
        $productCategory->updated_by = Auth::id();
        $productCategory->save();
        alert()->success(trans('New Category Created Successfully!'));
        return redirect()->route('user.product.category.index');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCategory $id)
    {
        $request->validate([
            'category_name_edit' => 'required',
        ]);
        $result = ProductCategory::where('category_name', $request->category_name_edit)
            ->where('id', '!=', $id->id)->where('user_id', Auth::id())
            ->first();

        if (isset($result)) {
            alert()->error(trans('Category Already Exist!'));
            return redirect()->route('user.product.category.index');
        }

        $id->category_name = $request->category_name_edit;
        $id->user_id = Auth::id();
        $id->status = true;
        $id->created_by = Auth::id();
        $id->updated_by = Auth::id();
        $id->save();
        alert()->success(trans('Category Update Successfully!'));
        return redirect()->route('user.product.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $id)
    {
        // dd($id);

        $result = StoreProduct::where('category_id', $id->id)->get();
        if (isset($result) && count($result) > 0) {
            alert()->error(trans('This category have some products delete them first'));
            return redirect()->back();
        } else {
            $id->delete();
            alert()->success(trans('Category delete successfully'));
            return redirect()->back();
        }
    }
}
