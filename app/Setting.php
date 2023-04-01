<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //

    protected $fillable = [
        'google_key',
        'google_analytics_id',
        'google_adsense_code',
        'site_name',
        'site_logo',
        'favicon',
        'seo_meta_description',
        'seo_keywords',
        'seo_image',
        'tawk_chat_bot_key',
        'name',
        'address',
        'driver',
        'host',
        'port',
        'encryption',
        'username',
        'password',
        'recaptcha_enable',
        'recaptcha_site_key',
        'recaptcha_secret_key',
        'status',
        'created_at',
        'updated_at',
    ];
}
