@extends('adminLayout.app')

@section('content')
<div class="ml-64 w-full min-h-screen p-6 bg-gray-300" x-data="{ openModal: false, deleteId: null }">

    {{-- Flash Message --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 mb-4 rounded shadow">
            {{ session('success') }}
        </div>
    @endif

    {{-- Advertisement Upload Form --}}
    <div class="bg-white p-6 rounded shadow mb-8">
        <h2 class="text-2xl font-semibold mb-4">Upload Advertisement</h2>

        <form action="{{ route('admin.advertisements.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div class="flex flex-wrap gap-4 items-center">
                <div>
                    <label class="block text-sm font-medium mb-1">Ad Image:</label>
                    <input type="file" name="image" accept="image/*" required class="border p-2 rounded w-52">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Position:</label>
                    <select name="position" class="border p-2 rounded w-40">
                        <option value="top">Top</option>
                        <option value="bottom">Bottom</option>
                        <option value="sidebar">Sidebar</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Status:</label>
                    <select name="status" class="border p-2 rounded w-40">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

                <div class="pt-6">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>


    {{-- Advertisement Listing Table --}}
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-semibold mb-4">All Advertisements</h2>

        <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-200 text-left text-sm">
                    <th class="p-3 border">Image</th>
                    <th class="p-3 border">Position</th>
                    <th class="p-3 border">Status</th>
                    <th class="p-3 border">Toggle</th>
                    <th class="p-3 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($ads as $ad)
                    <tr class="border-b hover:bg-gray-50 text-sm">
                        <td class="p-3 border">
                            <img src="{{ asset('storage/' . $ad->image) }}" alt="Ad Image" class="w-28 h-auto rounded">
                        </td>
                        <td class="p-3 border capitalize">{{ $ad->position }}</td>
                        <td class="p-3 border">
                            <span class="inline-block px-2 py-1 rounded text-white text-xs 
                                {{ $ad->status === 'active' ? 'bg-green-500' : 'bg-gray-500' }}">
                                {{ ucfirst($ad->status) }}
                            </span>
                        </td>
                        <td class="p-3 border">
                            <form action="{{ route('admin.advertisements.toggleStatus', $ad->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="checkbox" onchange="this.form.submit()" {{ $ad->status === 'active' ? 'checked' : '' }}>
                            </form>
                        </td>
                        <td class="p-3 border space-x-2">
                            <a href="{{ route('admin.advertisements.edit', $ad->id) }}"
                                class="rounded text-white border border-gray-400 p-2 bg-blue-700">Edit</a>
                            <button @click="openModal = true; deleteId = {{ $ad->id }}" type="button"
                                class="rounded border text-white p-2 border-gray-400 bg-red-700">
                                Delete
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-4 text-center text-gray-500">No advertisements found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Delete Confirmation Modal --}}
    <div x-show="openModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded shadow-lg w-96" @click.away="openModal = false">
            <h3 class="text-lg font-semibold mb-4">Confirm Deletion</h3>
            <p class="text-gray-700 mb-6">Are you sure you want to delete this advertisement? This action cannot be undone.</p>

            <form :action="`/admin/advertisements/${deleteId}`" method="POST" class="flex justify-end gap-4">
                @csrf
                @method('DELETE')
                <button type="button" @click="openModal = false"
                    class="px-4 py-2 rounded border border-gray-400 text-gray-700 hover:bg-gray-100">
                    Cancel
                </button>
                <button type="submit" class="px-4 py-2 rounded bg-red-600 text-white hover:bg-red-700">
                    Delete
                </button>
            </form>
        </div>
    </div>

</div>
@endsection
