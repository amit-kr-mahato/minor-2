@extends('BusinessLayout.app')

@section('content')
<div class="p-6">

    @if ($mode === 'index')
        <h1 class="text-2xl font-bold mb-4">My Businesses</h1>
        <a href="{{ route('business.businesses.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Business</a>

        <table class="mt-6 w-full border">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>City</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($businesses as $business)
                    <tr>
                        <td>{{ $business->business_name }}</td>
                        <td>{{ $business->city }}</td>
                        <td>{{ $business->email }}</td>
                        <td class="flex gap-2">
                            <a href="{{ route('business.businesses.edit', $business) }}" class="text-blue-600">Edit</a>
                            <form method="POST" action="{{ route('business.businesses.destroy', $business) }}">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Delete this business?')" class="text-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @elseif ($mode === 'create' || $mode === 'edit')

        <h1 class="text-2xl font-bold mb-4">
            {{ $mode === 'create' ? 'Create Business' : 'Edit Business' }}
        </h1>

        <form
            method="POST"
            action="{{ $mode === 'create' ? route('business.businesses.store') : route('business.businesses.update', $business) }}"
            enctype="multipart/form-data"
        >
            @csrf
            @if($mode === 'edit')
                @method('PUT')
            @endif

            <input type="hidden" name="user_id" value="{{ auth()->id() }}">

            <div>
                <label>Business Name</label>
                <input
                    type="text"
                    name="business_name"
                    value="{{ old('business_name', $business->business_name ?? '') }}"
                    required
                >
            </div>

            <div>
                <label>Province</label>
                <input
                    type="text"
                    name="province"
                    value="{{ old('province', $business->province ?? '') }}"
                    required
                >
            </div>

            <div>
                <label>City</label>
                <input
                    type="text"
                    name="city"
                    value="{{ old('city', $business->city ?? '') }}"
                    required
                >
            </div>

            <!-- Add more fields as needed -->
            <div>
                <label>Address 1</label>
                <input
                    type="text"
                    name="address1"
                    value="{{ old('address1', $business->address1 ?? '') }}"
                    required
                >
            </div>

            <div>
                <label>Address 2</label>
                <input
                    type="text"
                    name="address2"
                    value="{{ old('address2', $business->address2 ?? '') }}"
                >
            </div>

            <div>
                <label>Postal Code</label>
                <input
                    type="text"
                    name="postal_code"
                    value="{{ old('postal_code', $business->postal_code ?? '') }}"
                    required
                >
            </div>

            <div>
                <label>Longitude</label>
                <input
                    type="number"
                    step="any"
                    name="longitude"
                    value="{{ old('longitude', $business->longitude ?? '') }}"
                >
            </div>

            <div>
                <label>Latitude</label>
                <input
                    type="number"
                    step="any"
                    name="latitude"
                    value="{{ old('latitude', $business->latitude ?? '') }}"
                >
            </div>

            <div>
                <label>Phone</label>
                <input
                    type="text"
                    name="phone"
                    value="{{ old('phone', $business->phone ?? '') }}"
                    required
                >
            </div>

            <div>
                <label>Web Address</label>
                <input
                    type="url"
                    name="web_address"
                    value="{{ old('web_address', $business->web_address ?? '') }}"
                >
            </div>

            <div>
                <label>Email</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email', $business->email ?? '') }}"
                    required
                >
            </div>

            <div>
                <label>Categories</label>
                <input
                    type="text"
                    name="categories"
                    value="{{ old('categories', $business->categories ?? '') }}"
                    required
                >
            </div>

            <div>
                <label>Logo</label>
                <input type="file" name="logo">
                @if(isset($business) && $business->logo)
                    <div>
                        <img src="{{ asset('storage/' . $business->logo) }}" alt="Logo" width="80">
                    </div>
                @endif
            </div>

            <div>
                <label>Banner</label>
                <input type="file" name="banner">
                @if(isset($business) && $business->banner)
                    <div>
                        <img src="{{ asset('storage/' . $business->banner) }}" alt="Banner" width="150">
                    </div>
                @endif
            </div>

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">
                {{ $mode === 'create' ? 'Create' : 'Update' }}
            </button>

        </form>

    @endif

</div>
@endsection
