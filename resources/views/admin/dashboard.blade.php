<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Admin Dashboard</h2>
    </x-slot>

    <div class="py-6 max-w-6xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white shadow rounded p-6">
                <h3 class="font-bold">Users</h3>
                <p>{{ $userCount }}</p>
            </div>

            <div class="bg-white shadow rounded p-6">
                <h3 class="font-bold">Items</h3>
                <p>{{ $itemCount }}</p>
            </div>

            <div class="bg-white shadow rounded p-6">
                <h3 class="font-bold">Trades</h3>
                <p>{{ $tradeCount }}</p>
            </div>
        </div>

        <div class="mt-6 bg-white shadow rounded p-6">
            <h3 class="font-bold mb-4">Actions</h3>

            <div class="flex flex-wrap gap-3">
                <a href="{{ route('admin.items.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded">
                    Manage Items
                </a>

                <a href="{{ route('admin.items.create') }}" class="bg-green-600 text-white px-4 py-2 rounded">
                    Add Item
                </a>

                <a href="{{ route('admin.inventory.assign.create') }}" class="bg-purple-600 text-white px-4 py-2 rounded">
                    Assign Item to Player
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
