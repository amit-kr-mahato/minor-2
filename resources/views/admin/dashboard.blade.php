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
      <p class="text-4xl font-bold text-red-600">{{ $totalBusinesses }}</p>
    </div>

    <div class="bg-white rounded shadow p-6">
      <h3 class="text-lg font-semibold text-gray-700 mb-2">Total Reviews</h3>
      <p class="text-4xl font-bold text-red-600">{{ $totalReviews }}</p>
    </div>

    </div>


    <div class="flex flex-col sm:flex-row gap-4 mb-8">
    <!-- Chart 1 -->
    <div class="bg-white rounded-xl shadow p-4 w-full sm:w-1/2">
      <h2 class="text-sm font-semibold mb-2">Signups</h2>
      <div class="relative w-full h-40"> <!-- Adjust h-40 (160px) as needed -->
      <canvas id="activityChart"></canvas>
      </div>
    </div>

    <!-- Pie Chart Container (Tailwind + Responsive) -->
    <div class="bg-white rounded-xl shadow p-4 w-full sm:w-1/2 ">
      <h2 class="text-sm font-semibold mb-2 ">Overview</h2>
      <div class="relative w-full h-64 ">
      <canvas id="pieChart"></canvas>
      </div>
    </div>

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

 <script>
    const ctx = document.getElementById('pieChart').getContext('2d');
    const pieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Total Users', 'Total Businesses','Total Review'],
            datasets: [{
                label: 'User vs Business',
                data: [{{ $totalUsers }}, {{ $totalBusinesses }},{{ $totalReviews }}],
                backgroundColor: ['#36A2EB', '#FF6384','#f4d03f '],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                },
                title: {
                    display: true,
                    text: 'User vs Business vs Reviews'
                }
            }
        }
    });
    </script>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    const activityCtx = document.getElementById('activityChart').getContext('2d');
    new Chart(activityCtx, {
    type: 'line',
    data: {
      labels: @json($labels),
      datasets: [{
      label: 'Signups',
      data: @json($data),
      borderColor: 'rgb(220, 38, 38)',
      tension: 0.4
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false, // allows chart to fill container height
      scales: {
      y: {
        beginAtZero: true,
        ticks: { precision: 0 }
      }
      }
    }
    });

    // Repeat for pieChart if needed
  </script>
@endsection