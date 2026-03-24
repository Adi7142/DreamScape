<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class AdminItemController extends Controller
{
    public function index()
    {
        $items = Item::latest()->get();

        return view('admin.items.index', compact('items'));
    }

    public function create()
    {
        return view('admin.items.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'type' => ['required', 'string', 'max:255'],
            'rarity' => ['required', 'string', 'max:255'],
            'power' => ['required', 'integer', 'min:0', 'max:100'],
            'speed' => ['required', 'integer', 'min:0', 'max:100'],
            'durability' => ['required', 'integer', 'min:0', 'max:100'],
            'magic_property' => ['nullable', 'string', 'max:255'],
        ]);

        Item::create($data);

        return redirect()->route('admin.items.index')->with('success', 'Item created successfully.');
    }

    public function edit(Item $item)
    {
        return view('admin.items.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'type' => ['required', 'string', 'max:255'],
            'rarity' => ['required', 'string', 'max:255'],
            'power' => ['required', 'integer', 'min:0', 'max:100'],
            'speed' => ['required', 'integer', 'min:0', 'max:100'],
            'durability' => ['required', 'integer', 'min:0', 'max:100'],
            'magic_property' => ['nullable', 'string', 'max:255'],
        ]);

        $item->update($data);

        return redirect()->route('admin.items.index')->with('success', 'Item updated successfully.');
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('admin.items.index')->with('success', 'Item deleted successfully.');
    }
}
