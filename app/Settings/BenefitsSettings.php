<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class BenefitsSettings extends Settings
{
    public string $heading     = 'No Gimmicks. No Surprises. Just Great Repairs.';
    public string $description = "Here's exactly what you get every time you call us — from the first ring to the final fix.";

    public string $b1_title = 'certified technicians';
    public string $b1_desc  = 'Factory-trained on all major brands — Samsung, GE, LG, Whirlpool, and more';

    public string $b2_title = 'same-day service';
    public string $b2_desc  = 'We often arrive the same day you call — no long waits or multi-day scheduling';

    public string $b3_title = 'upfront pricing';
    public string $b3_desc  = "You'll know the cost before we start. No hidden fees, ever";

    public string $b4_title = 'all major brands';
    public string $b4_desc  = 'We service Whirlpool, Samsung, LG, GE, Maytag, Bosch, KitchenAid, and more';

    public string $b5_title = '90-day warranty';
    public string $b5_desc  = 'All repairs come with a 90-day parts and labor guarantee. We stand behind our work';

    public string $b6_title = 'in-home repair';
    public string $b6_desc  = 'We come to your home — no hauling appliances to a shop';

    public static function group(): string
    {
        return 'benefits';
    }
}
