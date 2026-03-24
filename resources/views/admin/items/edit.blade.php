<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Item</h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto bg-white shadow rounded p-6">
        <form method="POST" action="{{ route('admin.items.update', $item) }}">
            @csrf
            @method('PATCH')
            @include('admin.items.partials.form')
            <button class="bg-blue-600 text-white px-4 py-2 rounded">Update Item</button>
        </form>
    </div>
</x-app-layout>
