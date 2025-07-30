@extends('adminLayout.app')

@section('content')
<div class="ml-64 w-full p-8">
    <h1 class="text-xl font-bold mb-4">Categories</h1>
   <a href="{{ route('admin.categories.create') }}"
   class="inline-block px-5 py-2.5 mb-4 text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm transition duration-150 ease-in-out">
    + Add New Category
</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table-auto w-full border border-collapse">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Type</th>
                <th class="border px-4 py-2">Slug</th>
                <th class="border px-4 py-2">Icon</th>
                <th class="border px-4 py-2">Group</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td class="border px-4 py-2">{{ $category->name }}</td>
                <td class="border px-4 py-2">{{ $category->type }}</td>
                <td class="border px-4 py-2">{{ $category->slug }}</td>
                <td class="border px-4 py-2">{{ $category->icon }}</td>
                <td class="border px-4 py-2">{{ $category->group }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('admin.categories.edit', $category) }}" class="text-blue-500 hover:underline">Edit</a>
                    |
                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline"
                          onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $categories->links() }}
    </div>
</div>
@endsection
