@extends('adminLayout.app')

@section('content')
<div class="ml-64 w-full p-8 shadow-md rounded bg-gray-300">
  <h1 class="text-2xl font-bold mb-6">View Business Details</h1>

  <div class="mb-4">
    <strong>Owner:</strong> {{ $business->user->name ?? 'N/A' }}
  </div>

  <div class="mb-4">
    <strong>Business Name:</strong> {{ $business->business_name }}
  </div>

  <div class="mb-4">
    <strong>Province:</strong> {{ $business->province }}
  </div>

  <div class="mb-4">
    <strong>City:</strong> {{ $business->city }}
  </div>

  <div class="mb-4">
    <strong>Address 1:</strong> {{ $business->address1 }}
  </div>

  <div class="mb-4">
    <strong>Address 2:</strong> {{ $business->address2 ?? 'N/A' }}
  </div>

  <div class="mb-4">
    <strong>Postal Code:</strong> {{ $business->postal_code }}
  </div>

  <div class="mb-4 grid grid-cols-2 gap-4">
    <div><strong>Longitude:</strong> {{ $business->longitude }}</div>
    <div><strong>Latitude:</strong> {{ $business->latitude }}</div>
  </div>

  <div class="mb-4">
    <strong>Phone:</strong> {{ $business->phone }}
  </div>

  <div class="mb-4">
    <strong>Web Address:</strong>
    <a href="{{ $business->web_address }}" target="_blank" class="text-blue-600 hover:underline">
      {{ $business->web_address }}
    </a>
  </div>

  <div class="mb-4">
    <strong>Email:</strong> {{ $business->email }}
  </div>

  <div class="mb-4">
    <strong>Status:</strong> {{ ucfirst($business->status) }}
  </div>

  <div class="mb-4">
    <strong>Categories:</strong> {{ is_array($business->categories) ? implode(', ', $business->categories) : $business->categories }}
  </div>

  <div class="flex justify-end">
    <a href="{{ route('admin.businesses.index') }}" class="bg-gray-300 hover:bg-gray-400 text-black font-semibold px-6 py-2 rounded">
      Back to List
    </a>
  </div>
</div>
@endsection
