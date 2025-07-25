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
        <th class="p-3">S.N</th>
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
      <div id="status-box-{{ $business->id }}"
        class="checkbox-status flex items-center gap-3 p-2 rounded-md transition duration-200"
        data-business-id="{{ $business->id }}" data-current-status="{{ $business->status }}">

        <!-- Pending -->
        <label id="pending-label-{{ $business->id }}"
        class="inline-flex items-center gap-1 cursor-pointer px-2 py-1 rounded">
        <input type="checkbox" value="pending" onchange="submitCheckboxStatus(this)" {{ $business->status === 'pending' ? 'checked' : '' }}>
        <span>Pending</span>
        </label>

        <!-- Approved -->
        <label id="approved-label-{{ $business->id }}"
        class="inline-flex items-center gap-1 cursor-pointer px-2 py-1 rounded">
        <input type="checkbox" value="approved" onchange="submitCheckboxStatus(this)" {{ $business->status === 'approved' ? 'checked' : '' }}>
        <span>Approved</span>
        </label>

        <!-- Suspended -->
        <label id="suspended-label-{{ $business->id }}"
        class="inline-flex items-center gap-1 cursor-pointer px-2 py-1 rounded">
        <input type="checkbox" value="suspended" onchange="submitCheckboxStatus(this)" {{ $business->status === 'suspended' ? 'checked' : '' }}>
        <span>Suspended</span>
        </label>

        <!-- Spinner -->
        <div class="spinner hidden ml-2" id="spinner-{{ $business->id }}">
        <svg class="animate-spin h-5 w-5 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none"
        viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
        </svg>
        </div>
      </div>
      </td>





      <td class="p-3">{{ $business->categories }}</td>
      <td class="p-3 space-x-2">
      <a href="{{ route('admin.businesses.edit', $business->id) }}"
        class="bg-blue-600 text-white font-semibold rounded px-2 py-1 text-sm">view</a>

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