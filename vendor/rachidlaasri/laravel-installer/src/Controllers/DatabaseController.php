<?php

namespace RachidLaasri\LaravelInstaller\Controllers;

use Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Artisan;
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

        $client = new \GuzzleHttp\Client();
        $res = $client->post('https://verification.goapps.co.in/validate', [
            'form_params' => [
                'purchase_code' => $purchase_code,
                'server_name' => $server_name,
                'version' => $version
            ]
        ]);

        $resp_data = json_decode($res->getBody(), true);

        Artisan::call('migrate:reset', ['--force' => true]);

        if ($resp_data) {
            if ($resp_data['status'] == true) {
                $config_data = $resp_data['data'];

                $response = $this->databaseManager->migrateAndSeed();

                for ($i = 0; $i < count($config_data); $i++) {
                    DB::table('config')->insert([
                        'config_key' => $config_data[$i]['config_key'],
                        'config_value' => $config_data[$i]['config_value'],
                    ]);
                }

                DB::table('config')->where('config_key', 'purchase_code')->update([
                    'config_value' => $purchase_code
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
