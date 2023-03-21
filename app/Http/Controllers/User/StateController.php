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
        $user_id    = Auth::id();
        $states     = State::where('user_id',$user_id)->orderBy('name','asc')->get();
        $settings   = Setting::first();
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
            'state_name'    => 'required',
            'type'          => 'required',
            'amount'        => 'required',
        ]);

        $state = new State();
        $state->user_id     = Auth::id();
        $state->name        = $request->state_name;
        $state->tax_type    = $request->type;
        $state->amount      = $request->amount;
        $state->status      = true;
        $state->save();
        alert()->success(trans('State tax save successfully'));
        return redirect()->route('user.state.index');
    }



    public function edit($id)
    {
        $user_id = Auth::id();
        $state = State::where('id',$id)->where('user_id',$user_id)->first();

        $settings = Setting::first();
        return view('user.settings.tax.edit', compact('state', 'settings'));
    }



    public function update(Request $request, $id)
    {
        $user_id = Auth::id();

        $request->validate([
            'state_name' => 'required',
            'type' => 'required',
            'amount' => 'required',
        ]);

        $state = State::where('id',$id)->where('user_id',$user_id)->first();
        $state->user_id     = Auth::id();
        $state->name        = $request->state_name;
        $state->tax_type    = $request->type;
        $state->amount      = $request->amount;
        $state->status      = true;
        $state->save();
        alert()->success(trans('State tax save successfully'));
        return redirect()->route('user.state.index');
    }



    public function status($id)
    {

        $user_id = Auth::id();
        $data = State::where('id',$id)->where('user_id',$user_id)->first();
        if($data){
            $state =  State::find($id);
            $state->status = !$data->status;
            $state->update();
            alert()->success(trans('State status change successfully'));

        }else{
            alert()->error(trans('Something wrong.'));
        }
        return redirect()->route('user.state.index');
    }
    public function delete($id)
    {
        $user_id = Auth::id();
        $data = State::where('id',$id)->where('user_id',$user_id)->first();
        if($data){
            $state =  State::find($id);
            $state->delete();
            alert()->success(trans('State delete successfully'));

        }else{
            alert()->error(trans('Something wrong.'));
        }
        return redirect()->route('user.state.index');

    }

}
