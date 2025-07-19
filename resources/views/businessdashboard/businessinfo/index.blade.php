@extends('BusinessLayout.app')

@section('content')
    <div class="ml-64 w-full min-h-screen p-6 bg-gray-300">
        <div class="max-w-[900px] px-4">
            <h2 class="text-3xl font-bold mb-6">My Businesses</h2>

            {{-- <a href="{{ route('businessdashboard.businessinfo.create') }}"
                class="bg-green-600 text-white px-4 py-2 rounded mb-4 inline-block">
                Add New
            </a> --}}

            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <table class="w-full border table-auto bg-white">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-4 py-2">Name</th>
                        <th class="border px-4 py-2">City</th>
                        <th class="border px-4 py-2">Phone</th>
                        <th class="border px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($businesses as $business)
                        <tr>
                            <td class="border px-4 py-2">{{ $business->business_name }}</td>
                            <td class="border px-4 py-2">{{ $business->city }}</td>
                            <td class="border px-4 py-2">{{ $business->phone }}</td>
                            <td class="border px-4 py-2 space-x-2">
                                <a href="{{ route('businessdashboard.businessinfo.show', $business) }}"
                                    class="text-green-600">View</a>
                                <a href="{{ route('businessdashboard.businessinfo.edit', $business) }}"
                                    class="text-blue-600">Edit</a>
                                <form action="{{ route('businessdashboard.businessinfo.destroy', $business) }}" method="POST"
                                    class="inline-block"
                                    onsubmit="return confirm('Are you sure you want to delete this business?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-gray-500">No businesses found.</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>
@endsection