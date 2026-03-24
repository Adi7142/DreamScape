<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $inventory->item->name }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto">
        <div class="bg-white shadow rounded p-6">
            <p><strong>Quantity:</strong> {{ $inventory->quantity }}</p>

            <hr class="my-4">

            <p><strong>Description:</strong> {{ $inventory->item->description }}</p>
            <p><strong>Type:</strong> {{ $inventory->item->type }}</p>
            <p><strong>Rarity:</strong> {{ $inventory->item->rarity }}</p>

            <hr class="my-4">

            <p><strong>Power:</strong> {{ $inventory->item->power }}</p>
            <p><strong>Speed:</strong> {{ $inventory->item->speed }}</p>
            <p><strong>Durability:</strong> {{ $inventory->item->durability }}</p>
            <p><strong>Magic Property:</strong> {{ $inventory->item->magic_property }}</p>
        </div>
    </div>
</x-app-layout>
