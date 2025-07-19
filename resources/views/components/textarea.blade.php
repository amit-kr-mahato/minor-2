@props(['label', 'name', 'value' => ''])

<div class="mb-4">
  <label for="{{ $name }}" class="block font-medium mb-1">{{ $label }}</label>
  <textarea name="{{ $name }}" id="{{ $name }}" rows="4"
            class="w-full border border-gray-300 rounded px-3 py-2 shadow-sm focus:outline-none focus:ring focus:ring-blue-200">{{ $value }}</textarea>
  @error($name)
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
  @enderror
</div>
