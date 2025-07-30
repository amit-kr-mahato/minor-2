@php
    $editing = isset($category);
@endphp

<form method="POST" action="{{ $editing ? route('admin.categories.update', $category) : route('admin.categories.store') }}">
    @csrf
    @if($editing)
        @method('PUT')
    @endif

    <label>Name</label>
    <input type="text" name="name" value="{{ old('name', $category->name ?? '') }}" required>
    @error('name') <div>{{ $message }}</div> @enderror

    <label>Type</label>
    <input type="text" name="type" value="{{ old('type', $category->type ?? '') }}" required>
    @error('type') <div>{{ $message }}</div> @enderror

    <label>Slug (optional)</label>
    <input type="text" name="slug" value="{{ old('slug', $category->slug ?? '') }}">
    @error('slug') <div>{{ $message }}</div> @enderror

    <label>Icon (optional)</label>
    <input type="text" name="icon" maxlength="10" value="{{ old('icon', $category->icon ?? '') }}">
    @error('icon') <div>{{ $message }}</div> @enderror

    <label>Group (optional)</label>
    <input type="text" name="group" value="{{ old('group', $category->group ?? '') }}">
    @error('group') <div>{{ $message }}</div> @enderror

    <button type="submit">{{ $editing ? 'Update' : 'Create' }}</button>
    <a href="{{ route('admin.categories.index') }}">Cancel</a>
</form>
