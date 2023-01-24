<?php

namespace App\Http\Controllers\User;

use App\Plan;
use App\User;
use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
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

    // My account
    public function account()
    {
        $account_details = User::where('user_id', auth()->user()->user_id)->where('status', 1)->first();
        $settings = Setting::where('status', 1)->first();
        return view('user.account.account', compact('account_details', 'settings'));
    }

    // Edit account
    public function editAccount()
    {
        $account_details = User::where('user_id', auth()->user()->user_id)->where('status', 1)->first();
        $settings = Setting::where('status', 1)->first();
        return view('user.account.edit-account', compact('account_details', 'settings'));
    }

    // Update account
    public function updateAccount(Request $request)
    {
        if ($request->profile_picture == null) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required'
            ]);

            User::where('user_id', auth()->user()->user_id)->update([
                'name' => $request->name,
                'email' => $request->email
            ]);
            if ($validator->fails()) {
                return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
            }

            return redirect()->route('user.edit.account')->with('success', 'Profile Updated Successfully!');
        } else {
            $validator = Validator::make($request->all(), [
                'profile_picture' => 'required|mimes:jpeg,png,jpg,gif,svg|max:'.env("SIZE_LIMIT").'',
            ]);

            if ($validator->fails()) {
                alert()->error(trans('Invalid Image or image size is large.'));
                return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
            }

            $profile_picture = 'profile_images/' . 'IMG-' . uniqid() . '-' . time() . '.' . $request->profile_picture->extension();
            $request->profile_picture->move(public_path('profile_images'), $profile_picture);

            User::where('user_id', auth()->user()->user_id)->update([
                'profile_image' => $profile_picture
            ]);

            return redirect()->route('user.edit.account')->with('success', 'Profile Image Updated Successfully!');
        }
    }

    // Change password
    public function changePassword()
    {
        $account_details = User::where('user_id', auth()->user()->user_id)->where('status', 1)->first();
        $settings = Setting::where('status', 1)->first();
        return view('user.account.change-password', compact('account_details', 'settings'));
    }

    // Update password
    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'new_password' => 'required',
            'confirm_password' => 'required'
        ]);

        if ($request->new_password == $request->confirm_password) {
            User::where('user_id', auth()->user()->user_id)->update([
                'password' => bcrypt($request->new_password)
            ]);
            if ($validator->fails()) {
                return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
            }
            alert()->success(trans('Profile Password Changed Successfully!'));
            return redirect()->route('user.change.password');
        } else {
            alert()->error(trans('Confirm Password Mismatched.'));
            return redirect()->route('user.change.password');
        }
    }
}
