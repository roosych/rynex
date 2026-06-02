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
            ['email' => 'admin@swiftfix.com'],
            [
                'name'     => 'Swift Fix Admin',
                'password' => Hash::make('admin123'),
            ]
        );

        $this->call([
            ServiceSeeder::class,
            PostSeeder::class,
            SettingsSeeder::class,
            FaqSeeder::class,
        ]);
    }
}
