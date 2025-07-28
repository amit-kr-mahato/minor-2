@extends('BusinessLayout.app')

@section('content')
    <div class="ml-64 w-full min-h-screen p-6 bg-gray-300">
        <div class="max-w-[900px] px-4">
            <div class="container mx-auto p-6">
                <h1 class="text-2xl font-bold mb-4">Menu Items</h1>

                <a href="{{ route('businessdashboard.menu.create') }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded mb-6 inline-block">
                    Add New Menu Item
                </a>

                @if(session('success'))
                    <div class="bg-green-200 p-3 rounded mb-4">{{ session('success') }}</div>
                @endif

                @if($menuItems->isEmpty())
                    <p>No menu items found.</p>
                @else
                    <table class="min-w-full bg-white border">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">Name</th>
                                <th class="border px-4 py-2">Category</th>
                                <th class="border px-4 py-2">Price</th>
                                <th class="border px-4 py-2">Image</th>
                                <th class="border px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menuItems as $item)
                                <tr>
                                    <td class="border px-4 py-2">{{ $item->name }}</td>
                                    <td class="border px-4 py-2">{{ $item->category }}</td>
                                    <td class="border px-4 py-2">${{ number_format($item->price, 2) }}</td>
                                    <td class="border px-4 py-2">
                                        @if ($item->image)
                                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}"
                                                class="w-20 h-20 object-cover">
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('businessdashboard.menu.edit', $item->id) }}"
                                            class="text-blue-500 hover:underline mr-2">Edit</a>

                                        <div x-data="{ showConfirm: false }">
                                            <!-- Delete Icon Button -->
                                            <button type="button" @click="showConfirm = true"
                                                class="text-red-600 hover:text-red-800">
                                                <!-- Heroicon Trash -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4a1 1 0 011 1v1H9V4a1 1 0 011-1zm-4 4h12" />
                                                </svg>
                                            </button>

                                            <!-- Confirmation Modal -->
                                            <div x-show="showConfirm"
                                                class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-50"
                                                x-cloak>
                                                <div class="bg-white rounded-lg p-6 shadow-xl w-full max-w-sm">
                                                    <div class="flex items-center space-x-3 mb-4">
                                                        <!-- Warning Icon -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M13 16h-1v-4h-1m0-4h.01M12 9v2m0 4h.01M12 3C6.48 3 2 7.48 2 13c0 5.52 4.48 10 10 10s10-4.48 10-10c0-5.52-4.48-10-10-10z" />
                                                        </svg>
                                                        <h2 class="text-lg font-semibold text-gray-800">Delete Menu Item?</h2>
                                                    </div>
                                                    <p class="text-gray-600 mb-6">Are you sure you want to delete this menu? This
                                                        action cannot be undone.</p>

                                                    <div class="flex justify-end space-x-3">
                                                        <button @click="showConfirm = false"
                                                            class="px-4 py-2 rounded bg-gray-200 hover:bg-gray-300 text-gray-700">Cancel</button>

                                                        <form action="{{ route('businessdashboard.menu.destroy', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="px-4 py-2 rounded bg-red-600 text-white hover:bg-red-700">Yes,
                                                                Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
@endsection