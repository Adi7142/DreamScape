<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Manage Items</h2>
    </x-slot>

    <div class="py-6 max-w-6xl mx-auto">
        <a href="{{ route('admin.items.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Add Item</a>

        <div class="bg-white shadow rounded p-6 mt-6">
            @foreach($items as $item)
                <div class="border-b py-3 flex justify-between items-center">
                    <div>
                        <h3 class="font-bold">{{ $item->name }}</h3>
                        <p>{{ $item->type }} - {{ $item->rarity }}</p>
                    </div>

                    <div class="flex gap-2">
                        <a href="{{ route('admin.items.edit', $item) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>

                        <form method="POST" action="{{ route('admin.items.destroy', $item) }}">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-600 text-white px-3 py-1 rounded">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
