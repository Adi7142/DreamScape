<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Item Catalog</h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto">
        <form method="GET" class="mb-6 flex gap-3 flex-wrap">
            <input type="text" name="search" placeholder="Search item..." value="{{ request('search') }}" class="border rounded p-2">
            <input type="text" name="type" placeholder="Type" value="{{ request('type') }}" class="border rounded p-2">
            <input type="text" name="rarity" placeholder="Rarity" value="{{ request('rarity') }}" class="border rounded p-2">
            <button class="bg-blue-600 text-white px-4 py-2 rounded">Filter</button>
        </form>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($items as $item)
                <div class="bg-white shadow rounded p-4">
                    <h3 class="text-lg font-bold">{{ $item->name }}</h3>
                    <p>{{ $item->description }}</p>
                    <p><strong>Type:</strong> {{ $item->type }}</p>
                    <p><strong>Rarity:</strong> {{ $item->rarity }}</p>
                    <a href="{{ route('items.show', $item) }}" class="text-blue-600">View details</a>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
