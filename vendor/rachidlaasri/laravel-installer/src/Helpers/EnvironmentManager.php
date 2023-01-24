<?php

namespace RachidLaasri\LaravelInstaller\Helpers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EnvironmentManager
{
    /**
     * @var string
     */
    private $envPath;

    /**
     * @var string
     */
    private $envExamplePath;

    /**
     * Set the .env and .env.example paths.
     */
    public function __construct()
    {
        $this->envPath = base_path('.env');
        $this->envExamplePath = base_path('.env.example');
    }

    /**
     * Get the content of the .env file.
     *
     * @return string
     */
    public function getEnvContent()
    {
        if (!file_exists($this->envPath)) {
            if (file_exists($this->envExamplePath)) {
                copy($this->envExamplePath, $this->envPath);
            } else {
                touch($this->envPath);
            }
        }

        return file_get_contents($this->envPath);
    }

    /**
     * Get the the .env file path.
     *
     * @return string
     */
    public function getEnvPath()
    {
        return $this->envPath;
    }

    /**
     * Get the the .env.example file path.
     *
     * @return string
     */
    public function getEnvExamplePath()
    {
        return $this->envExamplePath;
    }

    /**
     * Save the edited content to the .env file.
     *
     * @param Request $input
     * @return string
     */
    public function saveFileClassic(Request $input)
    {
        $message = trans('installer_messages.environment.success');

        try {
            file_put_contents($this->envPath, $input->get('envConfig'));
        } catch (Exception $e) {
            $message = trans('installer_messages.environment.errors');
        }

        return $message;
    }

    /**
     * Save the form content to the .env file.
     *
     * @param Request $request
     * @return string
     */
    public function saveFileWizard(Request $request)
    {
        $results = trans('installer_messages.environment.success');
        $PUSHER_APP_KEY = $request->pusher_app_key;
	$app_name = str_replace('""', '', $request->app_name);

        $envFileData =
            'APP_NAME="' . "$app_name" .'"' . "\n" .
            'APP_VERSION=' . env('APP_VERSION') . "\n" .
            'TIMEZONE=UTC' . "\n" .
            'APP_ENV=' . $request->environment . "\n" .
            'APP_KEY=' . env('APP_KEY') . "\n" .
            'APP_DEBUG=' . $request->app_debug . "\n" .
            'APP_LOG_LEVEL=' . $request->app_log_level . "\n" .
            'APP_URL=' . $request->app_url . "\n" .
            'ASSET_URL="${APP_URL}"' . "\n\n" .
            'SIZE_LIMIT=1024' . "\n\n" .
            'PURCHASE_CODE=' . $request->purchase_code . "\n\n" .
            'COOKIE_CONSENT_ENABLED=true' . "\n" .
            'APP_TYPE=BOTH' . "\n\n" .
            'DB_CONNECTION=' . $request->database_connection . "\n" .
            'DB_HOST=' . $request->database_hostname . "\n" .
            'DB_PORT=' . $request->database_port . "\n" .
            'DB_DATABASE=' . $request->database_name . "\n" .
            'DB_USERNAME=' . $request->database_username . "\n" .
            'DB_PASSWORD="' . "$request->database_password" .'"' . "\n\n" .
            'GOOGLE_ENABLE=' . "\n" .
            'GOOGLE_CLIENT_ID=GOOGLE_CLIENT_ID' . "\n" .
            'GOOGLE_CLIENT_SECRET=GOOGLE_CLIENT_SECRET' . "\n" .
            'GOOGLE_REDIRECT=GOOGLE_REDIRECT' . "\n\n" .
            'RECAPTCHA_ENABLE=' . "\n" .
            'RECAPTCHA_SITE_KEY=RECAPTCHA_SITE_KEY' . "\n" .
            'RECAPTCHA_SECRET_KEY=RECAPTCHA_SECRET_KEY' . "\n" .
            'RECAPTCHA_SKIP_IP=["${APP_URL}"]' . "\n\n" .
            'BROADCAST_DRIVER=' . $request->broadcast_driver . "\n" .
            'CACHE_DRIVER=array' . "\n" .
            'FILESYSTEM_DRIVER=local' . "\n" .
            'SESSION_DRIVER=' . $request->session_driver . "\n" .
            'SESSION_LIFETIME=120' . "\n" .
            'QUEUE_DRIVER=' . $request->queue_driver . "\n" .
            'QUEUE_CONNECTION=sync' . "\n\n" .
            'MEMCACHED_HOST=' . str_replace('http://', '', $request->app_url) . "\n\n" .
            'REDIS_HOST=' . $request->redis_hostname . "\n" .
            'REDIS_PASSWORD=' . $request->redis_password . "\n" .
            'REDIS_PORT=' . $request->redis_port . "\n\n" .
            'MAIL_DRIVER=' . $request->mail_driver . "\n" .
            'MAIL_HOST=' . $request->mail_host . "\n" .
            'MAIL_PORT=' . $request->mail_port . "\n" .
            'MAIL_USERNAME=a26c8a5722623a' . "\n" .
            'MAIL_PASSWORD=3cd34ddf4e2a6a' . "\n" .
            'MAIL_ENCRYPTION=tls' . "\n" .
            'MAIL_FROM_ADDRESS=noreply@gobiz.in' . "\n" .
            'MAIL_FROM_NAME="' . $app_name . '"' . "\n\n" .
            'AWS_ACCESS_KEY_ID=' . "\n" .
            'AWS_SECRET_ACCESS_KEY=' . "\n" .
            'AWS_DEFAULT_REGION=us-east-1' . "\n" .
            'AWS_BUCKET=' . "\n" .
            'AWS_USE_PATH_STYLE_ENDPOINT=false' . "\n" .
            'PUSHER_APP_ID=' . $request->pusher_app_id . "\n" .
            'PUSHER_APP_KEY=' . $PUSHER_APP_KEY . "\n" .
            'PUSHER_APP_SECRET=' . $request->pusher_app_secret . "\n" .
            'PUSHER_APP_CLUSTER=mt1' . "\n\n" .
            'MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"' . "\n" .
            'MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"' . "\n";

        try {
            file_put_contents($this->envPath, $envFileData);
        } catch (Exception $e) {
            $results = trans('installer_messages.environment.errors');
        }

        return $results;
    }
}
