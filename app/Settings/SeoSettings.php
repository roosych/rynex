<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SeoSettings extends Settings
{
    // Home
    public string $home_title       = 'Appliance Repair in Chicago, IL | Same-Day Service | Rynex Fix';
    public string $home_description = 'Fast, affordable appliance repair in Chicago, IL. We fix refrigerators, washers, dryers, ovens & more. Certified technicians, same-day service, 90-day warranty.';

    // About
    public string $about_title       = 'About Rynex Fix | Appliance Repair Experts in Chicago, IL';
    public string $about_description = 'Learn about Rynex Fix Appliance Repair — your trusted local appliance repair experts since 2012. Certified technicians, 90-day warranty, serving Chicago, IL.';

    // Services index
    public string $services_title       = 'Appliance Repair Services in Chicago, IL | Rynex Fix';
    public string $services_description = 'Rynex Fix offers refrigerator, washer, dryer, dishwasher, oven, and AC repair in Chicago, IL. Same-day service, upfront pricing, 90-day warranty.';

    // Blog index
    public string $blog_title       = 'Appliance Repair Tips & Guides | Rynex Fix Blog';
    public string $blog_description = 'Rynex Fix Appliance Repair blog — tips, guides, and advice on keeping your home appliances running longer and saving money on repairs.';

    // Booking
    public string $booking_title       = 'Book Appliance Repair in Chicago, IL | Rynex Fix';
    public string $booking_description = 'Book a same-day appliance repair with Rynex Fix in Chicago, IL. Fill out the form and we\'ll confirm your appointment fast. Certified technicians, 90-day warranty.';

    // Default Open Graph image (1200×630) used when a page has no image of its own
    public string $default_og_image = '';

    public static function group(): string
    {
        return 'seo';
    }
}
