<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class AboutSettings extends Settings
{
    public string $heading             = 'Your Trusted Appliance Repair Experts Since 2012';
    public string $description         = "We're a local appliance repair company with over 12 years of experience. We fix what you rely on every day — fast and right the first time.";
    public int    $technicians         = 15;
    public int    $satisfaction_rate   = 98;
    public int    $years_experience    = 12;
    public int    $appliances_repaired = 5000;
    public int    $cities_served       = 50;

    public string $technicians_label         = 'Certified technicians';
    public string $satisfaction_rate_label   = 'customer satisfaction rate';
    public string $years_experience_label    = 'years of experience';
    public string $appliances_repaired_label = 'appliances repaired';
    public string $cities_served_label       = 'cities & zip codes served';

    public string $mission_title = 'our mission';
    public string $mission_text  = 'To deliver fast, reliable appliance repair with upfront pricing and zero surprises — every single time.';
    public string $vision_title  = 'our vision';
    public string $vision_text   = 'To be the most trusted appliance repair company in Dallas — known for honesty, speed, and lasting results.';
    public string $values_title  = 'our values';
    public string $values_text   = 'Integrity, transparency, and craftsmanship. We treat every home like our own and every repair like it matters.';

    public static function group(): string
    {
        return 'about';
    }
}
