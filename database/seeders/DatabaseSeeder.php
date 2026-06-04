<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@rynexfix.com'],
            [
                'name'     => 'Rynex Fix Admin',
                'password' => Hash::make('admin123'),
            ]
        );

        $this->call([
            ServiceCatalogSeeder::class,
            PostSeeder::class,
            SettingsSeeder::class,
            FaqSeeder::class,
            ZipCodeSeeder::class,
            BrandSeeder::class,
        ]);
    }
}
