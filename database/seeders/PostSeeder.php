<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'title'            => '5 Signs Your Refrigerator Is About to Break Down',
                'slug'             => 'refrigerator-signs-breakdown',
                'meta_description' => 'Learn the 5 warning signs that your refrigerator is about to break down — and what to do before a small issue becomes an expensive repair.',
                'category'         => 'Refrigerator',
                'published_at'     => '2025-05-08',
                'image'            => '/template/images/template/careref.jpg',
                'content'          => '
                <p>Most refrigerator failures don\'t happen suddenly. There are almost always warning signs — you just need to know what to look for. Here are the five most common signals that your fridge is heading for trouble.</p>
                <h2>1. It\'s Running Constantly</h2>
                <p>Your refrigerator should cycle on and off throughout the day. If it\'s running nonstop, the compressor or condenser coils may be struggling to maintain temperature.</p>
                <h2>2. The Inside Isn\'t Staying Cold</h2>
                <p>If food is spoiling faster than usual or your drinks aren\'t getting cold, there\'s likely a problem with the thermostat, compressor, or refrigerant level.</p>
                <h2>3. There\'s Excessive Frost or Ice Buildup</h2>
                <p>Heavy frost in the freezer or ice forming in places it shouldn\'t is usually a sign that the defrost system has failed.</p>
                <h2>4. You Hear Strange Noises</h2>
                <p>Clicking, buzzing, rattling, or humming that\'s louder than usual often points to a failing compressor, condenser fan, or evaporator fan.</p>
                <h2>5. There\'s Water Pooling Inside or Underneath</h2>
                <p>Leaking water is typically caused by a clogged defrost drain or a faulty water inlet valve. Left unchecked, it can cause floor damage and mold growth.</p>
                <p><strong>If you notice any of these signs, don\'t wait.</strong> Call Swift Fix and we\'ll send a technician the same day to diagnose the problem before it becomes a full breakdown.</p>',
            ],
            [
                'title'            => 'Is Your Washer Shaking Too Much? What It Really Means',
                'slug'             => 'washer-shaking-what-it-means',
                'meta_description' => 'Excessive vibration from your washing machine is more than annoying — it can signal serious mechanical issues. Learn what causes it and how to fix it.',
                'category'         => 'Washer',
                'published_at'     => '2025-04-29',
                'image'            => '/template/images/template/carewash.jpg',
                'content'          => '
                <p>Some vibration during a spin cycle is normal. But if your washer is shaking violently, walking across the floor, or making loud banging sounds, something is wrong. Here\'s what it usually means.</p>
                <h2>Uneven Load Distribution</h2>
                <p>The most common cause of washer vibration is an unbalanced load. Heavy items like jeans or towels can clump together during the spin cycle. Redistribute the load and try again.</p>
                <h2>Worn Drum Bearings</h2>
                <p>If the shaking is accompanied by a grinding or roaring noise, the drum bearings may be worn out. This gets worse over time and can eventually damage the drum shaft.</p>
                <h2>Damaged Shock Absorbers or Suspension Rods</h2>
                <p>Front-load washers use shock absorbers; top-load machines use suspension rods. When these wear out, the drum has nothing to dampen its movement during spin cycles.</p>
                <h2>Loose or Missing Shipping Bolts</h2>
                <p>On new machines, this is the most common cause. Shipping bolts must be removed before use — if they\'re still in place, the drum can\'t move freely.</p>
                <h2>Leveling Issues</h2>
                <p>Check that all four feet are in firm contact with the floor. An uneven machine will shake and vibrate no matter how balanced the load is.</p>
                <p><strong>If basic troubleshooting doesn\'t stop the shaking</strong>, the problem is likely mechanical. Our technicians can diagnose it the same day and give you an upfront quote before any work begins.</p>',
            ],
            [
                'title'            => 'How to Extend the Life of Your Dishwasher',
                'slug'             => 'how-to-extend-dishwasher-life',
                'meta_description' => 'Simple maintenance habits that keep your dishwasher running efficiently and help you avoid costly repairs.',
                'category'         => 'Dishwasher',
                'published_at'     => '2025-04-15',
                'image'            => '/template/images/template/caredish.jpg',
                'content'          => '
                <p>A well-maintained dishwasher can last 10–15 years. Neglect it, and you\'ll be looking at repairs — or a replacement — much sooner. Here are the most impactful things you can do to extend its life.</p>
                <h2>Clean the Filter Monthly</h2>
                <p>Most modern dishwashers have a removable filter at the bottom of the tub. Food debris collects here and, if ignored, causes odors, poor cleaning performance, and drainage problems. Rinse it under running water monthly.</p>
                <h2>Run Hot Water Before Starting a Cycle</h2>
                <p>Before you start a wash cycle, run the hot water at your kitchen sink for 30 seconds. This ensures the dishwasher starts with hot water rather than waiting for the line to heat up — which improves cleaning and reduces strain on the heating element.</p>
                <h2>Don\'t Overload It</h2>
                <p>Overloading blocks the spray arms and prevents water from reaching all surfaces. It also puts stress on the racks and can bend or break them over time.</p>
                <h2>Clean the Door Seal Regularly</h2>
                <p>The rubber gasket around the door can accumulate mold and debris. Wipe it down monthly with a damp cloth to prevent leaks and keep the seal flexible.</p>
                <h2>Run a Cleaning Cycle Once a Month</h2>
                <p>Use a dishwasher cleaner tablet or a cup of white vinegar in the bottom rack on an empty hot cycle. This removes mineral buildup and keeps the interior fresh.</p>
                <p><strong>Even with good maintenance</strong>, dishwashers eventually develop issues. If yours is leaking, not cleaning properly, or making unusual sounds, call Swift Fix — we\'ll be there the same day.</p>',
            ],
            [
                'title'            => 'Why Is My Refrigerator Not Cooling? Common Causes & Fixes',
                'slug'             => 'why-is-my-refrigerator-not-cooling',
                'meta_description' => 'Is your refrigerator not keeping food cold? Discover the most common causes and whether you need a repair.',
                'category'         => 'Refrigerator',
                'published_at'     => '2025-05-01',
                'image'            => '/template/images/template/careref.jpg',
                'content'          => '
                <p>A refrigerator that\'s not cooling is one of the most urgent appliance problems a homeowner can face. Here are the most common causes — and what to do about them.</p>
                <h2>Dirty Condenser Coils</h2>
                <p>Condenser coils release heat from the refrigerant. When they\'re caked with dust and debris, the fridge has to work harder and cooling efficiency drops significantly. Cleaning the coils is a simple fix that often restores performance immediately.</p>
                <h2>Faulty Evaporator Fan</h2>
                <p>The evaporator fan circulates cold air from the freezer into the refrigerator compartment. If it fails, the fridge warms up even while the freezer stays cold.</p>
                <h2>Compressor Problems</h2>
                <p>The compressor is the heart of your refrigerator. A failing compressor often causes the fridge to run constantly without achieving proper temperatures. This is a more complex repair but one our technicians handle regularly.</p>
                <h2>Refrigerant Leak</h2>
                <p>Low refrigerant causes gradual cooling loss. Signs include the fridge running non-stop and frost forming in unexpected places. Refrigerant work requires a certified technician.</p>
                <h2>Blocked Air Vents</h2>
                <p>Sometimes the fix is as simple as rearranging food. Overpacked shelves can block the internal air vents that circulate cold air between compartments.</p>
                <p><strong>If basic checks don\'t resolve the issue</strong>, call Swift Fix. We diagnose refrigerators same-day and carry most common parts in our trucks.</p>',
            ],
            [
                'title'            => '5 Signs Your Washer Needs a Repair (Don\'t Ignore These)',
                'slug'             => '5-signs-your-washer-needs-repair',
                'meta_description' => '5 warning signs your washing machine needs professional repair — before a small problem becomes a big one.',
                'category'         => 'Washer',
                'published_at'     => '2025-04-20',
                'image'            => '/template/images/template/carewash.jpg',
                'content'          => '
                <p>Washing machines give off warning signs before they fail completely. Catching these early can save you from a flooded laundry room and an expensive replacement.</p>
                <h2>1. It\'s Leaking Water</h2>
                <p>Even a small puddle under or around your washer is a red flag. Common causes include a cracked hose, worn door seal (front-loaders), or a faulty pump.</p>
                <h2>2. Clothes Are Coming Out Still Dirty</h2>
                <p>If your clothes aren\'t getting clean, the issue could be a broken agitator, clogged pump, or faulty water inlet valve that\'s not filling the drum properly.</p>
                <h2>3. It Won\'t Spin or Drain</h2>
                <p>A drum that won\'t spin or water that won\'t drain usually points to a failed lid switch (top-loaders), worn drum belt, or clogged drain pump filter.</p>
                <h2>4. It Smells Bad</h2>
                <p>A musty odor — especially in front-loaders — often means mold has built up in the door seal or drum. This can worsen over time and transfer to your clothes.</p>
                <h2>5. Excessive Noise or Vibration</h2>
                <p>Banging, grinding, or unusual vibration during the spin cycle is a sign of worn bearings, damaged shock absorbers, or a failing motor.</p>
                <p><strong>Don\'t wait until it stops working entirely.</strong> Call Swift Fix for same-day washer repair — we\'ll diagnose the issue and give you an honest upfront quote.</p>',
            ],
            [
                'title'            => 'How to Extend the Life of Your Dishwasher',
                'slug'             => 'how-to-extend-life-of-your-dishwasher',
                'meta_description' => 'Simple maintenance habits that keep your dishwasher running efficiently for years.',
                'category'         => 'Dishwasher',
                'published_at'     => '2025-04-10',
                'image'            => '/template/images/template/caredish.jpg',
                'content'          => '
                <p>A well-maintained dishwasher can last 10–15 years. Here are the most effective habits to extend its life and avoid costly repairs.</p>
                <h2>Clean the Filter Monthly</h2>
                <p>Food debris collects in the filter and causes odors, poor cleaning, and drainage problems. Rinse it under running water once a month.</p>
                <h2>Don\'t Overload It</h2>
                <p>Overloading blocks the spray arms, stresses the racks, and reduces cleaning performance. Leave space between items.</p>
                <h2>Run a Cleaning Cycle Monthly</h2>
                <p>Use a dishwasher cleaner or a cup of white vinegar in an empty hot cycle to remove mineral buildup and keep the interior fresh.</p>
                <p><strong>If your dishwasher is leaking or not cleaning properly</strong>, call Swift Fix for same-day diagnosis.</p>',
            ],
        ];

        foreach ($posts as $data) {
            Post::create($data);
        }
    }
}
