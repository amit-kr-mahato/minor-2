@extends('adminLayout.app')

@section('content')


  <!-- Main Content -->
  <main class="ml-64 p-8 w-full ">

    <h2 class="text-3xl font-bold text-gray-800 mb-6">Dashboard</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

    <div class="bg-white rounded shadow p-6">
      <h3 class="text-lg font-semibold text-gray-700 mb-2">Total Users</h3>
      <p class="text-4xl font-bold text-red-600"> {{ $totalUsers }}</p>
    </div>

    <div class="bg-white rounded shadow p-6">
      <h3 class="text-lg font-semibold text-gray-700 mb-2">Total Businesses</h3>
      <p class="text-4xl font-bold text-red-600">1,250</p>
    </div>

    <div class="bg-white rounded shadow p-6">
      <h3 class="text-lg font-semibold text-gray-700 mb-2">Total Reviews</h3>
      <p class="text-4xl font-bold text-red-600">12,800</p>
    </div>

    </div>

    <!-- Chart -->
    <div class="bg-white rounded-xl shadow p-6 mb-8">
    <h2 class="text-lg font-semibold mb-4">Site Activity (Weekly Signups)</h2>
    <canvas id="activityChart" height="100"></canvas>

    </div>

    <section class="bg-white rounded shadow p-6">
    <h3 class="text-xl font-semibold text-gray-800 mb-4">Recent Reviews</h3>

    <table class="w-full text-left table-auto border-collapse">
      <thead>
      <tr class="bg-red-100 text-red-700">
        <th class="px-4 py-2 border">User</th>
        <th class="px-4 py-2 border">Business</th>
        <th class="px-4 py-2 border">Rating</th>
        <th class="px-4 py-2 border">Comment</th>
        <th class="px-4 py-2 border">Date</th>
      </tr>
      </thead>
      <tbody>
      <tr class="hover:bg-red-50">
        <td class="px-4 py-2 border">John D.</td>
        <td class="px-4 py-2 border">Joe's Pizza</td>
        <td class="px-4 py-2 border">5</td>
        <td class="px-4 py-2 border truncate max-w-xs">Great pizza and fast delivery!</td>
        <td class="px-4 py-2 border">2025-06-24</td>
      </tr>
      <tr class="hover:bg-red-50 bg-red-50">
        <td class="px-4 py-2 border">Emily R.</td>
        <td class="px-4 py-2 border">Coffee Hub</td>
        <td class="px-4 py-2 border">4</td>
        <td class="px-4 py-2 border truncate max-w-xs">Nice ambiance but coffee was average.</td>
        <td class="px-4 py-2 border">2025-06-23</td>
      </tr>
      <tr class="hover:bg-red-50">
        <td class="px-4 py-2 border">Mike T.</td>
        <td class="px-4 py-2 border">Sushi Place</td>
        <td class="px-4 py-2 border">3</td>
        <td class="px-4 py-2 border truncate max-w-xs">Service could be better.</td>
        <td class="px-4 py-2 border">2025-06-22</td>
      </tr>
      </tbody>
    </table>
    </section>
  </main>

@endsection