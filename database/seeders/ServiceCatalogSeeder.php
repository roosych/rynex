<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceCatalogSeeder extends Seeder
{
    /**
     * Full appliance repair catalog. Images are uploaded manually in the
     * admin afterwards, so no 'image' is set here. Idempotent on slug.
     */
    public function run(): void
    {
        $catalog = [
            [
                'title'   => 'Refrigerator Repair',
                'excerpt' => 'Compressor faults, temperature problems, ice maker issues — we fix all major fridge brands fast.',
                'intro'   => 'Your refrigerator runs every single day, so a failure is felt immediately. Our certified technicians diagnose and repair refrigerators from all major brands — same day in most cases, backed by a 90-day warranty.',
                'issues'  => [
                    'Compressor and cooling system failures',
                    'Temperature inconsistency and refrigerant issues',
                    'Ice maker and water dispenser malfunctions',
                    'Defrost system problems and ice buildup',
                    'Door seals, gaskets, and hinge repairs',
                    'Electronic control boards and display panels',
                ],
            ],
            [
                'title'   => 'Freezer Repair',
                'excerpt' => 'Not freezing, frosting over, or running warm? We restore reliable freezing fast.',
                'intro'   => 'A failing freezer puts your food at risk. We repair upright, chest, and built-in freezers from every major brand, getting temperatures back to safe levels quickly.',
                'issues'  => [
                    'Freezer not reaching freezing temperature',
                    'Excessive frost and ice buildup',
                    'Compressor and start-relay failures',
                    'Faulty defrost timers and heaters',
                    'Door seal and gasket leaks',
                    'Thermostat and control board faults',
                ],
            ],
            [
                'title'   => 'Wine Refrigerator Repair',
                'excerpt' => 'Protect your collection — we fix cooling, humidity, and temperature-zone faults.',
                'intro'   => 'Wine coolers need precise, stable temperatures. Our technicians service single- and dual-zone wine refrigerators from all major brands so your collection stays perfectly stored.',
                'issues'  => [
                    'Unit not cooling to the set temperature',
                    'Temperature swings between zones',
                    'Thermoelectric and compressor cooling failures',
                    'Fan and circulation problems',
                    'Door seal, hinge, and glass issues',
                    'Control panel and sensor faults',
                ],
            ],
            [
                'title'   => 'Single & Double Wall Oven Repair',
                'excerpt' => 'Uneven heating, ignition faults, or control errors — gas and electric covered.',
                'intro'   => 'Built-in wall ovens demand precise repair work. We service single and double, gas and electric wall ovens from all major brands, with parts on board for most jobs.',
                'issues'  => [
                    'Oven not heating or overheating',
                    'Uneven baking and temperature calibration',
                    'Igniter, bake, and broil element failures',
                    'Self-cleaning cycle problems',
                    'Door hinges, seals, and glass',
                    'Control boards, sensors, and display faults',
                ],
            ],
            [
                'title'   => 'Stove & Range Repair',
                'excerpt' => 'Burners not igniting, uneven heat, broken controls — gas and electric.',
                'intro'   => 'From a single burner that won\'t light to a range that won\'t heat at all, we repair gas and electric stoves and ranges from every major brand.',
                'issues'  => [
                    'Burner ignition failures (gas & electric)',
                    'Surface elements not heating',
                    'Oven temperature and calibration issues',
                    'Gas valve and igniter replacement',
                    'Control knobs, switches, and boards',
                    'Indicator lights and display faults',
                ],
            ],
            [
                'title'   => 'Cooktop Repair',
                'excerpt' => 'Gas, electric, and induction cooktops — fast, safe repairs.',
                'intro'   => 'A faulty cooktop slows the whole kitchen down. We repair gas, electric, and induction cooktops from all major brands, with a focus on safe, lasting fixes.',
                'issues'  => [
                    'Burners or elements not heating',
                    'Induction zones not detecting cookware',
                    'Ignition clicking or failing to light',
                    'Cracked glass and surface sensor faults',
                    'Inconsistent or stuck heat levels',
                    'Control and touchpad failures',
                ],
            ],
            [
                'title'   => 'Washer Repair',
                'excerpt' => 'Won\'t spin, won\'t drain, leaking, or noisy? Same-day washer repair.',
                'intro'   => 'A broken washer can pile up laundry fast. Our technicians repair top-load and front-load washers from all major brands, usually in a single visit.',
                'issues'  => [
                    'Drum won\'t spin or agitate',
                    'Machine won\'t drain or fill properly',
                    'Leaks from hoses, pump, or door seal',
                    'Excessive vibration or noise during the cycle',
                    'Door latch and lid switch failures',
                    'Control board and electronic faults',
                ],
            ],
            [
                'title'   => 'Dryer Repair',
                'excerpt' => 'Not heating, taking too long, or won\'t start — gas and electric dryers.',
                'intro'   => 'When a dryer stops heating or tumbling, we get it running again fast. We service gas and electric dryers from all major brands, with attention to safe venting.',
                'issues'  => [
                    'Dryer not heating or running cold',
                    'Clothes taking too long to dry',
                    'Drum not turning or making noise',
                    'Faulty thermostats and heating elements',
                    'Igniter and gas valve issues (gas dryers)',
                    'Control board and sensor faults',
                ],
            ],
            [
                'title'   => 'Dishwasher Repair',
                'excerpt' => 'Leaking, not cleaning, or won\'t start — back to work quickly.',
                'intro'   => 'Leaking, not draining, or leaving dishes dirty? We diagnose and repair all major dishwasher brands and stock common parts so most repairs are done in one visit.',
                'issues'  => [
                    'Dishwasher not draining or leaking',
                    'Dishes not getting clean',
                    'Door latch and seal failures',
                    'Pump and motor issues',
                    'Spray arm clogs and water inlet valve problems',
                    'Control board and electronic faults',
                ],
            ],
            [
                'title'   => 'Ice Maker Repair',
                'excerpt' => 'No ice, slow production, or leaks — built-in and standalone units.',
                'intro'   => 'No ice when you need it? We repair built-in, freestanding, and undercounter ice makers from all major brands, restoring reliable production fast.',
                'issues'  => [
                    'No ice or slow ice production',
                    'Ice maker leaking water',
                    'Water inlet valve and line clogs',
                    'Faulty thermostats and sensors',
                    'Frozen or jammed dispensing mechanism',
                    'Control module and motor faults',
                ],
            ],
            [
                'title'   => 'Microwave Repair',
                'excerpt' => 'Not heating, sparking, or dead — countertop and built-in units.',
                'intro'   => 'From a microwave that won\'t heat to one that sparks or won\'t power on, our technicians safely repair countertop, over-the-range, and built-in microwaves.',
                'issues'  => [
                    'Microwave not heating food',
                    'Sparking or arcing inside the cavity',
                    'Turntable not rotating',
                    'Door switch and latch failures',
                    'Keypad and control panel faults',
                    'Faulty magnetron and high-voltage components',
                ],
            ],
            [
                'title'   => 'Vent Hood Repair',
                'excerpt' => 'Weak suction, noisy fans, or dead lights — range hood repair.',
                'intro'   => 'A working vent hood keeps your kitchen clear of smoke and grease. We repair under-cabinet, wall-mount, and island range hoods from all major brands.',
                'issues'  => [
                    'Weak or no suction',
                    'Fan motor noise or failure',
                    'Lights not working',
                    'Faulty speed controls and switches',
                    'Damper and ducting problems',
                    'Control board and wiring faults',
                ],
            ],
            [
                'title'   => 'Downdraft Repair',
                'excerpt' => 'Won\'t raise, weak extraction, or motor faults — downdraft ventilation.',
                'intro'   => 'Downdraft ventilation systems have moving parts that wear over time. We repair retractable and fixed downdraft units from all major brands.',
                'issues'  => [
                    'Downdraft won\'t raise or lower',
                    'Weak smoke and odor extraction',
                    'Blower motor noise or failure',
                    'Lift motor and mechanism faults',
                    'Control switch and board problems',
                    'Damper and ducting issues',
                ],
            ],
            [
                'title'   => 'Warmer Drawer Repair',
                'excerpt' => 'Not heating or holding temperature — warming drawer service.',
                'intro'   => 'A warming drawer keeps meals at the perfect serving temperature. We repair built-in warming drawers from all major brands quickly and safely.',
                'issues'  => [
                    'Drawer not heating',
                    'Not holding the set temperature',
                    'Faulty heating elements',
                    'Thermostat and sensor failures',
                    'Control knob and board faults',
                    'Drawer glide and seal issues',
                ],
            ],
            [
                'title'   => 'Gas Grill Repair',
                'excerpt' => 'Won\'t ignite, uneven flames, or low heat — built-in and freestanding grills.',
                'intro'   => 'Keep grilling season going. We repair built-in and freestanding gas grills from all major brands, with a focus on safe gas connections and reliable ignition.',
                'issues'  => [
                    'Burners won\'t ignite',
                    'Uneven flames or low heat output',
                    'Igniter and electrode failures',
                    'Gas valve and regulator issues',
                    'Clogged burner ports',
                    'Rotisserie motor and control faults',
                ],
            ],
            [
                'title'   => 'Garbage Disposal Repair',
                'excerpt' => 'Jammed, humming, leaking, or dead — fast disposal repair and replacement.',
                'intro'   => 'A jammed or leaking garbage disposal is a quick fix for our technicians. We repair and replace disposals from all major brands and get your sink working again.',
                'issues'  => [
                    'Disposal jammed or humming but not turning',
                    'Unit completely dead or won\'t reset',
                    'Leaks from the housing or connections',
                    'Excessive noise during operation',
                    'Clogs and drainage problems',
                    'Motor and switch failures',
                ],
            ],
        ];

        foreach ($catalog as $index => $item) {
            $slug = Str::slug($item['title']);

            $issues  = collect($item['issues'])
                ->map(fn ($issue) => '                    <li>' . $issue . '</li>')
                ->implode("\n");

            $content = '
                <p class="wow fadeInUp">' . $item['intro'] . '</p>
                <ul class="wow fadeInUp" data-wow-delay="0.2s">
' . $issues . '
                </ul>
                <div class="service-care-box">
                    <h2 class="text-anime-style-3" data-cursor="-opaque">What\'s Covered in Our ' . $item['title'] . ' Service</h2>
                    <p class="wow fadeInUp">We run a full diagnostic before quoting any repair, carry OEM-compatible parts on board, and back every job with our 90-day warranty.</p>
                </div>';

            Service::updateOrCreate(
                ['slug' => $slug],
                [
                    'title'            => $item['title'],
                    'meta_description' => 'Professional ' . $item['title'] . ' in Chicago, IL. Rynex Fix technicians fix all major brands same day — backed by a 90-day warranty.',
                    'excerpt'          => $item['excerpt'],
                    'content'          => $content,
                    'sort_order'       => $index + 1,
                    'is_active'        => true,
                ]
            );
        }
    }
}
