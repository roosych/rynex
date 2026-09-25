<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class HeroSettings extends Settings
{
    public string $title    = 'We Fix It Today. Guaranteed.';
    public string $subtitle = 'Local techs. Upfront pricing. Same-day service on most repairs.';

    public static function group(): string
    {
        return 'hero';
    }
}
