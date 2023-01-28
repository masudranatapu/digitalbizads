<?php

namespace RachidLaasri\LaravelInstaller\Controllers;

use Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request as serverReq;
use RachidLaasri\LaravelInstaller\Helpers\DatabaseManager;

class DatabaseController extends Controller
{
    /**
     * @var DatabaseManager
     */
    private $databaseManager;

    /**
     * @param DatabaseManager $databaseManager
     */
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }

    /**
     * Migrate and seed the database.
     *
     * @return \Illuminate\View\View
     */
    public function database()
    {

        $purchase_code = env('PURCHASE_CODE', 'default_value');
        $version = env('APP_VERSION', 'default_value');
        $resp_data = [];
        $errorMessage = "Something went wrong";
        $server_name = serverReq::server("SERVER_NAME");
        $server_name = $server_name ? $server_name : "LOCAL.TEST";

        // $client = new \GuzzleHttp\Client();
        // $res = $client->post('https://verification.goapps.co.in/validate', [
        //     'form_params' => [
        //         'purchase_code' => $purchase_code,
        //         'server_name' => $server_name,
        //         'version' => 1.0
        //     ]
        // ]);

        // $resp_data = json_decode($res->getBody(), true);

        Artisan::call('migrate:reset', ['--force' => true]);

        if (true) {
            if (true) {
                $config_data = [
                    'site_name' => env('APP_NAME'),
                    'currency' => config('currency.default'),
                    'timezone' => config('app.timezone'),
                    'paypal_mode' => '',
                    'paypal_client_id' => '',
                    'paypal_secret' => '',
                    'razorpay_key' => '',
                    'razorpay_secret' => '',
                    'term' => 'monthly',
                    'stripe_publishable_key' => '',
                    'stripe_secret' => '',
                    'app_theme' => 'blue',
                    'primary_image' => '/frontend/assets/elements/home.gif',
                    'secondary_image' => '/frontend/assets/elements/home.svg',
                    'tax_type' => '',
                    'invoice_prefix' => '',
                    'invoice_name' => '',
                    'invoice_email' => '',
                    'invoice_phone' => '',
                    'invoice_address' => '',
                    'invoice_city' => '',
                    'invoice_state' => '',
                    'invoice_zipcode' => '',
                    'invoice_country' => '',
                    'tax_name' => '',
                    'tax_value' => '',
                    'tax_number' => '',
                    'email_heading' => '',
                    'email_footer' => '',
                    'invoice_footer' => '',
                    'share_content' => 'Welcome to { business_name }, my digital vCard here : { business_url } Powered by: { appName }',
                    'bank_transfer' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, dolorem!",
                    'version' => ''

                ];

                $response = $this->databaseManager->migrateAndSeed();

                foreach ($config_data as $key => $value) {

                    DB::table('config')->insert([
                        'config_key' => $key,
                        'config_value' => $value,
                    ]);
                }




                DB::table('config')->where('config_key', 'purchase_code')->update([
                    'config_value' => "test"
                ]);

                return redirect()->route('LaravelInstaller::final')->with(['message' => $response]);
            } else {
                $errorMessage = $resp_data['message'];
                return redirect()->route('LaravelInstaller::environmentWizard')->with([
                    'message' => $errorMessage,
                ]);
            }
        } else {
            return redirect()->route('LaravelInstaller::environmentWizard')->with([
                'message' => $errorMessage,
            ]);
        }
    }
}
