<?php

namespace App\Http\Controllers\Admin;

use App\Plan;
use App\User;
use App\Gallery;
use App\Payment;
use App\Service;
use App\Setting;
use App\Mail\AccountDeactive;
use Carbon\Carbon;
use App\Transaction;
use App\BusinessCard;
use App\BusinessHour;
use App\StoreProduct;
use App\BusinessField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
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

    // All Users
    public function users()
    {
        $users = User::where('role_id', '2')->orderBy('created_at', 'desc')->get();
        $settings = Setting::where('status', 1)->first();
        $config = DB::table('config')->get();

        return view('admin.users.users', compact('users', 'settings', 'config'));
    }

    // View User
    public function viewUser(Request $request, $id)
    {
        $user_details = User::where('user_id', $id)->first();
        if ($user_details == null) {
            return view('errors.404');
        } else {
            $user_cards = BusinessCard::where('user_id', $user_details->id)->where('card_type', 'vcard')->where('card_status', 'activated')->get();

            $user_stores = BusinessCard::where('user_id', $user_details->id)->where('card_type', 'store')->where('card_status', 'activated')->get();

            $settings = Setting::where('status', 1)->first();
            return view('admin.users.view-user', compact('user_details', 'user_cards', 'user_stores', 'settings'));
        }
    }

    // Edit User
    public function editUser(Request $request, $id)
    {
        $user_details = User::where('user_id', $id)->first();
        $settings = Setting::where('status', 1)->first();
        if ($user_details == null) {
            return view('errors.404');
        } else {
            return view('admin.users.edit-user', compact('user_details', 'settings'));
        }
    }

    // Update User
    public function updateUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'full_name' => 'required',
            'email' => 'required'
        ]);

        if ($request->password == null) {
            User::where('user_id', $request->user_id)->update([
                'name' => $request->full_name,
                'email' => $request->email
            ]);
        } else {
            User::where('user_id', $request->user_id)->update([
                'name' => $request->full_name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
        }
        return redirect()->route('admin.users')->with('success', 'User Updated Successfully!');
    }

    // Change user plan
    public function ChangeUserPlan(Request $request, $id)
    {
        $user_details = User::where('user_id', $id)->first();
        $plans = Plan::where('status', 1)->get();
        $settings = Setting::where('status', 1)->first();
        $config = DB::table('config')->get();
        if ($plans == null) {
            return view('errors.404');
        } else {
            return view('admin.users.change-plan', compact('user_details', 'plans', 'settings', 'config'));
        }
    }

    // Upgrade user plan
    public function UpdateUserPlan(Request $request)
    {

        $config = DB::table('config')->get();

        $user_details = User::where('user_id', $request->user_id)->first();

        $plan_data = Plan::where('plan_id', $request->plan_id)->first();
        $term_days = $plan_data->validity;

        $amountToBePaid = ((int)($plan_data->plan_price) * (int)($config[25]->config_value) / 100) + (int)($plan_data->plan_price);

        if ($user_details->plan_validity == "") {

            $plan_validity = Carbon::now();
            $plan_validity->addDays($term_days);

            $invoice_count = Transaction::where("invoice_prefix", $config[15]->config_value)->count();
            $invoice_number = $invoice_count + 1;

            $gobiz_transaction_id = uniqid();

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
            $invoice_details['to_billing_name'] = $user_details->billing_name;
            $invoice_details['to_billing_address'] = $user_details->billing_address;
            $invoice_details['to_billing_city'] = $user_details->billing_city;
            $invoice_details['to_billing_state'] = $user_details->billing_state;
            $invoice_details['to_billing_zipcode'] = $user_details->billing_zipcode;
            $invoice_details['to_billing_country'] = $user_details->billing_country;
            $invoice_details['to_billing_phone'] = $user_details->billing_phone;
            $invoice_details['to_billing_email'] = $user_details->billing_email;
            $invoice_details['to_vat_number'] = $user_details->vat_number;
            $invoice_details['tax_name'] = $config[24]->config_value;
            $invoice_details['tax_type'] = $config[14]->config_value;
            $invoice_details['tax_value'] = $config[25]->config_value;
            $invoice_details['invoice_amount'] = $amountToBePaid;
            $invoice_details['subtotal'] = $plan_data->plan_price;
            $invoice_details['tax_amount'] = (int)($plan_data->plan_price) * (int)($config[25]->config_value) / 100;

            // If order is created from stripe
            $transaction = new Transaction();
            $transaction->gobiz_transaction_id = $gobiz_transaction_id;
            $transaction->transaction_date = now();
            $transaction->transaction_id = "";
            $transaction->user_id = $user_details->id;
            $transaction->plan_id = $plan_data->plan_id;
            $transaction->desciption = $plan_data->plan_name . " Plan";
            $transaction->payment_gateway_name = "Offline";
            $transaction->transaction_amount = $amountToBePaid;
            $transaction->invoice_prefix = $config[15]->config_value;
            $transaction->invoice_number = $invoice_number;
            $transaction->transaction_currency = $config[1]->config_value;
            $transaction->invoice_details = json_encode($invoice_details);
            $transaction->payment_status = "SUCCESS";
            $transaction->save();

            User::where('id', $user_details->id)->update([
                'plan_id' => $request->plan_id,
                'term' => $term_days,
                'plan_validity' => $plan_validity,
                'plan_activation_date' => now(),
                'plan_details' => $plan_data
            ]);

            $details = [
                'from_billing_name' => $config[16]->config_value,
                'from_billing_email' => $config[17]->config_value,
                'from_billing_address' => $config[19]->config_value,
                'from_billing_city' => $config[20]->config_value,
                'from_billing_state' => $config[21]->config_value,
                'from_billing_country' => $config[23]->config_value,
                'from_billing_zipcode' => $config[22]->config_value,
                'gobiz_transaction_id' => $gobiz_transaction_id,
                'to_billing_name' => $user_details->billing_name,
                'invoice_currency' => $config[1]->config_value,
                'invoice_amount' => $plan_data->plan_price,
                'invoice_id' => $config[15]->config_value . $invoice_number,
                'invoice_date' => Carbon::now(),
                'description' => $plan_data->plan_name . ' plan Upgrade',
                'email_heading' => $config[27]->config_value,
                'email_footer' => $config[28]->config_value,
            ];

            try {
                Mail::to($user_details->email)->send(new \App\Mail\SendEmailInvoice($details));
            } catch (\Exception $e) {
            }

            alert()->success(trans('Plan changed success!'));
            return redirect()->route('admin.offline.transactions');
        } else {
            $message = "";
            if ($user_details->plan_id == $request->plan_id) {


                // Check if plan validity is expired or not.
                $plan_validity = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $user_details->plan_validity);
                $current_date = Carbon::now();
                $remaining_days = $current_date->diffInDays($plan_validity, false);

                if ($remaining_days > 0) {
                    $plan_validity = Carbon::parse($user_details->plan_validity);
                    $plan_validity->addDays($term_days);
                    $message = "Plan changed successfully!";
                } else {
                    $plan_validity = Carbon::now();
                    $plan_validity->addDays($term_days);
                    $message = "Plan changed successfully!";
                }
            } else {

                // Making all cards inactive, For Plan change
                // BusinessCard::where('user_id', $user_details->id)->update([
                //     'card_status' => 'inactive',
                // ]);

                $plan_validity = Carbon::now();
                $plan_validity->addDays($term_days);
                $message = "Plan changed successfully!";
            }

            $invoice_count = Transaction::where("invoice_prefix", $config[15]->config_value)->count();
            $invoice_number = $invoice_count + 1;

            $gobiz_transaction_id = uniqid();

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
            $invoice_details['to_billing_name'] = $user_details->billing_name;
            $invoice_details['to_billing_address'] = $user_details->billing_address;
            $invoice_details['to_billing_city'] = $user_details->billing_city;
            $invoice_details['to_billing_state'] = $user_details->billing_state;
            $invoice_details['to_billing_zipcode'] = $user_details->billing_zipcode;
            $invoice_details['to_billing_country'] = $user_details->billing_country;
            $invoice_details['to_billing_phone'] = $user_details->billing_phone;
            $invoice_details['to_billing_email'] = $user_details->billing_email;
            $invoice_details['to_vat_number'] = $user_details->vat_number;
            $invoice_details['tax_name'] = $config[24]->config_value;
            $invoice_details['tax_type'] = $config[14]->config_value;
            $invoice_details['tax_value'] = $config[25]->config_value;
            $invoice_details['invoice_amount'] = $amountToBePaid;
            $invoice_details['subtotal'] = $plan_data->plan_price;
            $invoice_details['tax_amount'] = (int)($plan_data->plan_price) * (int)($config[25]->config_value) / 100;

            // If order is created from stripe
            $transaction = new Transaction();
            $transaction->gobiz_transaction_id = $gobiz_transaction_id;
            $transaction->transaction_date = now();
            $transaction->transaction_id = "";
            $transaction->user_id = $user_details->id;
            $transaction->plan_id = $plan_data->plan_id;
            $transaction->desciption = $plan_data->plan_name . " Plan";
            $transaction->payment_gateway_name = "Offline";
            $transaction->transaction_amount = $amountToBePaid;
            $transaction->invoice_prefix = $config[15]->config_value;
            $transaction->invoice_number = $invoice_number;
            $transaction->transaction_currency = $config[1]->config_value;
            $transaction->invoice_details = json_encode($invoice_details);
            $transaction->payment_status = "SUCCESS";
            $transaction->save();

            User::where('id', $user_details->id)->update([
                'plan_id' => $request->plan_id,
                'term' => $term_days,
                'plan_validity' => $plan_validity,
                'plan_activation_date' => now(),
                'plan_details' => $plan_data
            ]);

            $details = [
                'from_billing_name' => $config[16]->config_value,
                'from_billing_email' => $config[17]->config_value,
                'from_billing_address' => $config[19]->config_value,
                'from_billing_city' => $config[20]->config_value,
                'from_billing_state' => $config[21]->config_value,
                'from_billing_country' => $config[23]->config_value,
                'from_billing_zipcode' => $config[22]->config_value,
                'gobiz_transaction_id' => $gobiz_transaction_id,
                'to_billing_name' => $user_details->billing_name,
                'invoice_currency' => $config[1]->config_value,
                'invoice_amount' => $plan_data->plan_price,
                'invoice_id' => $config[15]->config_value . $invoice_number,
                'invoice_date' => Carbon::now(),
                'description' => $plan_data->plan_name . ' plan Upgrade',
                'email_heading' => $config[27]->config_value,
                'email_footer' => $config[28]->config_value,
            ];

            try {
                Mail::to($user_details->email)->send(new \App\Mail\SendEmailInvoice($details));
            } catch (\Exception $e) {
            }

            alert()->success($message);
            return redirect()->route('admin.change.user.plan', $request->user_id);
        }
    }

    // Update status
    public function updateStatus(Request $request)
    {
        $user_details = User::where('user_id', $request->query('id'))->first();
        if ($user_details->status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }

        if ($status) {

            $bussiness_card = BusinessCard::where('user_id', $user_details->id)->update([
                'card_status' => "activated"
            ]);
        } else {
            $bussiness_card = BusinessCard::where('user_id', $user_details->id)->update([
                'card_status' => "inactive"
            ]);
        }

        if ($status == "0") {
            Mail::to($user_details->email)->send(new AccountDeactive($user_details));
        }
        User::where('user_id', $request->query('id'))->update(['status' => $status]);
        return redirect()->route('admin.users')->with('success', 'User Status Updated Successfully!');
    }

    // Delete User
    public function deleteUser(Request $request)
    {

        $user = User::where('user_id', $request->query('id'))->first();
        $allcards = BusinessCard::where('user_id', $user->id)->get();

        // dd($user);

        for ($i = 0; $i < count($allcards); $i++) {
            if ($allcards != null) {
                BusinessField::where('card_id', $allcards[$i]->id)->delete();
                BusinessHour::where('card_id', $allcards[$i]->card_id)->delete();
                Gallery::where('card_id', $allcards[$i]->card_id)->delete();
                Payment::where('card_id', $allcards[$i]->card_id)->delete();
                Service::where('card_id', $allcards[$i]->card_id)->delete();
                StoreProduct::where('card_id', $allcards[$i]->card_id)->delete();
            }
        }

        $transactions = Transaction::where('user_id', $user->id)->get();
        $businessCards = BusinessCard::where('user_id', $user->id)->get();

        if ($transactions) {
            Transaction::where('user_id', $user->id)->delete();
        }

        if ($businessCards) {
            BusinessCard::where('user_id', $user->id)->delete();
        }

        User::where('user_id', $request->query('id'))->delete();
        return redirect()->route('admin.users')->with('success', 'User deleted Successfully!');
    }

    // Login As User
    public function authAs(Request $request, $id)
    {
        $user_details = User::where('user_id', $id)->where('status', 1)->first();
        if (isset($user_details)) {
            Auth::loginUsingId($user_details->id);
            return redirect()->route('user.dashboard');
        } else {
            return redirect()->route('admin.users')->with('info', 'User account was not found!');
        }
    }
}
