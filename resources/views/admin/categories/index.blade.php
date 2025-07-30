@extends('adminLayout.app')

@section('content')
<div class="ml-64 w-full min-h-screen p-6 bg-gray-50">
    <div class="container mx-auto">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">All Categories</h2>

        <a href="{{ route('admin.categories.create') }}" 
           class="inline-block mb-6 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
           + Add New Category
        </a>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if($categories->isEmpty())
            <p class="text-gray-600">No categories found.</p>
        @else
            <ul class="space-y-4">
                @foreach($categories as $category)
                    <li class="bg-white shadow rounded p-4 flex justify-between items-center">
                        <span class="text-gray-900 font-medium">{{ $category->name }}</span>
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.categories.edit', $category) }}" 
                               class="px-3 py-1 text-sm bg-yellow-400 hover:bg-yellow-500 text-white rounded transition">
                                Edit
                            </a>

                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" 
                                  onsubmit="return confirm('Are you sure you want to delete this category?');" 
                                  class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="px-3 py-1 text-sm bg-red-600 hover:bg-red-700 text-white rounded transition">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
@endsection
