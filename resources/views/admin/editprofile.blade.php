

@extends('adminLayout.app')

@section('content')

<form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="ml-64 w-full p-8">
  @csrf
  @method('PUT')

  <h2 class="text-xl font-bold text-gray-800">Personal Details</h2>

  <div class="flex flex-col items-center space-y-4">
    <img 
      id="preview" 
      src="{{ auth()->user()->profile_photo_path ? asset('storage/' . auth()->user()->profile_photo_path) : 'https://i.pravatar.cc/120?u=default' }}" 
      alt="Profile" 
      class="w-28 h-28 object-cover rounded-full border-4 border-gray-200 shadow-sm"
    />
    <input type="file" id="fileInput" name="profile_photo" accept="image/*" hidden />
    <button 
      type="button" 
      class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded"
      onclick="document.getElementById('fileInput').click()"
    >
      Change Profile Photo
    </button>
  </div>

  <div class="space-y-4">
    <div>
      <label for="name" class="block font-medium text-gray-700">Full Name</label>
      <input 
        type="text" 
        id="name" 
        name="name" 
        value="{{ old('name', auth()->user()->name) }}" 
        class="block py-2.5 px-0 w-full text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none 
           focus:outline-none focus:ring-0 focus:border-blue-600 peer"
      />
    </div>
    <div>
      <label for="email" class="block font-medium text-gray-700">Email</label>
      <input 
        type="email" 
        id="email" 
        name="email" 
        value="{{ old('email', auth()->user()->email) }}" 
        class="block py-2.5 px-0 w-full text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none 
           focus:outline-none focus:ring-0 focus:border-blue-600 peer"
      />
    </div>
  </div>

  <div class="text-center pt-4">
    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded shadow-md">
      Update &nbsp; <i class="fa fa-arrow-right"></i>
    </button>
  </div>
</form>
@endsection

