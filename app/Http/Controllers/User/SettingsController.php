<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Setting;
use App\State;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function payment()
    {
        $settings = Setting::first();
        return view('user.settings.payment', compact('settings'));
    }

    public function paymentUpdate(Request $request)
    {
        $request->validate([
            "paypal_mode" => 'nullable',
            "paypal_client_key" => 'nullable',
            "paypal_secret" => 'nullable',
            "stripe_publishable_key" => 'nullable',
            "stripe_secret" => 'nullable',
        ]);

        $user = User::find(Auth::id());
        $user->paypal_mode = $request->paypal_mode;
        $user->paypal_public_key = $request->paypal_client_key;
        $user->paypal_secret_key = $request->paypal_secret;
        $user->stripe_public_key = $request->stripe_publishable_key;
        $user->stripe_secret_key = $request->stripe_secret;
        $user->save();
        alert()->success(trans('Payment setting data successfully updated'));
        return redirect()->back();
    }

    public function tax()
    {
        $states = State::where('user_id', Auth::id())->get();
        $settings = Setting::first();
        return view('user.settings.tax.index', compact('settings', 'states'));
    }

    public function taxCreate(Request $request)
    {
        $settings = Setting::first();
        return view('user.settings.tax.create', compact('settings'));
    }

    public function taxStore(Request $request)
    {
        $request->validate([
            'state_name' => 'required',
            'type' => 'required',
            'amount' => 'required',
        ]);

        $state = new State();
        $state->user_id = Auth::id();
        $state->name = $request->state_name;
        $state->tax_type = $request->type;
        $state->amount = $request->amount;
        $state->status = true;
        $state->save();
        alert()->success(trans('State tax save successfully'));
        return redirect()->route('user.setting.tax');
    }

    public function taxEdit(State $state)
    {
        $settings = Setting::first();
        return view('user.settings.tax.edit', compact('state', 'settings'));
    }



    public function taxUpdate(Request $request, State $state)
    {
        $request->validate([
            'state_name' => 'required',
            'type' => 'required',
            'amount' => 'required',
        ]);


        $state->user_id = Auth::id();
        $state->name = $request->state_name;
        $state->tax_type = $request->type;
        $state->amount = $request->amount;
        $state->status = true;
        $state->save();
        alert()->success(trans('State tax save successfully'));
        return redirect()->route('user.setting.tax');
    }



    public function taxStatus(State $state)
    {
        $state->status = !$state->status;
        $state->save();
        alert()->success(trans('State status change successfully'));
        return redirect()->route('user.setting.tax');
    }
    public function taxDelete(State $state)
    {
        $state->delete();

        alert()->success(trans('State delete successfully'));
        return redirect()->route('user.setting.tax');
    }
}
