@extends('adminLayout.app')

@section('content')

<div class=" ml-64 w-full p-8">
<form method="POST" action="{{ route('admin.users.update', $user) }}">
  @csrf
 
  @method('PUT')

  <input type="text" name="name" value="{{ $user->name }}" class="border p-2 w-full" required>
  <input type="email" name="email" value="{{ $user->email }}" class="border p-2 w-full" required>

  <select name="role" class="border p-2 w-full">
    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
    <option value="businessowner" {{ $user->role == 'businessowner' ? 'selected' : '' }}>Businessowner</option>
    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
  </select>

  <select name="is_active" class="border p-2 w-full">
    <option value="1" {{ $user->is_active ? 'selected' : '' }}>Active</option>
    <option value="0" {{ !$user->is_active ? 'selected' : '' }}>Suspended</option>
  </select>

  <button class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
</form>
</div>
@endsection
