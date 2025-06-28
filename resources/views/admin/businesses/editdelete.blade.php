@extends('adminLayout.app')

@section('content')
<div class="ml-64 w-full p-8 shadow-md rounded rounded">
  <h1 class="text-2xl font-bold mb-6">
    {{ $business->exists ? 'Edit Business' : 'Add Business' }}
  </h1>

  @if ($errors->any())
    <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
      <ul class="list-disc pl-5">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form
    action="{{ $business->exists ? route('admin.businesses.update', $business->id) : route('admin.businesses.store') }}"
    method="POST"
  >
    @csrf
    @if($business->exists)
      @method('PUT')
    @endif

    <div class="mb-4">
      <label for="user_id" class="block font-medium text-gray-700">Owner</label>
      <select name="user_id" id="user_id" class="w-full px-3 py-2 border rounded border-gray-300" required>
        <option value="">Select Owner</option>
        @foreach ($users as $user)
          <option value="{{ $user->id }}" @selected(old('user_id', $business->user_id) == $user->id)>
            {{ $user->name }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="mb-4">
      <label for="business_name" class="block font-medium text-gray-700">Business Name</label>
      <input type="text" name="business_name" id="business_name"
             value="{{ old('business_name', $business->business_name) }}"
             class="w-full px-3 py-2 border rounded border-gray-300" required>
    </div>

    <div class="mb-4">
      <label for="province" class="block font-medium text-gray-700">Province</label>
      <input type="text" name="province" id="province"
             value="{{ old('province', $business->province) }}"
             class="w-full px-3 py-2 border rounded border-gray-300" required>
    </div>

    <div class="mb-4">
      <label for="city" class="block font-medium text-gray-700">City</label>
      <input type="text" name="city" id="city"
             value="{{ old('city', $business->city) }}"
             class="w-full px-3 py-2 border rounded border-gray-300" required>
    </div>

    <div class="mb-4">
      <label for="address1" class="block font-medium text-gray-700">Address 1</label>
      <input type="text" name="address1" id="address1"
             value="{{ old('address1', $business->address1) }}"
             class="w-full px-3 py-2 border rounded border-gray-300" required>
    </div>

    <div class="mb-4">
      <label for="address2" class="block font-medium text-gray-700">Address 2</label>
      <input type="text" name="address2" id="address2"
             value="{{ old('address2', $business->address2) }}"
             class="w-full px-3 py-2 border rounded border-gray-300">
    </div>

    <div class="mb-4">
      <label for="postal_code" class="block font-medium text-gray-700">Postal Code</label>
      <input type="text" name="postal_code" id="postal_code"
             value="{{ old('postal_code', $business->postal_code) }}"
             class="w-full px-3 py-2 border rounded border-gray-300" required>
    </div>

    <div class="mb-4 grid grid-cols-2 gap-4">
      <div>
        <label for="longitude" class="block font-medium text-gray-700">Longitude</label>
        <input type="text" name="longitude" id="longitude"
               value="{{ old('longitude', $business->longitude) }}"
               class="w-full px-3 py-2 border rounded border-gray-300">
      </div>
      <div>
        <label for="latitude" class="block font-medium text-gray-700">Latitude</label>
        <input type="text" name="latitude" id="latitude"
               value="{{ old('latitude', $business->latitude) }}"
               class="w-full px-3 py-2 border rounded border-gray-300">
      </div>
    </div>

    <div class="mb-4">
      <label for="phone" class="block font-medium text-gray-700">Phone</label>
      <input type="text" name="phone" id="phone"
             value="{{ old('phone', $business->phone) }}"
             class="w-full px-3 py-2 border rounded border-gray-300" required>
    </div>

    <div class="mb-4">
      <label for="web_address" class="block font-medium text-gray-700">Web Address</label>
      <input type="url" name="web_address" id="web_address"
             value="{{ old('web_address', $business->web_address) }}"
             class="w-full px-3 py-2 border rounded border-gray-300">
    </div>

    <div class="mb-4">
      <label for="email" class="block font-medium text-gray-700">Email</label>
      <input type="email" name="email" id="email"
             value="{{ old('email', $business->email) }}"
             class="w-full px-3 py-2 border rounded border-gray-300" required>
    </div>

    <div class="mb-4">
      <label for="status" class="block font-medium text-gray-700">Status</label>
      <select name="status" id="status" class="w-full px-3 py-2 border rounded border-gray-300" required>
        @foreach(['active', 'pending', 'suspended'] as $status)
          <option value="{{ $status }}" @selected(old('status', $business->status) === $status)>{{ ucfirst($status) }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-6">
      <label for="categories" class="block font-medium text-gray-700">Categories (comma separated)</label>
      <input type="text" name="categories" id="categories"
             value="{{ old('categories', isset($business->categories) ? implode(',', $business->categories) : '') }}"

             class="w-full px-3 py-2 border rounded border-gray-300" required>
    </div>

    <div class="flex justify-end gap-4">
      <a href="{{ route('admin.businesses.index') }}"
         class="text-gray-600 hover:underline">Cancel</a>
      <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded">
        {{ $business->exists ? 'Update' : 'Add' }} Business
      </button>
    </div>
  </form>
</div>
@endsection
