@extends('BusinessLayout.app')

@section('content')
<div class="ml-64 w-full min-h-screen p-6 bg-gray-300">
    <div class="max-w-[900px] px-4 shadow-md">
        <h2 class="text-2xl font-bold mb-6">Edit Business</h2>

        <form action="{{ route('businessdashboard.businessinfo.update', $business) }}" method="POST" enctype="multipart/form-data"
            class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Business Name</label>
                <input type="text" name="business_name" value="{{ old('business_name', $business->business_name) }}"
                    class="w-full border px-4 py-2 rounded" required />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea name="description"
                    class="w-full border px-4 py-2 rounded">{{ old('description', $business->description) }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Province</label>
                <input type="text" name="province" value="{{ old('province', $business->province) }}"
                    class="w-full border px-4 py-2 rounded" required />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">City</label>
                <input type="text" name="city" value="{{ old('city', $business->city) }}"
                    class="w-full border px-4 py-2 rounded" required />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Address Line 1</label>
                <input type="text" name="address1" value="{{ old('address1', $business->address1) }}"
                    class="w-full border px-4 py-2 rounded" required />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Address Line 2</label>
                <input type="text" name="address2" value="{{ old('address2', $business->address2) }}"
                    class="w-full border px-4 py-2 rounded" />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Postal Code</label>
                <input type="text" name="postal_code" value="{{ old('postal_code', $business->postal_code) }}"
                    class="w-full border px-4 py-2 rounded" required />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                <input type="text" name="phone" value="{{ old('phone', $business->phone) }}"
                    class="w-full border px-4 py-2 rounded" required />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Web Address</label>
                <input type="url" name="web_address" value="{{ old('web_address', $business->web_address) }}"
                    class="w-full border px-4 py-2 rounded" />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email', $business->email) }}"
                    class="w-full border px-4 py-2 rounded" />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Categories</label>
                <input type="text" name="categories" value="{{ old('categories', $business->categories) }}"
                    class="w-full border px-4 py-2 rounded" />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Latitude</label>
                <input type="number" step="0.000001" name="latitude" value="{{ old('latitude', $business->latitude) }}"
                    class="w-full border px-4 py-2 rounded" required />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Longitude</label>
                <input type="number" step="0.000001" name="longitude"
                    value="{{ old('longitude', $business->longitude) }}" class="w-full border px-4 py-2 rounded"
                    required />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Logo</label>
                <input type="file" name="logo" accept="image/*" class="w-full border px-4 py-2 rounded" />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Banner</label>
                <input type="file" name="banner" accept="image/*" class="w-full border px-4 py-2 rounded" />
            </div>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded">Update</button>
        </form>
    </div>
</div>