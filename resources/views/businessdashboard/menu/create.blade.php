@extends('BusinessLayout.app')

@section('content')
    <div class="ml-64 w-full min-h-screen p-6 bg-gray-100">
        <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold text-gray-800">Create Menu</h1>
                <a href="{{ route('menu.index') }}" class="text-blue-600 hover:underline">← Back</a>
            </div>

            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 text-red-700 border border-red-300 rounded">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('menu.store') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Upload Images</label>
                    <input id="imageInput" type="file" name="images[]" multiple required
                        class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4
                        file:rounded file:border-0 file:text-sm file:font-semibold
                        file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                </div>

                <!-- Preview container -->
                <div id="preview" class="flex flex-wrap gap-4"></div>

                <div>
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded transition">
                        Create Menu
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const imageInput = document.getElementById('imageInput');
        const preview = document.getElementById('preview');

        imageInput.addEventListener('change', function() {
            preview.innerHTML = ''; // Clear existing previews

            if (this.files) {
                Array.from(this.files).forEach(file => {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'w-24 h-24 object-cover rounded border';
                        preview.appendChild(img);
                    }

                    reader.readAsDataURL(file);
                });
            }
        });
    </script>
@endsection
