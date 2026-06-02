<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $rows = [
            // ── General ──────────────────────────────────────────
            ['group' => 'general', 'name' => 'company_name',     'payload' => json_encode('Rynex Fix')],
            ['group' => 'general', 'name' => 'tagline',          'payload' => json_encode('Appliance Repair')],
            ['group' => 'general', 'name' => 'phone_primary',    'payload' => json_encode('+1 (555) 123-4567')],
            ['group' => 'general', 'name' => 'phone_secondary',  'payload' => json_encode('+1 (555) 987-6543')],
            ['group' => 'general', 'name' => 'email',            'payload' => json_encode('info@rynexfix.com')],
            ['group' => 'general', 'name' => 'booking_notify_emails', 'payload' => json_encode('info@rynexfix.com')],
            ['group' => 'general', 'name' => 'address',          'payload' => json_encode('Chicago, IL')],
            ['group' => 'general', 'name' => 'latitude',         'payload' => json_encode('41.8781')],
            ['group' => 'general', 'name' => 'longitude',        'payload' => json_encode('-87.6298')],
            ['group' => 'general', 'name' => 'hours_weekday',    'payload' => json_encode('Monday - Friday : 8:00 am to 7:00 pm')],
            ['group' => 'general', 'name' => 'hours_saturday',   'payload' => json_encode('Saturday : 9:00 am to 4:00 pm')],
            ['group' => 'general', 'name' => 'footer_about',     'payload' => json_encode('Rynex Fix is a local appliance repair company. Fast, honest service — backed by a warranty.')],
            ['group' => 'general', 'name' => 'social_facebook',  'payload' => json_encode('#')],
            ['group' => 'general', 'name' => 'social_instagram', 'payload' => json_encode('#')],
            ['group' => 'general', 'name' => 'social_yelp',      'payload' => json_encode('#')],
            ['group' => 'general', 'name' => 'map_embed_url',    'payload' => json_encode('https://www.google.com/maps?q=Chicago,%20IL&output=embed')],

            // ── Hero ─────────────────────────────────────────────
            ['group' => 'hero', 'name' => 'title',    'payload' => json_encode('We Fix It Today. Guaranteed.')],
            ['group' => 'hero', 'name' => 'subtitle', 'payload' => json_encode('Local techs. Upfront pricing. 90-day warranty on every repair.')],

            // ── About ────────────────────────────────────────────
            ['group' => 'about', 'name' => 'heading',             'payload' => json_encode('Your Trusted Appliance Repair Experts Since 2012')],
            ['group' => 'about', 'name' => 'description',         'payload' => json_encode("We're a local appliance repair company with over 12 years of experience. We fix what you rely on every day — fast and right the first time.")],
            ['group' => 'about', 'name' => 'technicians',         'payload' => json_encode(15)],
            ['group' => 'about', 'name' => 'satisfaction_rate',   'payload' => json_encode(98)],
            ['group' => 'about', 'name' => 'years_experience',    'payload' => json_encode(12)],
            ['group' => 'about', 'name' => 'appliances_repaired', 'payload' => json_encode(5000)],
            ['group' => 'about', 'name' => 'cities_served',       'payload' => json_encode(50)],
            ['group' => 'about', 'name' => 'mission_title',       'payload' => json_encode('our mission')],
            ['group' => 'about', 'name' => 'mission_text',        'payload' => json_encode('To deliver fast, reliable appliance repair with upfront pricing and zero surprises — every single time.')],
            ['group' => 'about', 'name' => 'vision_title',        'payload' => json_encode('our vision')],
            ['group' => 'about', 'name' => 'vision_text',         'payload' => json_encode('To be the most trusted appliance repair company in Chicago — known for honesty, speed, and lasting results.')],
            ['group' => 'about', 'name' => 'values_title',        'payload' => json_encode('our values')],
            ['group' => 'about', 'name' => 'values_text',         'payload' => json_encode('Integrity, transparency, and craftsmanship. We treat every home like our own and every repair like it matters.')],

            // ── Process / Sections ────────────────────────────────
            ['group' => 'process', 'name' => 'why_heading',         'payload' => json_encode('Why Homeowners Call Us — and Keep Calling Us')],
            ['group' => 'process', 'name' => 'why_description',     'payload' => json_encode('We show up when we say we will, fix it right the first time, and stand behind every repair. Simple as that.')],
            ['group' => 'process', 'name' => 'why_feature_1_title', 'payload' => json_encode('Same-day service, most of the time')],
            ['group' => 'process', 'name' => 'why_feature_1_body',  'payload' => json_encode("We know a broken appliance can't wait. In most cases, we arrive the same day you call — no long waits or vague windows.")],
            ['group' => 'process', 'name' => 'why_feature_2_title', 'payload' => json_encode('Certified, experienced technicians')],
            ['group' => 'process', 'name' => 'why_feature_2_body',  'payload' => json_encode('Our techs are trained on all major brands — Samsung, LG, Whirlpool, GE, Bosch, and more. We get it right the first time.')],
            ['group' => 'process', 'name' => 'process_heading',     'payload' => json_encode('Honest repairs done right — every single time')],
            ['group' => 'process', 'name' => 'process_description', 'payload' => json_encode("No upselling. No surprise fees. Just fast, quality work backed by our 90-day repair warranty.")],
            ['group' => 'process', 'name' => 'how_work_heading',     'payload' => json_encode('Simple. Fast. Done Right.')],
            ['group' => 'process', 'name' => 'how_work_description', 'payload' => json_encode("Book online or call us — our tech shows up, gives you a straight price, and gets it fixed. No runaround.")],
            ['group' => 'process', 'name' => 'step_1_title',         'payload' => json_encode('Call or book online')],
            ['group' => 'process', 'name' => 'step_1_body',          'payload' => json_encode("Tell us what's broken and when works for you. We'll confirm your appointment quickly — usually within the hour.")],
            ['group' => 'process', 'name' => 'step_2_title',         'payload' => json_encode('Technician comes to you')],
            ['group' => 'process', 'name' => 'step_2_body',          'payload' => json_encode('Our tech arrives on time, diagnoses the problem, and gives you a clear upfront estimate before any work begins.')],
            ['group' => 'process', 'name' => 'step_3_title',         'payload' => json_encode('Fixed and guaranteed')],
            ['group' => 'process', 'name' => 'step_3_body',          'payload' => json_encode("We repair your appliance and back the work with a 90-day parts & labor warranty. If it's not right, we come back.")],
            ['group' => 'process', 'name' => 'services_title',       'payload' => json_encode('We Fix What You Rely On Every Day')],
            ['group' => 'process', 'name' => 'services_subtitle',    'payload' => json_encode('Our services')],
            ['group' => 'process', 'name' => 'services_description', 'payload' => json_encode('Fridge acting up? Washer on the fritz? We handle it all — fast, in-home, and at a price that actually makes sense.')],
            ['group' => 'process', 'name' => 'blog_title',           'payload' => json_encode('Straight Talk From Our Technicians')],
            ['group' => 'process', 'name' => 'blog_subtitle',        'payload' => json_encode('Latest blog')],
            ['group' => 'process', 'name' => 'blog_description',     'payload' => json_encode('Maintenance tips, warning signs, and honest advice on when to repair vs. when to replace.')],

            // ── Benefits ──────────────────────────────────────────
            ['group' => 'benefits', 'name' => 'heading',     'payload' => json_encode('No Gimmicks. No Surprises. Just Great Repairs.')],
            ['group' => 'benefits', 'name' => 'description', 'payload' => json_encode("Here's exactly what you get every time you call us — from the first ring to the final fix.")],
            ['group' => 'benefits', 'name' => 'b1_title',    'payload' => json_encode('certified technicians')],
            ['group' => 'benefits', 'name' => 'b1_desc',     'payload' => json_encode('Factory-trained on all major brands — Samsung, GE, LG, Whirlpool, and more')],
            ['group' => 'benefits', 'name' => 'b2_title',    'payload' => json_encode('same-day service')],
            ['group' => 'benefits', 'name' => 'b2_desc',     'payload' => json_encode('We often arrive the same day you call — no long waits or multi-day scheduling')],
            ['group' => 'benefits', 'name' => 'b3_title',    'payload' => json_encode('upfront pricing')],
            ['group' => 'benefits', 'name' => 'b3_desc',     'payload' => json_encode("You'll know the cost before we start. No hidden fees, ever")],
            ['group' => 'benefits', 'name' => 'b4_title',    'payload' => json_encode('all major brands')],
            ['group' => 'benefits', 'name' => 'b4_desc',     'payload' => json_encode('We service Whirlpool, Samsung, LG, GE, Maytag, Bosch, KitchenAid, and more')],
            ['group' => 'benefits', 'name' => 'b5_title',    'payload' => json_encode('90-day warranty')],
            ['group' => 'benefits', 'name' => 'b5_desc',     'payload' => json_encode('All repairs come with a 90-day parts and labor guarantee. We stand behind our work')],
            ['group' => 'benefits', 'name' => 'b6_title',    'payload' => json_encode('in-home repair')],
            ['group' => 'benefits', 'name' => 'b6_desc',     'payload' => json_encode('We come to your home — no hauling appliances to a shop')],

            // ── SEO (per-page meta) ───────────────────────────────
            ['group' => 'seo', 'name' => 'home_title',          'payload' => json_encode('Appliance Repair in Chicago, IL | Same-Day Service | Rynex Fix')],
            ['group' => 'seo', 'name' => 'home_description',     'payload' => json_encode('Fast, affordable appliance repair in Chicago, IL. We fix refrigerators, washers, dryers, ovens & more. Certified technicians, same-day service, 90-day warranty.')],
            ['group' => 'seo', 'name' => 'about_title',         'payload' => json_encode('About Rynex Fix | Appliance Repair Experts in Chicago, IL')],
            ['group' => 'seo', 'name' => 'about_description',   'payload' => json_encode('Learn about Rynex Fix Appliance Repair — your trusted local appliance repair experts since 2012. Certified technicians, 90-day warranty, serving Chicago, IL.')],
            ['group' => 'seo', 'name' => 'services_title',      'payload' => json_encode('Appliance Repair Services in Chicago, IL | Rynex Fix')],
            ['group' => 'seo', 'name' => 'services_description','payload' => json_encode('Rynex Fix offers refrigerator, washer, dryer, dishwasher, oven, and AC repair in Chicago, IL. Same-day service, upfront pricing, 90-day warranty.')],
            ['group' => 'seo', 'name' => 'blog_title',          'payload' => json_encode('Appliance Repair Tips & Guides | Rynex Fix Blog')],
            ['group' => 'seo', 'name' => 'blog_description',    'payload' => json_encode('Rynex Fix Appliance Repair blog — tips, guides, and advice on keeping your home appliances running longer and saving money on repairs.')],
            ['group' => 'seo', 'name' => 'booking_title',       'payload' => json_encode('Book Appliance Repair in Chicago, IL | Rynex Fix')],
            ['group' => 'seo', 'name' => 'booking_description', 'payload' => json_encode('Book a same-day appliance repair with Rynex Fix in Chicago, IL. Fill out the form and we\'ll confirm your appointment fast. Certified technicians, 90-day warranty.')],
        ];

        foreach ($rows as &$row) {
            $row['locked']     = false;
            $row['created_at'] = $now;
            $row['updated_at'] = $now;
        }

        DB::table('settings')->upsert($rows, ['group', 'name'], ['payload', 'updated_at']);
    }
}
