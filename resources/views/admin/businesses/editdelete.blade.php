@extends('adminLayout.app')

@section('content')
<div class="ml-64 w-full p-8 shadow-md rounded bg-gray-300">
  <h1 class="text-2xl font-bold mb-6">Edit Business</h1>

  <form action="{{ route('admin.businesses.update', $business->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-4">
      <label class="font-semibold">Business Name</label>
      <input type="text" name="business_name" value="{{ old('business_name', $business->business_name) }}"
             class="w-full p-2 rounded border border-gray-400">
      @error('business_name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <div class="mb-4">
      <label class="font-semibold">Province</label>
      <input type="text" name="province" value="{{ old('province', $business->province) }}"
             class="w-full p-2 rounded border border-gray-400">
      @error('province') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <div class="mb-4">
      <label class="font-semibold">City</label>
      <input type="text" name="city" value="{{ old('city', $business->city) }}"
             class="w-full p-2 rounded border border-gray-400">
      @error('city') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <div class="mb-4">
      <label class="font-semibold">Address 1</label>
      <input type="text" name="address1" value="{{ old('address1', $business->address1) }}"
             class="w-full p-2 rounded border border-gray-400">
      @error('address1') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <div class="mb-4">
      <label class="font-semibold">Address 2</label>
      <input type="text" name="address2" value="{{ old('address2', $business->address2) }}"
             class="w-full p-2 rounded border border-gray-400">
      @error('address2') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <div class="mb-4">
      <label class="font-semibold">Postal Code</label>
      <input type="text" name="postal_code" value="{{ old('postal_code', $business->postal_code) }}"
             class="w-full p-2 rounded border border-gray-400">
      @error('postal_code') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <div class="grid grid-cols-2 gap-4 mb-4">
      <div>
        <label class="font-semibold">Longitude</label>
        <input type="text" name="longitude" value="{{ old('longitude', $business->longitude) }}"
               class="w-full p-2 rounded border border-gray-400">
        @error('longitude') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
      </div>
      <div>
        <label class="font-semibold">Latitude</label>
        <input type="text" name="latitude" value="{{ old('latitude', $business->latitude) }}"
               class="w-full p-2 rounded border border-gray-400">
        @error('latitude') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
      </div>
    </div>

    <div class="mb-4">
      <label class="font-semibold">Phone</label>
      <input type="text" name="phone" value="{{ old('phone', $business->phone) }}"
             class="w-full p-2 rounded border border-gray-400">
      @error('phone') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <div class="mb-4">
      <label class="font-semibold">Web Address</label>
      <input type="text" name="web_address" value="{{ old('web_address', $business->web_address) }}"
             class="w-full p-2 rounded border border-gray-400">
      @error('web_address') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <div class="mb-4">
      <label class="font-semibold">Email</label>
      <input type="email" name="email" value="{{ old('email', $business->email) }}"
             class="w-full p-2 rounded border border-gray-400">
      @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <div class="mb-4">
      <label class="font-semibold">Status</label>
      <select name="status" class="w-full p-2 rounded border border-gray-400">
        <option value="pending" {{ old('status', $business->status) == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="approved" {{ old('status', $business->status) == 'approved' ? 'selected' : '' }}>Approved</option>
        <option value="suspended" {{ old('status', $business->status) == 'suspended' ? 'selected' : '' }}>Suspended</option>
      </select>
      @error('status') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <div class="mb-6">
      <label class="font-semibold">Categories (comma separated)</label>
      <input type="text" name="categories" value="{{ old('categories', is_array($business->categories) ? implode(', ', $business->categories) : $business->categories) }}"
             class="w-full p-2 rounded border border-gray-400">
      @error('categories') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <div class="flex justify-end">
      <a href="{{ route('admin.businesses.index') }}" class="mr-4 bg-gray-400 hover:bg-gray-500 text-white font-semibold px-6 py-2 rounded">
        Cancel
      </a>
      <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded">
        Update Business
      </button>
    </div>
  </form>
</div>
@endsection
