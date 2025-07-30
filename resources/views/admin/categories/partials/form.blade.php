<div class="ml-64 w-full min-h-screen p-6 bg-gray-50 flex flex-col justify-center">
  <div class="max-w-md w-full mx-auto bg-white p-6 rounded shadow">
    <form method="POST" action="{{ $formAction ?? '#' }}">
      @csrf
      @isset($method)
        @method($method)
      @endisset

      <div class="mb-5">
        <label for="name" class="block text-gray-700 font-semibold mb-2">Category Name</label>
        <input type="text" name="name" id="name" 
               value="{{ old('name', $category->name ?? '') }}" 
               required
               class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" />
        @error('name')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="flex items-center justify-between">
        <button type="submit" 
                class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded font-semibold transition">
          {{ $buttonText }}
        </button>
        <a href="{{ route('admin.categories.index') }}" 
           class="inline-block px-5 py-2 border border-gray-300 rounded text-gray-700 hover:bg-gray-100 transition">
          Cancel
        </a>
      </div>
    </form>
  </div>
</div>
