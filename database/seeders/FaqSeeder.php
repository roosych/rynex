<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            [
                'question'   => 'What appliances do you repair?',
                'answer'     => 'We repair refrigerators, washers, dryers, dishwashers, ovens, stoves, ranges, and AC units. Basically all major home appliances — gas or electric.',
                'sort_order' => 1,
            ],
            [
                'question'   => 'Do you offer same-day service?',
                'answer'     => "Yes, in most cases we can send a technician the same day you call. We'll confirm availability when you book — just give us a ring.",
                'sort_order' => 2,
            ],
            [
                'question'   => 'What brands do you service?',
                'answer'     => 'We work on all major brands including Samsung, LG, Whirlpool, GE, Maytag, Bosch, KitchenAid, Frigidaire, and many more.',
                'sort_order' => 3,
            ],
            [
                'question'   => 'Is there a warranty on your repairs?',
                'answer'     => "Yes. All repairs come with a 90-day parts and labor warranty. If something isn't right, we'll come back and fix it at no extra charge.",
                'sort_order' => 4,
            ],
            [
                'question'   => 'Do I need to bring my appliance to a shop?',
                'answer'     => "No — we come to you. All repairs are done at your home. You don't have to haul or disconnect anything. We handle everything on-site.",
                'sort_order' => 5,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::firstOrCreate(['question' => $faq['question']], $faq);
        }
    }
}
