<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Setting;
use App\State;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StateController extends Controller
{

    public function index()
    {
        $states = State::where('user_id', Auth::id())->get();
        $settings = Setting::first();
        return view('user.settings.tax.index', compact('settings', 'states'));
    }

    public function create(Request $request)
    {
        $settings = Setting::first();
        return view('user.settings.tax.create', compact('settings'));
    }

    public function store(Request $request)
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



    public function edit(State $state)
    {
        $settings = Setting::first();
        return view('user.settings.tax.edit', compact('state', 'settings'));
    }



    public function update(Request $request, State $state)
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



    public function status(State $state)
    {
        $state->status = !$state->status;
        $state->save();
        alert()->success(trans('State status change successfully'));
        return redirect()->route('user.setting.tax');
    }
    public function selete(State $state)
    {
        $state->delete();

        alert()->success(trans('State delete successfully'));
        return redirect()->route('user.setting.tax');
    }
}
