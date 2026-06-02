<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title'            => 'Refrigerator Repair',
                'slug'             => 'refrigerator-repair',
                'meta_description' => 'Professional refrigerator repair in Dallas, TX. Swift Fix technicians diagnose and fix all fridge brands same day — backed by a 90-day warranty.',
                'excerpt'          => 'Compressor issues, temperature problems, ice maker faults — we fix all major fridge brands fast.',
                'image'            => '/template/images/template/careref.jpg',
                'sort_order'       => 1,
                'content'          => '
                <p class="wow fadeInUp">Your refrigerator runs every single day — and when it stops working properly, the impact is immediate. At Swift Fix, our certified technicians diagnose and repair refrigerators from all major brands, including Samsung, LG, Whirlpool, GE, Maytag, Frigidaire, and more. Most repairs are completed in a single visit.</p>
                <p class="wow fadeInUp" data-wow-delay="0.2s">We carry a full inventory of OEM-compatible parts in our service vehicles, which means we can fix most issues on the spot without waiting for parts to ship. Every refrigerator repair is backed by our 90-day warranty.</p>
                <ul class="wow fadeInUp" data-wow-delay="0.4s">
                    <li>Compressor and cooling system failures</li>
                    <li>Temperature inconsistency and refrigerant issues</li>
                    <li>Ice maker and water dispenser malfunctions</li>
                    <li>Defrost system problems and ice buildup</li>
                    <li>Door seals, gaskets, and hinge repairs</li>
                    <li>Electronic control boards and display panels</li>
                </ul>
                <div class="service-care-box">
                    <h2 class="text-anime-style-3" data-cursor="-opaque">What\'s Covered in Our Refrigerator Repair Service</h2>
                    <p class="wow fadeInUp">Whether your fridge is running warm, leaking water, making strange noises, or simply won\'t turn on — our technicians have seen it all. We run a full diagnostic before quoting any repair.</p>
                </div>',
            ],
            [
                'title'            => 'Washer & Dryer Repair',
                'slug'             => 'washer-dryer-repair',
                'meta_description' => 'Washer and dryer repair in Dallas, TX. Swift Fix technicians fix all brands same day — backed by a 90-day warranty.',
                'excerpt'          => 'Won\'t spin, won\'t drain, or won\'t heat? Same-day repair for all brands.',
                'image'            => '/template/images/template/carewash.jpg',
                'sort_order'       => 2,
                'content'          => '
                <p class="wow fadeInUp">Won\'t spin, won\'t drain, or won\'t heat? Our certified technicians fix washers and dryers from all major brands — Whirlpool, LG, Samsung, GE, Maytag, and more.</p>
                <ul class="wow fadeInUp" data-wow-delay="0.2s">
                    <li>Drum won\'t spin or agitate</li>
                    <li>Machine won\'t drain or fill properly</li>
                    <li>Excessive vibration or noise during cycle</li>
                    <li>Dryer not heating or taking too long</li>
                    <li>Control panel and electronic faults</li>
                    <li>Door latch, seal, and hinge issues</li>
                </ul>',
            ],
            [
                'title'            => 'Dishwasher Repair',
                'slug'             => 'dishwasher-repair',
                'meta_description' => 'Dishwasher repair in Dallas, TX. Swift Fix fixes leaks, clogs, and electrical issues same day — backed by a 90-day warranty.',
                'excerpt'          => 'Leaking, not cleaning, or won\'t start — we get your dishwasher back to work quickly.',
                'image'            => '/template/images/template/caredish.jpg',
                'sort_order'       => 3,
                'content'          => '
                <p class="wow fadeInUp">Leaking, not cleaning, or won\'t start — our technicians diagnose and repair all major dishwasher brands. We stock common parts so most repairs are done in one visit.</p>
                <ul class="wow fadeInUp" data-wow-delay="0.2s">
                    <li>Dishwasher not draining or leaking</li>
                    <li>Dishes not getting clean</li>
                    <li>Door latch and seal failures</li>
                    <li>Control board and electronic faults</li>
                    <li>Pump and motor issues</li>
                    <li>Spray arm clogs and water inlet valve problems</li>
                </ul>',
            ],
            [
                'title'            => 'Oven & Stove Repair',
                'slug'             => 'oven-stove-repair',
                'meta_description' => 'Oven and stove repair in Dallas, TX. Gas and electric — Swift Fix fixes all makes and models same day.',
                'excerpt'          => 'Burners not igniting, uneven heating, broken controls — gas and electric covered.',
                'image'            => '/template/images/template/service-maintenance-worker-repairing.jpg',
                'sort_order'       => 4,
                'content'          => '
                <p class="wow fadeInUp">Burners not igniting, uneven heating, broken controls — we handle gas and electric ovens, stoves, and ranges from all major brands.</p>
                <ul class="wow fadeInUp" data-wow-delay="0.2s">
                    <li>Burner ignition failures (gas &amp; electric)</li>
                    <li>Oven not heating or overheating</li>
                    <li>Temperature calibration issues</li>
                    <li>Control board and thermostat faults</li>
                    <li>Self-cleaning cycle problems</li>
                    <li>Gas valve and igniter replacement</li>
                </ul>',
            ],
            [
                'title'            => 'AC / HVAC Repair',
                'slug'             => 'ac-hvac-repair',
                'meta_description' => 'AC and HVAC repair in Dallas, TX. Swift Fix keeps your home comfortable — same-day service, 90-day warranty.',
                'excerpt'          => 'Cooling issues, strange noises, or inefficient performance — year-round comfort service.',
                'image'            => '/template/images/template/XXXL.webp',
                'sort_order'       => 5,
                'content'          => '
                <p class="wow fadeInUp">Cooling issues, strange noises, or inefficient performance — keep your home comfortable year-round with our AC and HVAC repair service.</p>
                <ul class="wow fadeInUp" data-wow-delay="0.2s">
                    <li>AC not cooling or blowing warm air</li>
                    <li>Refrigerant leaks and recharging</li>
                    <li>Compressor and motor failures</li>
                    <li>Thermostat and control issues</li>
                    <li>Clogged filters and drainage problems</li>
                    <li>Strange noises during operation</li>
                </ul>',
            ],
            [
                'title'            => 'Same-Day Emergency Repair',
                'slug'             => 'same-day-emergency-repair',
                'meta_description' => 'Same-day emergency appliance repair in Dallas, TX. Swift Fix responds fast — 90-day warranty on all repairs.',
                'excerpt'          => 'Appliance down at the worst time? We offer same-day emergency service across the Dallas area.',
                'image'            => '/template/images/template/athome.jpg',
                'sort_order'       => 6,
                'content'          => '
                <p class="wow fadeInUp">Appliance down at the worst time? We offer same-day emergency service across the Dallas area. Call us in the morning and we\'ll be there before dinner.</p>
                <ul class="wow fadeInUp" data-wow-delay="0.2s">
                    <li>Same-day scheduling available most days</li>
                    <li>All major home appliances covered</li>
                    <li>Certified technician arrives with parts on board</li>
                    <li>Upfront pricing before any work begins</li>
                    <li>90-day warranty on all repairs</li>
                </ul>',
            ],
        ];

        foreach ($services as $data) {
            Service::create($data);
        }
    }
}
