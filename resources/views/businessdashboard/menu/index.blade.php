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

                                        <form action="{{ route('businessdashboard.menu.destroy', $item->id) }}" method="POST"
                                            class="inline" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
@endsection