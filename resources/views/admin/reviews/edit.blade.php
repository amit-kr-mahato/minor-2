@extends('adminLayout.app')

@section('content')
  <div class="ml-64 w-full p-8 shadow-md rounded">
    <h1 class="text-2xl font-bold mb-6">Edit Review</h1>

    @if(session('success'))
      <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
        {{ session('success') }}
      </div>
    @endif

    <form action="{{ route('admin.reviews.update', $review->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">User</label>
        <input type="text" disabled value="{{  $review->user?->name ?? 'Unknown User'}}" class="bg-gray-100 border border-gray-300 rounded w-full py-2 px-3">
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Business</label>
        <input type="text" disabled value="{{ $review->business?->name ?? 'Unknown Business' }}" class="bg-gray-100 border border-gray-300 rounded w-full py-2 px-3">
      </div>

      <div class="mb-4">
        <label for="rating" class="block text-gray-700 font-bold mb-2">Rating</label>
        <select name="rating" id="rating" class="border border-gray-300 rounded w-full py-2 px-3">
          @for ($i = 1; $i <= 5; $i++)
            <option value="{{ $i }}" {{ $review->rating == $i ? 'selected' : '' }}>
              {{ $i }} Star{{ $i > 1 ? 's' : '' }}
            </option>
          @endfor
        </select>
      </div>

      <div class="mb-4">
        <label for="comment" class="block text-gray-700 font-bold mb-2">Comment</label>
        <textarea name="comment" id="comment" rows="4" class="border border-gray-300 rounded w-full py-2 px-3" required>{{ $review->review }}</textarea>
      </div>

      <div class="flex justify-end">
        <a href="{{ route('admin.reviews.index') }}" class="mr-3 bg-red-600 py-2 px-4 rounded font-bold text-white hover:underline">Cancel</a>
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
          Update Review
        </button>
      </div>
    </form>
  </div>
@endsection
