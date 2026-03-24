<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $item->name }}</h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto">
        <div class="bg-white shadow rounded p-6">
            <p><strong>Description:</strong> {{ $item->description }}</p>
            <p><strong>Type:</strong> {{ $item->type }}</p>
            <p><strong>Rarity:</strong> {{ $item->rarity }}</p>
            <p><strong>Power:</strong> {{ $item->power }}</p>
            <p><strong>Speed:</strong> {{ $item->speed }}</p>
            <p><strong>Durability:</strong> {{ $item->durability }}</p>
            <p><strong>Magic Property:</strong> {{ $item->magic_property }}</p>
        </div>
    </div>
</x-app-layout>
