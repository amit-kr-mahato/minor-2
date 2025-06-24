@extends('adminLayout.app')

@section('content')

  <!-- Main content -->
  <main class="ml-64 w-full p-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Dashboard Overview</h1>

    <!-- Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-xl shadow p-6 flex justify-between items-center">
      <div>
      <p class="text-sm text-gray-500">Total Users</p>
      <p class="text-2xl font-bold text-blue-600">12,480</p>
      </div>
      <i class="fas fa-users text-2xl text-blue-500"></i>
    </div>
    <div class="bg-white rounded-xl shadow p-6 flex justify-between items-center">
      <div>
      <p class="text-sm text-gray-500">Businesses</p>
      <p class="text-2xl font-bold text-green-600">2,367</p>
      </div>
      <i class="fas fa-store text-2xl text-green-500"></i>
    </div>
    <div class="bg-white rounded-xl shadow p-6 flex justify-between items-center">
      <div>
      <p class="text-sm text-gray-500">Reviews</p>
      <p class="text-2xl font-bold text-yellow-600">58,204</p>
      </div>
      <i class="fas fa-star text-2xl text-yellow-500"></i>
    </div>
    <div class="bg-white rounded-xl shadow p-6 flex justify-between items-center">
      <div>
      <p class="text-sm text-gray-500">photo</p>
      <p class="text-2xl font-bold text-red-600">121</p>
      </div>
      <i class="fas fa-flag text-2xl text-red-500"></i>
    </div>
    </div>

    <!-- Chart -->
    <div class="bg-white rounded-xl shadow p-6 mb-8">
    <h2 class="text-lg font-semibold mb-4">Site Activity</h2>
    <canvas id="activityChart" height="100"></canvas>
    </div>
  </main>

@endsection