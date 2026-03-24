<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Notifications</h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto">
        <div class="bg-white shadow rounded p-6">
            @forelse($notifications as $notification)
                <div class="border-b py-3">
                    <p>{{ $notification->message }}</p>
                    <p class="text-sm text-gray-500">{{ $notification->created_at->format('d-m-Y H:i') }}</p>

                    @if(!$notification->is_read)
                        <form method="POST" action="{{ route('notifications.read', $notification) }}">
                            @csrf
                            @method('PATCH')
                            <button class="mt-2 bg-gray-700 text-white px-3 py-1 rounded">Mark as read</button>
                        </form>
                    @endif
                </div>
            @empty
                <p>No notifications found.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
