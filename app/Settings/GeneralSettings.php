<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $company_name      = 'Rynex Fix';
    public string $tagline           = 'Appliance Repair';
    public string $logo              = '';
    public string $logo_white        = '';
    public string $favicon           = '';
    public string $phone_primary     = '+1 (555) 123-4567';
    public string $phone_secondary   = '+1 (555) 987-6543';
    public string $email                  = 'info@rynexfix.com';
    public string $booking_notify_emails  = 'info@rynexfix.com';
    public string $address           = 'Chicago, IL';
    public string $latitude          = '41.8781';
    public string $longitude         = '-87.6298';
    public string $hours_weekday     = 'Monday - Friday : 8:00 am to 7:00 pm';
    public string $hours_saturday    = 'Saturday : 9:00 am to 4:00 pm';
    public string $footer_about      = 'Rynex Fix is a local appliance repair company. Fast, honest service — backed by a warranty.';
    public string $social_facebook   = '#';
    public string $social_instagram  = '#';
    public string $social_yelp       = '#';
    public string $map_embed_url     = 'https://www.google.com/maps?q=Chicago,%20IL&output=embed';

    public static function group(): string
    {
        return 'general';
    }
}
