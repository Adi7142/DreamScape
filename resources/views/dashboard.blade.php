<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-2xl font-bold mb-2">Welcome, {{ auth()->user()->name }}</h3>
                <p class="text-gray-600 mb-6">
                    Choose a section to start using DreamScape Interactive.
                </p>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <a href="{{ route('items.index') }}" class="block p-4 bg-blue-100 rounded shadow hover:bg-blue-200">
                        <h4 class="font-bold">Item Catalog</h4>
                        <p>Browse all available game items.</p>
                    </a>

                    <a href="{{ route('inventory.index') }}" class="block p-4 bg-green-100 rounded shadow hover:bg-green-200">
                        <h4 class="font-bold">My Inventory</h4>
                        <p>View the items you currently own.</p>
                    </a>

                    <a href="{{ route('trades.index') }}" class="block p-4 bg-yellow-100 rounded shadow hover:bg-yellow-200">
                        <h4 class="font-bold">Trade Requests</h4>
                        <p>Send, accept, or decline trade requests.</p>
                    </a>

                    <a href="{{ route('notifications.index') }}" class="block p-4 bg-purple-100 rounded shadow hover:bg-purple-200">
                        <h4 class="font-bold">Notifications</h4>
                        <p>Check your latest trade notifications.</p>
                    </a>

                    <a href="{{ route('profile.edit') }}" class="block p-4 bg-gray-100 rounded shadow hover:bg-gray-200">
                        <h4 class="font-bold">Profile</h4>
                        <p>View and update your account details.</p>
                    </a>

                    @role('beheerder')
                    <a href="{{ route('admin.dashboard') }}" class="block p-4 bg-red-100 rounded shadow hover:bg-red-200">
                        <h4 class="font-bold">Admin Dashboard</h4>
                        <p>Manage items and assign them to players.</p>
                    </a>
                    @endrole
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
