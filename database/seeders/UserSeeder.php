<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $adminData = User::factory()->make([
            'name' => 'AdminMaster',
            'email' => 'admin@example.com',
            'password' => 'Admin007',
        ])->makeVisible('password')->toArray();

        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            $adminData
        );
        $admin->assignRole('beheerder');

        $shadowData = User::factory()->make([
            'name' => 'ShadowSlayer',
            'email' => 'shadow@example.com',
            'password' => 'Test123!',
        ])->makeVisible('password')->toArray();

        $shadow = User::firstOrCreate(
            ['email' => 'shadow@example.com'],
            $shadowData
        );
        $shadow->assignRole('speler');

        $mysticData = User::factory()->make([
            'name' => 'MysticMage',
            'email' => 'mystic@example.com',
            'password' => 'Mage2024',
        ])->makeVisible('password')->toArray();

        $mystic = User::firstOrCreate(
            ['email' => 'mystic@example.com'],
            $mysticData
        );
        $mystic->assignRole('speler');

        $dragonData = User::factory()->make([
            'name' => 'DragonKnight',
            'email' => 'dragon@example.com',
            'password' => 'Dragon!99',
        ])->makeVisible('password')->toArray();

        $dragon = User::firstOrCreate(
            ['email' => 'dragon@example.com'],
            $dragonData
        );
        $dragon->assignRole('speler');

        $thunderData = User::factory()->make([
            'name' => 'ThunderRogue',
            'email' => 'thunder@example.com',
            'password' => 'Thund3r!!',
        ])->makeVisible('password')->toArray();

        $thunder = User::firstOrCreate(
            ['email' => 'thunder@example.com'],
            $thunderData
        );
        $thunder->assignRole('speler');
    }
}
