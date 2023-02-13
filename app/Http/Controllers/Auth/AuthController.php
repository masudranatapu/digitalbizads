<?php

namespace App\Http\Controllers\Auth;
use App\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    protected $user;
    public function __construct(
        User            $user
    ) {
        $this->user     = $user;

    }




    public function postRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'reg_name' => 'required',
            'reg_email' => 'required|email|unique:users,email',
            'reg_password' => 'required|min:8',
            'reg_password_confirmation' => 'required_with:password|same:reg_password|min:8'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $checkExist = User::where('email', $request->reg_email)->whereNotNull('email')->first();
            if (!empty($checkExist)) {
                alert()->error(trans('Cannot create account an identical account already exists!'));
                return redirect()->back()->with('error', 'Cannot create account an identical account already exists!')->withInput();
            }
            $user = User::create([
                'user_id' => uniqid(),
                'name' => $request->reg_name,
                'email' => $request->reg_email,
                'auth_type' => 'Email',
                'password' => Hash::make($request->reg_password),
            ]);
            Auth::login($user);
            $message = [
                'name' => $request->reg_name,
                'email' => $request->reg_email,
            ];
            $mail = false;
            try {
                Mail::to($request->reg_email)->bcc(env('MAIL_FROM_ADDRESS'))->send(new \App\Mail\WelcomeMail($message));
                $mail = true;
        } catch (\Exception $e) {
            dd($e->getMessage());
            alert()->error(trans('Something went wrong'));
            return redirect()->back();
        }
        if (Auth::check() && Auth::user()->role_id == 1) {
            return redirect('/admin/dashboard');
        }
        return redirect('/user/dashboard');
    }




}
