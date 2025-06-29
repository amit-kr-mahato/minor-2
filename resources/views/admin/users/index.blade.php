@extends('adminLayout.app')

@section('content')
  <h1 class="text-2xl font-bold mb-4">Users</h1>

  <table class="ml-64 w-full p-8 bg-white shadow rounded mt-24">
    <thead>
    <tr class="text-left border-b">
      <th class="p-3">Name</th>
      <th>Email</th>
      <th>Role</th>
      <th>Status</th>
      <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
    <tr class="border-b">
      <td class="p-3">{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->roles[0]['name'] }}</td>
      <td>{{ $user->status ? 'Active' : 'Suspended' }}</td>
      <td class="space-x-2">
      <a href="{{ route('admin.users.edit', $user) }}" class="text-white-500 font-bold bg-blue-500 rounded p-1">Edit</a>
      <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline">
      @csrf @method('DELETE')
      <button class="text-black-500 bg-red-500 font-bold rounded p-1">Delete</button>
      </form>
      </td>
    </tr>
    @endforeach
    </tbody>
  </table>
  {{ $users->links() }}
@endsection