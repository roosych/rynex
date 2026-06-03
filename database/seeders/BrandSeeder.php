<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [
            'Samsung',
            'LG',
            'Whirlpool',
            'GE',
            'Maytag',
            'Bosch',
            'KitchenAid',
            'Frigidaire',
            'Kenmore',
            'Electrolux',
            'Sub-Zero',
            'Viking',
            'Miele',
            'Amana',
            'Other',
        ];

        foreach ($brands as $i => $name) {
            Brand::firstOrCreate(
                ['name' => $name],
                ['is_active' => true, 'sort_order' => $i]
            );
        }
    }
}
