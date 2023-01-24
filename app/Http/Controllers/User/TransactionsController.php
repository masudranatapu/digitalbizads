<?php

namespace App\Http\Controllers\User;

use App\Plan;
use App\User;
use App\Setting;
use App\Currency;
use Carbon\Carbon;
use App\Transaction;
use App\BusinessCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TransactionsController extends Controller
{
    public function indexTransactions()
    {
        $active_plan = Plan::where('plan_id', Auth::user()->plan_id)->first();
        $plan = User::where('user_id', Auth::user()->user_id)->first();

        if($active_plan != null) {
            $transactions = Transaction::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
            $settings = Setting::where('status', 1)->first();
            $currencies = Currency::get();

            return view('user.transactions.index', compact('transactions', 'settings', 'currencies'));
        } else {
            return redirect()->route('user.plans');
        }
    }

    public function viewInvoice($id) {
        $transaction = Transaction::where('gobiz_transaction_id', $id)->first();
        $settings = Setting::where('status', 1)->first();
        $config = DB::table('config')->get();
        $currencies = Currency::get();
        $transaction['billing_details'] = json_decode($transaction['invoice_details'], true);
        return view('user.transactions.view-invoice', compact('transaction', 'settings', 'config', 'currencies'));
    }

    public function billing($id) {
        $user = User::where('user_id', Auth::user()->user_id)->first();
        $settings = Setting::first();

        return view('user.billing.index', compact('user', 'settings'));
    }

    public function updateBilling(Request $request) 
    {
        $id = $request->plan_id;
        
        $selected_plan = Plan::where('plan_id', $id)->where('status', 1)->first();
        $config = DB::table('config')->get();

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
        $invoice_details['to_billing_name'] = $request->billing_name;
        $invoice_details['to_billing_address'] = $request->billing_address;
        $invoice_details['to_billing_city'] = $request->billing_city;
        $invoice_details['to_billing_state'] = $request->billing_state;
        $invoice_details['to_billing_zipcode'] = $request->billing_zipcode;
        $invoice_details['to_billing_country'] = $request->billing_country;
        $invoice_details['to_billing_phone'] = $request->billing_phone;
        $invoice_details['to_billing_email'] = $request->billing_email;
        $invoice_details['to_vat_number'] = $request->vat_number;
        $invoice_details['tax_name'] = $config[24]->config_value;
        $invoice_details['tax_type'] = $config[14]->config_value;
        $invoice_details['tax_value'] = $config[25]->config_value;
        $invoice_details['invoice_amount'] = 0;
        $invoice_details['subtotal'] = 0;
        $invoice_details['tax_amount'] = 0;

        $transaction = new Transaction();
        $transaction->gobiz_transaction_id = uniqid();
        $transaction->transaction_date = now();
        $transaction->transaction_id = uniqid();
        $transaction->user_id = Auth::user()->id;
        $transaction->plan_id = $selected_plan->plan_id;
        $transaction->desciption = $selected_plan->plan_name . " Plan";
        $transaction->payment_gateway_name = "FREE";
        $transaction->transaction_amount = $selected_plan->plan_price;
        $transaction->transaction_currency = $config[1]->config_value;
        $transaction->invoice_details = json_encode($invoice_details);
        $transaction->payment_status = "SUCCESS";
        $transaction->save();

        $plan_validity = Carbon::now();
        $plan_validity->addDays($selected_plan->validity);
        User::where('user_id', Auth::user()->user_id)->update([
            'plan_id' => $id,
            'term' => "9999",
            'plan_validity' => $plan_validity,
            'plan_activation_date' => now(),
            'plan_details' => $selected_plan,
        ]);
        // Making all cards inactive, For Plan change
        BusinessCard::where('user_id', Auth::user()->user_id)->update([
            'card_status' => 'inactive',
        ]);
        alert()->success(trans("FREE Plan activated!"));
        return redirect()->route('user.plans');
    }
}
