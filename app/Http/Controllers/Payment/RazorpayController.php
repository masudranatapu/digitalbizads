<?php

namespace App\Http\Controllers\Payment;

use App\Plan;
use App\User;
use App\Setting;
use App\Transaction;
use App\BusinessCard;
use Razorpay\Api\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RazorpayController extends Controller
{

    // RazorPay
    public function prepareRazorpay(Request $request, $planId)
    {
        if(Auth::user()) {
        $settings = Setting::where('status', 1)->first();
        $plan_details = Plan::where('plan_id', $planId)->where('status', 1)->first();
        $userData = User::where('id', Auth::user()->id)->first();

        $config = DB::table('config')->get();
        if ($plan_details == null) {
            return view('errors.404');
        } else {
            $gobiz_transaction_id = uniqid();

            $RAZOR_KEY = $config[6]->config_value;
            $RAZOR_SECRET = $config[7]->config_value;
            $api = new Api($RAZOR_KEY, $RAZOR_SECRET);
            $amountToBePaid = ((int)($plan_details->plan_price) * (int)($config[25]->config_value) / 100) + (int)($plan_details->plan_price);
            $amountToBePaidPaise = $amountToBePaid * 100;
            try {
                $order = $api->order->create(array('receipt' => $gobiz_transaction_id, 'amount' => (int) $amountToBePaidPaise, 'currency' => $config[1]->config_value)); // Creates order
            } catch (\Exception $e) {
                $order = [];
                alert()->error(trans("Payment method not supported!"));
                return redirect()->route('user.plans');
            }

            $invoice_details = [];

            $invoice_details['from_billing_name'] = $config[16]->config_value;
            $invoice_details['from_billing_address'] = $config[19]->config_value;
            $invoice_details['from_billing_city'] = $config[20]->config_value;
            $invoice_details['from_billing_state'] = $config[21]->config_value;
            $invoice_details['from_billing_zipcode'] = $config[22]->config_value;
            $invoice_details['from_billing_country'] = $config[23]->config_value;
            $invoice_details['from_vat_number'] = $config[26]->config_value;
            $invoice_details['from_billing_phone'] = $config[18]->config_value;
            $invoice_details['from_billing_email'] = $config[17]->config_value;
            $invoice_details['to_billing_name'] = $userData->billing_name;
            $invoice_details['to_billing_address'] = $userData->billing_address;
            $invoice_details['to_billing_city'] = $userData->billing_city;
            $invoice_details['to_billing_state'] = $userData->billing_state;
            $invoice_details['to_billing_zipcode'] = $userData->billing_zipcode;
            $invoice_details['to_billing_country'] = $userData->billing_country;
            $invoice_details['to_billing_phone'] = $userData->billing_phone;
            $invoice_details['to_billing_email'] = $userData->billing_email;
            $invoice_details['to_vat_number'] = $userData->vat_number;
            $invoice_details['tax_name'] = $config[24]->config_value;
            $invoice_details['tax_type'] = $config[14]->config_value;
            $invoice_details['tax_value'] = $config[25]->config_value;
            $invoice_details['invoice_amount'] = $amountToBePaid;
            $invoice_details['subtotal'] = $plan_details->plan_price;
            $invoice_details['tax_amount'] = (int)($plan_details->plan_price) * (int)($config[25]->config_value) / 100;

            // If order is created from RazorPay
            if (isset($order)) {
                $transaction = new Transaction();
                $transaction->gobiz_transaction_id = $gobiz_transaction_id;
                $transaction->transaction_date = now();
                $transaction->transaction_id = $order->id;
                $transaction->user_id = Auth::user()->id;
                $transaction->plan_id = $plan_details->plan_id;
                $transaction->desciption = $plan_details->plan_name . " Plan";
                $transaction->payment_gateway_name = "Razorpay";
                $transaction->transaction_amount = $amountToBePaid;
                $transaction->transaction_currency = $config[1]->config_value;
                $transaction->invoice_details = json_encode($invoice_details);
                $transaction->payment_status = "PENDING";
                $transaction->save();
                return view('user.checkout.pay-with-razorpay', compact('settings', 'plan_details', 'gobiz_transaction_id', 'order', 'config'));
            }
        }
        } else {
            return redirect()->route('login');
        }
    }

    public function razorpayPaymentStatus(Request $request, $oid, $paymentId)
    {
        if ($oid == "" || $paymentId == "") {
            return view('errors.404');
        } else {
            $config = DB::table('config')->get();

            $RAZOR_KEY = $config[6]->config_value;
            $RAZOR_SECRET = $config[7]->config_value;
            $api = new Api($RAZOR_KEY, $RAZOR_SECRET);

            try {
                $payment = $api->payment->fetch($paymentId);
            } catch (\Exception $e) {
                $payment = new \stdClass();
                $payment->status = "error";
            }

            if ($payment->status == "authorized" || $payment->status == "captured") {
                $orderId = $payment->order_id;

                $transaction_details = Transaction::where('transaction_id', $orderId)->where('status', 1)->first();
                $user_details = User::find(Auth::user()->id);

                $plan_data = Plan::where('plan_id', $transaction_details->plan_id)->first();
                $term_days = $plan_data->validity;


                if ($user_details->plan_validity == "") {


                    $plan_validity = Carbon::now();
                    $plan_validity->addDays($term_days);

                    $invoice_count = Transaction::where("invoice_prefix", $config[15]->config_value)->count();
                    $invoice_number = $invoice_count + 1;

                    Transaction::where('transaction_id', $orderId)->update([
                        'transaction_id' => $paymentId,
                        'invoice_prefix' => $config[15]->config_value,
                        'invoice_number' => $invoice_number,
                        'payment_status' => 'SUCCESS',
                    ]);

                    User::where('user_id', Auth::user()->user_id)->update([
                        'plan_id' => $transaction_details->plan_id,
                        'term' => $term_days,
                        'plan_validity' => $plan_validity,
                        'plan_activation_date' => now(),
                        'plan_details' => $plan_data
                    ]);

                    $encode = json_decode($transaction_details['invoice_details'], true);
                    $details = [
                        'from_billing_name' => $encode['from_billing_name'],
                        'from_billing_email' => $encode['from_billing_email'],
                        'from_billing_address' => $encode['from_billing_address'],
                        'from_billing_city' => $encode['from_billing_city'],
                        'from_billing_state' => $encode['from_billing_state'],
                        'from_billing_country' => $encode['from_billing_country'],
                        'from_billing_zipcode' => $encode['from_billing_zipcode'],
                        'gobiz_transaction_id' => $transaction_details->gobiz_transaction_id,
                        'to_billing_name' => $encode['to_billing_name'],
                        'invoice_currency' => $transaction_details->transaction_currency,
                        'subtotal' => $encode['subtotal'],
			            'tax_amount' => $encode['tax_amount'],
                        'invoice_amount' => $encode['invoice_amount'],
                        'invoice_id' => $config[15]->config_value . $invoice_number,
                        'invoice_date' => $transaction_details->created_at,
                        'description' => $transaction_details->desciption,
                        'email_heading' => $config[27]->config_value,
                        'email_footer' => $config[28]->config_value,
                    ];

                    try {
                        Mail::to($encode['to_billing_email'])->send(new \App\Mail\SendEmailInvoice($details));
                    } catch (\Exception $e) {

                    }

                    alert()->success(trans('Plan activation success!'));
                    return redirect()->route('user.plans');
                } else {

                    $message = "";
                    if ($user_details->plan_id == $transaction_details->plan_id) {


                        // Check if plan validity is expired or not.
                        $plan_validity = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $user_details->plan_validity);
                        $current_date = Carbon::now();
                        $remaining_days = $current_date->diffInDays($plan_validity, false);

                        if ($remaining_days > 0) {
                            $plan_validity = Carbon::parse($user_details->plan_validity);
                            $plan_validity->addDays($term_days);
                            $message = "Plan renewed successfully!";
                        } else {
                            $plan_validity = Carbon::now();
                            $plan_validity->addDays($term_days);
                            $message = "Plan renewed successfully!";
                        }

			// Making all cards inactive, For Plan change
                        BusinessCard::where('user_id', Auth::user()->user_id)->update([
                            'card_status' => 'inactive',
                        ]);
                    } else {

                        // Making all cards inactive, For Plan change
                        BusinessCard::where('user_id', Auth::user()->user_id)->update([
                            'card_status' => 'inactive',
                        ]);

                        $plan_validity = Carbon::now();
                        $plan_validity->addDays($term_days);
                        $message = "Plan activated successfully!";
                    }



                    $invoice_count = Transaction::where("invoice_prefix", $config[15]->config_value)->count();
                    $invoice_number = $invoice_count + 1;

                    Transaction::where('transaction_id', $orderId)->update([
                        'transaction_id' => $paymentId,
                        'invoice_prefix' => $config[15]->config_value,
                        'invoice_number' => $invoice_number,
                        'payment_status' => 'SUCCESS',
                    ]);

                    User::where('user_id', Auth::user()->user_id)->update([
                        'plan_id' => $transaction_details->plan_id,
                        'term' => $term_days,
                        'plan_validity' => $plan_validity,
                        'plan_activation_date' => now(),
                        'plan_details' => $plan_data
                    ]);

                    $encode = json_decode($transaction_details['invoice_details'], true);
                    $details = [
                        'from_billing_name' => $encode['from_billing_name'],
                        'from_billing_email' => $encode['from_billing_email'],
                        'from_billing_address' => $encode['from_billing_address'],
                        'from_billing_city' => $encode['from_billing_city'],
                        'from_billing_state' => $encode['from_billing_state'],
                        'from_billing_country' => $encode['from_billing_country'],
                        'from_billing_zipcode' => $encode['from_billing_zipcode'],
                        'gobiz_transaction_id' => $transaction_details->gobiz_transaction_id,
                        'to_billing_name' => $encode['to_billing_name'],
                        'invoice_currency' => $transaction_details->transaction_currency,
                        'subtotal' => $encode['subtotal'],
			            'tax_amount' => $encode['tax_amount'],
                        'invoice_amount' => $encode['invoice_amount'],
                        'invoice_id' => $config[15]->config_value . $invoice_number,
                        'invoice_date' => $transaction_details->created_at,
                        'description' => $transaction_details->desciption,
                        'email_heading' => $config[27]->config_value,
                        'email_footer' => $config[28]->config_value,
                    ];

                    try {
                        Mail::to($encode['to_billing_email'])->send(new \App\Mail\SendEmailInvoice($details));
                    } catch (\Exception $e) {

                    }

                    alert()->success($message);
                    return redirect()->route('user.plans');
                }
            } else {

                Transaction::where('transaction_id', $oid)->update([
                    'transaction_id' => $paymentId,
                    'payment_status' => 'FAILED',
                ]);

                alert()->error(trans("Something went wrong!"));
                return redirect()->route('user.plans');
            }
        }
    }
}
