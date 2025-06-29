@extends('adminLayout.app')

@section('content')

  <div class=" ml-64 w-full p-8">
    <a href="{{route('admin.users.index')}}"
    style="color:white;background-color: green;padding:10px;display:inline-block;border-radius: 10px;margin-bottom:10px">Back</a>
    <form method="POST" action="{{ route('admin.users.update', $user) }}">
    @csrf

    @method('PUT')

    <input type="text" name="name" placeholder="Name" value="{{ $user->name }}" class="border p-2 w-full" required>
    <input type="email" name="email" placeholder="Email" value="{{ $user->email }}" class="border p-2 w-full mt-4"
      required>


    <label for="">Role <br>
      @foreach($roles as $role)

      <input style="margine:30px" type="radio" name="role" value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'checked' : '' }}>
      {{ $role->name }}

    @endforeach
    </label>

    <select name="status" class="border p-2 w-full mt-4" placeholder="status">
      <option value="1" {{ $user->status ? 'selected' : '' }}>Active</option>
      <option value="0" {{ !$user->status ? 'selected' : '' }}>Suspended</option>
    </select>

    <button class="bg-blue-600 text-white px-4 py-2 rounded mt-4">Update</button>
    </form>
  </div>
@endsection