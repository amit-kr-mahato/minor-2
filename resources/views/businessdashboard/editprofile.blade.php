

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


   <!-- Change Password Trigger Button -->
<div class="text-center pt-4">
  <button 
    type="button" 
    class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded shadow-md"
    onclick="document.getElementById('changePasswordModal').classList.remove('hidden')"
  >
  <i class="fa fa-arrow-right"></i>
    Change Password
  </button>
</div>

</form>

@endsection

<!-- Change Password Modal -->
<div id="changePasswordModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
  <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md relative">
    
    <h2 class="text-xl font-semibold mb-4 text-center text-gray-800">Change Password</h2>

    <form method="POST" action="{{ route('password.update') }}">
      @csrf
      @method('PUT')

      <div class="mb-4">
        <label for="current_password" class="block text-gray-700">Current Password</label>
        <input type="password" id="current_password" name="current_password" placeholder="more than 6 character" required
               class="w-full mt-1 px-4 py-2 border rounded-md focus:ring focus:ring-blue-400" />
      </div>

      <div class="mb-4">
        <label for="new_password" class="block text-gray-700">New Password</label>
        <input type="password" id="new_password" name="new_password" required placeholder="more than 6 character"
               class="w-full mt-1 px-4 py-2 border rounded-md focus:ring focus:ring-blue-400" />
      </div>

      <div class="mb-6">
        <label for="new_password_confirmation" class="block text-gray-700">Confirm New Password</label>
        <input type="password" id="new_password_confirmation" name="new_password_confirmation" placeholder="more than 6 character" required
               class="w-full mt-1 px-4 py-2 border rounded-md focus:ring focus:ring-blue-400" />
      </div>

      <div class="flex justify-between">
        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
          Update Password
        </button>
        <button type="button"
                onclick="document.getElementById('changePasswordModal').classList.add('hidden')"
                class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
          Cancel
        </button>
      </div>
    </form>
  </div>
</div>


