<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Assign Item to Player</h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto bg-white shadow rounded p-6">
        <form method="POST" action="{{ route('admin.inventory.assign.store') }}">
            @csrf

            <div class="mb-4">
                <label class="block font-medium">Player</label>
                <select name="user_id" class="w-full border rounded p-2">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Item</label>
                <select name="item_id" class="w-full border rounded p-2">
                    @foreach($items as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Quantity</label>
                <input type="number" name="quantity" value="1" min="1" class="w-full border rounded p-2">
            </div>

            <button class="bg-blue-600 text-white px-4 py-2 rounded">Assign Item</button>
        </form>
    </div>
</x-app-layout>
