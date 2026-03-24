<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'AdminMaster',
                'password' => Hash::make('Admin007'),
            ]
        );
        $admin->assignRole('beheerder');

        $shadow = User::firstOrCreate(
            ['email' => 'shadow@example.com'],
            [
                'name' => 'ShadowSlayer',
                'password' => Hash::make('Test123!'),
            ]
        );
        $shadow->assignRole('speler');

        $mystic = User::firstOrCreate(
            ['email' => 'mystic@example.com'],
            [
                'name' => 'MysticMage',
                'password' => Hash::make('Mage2024'),
            ]
        );
        $mystic->assignRole('speler');

        $dragon = User::firstOrCreate(
            ['email' => 'dragon@example.com'],
            [
                'name' => 'DragonKnight',
                'password' => Hash::make('Dragon!99'),
            ]
        );
        $dragon->assignRole('speler');

        $thunder = User::firstOrCreate(
            ['email' => 'thunder@example.com'],
            [
                'name' => 'ThunderRogue',
                'password' => Hash::make('Thund3r!!'),
            ]
        );
        $thunder->assignRole('speler');
    }
}
