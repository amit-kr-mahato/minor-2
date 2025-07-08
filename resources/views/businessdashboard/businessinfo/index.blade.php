@extends('BusinessLayout.app')

@section('content')
<div class="p-6 ml-64">

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="text-2xl font-bold mb-4">My Businesses</h1>

    <a href="{{ route('businessdashboard.businessinfo.form') }}"
       class="inline-block mb-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
        + Add New Business
    </a>

    <table class="w-full border-collapse border text-left">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-2 border">Logo</th>
                <th class="p-2 border">Name</th>
                <th class="p-2 border">City</th>
                <th class="p-2 border">Email</th>
                <th class="p-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($businesses as $business)
                <tr class="border-t hover:bg-gray-50">
                    <td class="p-2 border">
                        @if($business->logo)
                            <img src="{{ asset('storage/' . $business->logo) }}" alt="Logo" width="50">
                        @else
                            <span class="text-gray-400 italic">No Logo</span>
                        @endif
                    </td>
                    <td class="p-2 border font-semibold">{{ $business->business_name }}</td>
                    <td class="p-2 border">{{ $business->city }}</td>
                    <td class="p-2 border">{{ $business->email }}</td>
                    <td class="p-2 border flex gap-2 items-center">
                        <a href="{{ route('businessdashboard.businessinfo.businessdetail', $business) }}"
                           class="text-sm text-green-600 hover:underline">View</a>
                        <a href="{{ route('businessdashboard.businessinfo.edit', $business) }}"
                           class="text-sm text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('businessdashboard.businessinfo.destroy', $business) }}"
                              method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this business?');"
                              class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-sm text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="p-4 text-center text-gray-500">No businesses found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
