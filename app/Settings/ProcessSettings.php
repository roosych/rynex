<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class ProcessSettings extends Settings
{
    public string $why_heading         = 'Why Homeowners Call Us — and Keep Calling Us';
    public string $why_description     = 'We show up when we say we will, fix it right the first time, and stand behind every repair. Simple as that.';
    public string $why_feature_1_title = 'Same-day service, most of the time';
    public string $why_feature_1_body  = "We know a broken appliance can't wait. In most cases, we arrive the same day you call — no long waits or vague windows.";
    public string $why_feature_2_title = 'Certified, experienced technicians';
    public string $why_feature_2_body  = 'Our techs are trained on all major brands — Samsung, LG, Whirlpool, GE, Bosch, and more. We get it right the first time.';

    public string $process_heading     = 'Honest repairs done right — every single time';
    public string $process_description = "No upselling. No surprise fees. Just fast, quality work backed by our 90-day repair warranty.";

    public string $how_work_heading     = 'Simple. Fast. Done Right.';
    public string $how_work_description = "Book online or call us — our tech shows up, gives you a straight price, and gets it fixed. No runaround.";
    public string $step_1_title         = 'Call or book online';
    public string $step_1_body          = "Tell us what's broken and when works for you. We'll confirm your appointment quickly — usually within the hour.";
    public string $step_2_title         = 'Technician comes to you';
    public string $step_2_body          = 'Our tech arrives on time, diagnoses the problem, and gives you a clear upfront estimate before any work begins.';
    public string $step_3_title         = 'Fixed and guaranteed';
    public string $step_3_body          = "We repair your appliance and back the work with a 90-day parts & labor warranty. If it's not right, we come back.";

    public string $services_title       = 'We Fix What You Rely On Every Day';
    public string $services_subtitle    = 'Our services';
    public string $services_description = 'Fridge acting up? Washer on the fritz? We handle it all — fast, in-home, and at a price that actually makes sense.';

    public string $blog_title       = 'Straight Talk From Our Technicians';
    public string $blog_subtitle    = 'Latest blog';
    public string $blog_description = 'Maintenance tips, warning signs, and honest advice on when to repair vs. when to replace.';

    public static function group(): string
    {
        return 'process';
    }
}
