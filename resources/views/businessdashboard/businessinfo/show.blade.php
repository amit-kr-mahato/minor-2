@extends('BusinessLayout.app')

@section('content')
    <div class="ml-64 w-full min-h-screen p-6 bg-gray-300">
        <div class="max-w-[1000px] px-4">
            <h2 class="text-3xl font-semibold mb-8 text-gray-800">View Listing</h2>
            <a href="{{ route('businessdashboard.businessinfo.index') }}" class="text-blue-600 hover:underline">← Back</a>

            <div class="bg-white p-6 rounded-lg shadow-md space-y-6">

                <!-- Business Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Business Name</label>
                    <input type="text" readonly value="{{ $business->business_name }}"
                        class="w-full bg-gray-100 border border-gray-200 rounded-md px-4 py-2 text-gray-700 cursor-not-allowed" />
                </div>

                <!-- Address 1 -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Address Line 1</label>
                    <input type="text" readonly value="{{ $business->address1 }}"
                        class="w-full bg-gray-100 border border-gray-200 rounded-md px-4 py-2 text-gray-700 cursor-not-allowed" />
                </div>

                <!-- Address 2 -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Address Line 2</label>
                    <input type="text" readonly value="{{ $business->address2 }}"
                        class="w-full bg-gray-100 border border-gray-200 rounded-md px-4 py-2 text-gray-700 cursor-not-allowed" />
                </div>

                <!-- City -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">City</label>
                    <input type="text" readonly value="{{ $business->city }}"
                        class="w-full bg-gray-100 border border-gray-200 rounded-md px-4 py-2 text-gray-700 cursor-not-allowed" />
                </div>

                <!-- Province -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Province</label>
                    <input type="text" readonly value="{{ $business->province }}"
                        class="w-full bg-gray-100 border border-gray-200 rounded-md px-4 py-2 text-gray-700 cursor-not-allowed" />
                </div>

                <!-- Postal Code -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Postal Code</label>
                    <input type="text" readonly value="{{ $business->postal_code }}"
                        class="w-full bg-gray-100 border border-gray-200 rounded-md px-4 py-2 text-gray-700 cursor-not-allowed" />
                </div>

                <!-- Longitude -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Longitude</label>
                    <input type="text" readonly value="{{ $business->longitude }}"
                        class="w-full bg-gray-100 border border-gray-200 rounded-md px-4 py-2 text-gray-700 cursor-not-allowed" />
                </div>

                <!-- Latitude -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Latitude</label>
                    <input type="text" readonly value="{{ $business->latitude }}"
                        class="w-full bg-gray-100 border border-gray-200 rounded-md px-4 py-2 text-gray-700 cursor-not-allowed" />
                </div>

                <!-- Phone -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                    <input type="tel" readonly value="{{ $business->phone }}"
                        class="w-full bg-gray-100 border border-gray-200 rounded-md px-4 py-2 text-gray-700 cursor-not-allowed" />
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" readonly value="{{ $business->email }}"
                        class="w-full bg-gray-100 border border-gray-200 rounded-md px-4 py-2 text-gray-700 cursor-not-allowed" />
                </div>

                <!-- Website -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Website</label>
                    <input type="url" readonly value="{{ $business->web_address }}"
                        class="w-full bg-gray-100 border border-gray-200 rounded-md px-4 py-2 text-gray-700 cursor-not-allowed" />
                </div>

                <!-- Categories -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                    <input type="text" readonly value="{{ $business->categories }}"
                        class="w-full bg-gray-100 border border-gray-200 rounded-md px-4 py-2 text-gray-700 cursor-not-allowed" />
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea readonly rows="4"
                        class="w-full bg-gray-100 border border-gray-200 rounded-md px-4 py-2 text-gray-700 cursor-not-allowed">{{ $business->description ?? 'No description available' }}</textarea>
                </div>

                <!-- Logo (optional display) -->
                @if ($business->logo)
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Logo</label>
                        <img src="{{ asset('storage/' . $business->logo) }}" alt="Business Logo" class="h-20 w-auto rounded" />
                    </div>
                @endif

                <!-- Banner (optional display) -->
                @if ($business->banner)
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Banner</label>
                        <img src="{{ asset('storage/' . $business->banner) }}" alt="Business Banner"
                            class="h-40 w-full object-cover rounded" />
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection