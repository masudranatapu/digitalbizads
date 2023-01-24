<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Setting;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest')->except('logout');
    }

    public function authenticated()
    {
        if (Auth::check() && Auth::user()->role_id == 1) {
            return redirect('/admin/dashboard');
        }

        return redirect('/user/dashboard');
    }

    public function showLoginForm()
    {
        $config = DB::table('config')->get();
        $settings = Setting::first();

        $google_configuration = [
            'GOOGLE_ENABLE' => env('GOOGLE_ENABLE', ''),
            'GOOGLE_CLIENT_ID' => env('GOOGLE_CLIENT_ID', ''),
            'GOOGLE_CLIENT_SECRET' => env('GOOGLE_CLIENT_SECRET', ''),
            'GOOGLE_REDIRECT' => env('GOOGLE_REDIRECT', '')
        ];

        $recaptcha_configuration = [
            'RECAPTCHA_ENABLE' => env('RECAPTCHA_ENABLE', ''),
            'RECAPTCHA_SITE_KEY' => env('RECAPTCHA_SITE_KEY', ''),
            'RECAPTCHA_SECRET_KEY' => env('RECAPTCHA_SECRET_KEY', '')
        ];

        $settings['google_configuration'] = $google_configuration;
        $settings['recaptcha_configuration'] = $recaptcha_configuration;

        return view('auth.login', compact('config', 'settings'));
    }

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }

        // check if they're an existing user
        $existingUser = User::where('email', $user->email)->first();
        if($existingUser){
            if($existingUser->status == 1){
                // log them in
                auth()->login($existingUser, true);
            }else{
                  return redirect('/login');
            }

        } else {
        // create a new user
            $newUser = new User;
            $newUser->name = $user->name;
            $newUser->email = $user->email;
            $newUser->user_id = $user->id;
            $newUser->profile_image = $user->avatar;
            $newUser->password = bcrypt($newUser->user_id);
            $newUser->auth_type = "Google";
            $newUser->role_id = 2;
            $newUser->save();
            auth()->login($newUser, true);
        }
        return redirect()->to('/user/dashboard');
    }

}
