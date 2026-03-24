<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Trade Requests</h2>
    </x-slot>

    <div class="py-6 max-w-6xl mx-auto">
        <a href="{{ route('trades.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">New Trade Request</a>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
            <div class="bg-white shadow rounded p-6">
                <h3 class="font-bold mb-4">Received Requests</h3>
                @forelse($receivedTrades as $trade)
                    <div class="border-b py-3">
                        <p><strong>From:</strong> {{ $trade->sender->name }}</p>
                        <p><strong>Item:</strong> {{ $trade->item->name }}</p>
                        <p><strong>Status:</strong> {{ $trade->status }}</p>

                        @if($trade->status === 'pending')
                            <form method="POST" action="{{ route('trades.accept', $trade) }}" class="inline">
                                @csrf
                                @method('PATCH')
                                <button class="bg-green-600 text-white px-3 py-1 rounded">Accept</button>
                            </form>

                            <form method="POST" action="{{ route('trades.decline', $trade) }}" class="inline">
                                @csrf
                                @method('PATCH')
                                <button class="bg-red-600 text-white px-3 py-1 rounded">Decline</button>
                            </form>
                        @endif
                    </div>
                @empty
                    <p>No received trade requests.</p>
                @endforelse
            </div>

            <div class="bg-white shadow rounded p-6">
                <h3 class="font-bold mb-4">Sent Requests</h3>
                @forelse($sentTrades as $trade)
                    <div class="border-b py-3">
                        <p><strong>To:</strong> {{ $trade->receiver->name }}</p>
                        <p><strong>Item:</strong> {{ $trade->item->name }}</p>
                        <p><strong>Status:</strong> {{ $trade->status }}</p>
                    </div>
                @empty
                    <p>No sent trade requests.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
