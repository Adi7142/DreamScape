<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;

class AdminInventoryController extends Controller
{
    public function create()
    {
        $users = User::role('speler')->get();
        $items = Item::all();

        return view('admin.inventory.assign', compact('users', 'items'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'item_id' => ['required', 'exists:items,id'],
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $inventory = Inventory::firstOrCreate(
            [
                'user_id' => $data['user_id'],
                'item_id' => $data['item_id'],
            ],
            [
                'quantity' => 0,
            ]
        );

        $inventory->quantity += $data['quantity'];
        $inventory->save();

        return back()->with('success', 'Item assigned successfully.');
    }
}
