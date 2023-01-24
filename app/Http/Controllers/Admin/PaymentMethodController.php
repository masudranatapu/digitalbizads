<?php

namespace App\Http\Controllers\Admin;

use App\Gateway;
use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PaymentMethodController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // All Payment Methods
    public function paymentMethods()
    {
        $payment_methods = Gateway::orderBy('created_at', 'desc')->get();
        $settings = Setting::where('status', 1)->first();
        return view('admin.payment-methods.payment-methods', compact('payment_methods', 'settings'));
    }

    // Add Payment Method
    public function addPaymentMethod()
    {
        $settings = Setting::where('status', 1)->first();
        return view('admin.payment-methods.add-payment-method', compact('settings'));
    }

    // Save Payment Method
    public function savePaymentMethod(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'payment_gateway_logo' => 'required|payment_gateway_logo|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'payment_gateway_name' => 'required',
            'client_id' => 'required',
            'secret_key' => 'required'
        ]);

        $payment_gateway_logo = '/backend/img/payment-method/' . 'IMG-' . time() . '.' . $request->payment_gateway_logo->extension();

        $request->payment_gateway_logo->move(public_path('backend/img/payment-method'), $payment_gateway_logo);

        $paymentMethod = new Gateway;
        $paymentMethod->payment_gateway_id = uniqid();
        $paymentMethod->payment_gateway_logo = $payment_gateway_logo;
        $paymentMethod->payment_gateway_name = $request->payment_gateway_name;
        $paymentMethod->client_id = $request->client_id;
        $paymentMethod->secret_key = $request->secret_key;
        $paymentMethod->save();
        alert()->success(trans('New Payment Method Created Successfully!'));
        return redirect()->route('admin.add.payment.method');
    }

    // Edit Payment Method
    public function editPaymentMethod(Request $request, $id)
    {
        $gateway_id = $request->id;
        if ($gateway_id == null) {
            return view('errors.404');
        } else {
            $gateway_details = Gateway::where('payment_gateway_id', $gateway_id)->first();
            $settings = Setting::where('status', 1)->first();
            return view('admin.payment-methods.edit-payment-gateway', compact('gateway_details', 'settings'));
        }
    }

    // Update Payment Method
    public function updatePaymentMethod(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'payment_gateway_id' => 'required',
            'payment_gateway_name' => 'required',
            'client_id' => 'required',
            'secret_key' => 'required'
        ]);

        if ($request->is_status == null) {
            $is_status = 'disabled';
        } else {
            $is_status = 'enabled';
        }

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        Gateway::where('payment_gateway_id', $request->payment_gateway_id)->update([
            'payment_gateway_name' => $request->payment_gateway_name,
            'client_id' => $request->client_id, 'secret_key' => $request->secret_key, 'is_status' => $is_status
        ]);
        alert()->success(trans('Payment Gateway Details Updated Successfully!'));
        return redirect()->route('admin.edit.payment.method', $request->payment_gateway_id);
    }

    // Delete Payment Method
    public function deletePaymentMethod(Request $request)
    {
        $payment_gateway_details = Gateway::where('payment_gateway_id', $request->query('id'))->first();
        if ($payment_gateway_details->status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }
        Gateway::where('payment_gateway_id', $request->query('id'))->update(['status' => $status]);
        alert()->success(trans('Payment Method Status Updated Successfully!'));
        return redirect()->route('admin.payment.methods');
    }
}
