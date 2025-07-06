@extends('adminLayout.app')

@section('content')
    <div class="ml-64 w-full min-h-screen p-6 bg-gray-100">
        {{-- Flash Messages --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 mb-4 rounded shadow">
                {{ session('success') }}
            </div>
        @endif

        {{-- Advertisement Upload Form --}}
        <div class="bg-white p-6 rounded shadow mb-8">
            <h2 class="text-xl font-semibold mb-4">Add Advertisement</h2>

            <form action="{{ route('admin.advertisements.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label class="block mb-1 text-gray-700">Title</label>
                    <input type="text" name="title" class="w-full p-2 border rounded" required>
                </div>

                <div class="mb-4">
                    <label class="block mb-1 text-gray-700">Image</label>
                    <input type="file" name="image" class="w-full p-2 border rounded" required>
                </div>

                <div class="mb-4">
                    <label class="block mb-1 text-gray-700">Status</label>
                    <select name="status" class="w-full p-2 border rounded">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                    Upload
                </button>
            </form>
        </div>

        {{-- Advertisement List --}}
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-xl font-semibold mb-4">All Advertisements</h2>

            <table class="w-full table-auto text-left border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-2 border">Image</th>
                        <th class="p-2 border">Title</th>
                        <th class="p-2 border">Status</th>
                        <th class="p-2 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($ads as $ad)
                        <tr>
                            <td class="p-2 border">
                                <img src="{{ asset('storage/' . $ad->image) }}" class="w-24 rounded" alt="Ad Image">
                            </td>
                            <td class="p-2 border">{{ $ad->title }}</td>
                            <td class="p-2 border">
                                <form method="POST" action="{{ route('admin.advertisements.toggleStatus', $ad->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button
                                        class="text-sm px-3 py-1 rounded {{ $ad->status === 'active' ? 'bg-green-500 text-white' : 'bg-gray-300 text-gray-800' }}">
                                        {{ ucfirst($ad->status) }}
                                    </button>
                                </form>
                            </td>

                            <td class="p-2 flex justify-around items-center gap-2" x-data="{ showConfirm: false }">
                                <a href="{{ route('admin.advertisements.edit', $ad->id) }}"
                                    class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition">
                                    Edit
                                </a>

                                <!-- Delete Button triggers modal -->
                                <button @click="showConfirm = true"
                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition">
                                    Delete
                                </button>

                                <!-- Confirmation Modal -->
                                <div x-show="showConfirm"
                                    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50"
                                    style="display: none;">
                                    <div class="bg-white rounded p-6 max-w-sm mx-auto text-center shadow-lg">
                                        <p class="mb-4">Are you sure you want to delete this advertisement?</p>
                                        <div class="flex justify-center gap-4">
                                            <button @click="showConfirm = false"
                                                class="px-4 py-2 rounded border border-gray-400 hover:bg-gray-100">
                                                Cancel
                                            </button>

                                            <!-- Actual form submit -->
                                            <form action="{{ route('admin.advertisements.destroy', $ad->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                                                    Yes, Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>


                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-4 text-center text-gray-500">No advertisements found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection