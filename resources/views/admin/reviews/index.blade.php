@extends('adminLayout.app')

@section('content')
  <h1 class="text-2xl font-bold mb-4">Review</h1>

  <div class="overflow-x-auto ml-64 mt-24 px-4">
    <div class="min-w-[800px]">
    <table class="min-w-full bg-white shadow rounded">
      <thead>
      <tr class="text-left border-b bg-gray-100">
        <th class="p-3">S.N</th>
        <th class="p-3">Review By</th>
        <th class="p-3">Business</th>
        <th class="p-3">Rating</th>
        <th class="p-3 whitespace-nowrap">Comment</th>
        <th class="p-3">Actions</th>
      </tr>
      </thead>
      <tbody>
      @foreach ($reviews as $index => $review)
      <tr class="border-b hover:bg-gray-50">
      <td class="p-3">{{ $index + 1 }}</td>
      <td class="p-3">{{ $review->user?->name ?? 'Unknown User' }}</td>
      <td class="p-3">{{ $review->business?->name ?? 'Unknown Business' }}</td>
      <td class="p-3">{{ $review->rating }}</td>
      <td class="p-3 w-96 max-w-[600px]">
      <div x-data="{ expanded: false }" class="max-w-full">
        <p x-show="!expanded" class="line-clamp-2 break-words">{{ $review->review }}</p>
        <p x-show="expanded" class="break-words">{{ $review->review }}</p>

        <button @click="expanded = !expanded" class="text-blue-500 hover:underline text-xs mt-1">
        <span x-show="!expanded">Read more</span>
        <span x-show="expanded">Show less</span>
        </button>
      </div>
      </td>
      <td class="p-3 space-x-2 whitespace-nowrap">
      <a href="{{ route('admin.reviews.edit', $review->id) }}"
        class="bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded px-2 py-1 text-sm">Edit</a>

     <div x-data="{ showConfirm: false }" class="inline">
  <!-- Delete Button -->
  <button @click="showConfirm = true"
    class="bg-red-500 hover:bg-red-600 text-white font-semibold rounded px-2 py-1 text-sm">
    Delete
  </button>

  <!-- Confirmation Modal -->
  <div x-show="showConfirm" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
       x-cloak>
    <div class="bg-white p-6 rounded shadow-lg max-w-sm w-full">
      <h2 class="text-lg font-semibold mb-4">Confirm Delete</h2>
      <p class="text-sm text-gray-600 mb-6">Are you sure you want to delete this review?</p>

      <div class="flex justify-end space-x-3">
        <button @click="showConfirm = false"
          class="px-4 py-2 rounded text-gray-700 hover:underline">Cancel</button>

        <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit"
            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded text-sm font-medium">
            Yes, Delete
          </button>
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
    </div>
  </div>

@endsection