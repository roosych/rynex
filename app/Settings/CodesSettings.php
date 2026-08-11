<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class CodesSettings extends Settings
{
    public string $google_analytics_id   = '';
    public string $google_tag_manager_id = '';
    public string $head_code             = '';
    public string $body_code             = '';
    public string $footer_code           = '';

    public static function group(): string
    {
        return 'codes';
    }
}
