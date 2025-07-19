@extends('BusinessLayout.app')

@section('content')
    <div class="ml-64 w-full min-h-screen p-6 bg-gray-100">
        <div class="max-w-4xl mx-auto px-4">
            <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Menu {{ $menu->id }}</h1>

            <form method="POST" action="{{ route('menu.update', $menu) }}" enctype="multipart/form-data" class="mb-8 space-y-4 bg-white p-6 rounded shadow">
                @csrf
                @method('PUT')

                <div>
                    <label class="block mb-2 font-medium text-gray-700">Add More Images</label>
                    <input type="file" name="images[]" multiple
                        class="block w-full text-gray-600 text-sm
                        file:mr-4 file:py-2 file:px-4
                        file:rounded file:border-0
                        file:text-sm file:font-semibold
                        file:bg-blue-50 file:text-blue-700
                        hover:file:bg-blue-100"
                    >
                </div>

                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded transition">
                    Upload
                </button>
            </form>

            <h3 class="text-xl font-semibold mb-4 text-gray-700">Existing Images</h3>
            <div class="flex flex-wrap gap-6">
                @foreach($menu->images as $image)
                    <div class="relative group w-36 h-36 rounded overflow-hidden border border-gray-300">
                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="Menu Image" class="w-full h-full object-cover">
                        <form method="POST" action="{{ route('menu.image.delete', $image) }}" class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white rounded-full p-1 hover:bg-red-700" title="Delete Image" onclick="return confirm('Are you sure you want to delete this image?')">🗑</button>
                        </form>
                    </div>
                @endforeach
            </div>

            <div class="mt-8">
                <a href="{{ route('menu.index') }}" class="text-blue-600 hover:underline">← Back to Menus</a>
            </div>
        </div>
    </div>
@endsection
