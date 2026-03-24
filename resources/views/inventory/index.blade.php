<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">My Inventory</h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto">
        <form method="GET" class="mb-6 flex gap-3 flex-wrap items-center">
            <input type="text" name="search" placeholder="Search item..." value="{{ request('search') }}" class="border rounded p-2">
            <input type="text" name="type" placeholder="Type" value="{{ request('type') }}" class="border rounded p-2">
            <input type="text" name="rarity" placeholder="Rarity" value="{{ request('rarity') }}" class="border rounded p-2">

            <select name="sort" class="border rounded p-2 pr-10">
                <option value="latest"   @selected(request('sort', 'latest') === 'latest')>Newest</option>
                <option value="name"     @selected(request('sort') === 'name')>Name</option>
                <option value="type"     @selected(request('sort') === 'type')>Type</option>
                <option value="rarity"   @selected(request('sort') === 'rarity')>Rarity</option>
                <option value="quantity" @selected(request('sort') === 'quantity')>Quantity</option>
            </select>

            <select name="direction" class="border rounded p-2 pr-10">
                <option value="asc"  @selected(request('direction', 'asc') === 'asc')>Asc</option>
                <option value="desc" @selected(request('direction') === 'desc')>Desc</option>
            </select>

            <button class="bg-blue-600 text-white px-4 py-2 rounded">Apply</button>

            <a href="{{ route('inventory.index') }}" class="bg-gray-200 text-gray-800 px-4 py-2 rounded">
                Reset
            </a>
        </form>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($inventories as $inventory)
                <div class="bg-white shadow rounded p-4">
                    <h3 class="text-lg font-bold">{{ $inventory->item->name }}</h3>

                    <p><strong>Quantity:</strong> {{ $inventory->quantity }}</p>
                    <p><strong>Type:</strong> {{ $inventory->item->type }}</p>
                    <p><strong>Rarity:</strong> {{ $inventory->item->rarity }}</p>

                    <a href="{{ route('inventory.show', $inventory->id) }}" class="text-blue-600">
                        View details
                    </a>
                </div>
            @empty
                <p>No items in your inventory.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
