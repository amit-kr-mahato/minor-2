@extends('BusinessLayout.app')

@section('content')
<div class="ml-64 w-full min-h-screen p-6 bg-gray-300">
    <div class="max-w-[1000px]  px-4 ">
    <h2 class="text-3xl font-semibold mb-8 text-gray-800">View Listing</h2>

    <div class="bg-white p-6 rounded-lg shadow-md space-y-6">

        <!-- Business Name -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Business Name</label>
            <input type="text" readonly value="Your Business Name"
                class="w-full bg-gray-100 border border-gray-200 rounded-md px-4 py-2 text-gray-700 cursor-not-allowed" />
        </div>

        <!-- Address -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
            <input type="text" readonly value="123 Street, City, Country"
                class="w-full bg-gray-100 border border-gray-200 rounded-md px-4 py-2 text-gray-700 cursor-not-allowed" />
        </div>

        <!-- Phone -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
            <input type="tel" readonly value="+1234567890"
                class="w-full bg-gray-100 border border-gray-200 rounded-md px-4 py-2 text-gray-700 cursor-not-allowed" />
        </div>

        <!-- Email -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" readonly value="example@email.com"
                class="w-full bg-gray-100 border border-gray-200 rounded-md px-4 py-2 text-gray-700 cursor-not-allowed" />
        </div>

        <!-- Website -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Website</label>
            <input type="url" readonly value="https://example.com"
                class="w-full bg-gray-100 border border-gray-200 rounded-md px-4 py-2 text-gray-700 cursor-not-allowed" />
        </div>

        <!-- Opening Hours -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Opening Hours</label>
            <input type="text" readonly value="Mon-Fri: 9am - 6pm"
                class="w-full bg-gray-100 border border-gray-200 rounded-md px-4 py-2 text-gray-700 cursor-not-allowed" />
        </div>

        <!-- Category -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
            <input type="text" readonly value="Retail"
                class="w-full bg-gray-100 border border-gray-200 rounded-md px-4 py-2 text-gray-700 cursor-not-allowed" />
        </div>

        <!-- Description -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
            <textarea readonly rows="4"
                class="w-full bg-gray-100 border border-gray-200 rounded-md px-4 py-2 text-gray-700 cursor-not-allowed">This is a sample business description.</textarea>
        </div>

    </div>
</div>

</div>