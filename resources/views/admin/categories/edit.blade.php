@extends('adminLayout.app')

@section('content')
<div class="ml-64 w-full p-8 max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-6">Edit Category</h1>

    <form action="{{ route('admin.categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block font-semibold mb-1">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" required
                   class="w-full border rounded px-3 py-2 @error('name') border-red-500 @enderror">
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="type" class="block font-semibold mb-1">Type</label>
            <input type="text" name="type" id="type" value="{{ old('type', $category->type) }}" required
                   class="w-full border rounded px-3 py-2 @error('type') border-red-500 @enderror">
            @error('type')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="slug" class="block font-semibold mb-1">Slug (optional)</label>
            <input type="text" name="slug" id="slug" value="{{ old('slug', $category->slug) }}"
                   class="w-full border rounded px-3 py-2 @error('slug') border-red-500 @enderror">
            @error('slug')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="icon" class="block font-semibold mb-1">Icon (optional)</label>
            <input type="text" name="icon" id="icon" value="{{ old('icon', $category->icon) }}"
                   class="w-full border rounded px-3 py-2 @error('icon') border-red-500 @enderror">
            @error('icon')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="group" class="block font-semibold mb-1">Group (optional)</label>
            <input type="text" name="group" id="group" value="{{ old('group', $category->group) }}"
                   class="w-full border rounded px-3 py-2 @error('group') border-red-500 @enderror">
            @error('group')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">Update</button>
    </form>
</div>
@endsection
