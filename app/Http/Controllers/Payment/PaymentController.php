<?php

namespace App\Http\Controllers\Payment;

use App\User;
use Redirect;
use App\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function preparePaymentGateway(Request $request, $planId)
    {
        $payment_mode = Gateway::where('payment_gateway_id', $request->payment_gateway_id)->first();

        if ($payment_mode == null) {
            alert()->error(trans('Please choose valid payment method!'));
            return redirect()->back();
        } else {
            $validator = Validator::make($request->all(), [
                'billing_name' => 'required',
                'billing_email' => 'required',
                'billing_phone' => 'required',
                'billing_address' => 'required',
                'billing_city' => 'required',
                'billing_state' => 'required',
                'billing_zipcode' => 'required',
                'billing_country' => 'required',
                'type' => 'required'
            ]);
    
            if ($validator->fails()) {
                return back()->with('errors', $validator->messages()->all()[0])->withInput();
            }
    
            User::where('user_id', Auth::user()->user_id)->update([
                'billing_name' => $request->billing_name,
                'billing_email' => $request->billing_email,
                'billing_phone' => $request->billing_phone,
                'billing_address' => $request->billing_address,
                'billing_city' => $request->billing_city,
                'billing_state' => $request->billing_state,
                'billing_zipcode' => $request->billing_zipcode,
                'billing_country' => $request->billing_country,
                'type' => $request->type,
                'vat_number' => $request->vat_number
            ]);
            
            if ($payment_mode->payment_gateway_id == "60964401751ab") {
                return redirect()->route('paywithpaypal', $planId);
            } else if ($payment_mode->payment_gateway_id == "60964410731d9") {
                return redirect()->route('paywithrazorpay', $planId);
            } else if ($payment_mode->payment_gateway_id == "60964410732t9") {
                return redirect()->route('paywithstripe', $planId);
            } else if ($payment_mode->payment_gateway_id == "659644107y2g5") {
                return redirect()->route('paywithoffline', $planId);
            } else {
                alert()->error(trans('Something went wrong!'));
                return redirect()->back();
            }
        }
    }
}
