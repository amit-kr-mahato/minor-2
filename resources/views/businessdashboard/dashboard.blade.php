@extends('BusinessLayout.app')

@section('content')
<!-- Main Content -->
<main class="p-8 ml-64 flex-1">

    <h2 class="text-3xl font-bold text-gray-800 mb-6">Dashboard</h2>

    <div class="grid  md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded shadow p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-2">TotalReview</h3>
            <p class="text-4xl font-bold text-red-600">{{$totalReviews}}</p>
        </div>

        <div class="bg-white rounded shadow p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Rating</h3>
            <p class="text-4xl font-bold text-red-600">2.4k</p>
        </div>
    </div>

   {{---------------------------- chart Content-----------------------------------}}
   <div class="bg-white rounded-xl shadow p-4  sm:w-1/2 mb-4">
      <h2 class="text-sm font-semibold mb-2 ">Overview</h2>
      <div class="relative w-full h-64 ml-32 ">
      <canvas id="pieChart"></canvas>
      </div>
    </div>

    {{-- -----------------------------------Review content-------------------------- --}}

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

                @foreach ($recentReviews as $review)
                    <tr class="hover:bg-red-50">
                        <td class="px-4 py-2 border">{{ $review->user?->name ?? 'N/A' }}</td>
                        <td class="px-4 py-2 border">{{ $review->business?->name ?? 'N/A' }}</td>
                        <td class="px-4 py-2 border">{{ $review->rating }}</td>
                        <td class="px-4 py-2 border truncate max-w-xs">{{ $review->review }}</td>
                        <td class="px-4 py-2 border">{{ $review->created_at->format('Y-m-d') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</main>


 <script src="https://cdn.jsdelivr.net/npm/chart.js" ></script>
<script>
    const ctx = document.getElementById('pieChart').getContext('2d');
    const pieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Total Review'],
            datasets: [{
                label: 'totalReviews',
                data: [{{ $totalReviews }}],
                backgroundColor: ['#36A2EB'],
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
                    text: ' Reviews'
                }
            }
        }
    });
    </script>