<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        Item::firstOrCreate(
            ['name' => 'Zwaard des Vuur'],
            [
                'description' => 'Een mythisch zwaard met een vlammende gloed.',
                'type' => 'Wapen',
                'rarity' => 'Legendarisch',
                'power' => 90,
                'speed' => 60,
                'durability' => 80,
                'magic_property' => '+30% vuurschade',
            ]
        );

        Item::firstOrCreate(
            ['name' => 'IJs Amulet'],
            [
                'description' => 'Een amulet dat de drager beschermt tegen kou.',
                'type' => 'Accessoire',
                'rarity' => 'Episch',
                'power' => 20,
                'speed' => 10,
                'durability' => 70,
                'magic_property' => '+25% weerstand tegen ijsaanvallen',
            ]
        );

        Item::firstOrCreate(
            ['name' => 'Schaduw Mantel'],
            [
                'description' => 'Een donkere mantel die je bewegingen verbergt.',
                'type' => 'Armor',
                'rarity' => 'Zeldzaam',
                'power' => 40,
                'speed' => 85,
                'durability' => 50,
                'magic_property' => '+15% kans om aanvallen te ontwijken',
            ]
        );

        Item::firstOrCreate(
            ['name' => 'Hamer der Titanen'],
            [
                'description' => 'Een massieve hamer met de kracht van de aarde.',
                'type' => 'Wapen',
                'rarity' => 'Legendarisch',
                'power' => 95,
                'speed' => 40,
                'durability' => 90,
                'magic_property' => 'Kan vijanden 3 sec verdoven',
            ]
        );

        Item::firstOrCreate(
            ['name' => 'Lichtboog'],
            [
                'description' => 'Een boog die pijlen van pure energie afvuurt.',
                'type' => 'Wapen',
                'rarity' => 'Episch',
                'power' => 85,
                'speed' => 75,
                'durability' => 60,
                'magic_property' => '+10% kans op kritieke schade',
            ]
        );

        Item::firstOrCreate(
            ['name' => 'Helende Ring'],
            [
                'description' => 'Een ring die de gezondheid van de drager herstelt.',
                'type' => 'Accessoire',
                'rarity' => 'Zeldzaam',
                'power' => 10,
                'speed' => 5,
                'durability' => 100,
                'magic_property' => '+5 HP per seconde',
            ]
        );

        Item::firstOrCreate(
            ['name' => 'Demonen Harnas'],
            [
                'description' => 'Een verdoemd harnas met duistere krachten.',
                'type' => 'Armor',
                'rarity' => 'Legendarisch',
                'power' => 75,
                'speed' => 50,
                'durability' => 95,
                'magic_property' => 'Absorbeert 20% van ontvangen schade',
            ]
        );
    }
}
