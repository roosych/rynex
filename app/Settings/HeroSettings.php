<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class HeroSettings extends Settings
{
    public string $title    = 'We Fix It Today. Guaranteed.';
    public string $subtitle = 'Local techs. Upfront pricing. 90-day warranty on every repair.';

    public static function group(): string
    {
        return 'hero';
    }
}
