@extends('adminLayout.app')

@section('content')
<div class="ml-64 w-full min-h-screen p-6 bg-gray-50 flex items-center justify-center">
  <div class="container max-w-lg bg-white p-8 rounded shadow">
    <h2 class="text-3xl font-semibold mb-6 text-gray-800">Add New Category</h2>

    <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-6">
      @csrf
      @include('admin.categories.partials.form', ['buttonText' => 'Create'])
    </form>
  </div>
</div>
@endsection
