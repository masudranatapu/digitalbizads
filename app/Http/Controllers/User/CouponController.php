<?php

namespace App\Http\Controllers\User;

use App\Coupon;
use App\Setting;
use Carbon\Carbon;
use App\BusinessCard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CouponController extends Controller
{
    //
    public function index()
    {
        $user_id =  Auth::user()->id;
        $rows = Coupon::where('user_id', $user_id)->orderBy('name', 'asc')->latest()->get();

        $settings = Setting::where('status', 1)->first();
        $store = BusinessCard::where('user_id', $user_id)->where('card_type', 'store')->first();

        $currency_symbol = null;
        if ($store) {
            $store_details = json_decode($store->description);
            $currency_symbol = $store_details->currency ?? null;
        }

        return view('user.coupon.index', compact('rows', 'settings', 'currency_symbol'));
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
            'coupon_code'   => $request->coupon_code,
            'to_date'       => date('Y-m-d', strtotime($request->to_date)),
            'from_date'     => date('Y-m-d', strtotime($request->from_date)),
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
            'coupon_code'   => $request->coupon_code,
            'to_date'       => date('Y-m-d', strtotime($request->to_date)),
            'from_date'     => date('Y-m-d', strtotime($request->from_date)),
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
        $coupon = Coupon::where('user_id', $user_id)->where('id', $id)->first();
        $coupon->delete();

        alert()->success(trans('Coupon successfully delete'));

        return redirect()->back();
    }

    public function checkCoupon(Request $request, $cardUrl)
    {
        $business_card_details = BusinessCard::where('card_url', $cardUrl)->first();
        $result = Coupon::where('coupon_code', $request->code)->where('user_id', $business_card_details->user_id)->first();

        if (isset($result)) {
            $date = date('Y-m-d');
            $date = date('Y-m-d', strtotime($date));
            $couponValidDateBegin = date('Y-m-d', strtotime($result->from_date));
            $couponValidDateEnd = date('Y-m-d', strtotime($result->to_date));

            if (($date >= $couponValidDateBegin) && ($date <= $couponValidDateEnd)) {
                if ($result->type == "amount" || $result->type == "percent") {
                    Session::put('coupon', $result);
                    return response()->json(['status' => true, 'message' => 'Coupon Applied']);
                } elseif ($result->type == 2 || $result->type == 3) {
                    if ($result->type == 3) {
                        $totalPrice = $this->getTotal();
                        if ($totalPrice > $result->condition_price) {
                            Session::put('coupon', $result);
                            Session::forget('shiping');
                            return response()->json(['status' => true, 'message' => 'Coupon Applied']);
                        } else {
                            return response()->json(['status' => false, 'message' => 'Please spend minimum ' . getPrice($result->condition_price)]);
                        }
                    } else {
                        Session::put('coupon', $result);
                        Session::forget('shiping');
                        return response()->json(['status' => true, 'message' => 'Coupon Applied']);
                    }
                }
            } else {

                if ($date <= $couponValidDateBegin) {
                    return response()->json(['status' => false, 'message' => 'Invalid Coupon']);
                } elseif ($date >= $couponValidDateEnd) {
                    return response()->json(['status' => false, 'message' => 'Coupon Expired']);
                }

                return response()->json(['status' => false, 'message' => 'Coupon Expired']);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Invalid Coupon']);
        }
    }


    public function removeCoupon($cardUrl)
    {

        $coupon = session()->get('coupon');

        if ($coupon->discount_type == 2 || $coupon->discount_type == 3) {
            $this->getShiping();
        }

        Session::forget('coupon');
        return response()->json(['status' => true, 'message' => 'Coupon removed']);
    }
}
