@extends('adminLayout.app')

@section('content')
  <div class="ml-64 w-full p-8 shadow-md rounded ">

    @if(session('success'))
    <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
    {{ session('success') }}
    </div>
    @endif

    <a href="{{ route('admin.businesses.index') }}"
    class="inline-block mb-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
    Back
    </a>

    <div class="overflow-x-auto">
    <table class="min-w-full bg-white shadow rounded table-auto">
      <thead class="bg-gray-100 text-left text-sm font-semibold text-gray-700 border-b">
      <tr>
        <th class="p-3">#</th>
        <th class="p-3">Name</th>
        <th class="p-3">Province</th>
        <th class="p-3">City</th>
        <th class="p-3">Owner</th>
        <th class="p-3">Status</th>
        <th class="p-3">Categories</th>
        <th class="p-3">Actions</th>
      </tr>
      </thead>
      <tbody>
      @foreach ($businesses as $index => $business)
      <tr class="border-b hover:bg-gray-50 text-sm">
        <td class="p-3">{{ $businesses->firstItem() + $index }}</td>
        <td class="p-3 font-semibold">{{ $business->business_name }}</td>
        <td class="p-3">{{ $business->province }}</td>
        <td class="p-3">{{ $business->city }}</td>
        <td class="p-3">{{ $business->user->name ?? 'N/A' }}</td>
        <td class="p-3">
        <span class="px-2 py-1 rounded text-xs
        {{ $business->status === 'active' ? 'bg-green-100 text-green-700' :
      ($business->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-700') }}">
        {{ ucfirst($business->status) }}
        </span>
        </td>
        <td class="p-3">{{ implode(', ', $business->categories ?? []) }}</td>
        <td class="p-3 space-x-2">
        <a href="{{ route('admin.businesses.edit', $business->id) }}"
        class="bg-blue-600 text-white font-semibold rounded px-2 py-1 text-sm">Edit</a>

        <form action="{{ route('admin.businesses.destroy', $business->id) }}" method="POST" class="inline"
        onsubmit="return confirm('Are you sure you want to delete this business?');">
        @csrf
        @method('DELETE')
        <button
        class="bg-red-500 hover:bg-red-600 text-white font-semibold rounded px-2 py-1 text-sm">Delete</button>
        </form>
        </td>
      </tr>
    @endforeach
      </tbody>
    </table>
    </div>

    <div class="mt-4">
    {{ $businesses->links() }}
    </div>
  </div>
@endsection