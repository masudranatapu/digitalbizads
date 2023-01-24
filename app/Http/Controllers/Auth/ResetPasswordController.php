<?php

namespace App\Http\Controllers\Auth;

use App\Setting;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        if(Auth::check() && Auth::user()->role_id == 1){
            $this->redirectTo = route('admin.dashboard');
        } elseif(Auth::check() && Auth::user()->role_id == 2){
            $this->redirectTo = route('user.dashboard');
        }

        $this->middleware('guest')->except('logout');
    }

    protected function redirectTo()
    {
        return '/user/dashboard';
    }

    public function showResetForm($token)
    {
        $config = DB::table('config')->get();
        $settings = Setting::first();

        $google_configuration = [
            'GOOGLE_ENABLE' => env('GOOGLE_ENABLE', ''),
            'GOOGLE_CLIENT_ID' => env('GOOGLE_CLIENT_ID', ''),
            'GOOGLE_CLIENT_SECRET' => env('GOOGLE_CLIENT_SECRET', ''),
            'GOOGLE_REDIRECT' => env('GOOGLE_REDIRECT', '')
        ];

        $settings['google_configuration'] = $google_configuration;

        return view('auth.passwords.reset', compact('config', 'token', 'settings'));
    }

}
