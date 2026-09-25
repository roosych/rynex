<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SeoSettings extends Settings
{
    // Home
    public string $home_title       = 'Appliance Repair in Chicago, IL | Same-Day Service | RynexFix';
    public string $home_description = 'Fast, affordable appliance repair in Chicago, IL. We fix refrigerators, washers, dryers, ovens & more. Certified technicians, same-day service, upfront pricing.';

    // About
    public string $about_title       = 'About RynexFix | Appliance Repair Experts in Chicago, IL';
    public string $about_description = 'Learn about RynexFix Appliance Repair — your trusted local appliance repair experts since 2012. Certified technicians, upfront pricing, serving Chicago, IL.';

    // Services index
    public string $services_title       = 'Appliance Repair Services in Chicago, IL | RynexFix';
    public string $services_description = 'RynexFix offers refrigerator, washer, dryer, dishwasher, oven, and AC repair in Chicago, IL. Same-day service and upfront pricing on every job.';

    // Blog index
    public string $blog_title       = 'Appliance Repair Tips & Guides | RynexFix Blog';
    public string $blog_description = 'RynexFix Appliance Repair blog — tips, guides, and advice on keeping your home appliances running longer and saving money on repairs.';

    // Booking
    public string $booking_title       = 'Book Appliance Repair in Chicago, IL | RynexFix';
    public string $booking_description = 'Book a same-day appliance repair with RynexFix in Chicago, IL. Fill out the form and we\'ll confirm your appointment fast. Certified technicians, upfront pricing.';

    // Default Open Graph image (1200×630) used when a page has no image of its own
    public string $default_og_image = '';

    public static function group(): string
    {
        return 'seo';
    }
}
