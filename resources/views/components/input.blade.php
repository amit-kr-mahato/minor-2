@props(['label', 'name', 'value' => '', 'type' => 'text', 'id' => null, 'required' => false])

<div class="mb-4">
  <label for="{{ $id ?? $name }}" class="block font-medium mb-1">{{ $label }}</label>
  <input type="{{ $type }}" name="{{ $name }}" id="{{ $id ?? $name }}"
         value="{{ $value }}"
         {{ $required ? 'required' : '' }}
         class="w-full border border-gray-300 rounded px-3 py-2 shadow-sm focus:outline-none focus:ring focus:ring-blue-200">
  @error($name)
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
  @enderror
</div>
