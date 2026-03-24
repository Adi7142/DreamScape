<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Trade Request</h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto">
        <div class="bg-white shadow rounded p-6">
            <form method="POST" action="{{ route('trades.store') }}">
                @csrf

                <div class="mb-4">
                    <label class="block font-medium">Choose Player</label>
                    <select name="receiver_id" class="w-full border rounded p-2">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Choose Item</label>
                    <select name="item_id" class="w-full border rounded p-2">
                        @foreach($inventoryItems as $inventory)
                            <option value="{{ $inventory->item->id }}">
                                {{ $inventory->item->name }} ({{ $inventory->quantity }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <button class="bg-blue-600 text-white px-4 py-2 rounded">Send Request</button>
            </form>
        </div>
    </div>
</x-app-layout>
