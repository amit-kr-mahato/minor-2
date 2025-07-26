@extends('BusinessLayout.app')

@section('content')
    <div class="ml-64 w-full min-h-screen p-6 bg-gray-300">
        <div class="max-w-[900px] px-4">
            <div class="max-w-xl mx-auto p-6">
                <h1 class="text-2xl font-bold mb-4">✏️ Edit Menu Item</h1>

                @if ($errors->any())
                    <div class="mb-4 text-red-600">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('businessdashboard.menu.update', $menu->id) }}"
                    enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block font-medium">Name</label>
                        <input type="text" name="name" class="w-full p-2 border rounded"
                            value="{{ old('name', $menu->name) }}" required>
                    </div>

                    <div>
                        <label class="block font-medium">Category</label>
                        <input type="text" name="category" class="w-full p-2 border rounded"
                            value="{{ old('category', $menu->category) }}" required>
                    </div>

                    <div>
                        <label class="block font-medium">Price (Rs)</label>
                        <input type="number" name="price" class="w-full p-2 border rounded"
                            value="{{ old('price', $menu->price) }}" required>
                    </div>

                    <div>
                        <label class="block font-medium">Current Image</label><br>
                        @if($menu->image)
                            <img src="{{ asset('storage/' . $menu->image) }}" class="h-32 object-cover mb-2">
                        @else
                            <p class="text-gray-500">No image uploaded.</p>
                        @endif
                    </div>

                    <div>
                        <label class="block font-medium">Change Image</label>
                        <input type="file" name="image" class="w-full p-2 border rounded">
                    </div>

                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
                    <a href="{{ route('businessdashboard.menu.index') }}" class="text-gray-600 ml-4">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection