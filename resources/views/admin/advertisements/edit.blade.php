@extends('adminLayout.app')

@section('content')


<div class="ml-64 w-full min-h-screen p-6 bg-gray-100">

  {{-- Flash Message --}}
  @if(session('success'))
    <div class="bg-green-100 text-green-800 p-3 mb-4 rounded shadow">
      {{ session('success') }}
    </div>
  @endif

  <div class="bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-semibold mb-6">Edit Advertisement</h2>

    <form action="{{ route('admin.advertisements.update', $advertisement->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
      @csrf
      @method('PUT')

      {{-- Current Image --}}
      <div>
        <label class="block text-sm font-medium mb-1">Current Image:</label>
        <img src="{{ asset('storage/' . $advertisement->image) }}" class="w-40 h-auto rounded border">
      </div>

      {{-- New Image --}}
      <div>
        <label class="block text-sm font-medium mb-1">Change Image (optional):</label>
        <input type="file" name="image" accept="image/*" class="border p-2 rounded w-64">
      </div>

      {{-- Position --}}
      <div>
        <label class="block text-sm font-medium mb-1">Position:</label>
        <select name="position" class="border p-2 rounded w-64">
          <option value="top" {{ $advertisement->position === 'top' ? 'selected' : '' }}>Top</option>
          <option value="bottom" {{ $advertisement->position === 'bottom' ? 'selected' : '' }}>Bottom</option>
          <option value="sidebar" {{ $advertisement->position === 'sidebar' ? 'selected' : '' }}>Sidebar</option>
        </select>
      </div>

      {{-- Status --}}
      <div>
        <label class="block text-sm font-medium mb-1">Status:</label>
        <select name="status" class="border p-2 rounded w-64">
          <option value="active" {{ $advertisement->status === 'active' ? 'selected' : '' }}>Active</option>
          <option value="inactive" {{ $advertisement->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
        </select>
      </div>

      {{-- Submit --}}
      <div>
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
          Update Advertisement
        </button>
        <a href="{{ route('admin.advertisements.index') }}" class="ml-4 rounded text-white bg-red-600 p-3">Cancel</a>
      </div>
    </form>
  </div>
</div>
@endsection
