<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Setting;
use App\ShippingCost;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShippingAreaController extends Controller
{
    //
    public function index()
    {
        $user_id =  Auth::user()->id;
        $shippingarea = ShippingCost::where('user_id',$user_id)->orderBy('name', 'asc')->latest()->get();
        $settings = Setting::where('status', 1)->first();
        return view('user.shipping.index', compact('shippingarea', 'settings'));
    }

    public function create()
    {
        $settings = Setting::where('status', 1)->first();
        return view('user.shipping.create', compact('settings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required',
            'status' => 'required',
        ]);
        $user_id =  Auth::user()->id;
        ShippingCost::insert([
            'user_id' => $user_id,
            'name' => $request->name,
            'amount' => $request->amount,
            'status' => $request->status,
            'created_at' => Carbon::now(),
        ]);

        alert()->success(trans('Shipping area successfully created'));
        return redirect()->route('user.shipping_area.index');
    }

    public function edit($id)
    {
        $user_id =  Auth::user()->id;
        $settings = Setting::where('status', 1)->first();
        $shippingarea = ShippingCost::where('user_id', $user_id)->where('id', $id)->first();
        return view('user.shipping.edit', compact('shippingarea', 'settings'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required',
            'status' => 'required',
        ]);

        $user_id =  Auth::user()->id;

        ShippingCost::where('user_id', $user_id)->where('id', $id)->update([
            'user_id' => $user_id,
            'name' => $request->name,
            'amount' => $request->amount,
            'status' => $request->status,
            'updated_at' => Carbon::now(),
        ]);

        alert()->success(trans('Shipping area successfully updated'));
        return redirect()->route('user.shipping_area.index');
    }

    public function delete($id)
    {
        $user_id =  Auth::user()->id;
        $shippingarea = ShippingCost::where('user_id', $user_id)->where('id', $id)->first();
        $shippingarea->delete();

        alert()->success(trans('Shipping area successfully delete'));

        return redirect()->back();

    }

}