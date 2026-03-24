<?php

namespace Database\Seeders;

use App\Models\Inventory;
use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    public function run(): void
    {
        $shadow  = User::where('email', 'shadow@example.com')->first();
        $mystic  = User::where('email', 'mystic@example.com')->first();
        $dragon  = User::where('email', 'dragon@example.com')->first();
        $thunder = User::where('email', 'thunder@example.com')->first();

        // Jouw dataset items
        $zwaardVuur      = Item::where('name', 'Zwaard des Vuur')->first();
        $ijsAmulet       = Item::where('name', 'IJs Amulet')->first();
        $schaduwMantel   = Item::where('name', 'Schaduw Mantel')->first();
        $hamerTitanen    = Item::where('name', 'Hamer der Titanen')->first();
        $lichtboog       = Item::where('name', 'Lichtboog')->first();
        $helendeRing     = Item::where('name', 'Helende Ring')->first();
        $demonenHarnas   = Item::where('name', 'Demonen Harnas')->first();

        // ShadowSlayer: sterke melee + wat utility
        if ($shadow && $zwaardVuur) {
            Inventory::updateOrCreate(
                ['user_id' => $shadow->id, 'item_id' => $zwaardVuur->id],
                ['quantity' => 1]
            );
        }
        if ($shadow && $schaduwMantel) {
            Inventory::updateOrCreate(
                ['user_id' => $shadow->id, 'item_id' => $schaduwMantel->id],
                ['quantity' => 1]
            );
        }
        if ($shadow && $helendeRing) {
            Inventory::updateOrCreate(
                ['user_id' => $shadow->id, 'item_id' => $helendeRing->id],
                ['quantity' => 1]
            );
        }

        // MysticMage: magische items
        if ($mystic && $ijsAmulet) {
            Inventory::updateOrCreate(
                ['user_id' => $mystic->id, 'item_id' => $ijsAmulet->id],
                ['quantity' => 1]
            );
        }
        if ($mystic && $lichtboog) {
            Inventory::updateOrCreate(
                ['user_id' => $mystic->id, 'item_id' => $lichtboog->id],
                ['quantity' => 1]
            );
        }
        if ($mystic && $helendeRing) {
            Inventory::updateOrCreate(
                ['user_id' => $mystic->id, 'item_id' => $helendeRing->id],
                ['quantity' => 2]
            );
        }

        // DragonKnight: tanky armor + heavy weapon
        if ($dragon && $hamerTitanen) {
            Inventory::updateOrCreate(
                ['user_id' => $dragon->id, 'item_id' => $hamerTitanen->id],
                ['quantity' => 1]
            );
        }
        if ($dragon && $demonenHarnas) {
            Inventory::updateOrCreate(
                ['user_id' => $dragon->id, 'item_id' => $demonenHarnas->id],
                ['quantity' => 1]
            );
        }
        if ($dragon && $schaduwMantel) {
            Inventory::updateOrCreate(
                ['user_id' => $dragon->id, 'item_id' => $schaduwMantel->id],
                ['quantity' => 1]
            );
        }

        // ThunderRogue: snelle items
        if ($thunder && $lichtboog) {
            Inventory::updateOrCreate(
                ['user_id' => $thunder->id, 'item_id' => $lichtboog->id],
                ['quantity' => 1]
            );
        }
        if ($thunder && $schaduwMantel) {
            Inventory::updateOrCreate(
                ['user_id' => $thunder->id, 'item_id' => $schaduwMantel->id],
                ['quantity' => 1]
            );
        }
        if ($thunder && $ijsAmulet) {
            Inventory::updateOrCreate(
                ['user_id' => $thunder->id, 'item_id' => $ijsAmulet->id],
                ['quantity' => 1]
            );
        }
    }
}
