<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'name',
        'description',
        'type',
        'rarity',
        'power',
        'speed',
        'durability',
        'magic_property',
    ];

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    public function trades()
    {
        return $this->hasMany(Trade::class);
    }
}
