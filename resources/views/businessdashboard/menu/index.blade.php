@extends('BusinessLayout.app')

@section('content')
    <div class="ml-64 w-full min-h-screen p-6 bg-gray-100">
        <div class="max-w-5xl mx-auto px-4">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-bold text-gray-800">All Menus</h1>
                <a href="{{ route('menu.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">+ Create Menu</a>
            </div>

            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <ul class="space-y-6">
                @foreach($menus as $menu)
                    <li class="bg-white rounded-lg shadow p-5">
                        <div class="flex items-center justify-between">
                            <h2 class="text-lg font-semibold text-gray-700">Menu #{{ $menu->id }}</h2>
                            <div class="space-x-3">
                                <a href="{{ route('menu.edit', $menu) }}" class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('menu.destroy', $menu) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Are you sure you want to delete this menu?')">Delete</button>
                                </form>
                            </div>
                        </div>

                        @if($menu->images->count())
                            <div class="mt-4 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                                @foreach($menu->images as $image)
                                    <div class="relative group">
                                        <img src="{{ asset('storage/' . $image->image_path) }}" class="w-full h-32 object-cover rounded border">
                                        <form method="POST" action="{{ route('menu.image.delete', $image) }}" class="absolute top-1 right-1">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white text-xs p-1 rounded-full hover:bg-red-600 transition" title="Delete Image">🗑</button>
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
