{{-- resources/views/Businessdashboard/businesses/form.blade.php --}}
@extends('BusinessLayout.app')

@section('content')
<div class="p-6 ml-64">
    <h1 class="text-2xl font-bold mb-4">
        {{ $mode === 'create' ? 'Create Business' : 'Edit Business' }}
    </h1>

    <form
        method="POST"
        action="{{ $mode === 'create' ? route('businessdashboard.businessinfo.store') : route('businessdashboard.businessinfo.update', $business) }}"
        enctype="multipart/form-data"
        class="space-y-4"
    >
        @csrf
        @if($mode === 'edit') @method('PUT') @endif

        <input type="hidden" name="user_id" value="{{ auth()->id() }}">

        {{-- Repeat your input fields here (as in your previous form) --}}
        {{-- Example: --}}
        <div>
            <label class="block font-semibold">Business Name</label>
            <input type="text" name="business_name" value="{{ old('business_name', $business->business_name ?? '') }}" required class="w-full border p-2 rounded">
        </div>

        {{-- Add remaining fields here (province, city, email, logo, etc.) --}}

        <div>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">
                {{ $mode === 'create' ? 'Create' : 'Update' }}
            </button>
            <a href="{{ route('businessdashboard.businessinfo.index') }}" class="text-gray-600 ml-4">Cancel</a>
        </div>

    </form>
</div>
@endsection
