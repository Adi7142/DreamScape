<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->user()
            ->inventories()      // relatie gebruikt tabel inventory
            ->with('item');

        // Filters op item
        if ($request->filled('search')) {
            $query->whereHas('item', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('type')) {
            $query->whereHas('item', function ($q) use ($request) {
                $q->where('type', $request->type);
            });
        }

        if ($request->filled('rarity')) {
            $query->whereHas('item', function ($q) use ($request) {
                $q->where('rarity', $request->rarity);
            });
        }

        // Sort (whitelist)
        $sort = $request->get('sort', 'latest');
        $direction = $request->get('direction', 'asc') === 'desc' ? 'desc' : 'asc';

        if (in_array($sort, ['name', 'type', 'rarity'], true)) {
            // sorteren op item velden => join met items
            $query->join('items', 'inventory.item_id', '=', 'items.id')
                ->select('inventory.*')
                ->orderBy("items.$sort", $direction);
        } elseif ($sort === 'quantity') {
            $query->orderBy('quantity', $direction);
        } else {
            // default newest
            $query->latest('inventory.created_at');
        }

        $inventories = $query->get();

        return view('inventory.index', compact('inventories'));
    }

    public function show(Request $request, $inventoryId)
    {
        $inventory = $request->user()
            ->inventories()
            ->with('item')
            ->findOrFail($inventoryId);

        return view('inventory.show', compact('inventory'));
    }
}
