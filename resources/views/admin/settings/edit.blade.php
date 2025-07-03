@extends('adminLayout.app')

@section('content')
<div class="ml-64 w-full min-h-screen p-12 mb-6 bg-gray-50 flex flex-col ">

    <div class="bg-white rounded-lg shadow-lg w-full max-w-3xl p-8">
        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-6 shadow">
                {{ session('success') }}
            </div>
        @endif

        <h2 class="text-3xl font-semibold mb-8 border-b pb-2 text-gray-800">General Settings</h2>

        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Favicon Upload --}}
            <div class="flex items-center gap-6">
                <div class="flex-shrink-0">
                    <label for="faviconInput" class="block mb-2 font-medium text-gray-700">Favicon</label>
                    <input type="file" name="favicon" id="faviconInput" accept="image/x-icon,image/png" 
                           class="border rounded p-2 cursor-pointer w-64" />
                </div>
                <div>
                    <p class="text-sm text-gray-500 mb-1">Current Favicon Preview:</p>
                    <img id="faviconPreview"
                         src="{{ setting('favicon') ? asset('storage/' . setting('favicon')) : 'https://via.placeholder.com/32?text=No+Favicon' }}"
                         alt="Favicon Preview"
                         class="w-12 h-12 rounded border border-gray-300" />
                </div>
            </div>

            <button type="submit" 
                    class="bg-blue-600 hover:bg-blue-700 transition-colors text-white font-semibold px-6 py-3 rounded shadow-md">
                Save Settings
            </button>
        </form>
    </div>

    {{-- Current Settings Table --}}
    <div class="bg-white rounded-lg shadow-lg w-full max-w-3xl mt-10 p-6">
        <h3 class="text-2xl font-semibold mb-6 border-b pb-2 text-gray-800">Current Settings</h3>

        <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-100 text-gray-700">
                    <th class="border px-4 py-3 text-left">Key</th>
                    <th class="border px-4 py-3 text-left">Value / Preview</th>
                </tr>
            </thead>
            <tbody>
                @foreach(['favicon'] as $key)
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-3 capitalize font-medium">{{ $key }}</td>
                        <td class="border px-4 py-3">
                            @if($key === 'favicon' && setting($key))
                                <img src="{{ asset('storage/' . setting($key)) }}" alt="{{ $key }}" class="w-10 h-10 rounded border" />
                            @else
                                <span class="text-gray-600">{{ setting($key) ?? 'Not Set' }}</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

<script>
    document.getElementById('faviconInput').addEventListener('change', function (e) {
        const preview = document.getElementById('faviconPreview');
        const file = e.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
