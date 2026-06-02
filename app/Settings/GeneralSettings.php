<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $company_name      = 'Swift Fix';
    public string $tagline           = 'Appliance Repair';
    public string $logo              = '';
    public string $logo_white        = '';
    public string $favicon           = '';
    public string $phone_primary     = '+1 (555) 123-4567';
    public string $phone_secondary   = '+1 (555) 987-6543';
    public string $email                  = 'info@swiftfixappliance.com';
    public string $booking_notify_emails  = 'info@swiftfixappliance.com';
    public string $address           = '3820 Elm St., Dallas, TX 75201';
    public string $latitude          = '32.7767';
    public string $longitude         = '-96.7970';
    public string $hours_weekday     = 'Monday - Friday : 8:00 am to 7:00 pm';
    public string $hours_saturday    = 'Saturday : 9:00 am to 4:00 pm';
    public string $footer_about      = 'Swift Fix is a local appliance repair company. Fast, honest service — backed by a warranty.';
    public string $social_facebook   = '#';
    public string $social_instagram  = '#';
    public string $social_yelp       = '#';
    public string $map_embed_url     = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96737.10562045308!2d-74.08535042841811!3d40.739265258395164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sin!4v1703158537552!5m2!1sen!2sin';

    public static function group(): string
    {
        return 'general';
    }
}
