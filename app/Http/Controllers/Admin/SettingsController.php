<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use App\Currency;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Spatie\Sitemap\SitemapGenerator;
use Illuminate\Support\Facades\Artisan;

class SettingsController extends Controller
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

    // Setting
    public function settings()
    {
        $timezonelist = DateTimeZone::listIdentifiers(DateTimeZone::ALL);
        $currencies = Currency::orderBy('name','asc')->where('is_active',1)->get();
        $settings = Setting::first();
        $config = DB::table('config')->get();

        $email_configuration = [
            'driver' => env('MAIL_MAILER', 'smtp'),
            'host' => env('MAIL_HOST', 'smtp.mailgun.org'),
            'port' => env('MAIL_PORT', 587),
            'username' => env('MAIL_USERNAME'),
            'password' => env('MAIL_PASSWORD'),
            'encryption' => env('MAIL_ENCRYPTION', 'tls'),
            'address' => env('MAIL_FROM_ADDRESS'),
            'name' => env('MAIL_FROM_NAME', $settings->site_name),
        ];

        $google_configuration = [
            'GOOGLE_ENABLE' => env('GOOGLE_ENABLE', ''),
            'GOOGLE_CLIENT_ID' => env('GOOGLE_CLIENT_ID', ''),
            'GOOGLE_CLIENT_SECRET' => env('GOOGLE_CLIENT_SECRET', ''),
            'GOOGLE_REDIRECT' => env('GOOGLE_REDIRECT', '')
        ];

        $image_limit = [
            'SIZE_LIMIT' => env('SIZE_LIMIT', '')
        ];

        $recaptcha_configuration = [
            'RECAPTCHA_ENABLE' => env('RECAPTCHA_ENABLE', ''),
            'RECAPTCHA_SITE_KEY' => env('RECAPTCHA_SITE_KEY', ''),
            'RECAPTCHA_SECRET_KEY' => env('RECAPTCHA_SECRET_KEY', '')
        ];

        $settings['email_configuration'] = $email_configuration;
        $settings['google_configuration'] = $google_configuration;
        $settings['recaptcha_configuration'] = $recaptcha_configuration;
        $settings['image_limit'] = $image_limit;

        return view('admin.settings', compact('settings', 'timezonelist', 'currencies', 'config'));
    }

    // Update General Setting
    public function changeGeneralSettings(Request $request)
    {
        Setting::where('id', '1')->update([
            'tawk_chat_bot_key' => $request->tawk_chat_bot_key
        ]);

        DB::table('config')->where('config_key', 'timezone')->update([
            'config_value' => $request->timezone,
        ]);

        DB::table('config')->where('config_key', 'currency')->update([
            'config_value' => $request->currency,
        ]);

        DB::table('config')->where('config_key', 'term')->update([
            'config_value' => $request->term,
        ]);

        DB::table('config')->where('config_key', 'share_content')->update([
            'config_value' => $request->share_content,
        ]);

        $this->changeEnv([
            'TIMEZONE' => $request->timezone,
            'APP_TYPE' => $request->app_type,
            'COOKIE_CONSENT_ENABLED' => $request->cookie,
            'SIZE_LIMIT' => $request->image_limit
        ]);

        // Page redirect
        return redirect()->back()->with('success', trans('General Settings Updated Successfully!'));
    }

    // Update Website Setting
    public function changeWebsiteSettings(Request $request)
    {
        Setting::where('id', '1')->update([
            'site_name' => $request->site_name, 'seo_meta_description' => $request->seo_meta_desc, 'seo_keywords' => $request->meta_keywords
        ]);

        $double_site_name = str_replace('"', '', trim($request->site_name, '"'));
        $space_name = str_replace("'", '', trim($double_site_name, "'"));
        $site_name = str_replace(" ", '', trim($space_name, " "));

        DB::table('config')->where('config_key', 'site_name')->update([
            'config_value' => $site_name,
        ]);

        DB::table('config')->where('config_key', 'app_theme')->update([
            'config_value' => $request->app_theme,
        ]);

        // Check website logo
        if (isset($request->site_logo)) {
            $validator = $request->validate([
                'site_logo' => 'mimes:jpeg,png,jpg,gif,svg|max:' . env("SIZE_LIMIT") . '',
            ]);

            $site_logo = '/images/web/elements/' . uniqid() . '.' . $request->site_logo->extension();
            $request->site_logo->move(public_path('images/web/elements'), $site_logo);

            // Update details
            Setting::where('id', '1')->update([
                'google_analytics_id' => $request->google_analytics_id,
                'site_name' => $request->site_name, 'site_logo' => $site_logo, 'seo_meta_description' => $request->seo_meta_desc, 'seo_keywords' => $request->meta_keywords,
                'tawk_chat_bot_key' => $request->tawk_chat_bot_key,
            ]);
        }

        // Check favicon
        if (isset($request->favi_icon)) {
            $validator = $request->validate([
                'favi_icon' => 'mimes:jpeg,png,jpg,gif,svg|max:' . env("SIZE_LIMIT") . '',
            ]);

            $favi_icon = '/images/web/elements/' . uniqid() . '.' . $request->favi_icon->extension();
            $request->favi_icon->move(public_path('images/web/elements'), $favi_icon);

            // Update details
            Setting::where('id', '1')->update([
                'google_analytics_id' => $request->google_analytics_id,
                'site_name' => $request->site_name, 'favicon' => $favi_icon, 'seo_meta_description' => $request->seo_meta_desc, 'seo_keywords' => $request->meta_keywords,
                'tawk_chat_bot_key' => $request->tawk_chat_bot_key,
            ]);
        }

        // Check primary image for website banner
        if (isset($request->primary_image)) {
            $validator = $request->validate([
                'primary_image' => 'mimes:jpeg,png,jpg,gif,svg|max:' . env("SIZE_LIMIT") . '',
            ]);

            $primary_image = '/images/web/elements/' . uniqid() . '.' . $request->primary_image->extension();
            $request->primary_image->move(public_path('/images/web/elements'), $primary_image);

            // Update image
            DB::table('config')->where('config_key', 'primary_image')->update([
                'config_value' => $primary_image,
            ]);
        }

        // Page redirect
        return redirect()->back()->with('success', trans('Website Settings Updated Successfully!'));
    }

    // Update Payments Setting
    public function changePaymentsSettings(Request $request)
    {
        DB::table('config')->where('config_key', 'paypal_mode')->update([
            'config_value' => $request->paypal_mode,
        ]);

        DB::table('config')->where('config_key', 'paypal_client_id')->update([
            'config_value' => $request->paypal_client_key,
        ]);

        DB::table('config')->where('config_key', 'paypal_secret')->update([
            'config_value' => $request->paypal_secret,
        ]);

        DB::table('config')->where('config_key', 'razorpay_key')->update([
            'config_value' => $request->razorpay_client_key,
        ]);

        DB::table('config')->where('config_key', 'razorpay_secret')->update([
            'config_value' => $request->razorpay_secret,
        ]);

        DB::table('config')->where('config_key', 'stripe_publishable_key')->update([
            'config_value' => $request->stripe_publishable_key,
        ]);

        DB::table('config')->where('config_key', 'stripe_secret')->update([
            'config_value' => $request->stripe_secret,
        ]);

        DB::table('config')->where('config_key', 'bank_transfer')->update([
            'config_value' => $request->bank_transfer,
        ]);

        // Page redirect
        return redirect()->back()->with('success', trans('Payment Settings Updated Successfully!'));
    }

    // Update Google Setting
    public function changeGoogleSettings(Request $request)
    {
        Setting::where('id', '1')->update([
            'google_analytics_id' => $request->google_analytics_id, 'google_adsense_code' => $request->google_adsense_code
        ]);

        // Page redirect
        return redirect()->back()->with('success', trans('Google Settings Updated Successfully!'));
    }

    // Update Email Setting
    public function changeEmailSettings(Request $request)
    {
        // Page redirect
        return redirect()->back()->with('failed', trans('You can change the respective values directly from .env file.'));
    }

    // Tax settings
    public function taxSetting()
    {
        // Queries
        $config = DB::table('config')->get();
        $settings = Setting::first();

        // Page view
        return view('admin.tax.index', compact('config', 'settings'));
    }

    // Update tax setting
    public function updateTaxSetting(Request $request)
    {
        // Update
        DB::table('config')->where('config_key', 'invoice_prefix')->update([
            'config_value' => $request->invoice_prefix,
        ]);

        DB::table('config')->where('config_key', 'invoice_name')->update([
            'config_value' => $request->invoice_name,
        ]);

        DB::table('config')->where('config_key', 'invoice_email')->update([
            'config_value' => $request->invoice_email,
        ]);

        DB::table('config')->where('config_key', 'invoice_phone')->update([
            'config_value' => $request->invoice_phone,
        ]);

        DB::table('config')->where('config_key', 'invoice_address')->update([
            'config_value' => $request->invoice_address,
        ]);

        DB::table('config')->where('config_key', 'invoice_city')->update([
            'config_value' => $request->invoice_city,
        ]);

        DB::table('config')->where('config_key', 'invoice_state')->update([
            'config_value' => $request->invoice_state,
        ]);

        DB::table('config')->where('config_key', 'invoice_zipcode')->update([
            'config_value' => $request->invoice_zipcode,
        ]);

        DB::table('config')->where('config_key', 'invoice_country')->update([
            'config_value' => $request->invoice_country,
        ]);

        DB::table('config')->where('config_key', 'tax_name')->update([
            'config_value' => $request->tax_name,
        ]);

        DB::table('config')->where('config_key', 'tax_number')->update([
            'config_value' => $request->tax_number,
        ]);

        DB::table('config')->where('config_key', 'tax_value')->update([
            'config_value' => $request->tax_value,
        ]);

        DB::table('config')->where('config_key', 'invoice_footer')->update([
            'config_value' => $request->invoice_footer,
        ]);

        // Page redirect
        return redirect()->back()->with('success', trans('Invoice Setting Updated Successfully!'));
    }

    // Update email setting
    public function updateEmailSetting(Request $request)
    {
        // Update
        DB::table('config')->where('config_key', 'email_heading')->update([
            'config_value' => $request->email_heading,
        ]);

        DB::table('config')->where('config_key', 'email_footer')->update([
            'config_value' => $request->email_footer,
        ]);

        // Page redirect
        return redirect()->route('admin.tax.setting')->with('success', trans('Email Setting Updated Successfully!'));
    }

    // Clear cache
    public function clear()
    {
        // Laravel cache commend
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');

        // Page redirect
        return redirect()->back()->with('success', trans('Application Cache Cleared Successfully!'));
    }

    // Test email
    public function testEmail()
    {
        $message = [
            'msg' => 'Test mail'
        ];
        $mail = false;
        try {
            Mail::to(ENV('MAIL_FROM_ADDRESS'))->send(new \App\Mail\TestMail($message));
            $mail = true;
        } catch (\Exception $e) {
            // Page redirect
            return redirect()->back()->with('failed', trans('Email configuration wrong.'));
        }
        // Check email
        if ($mail == true) {
            // Page redirect
            return redirect()->back()->with('success', trans('Test mail send successfully.'));
        }
    }

    // Pages
    public function pages()
    {
        $pages = DB::table('pages')->get()->groupBy('page_name');
        $settings = Setting::first();
        $config = DB::table('config')->get();
        $allPages = array_keys($pages->toArray());
        return view('admin.pages.index', compact('allPages', 'settings', 'config'));
    }

    // Edit page
    public function editPage(Request $request, $id)
    {
        $sections = DB::table('pages')->where('page_name', $id)->get();
        $settings = Setting::first();
        $config = DB::table('config')->get();
        return view('admin.pages.edit-page', compact('sections', 'settings', 'config'));
    }

    // Save page
    public function savePage(Request $request, $id)
    {
        $sections = DB::table('pages')->where('page_name', $id)->get();
        for ($i = 0; $i < count($sections); $i++) {
            $safe_section_content = $request->input('section' . $i);
            DB::table('pages')->where('page_name', $id)->where('id', $sections[$i]->id)->update(['section_content' => $safe_section_content]);
        }
        alert()->success(trans('Website Content Updated Successfully!'));
        return redirect()->route('admin.pages');
    }

    // Generating a sitemap
    public function generateSiteMap()
    {
        // Generating a sitemap
        SitemapGenerator::create(URL::to('/'))->writeToFile('sitemap.xml');

        alert()->success(trans('Sitemap generating successfully!'));
        return redirect()->back();
    }

    protected function changeEnv($data = array())
    {
        if (count($data) > 0) {

            // Read .env-file
            $env = file_get_contents(base_path() . '/.env');

            // Split string on every " " and write into array
            $env = preg_split('/\s+/', $env);

            // Loop through given data
            foreach ((array) $data as $key => $value) {

                // Loop through .env-data
                foreach ($env as $env_key => $env_value) {

                    // Turn the value into an array and stop after the first split
                    // So it's not possible to split e.g. the App-Key by accident
                    $entry = explode("=", $env_value, 2);

                    // Check, if new key fits the actual .env-key
                    if ($entry[0] == $key) {
                        // If yes, overwrite it with the new one
                        $env[$env_key] = $key . "=" . $value;
                    } else {
                        // If not, keep the old one
                        $env[$env_key] = $env_value;
                    }
                }
            }

            // Turn the array back to an String
            $env = implode("\n", $env);

            // And overwrite the .env with the new data
            file_put_contents(base_path() . '/.env', $env);

            return true;
        } else {
            return false;
        }
    }
}
