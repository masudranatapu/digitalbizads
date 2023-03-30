<?php

namespace App\Http\Controllers\User;

use App\Coupon;
use App\Setting;
use Carbon\Carbon;
use App\BusinessCard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{
    //
    public function index()
    {
        $user_id =  Auth::user()->id;
        $rows = Coupon::where('user_id',$user_id)->orderBy('name', 'asc')->latest()->get();

        $settings = Setting::where('status', 1)->first();
        $store = BusinessCard::where('user_id',$user_id)->where('card_type','store')->first();

        $currency_symbol = null;
        if($store){
            $store_details = json_decode($store->description);
            $currency_symbol = $store_details->currency ?? null;

        }

        return view('user.coupon.index', compact('rows', 'settings','currency_symbol'));
    }

    public function create()
    {
        $settings = Setting::where('status', 1)->first();
        return view('user.coupon.create', compact('settings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'coupon_code'   => 'required',
            'to_date'       => 'required',
            'from_date'     => 'required',
            'type'          => 'required',
            'amount'        => 'required',
            'status'        => 'required',
        ]);
        $user_id =  Auth::user()->id;
        Coupon::insert([
            'user_id'       => $user_id,
            'name'          => $request->name,
            'coupon_code'   => $request->amount,
            'to_date'       => $request->status,
            'from_date'     => $request->from_date,
            'type'          => $request->type,
            'amount'        => $request->amount,
            'status'        => $request->status,
            'created_at'    => Carbon::now(),
            'created_by'    => $user_id,
        ]);

        alert()->success(trans('Coupon successfully created'));
        return redirect()->route('user.coupon.index');
    }

    public function edit($id)
    {
        $user_id =  Auth::user()->id;
        $settings = Setting::where('status', 1)->first();
        $row = Coupon::where('user_id', $user_id)->where('id', $id)->first();
        return view('user.coupon.edit', compact('row', 'settings'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'          => 'required',
            'coupon_code'   => 'required',
            'to_date'       => 'required',
            'from_date'     => 'required',
            'type'          => 'required',
            'amount'        => 'required',
            'status'        => 'required',
        ]);

        $user_id =  Auth::user()->id;

        Coupon::where('user_id', $user_id)->where('id', $id)->update([
            'name'          => $request->name,
            'coupon_code'   => $request->amount,
            'to_date'       => $request->status,
            'from_date'     => $request->from_date,
            'type'          => $request->type,
            'amount'        => $request->amount,
            'status'        => $request->status,
            'updated_at'    => Carbon::now(),
            'updated_by'    => $user_id,
        ]);

        alert()->success(trans('Coupon successfully updated'));
        return redirect()->route('user.coupon.index');
    }

    public function delete($id)
    {
        $user_id =  Auth::user()->id;
        $shippingarea = Coupon::where('user_id', $user_id)->where('id', $id)->first();
        $shippingarea->delete();

        alert()->success(trans('Coupon successfully delete'));

        return redirect()->back();

    }


}
