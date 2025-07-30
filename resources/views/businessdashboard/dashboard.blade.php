@extends('BusinessLayout.app')

@section('content')
<!-- Main Content -->
<main class="p-8 ml-64 flex-1">

    <h2 class="text-3xl font-bold text-gray-800 mb-6">Dashboard</h2>


    <div class="grid md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded shadow p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Total Reviews</h3>
            <p class="text-4xl font-bold text-red-600">{{ $totalReviews }}</p>
        </div>

        <div class="bg-white rounded shadow p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Total Rating Count</h3>
            <p class="text-4xl font-bold text-red-600">{{ $totalRatingCount }}</p>
        </div>
    </div>

    {{---------------------------- Chart Content -----------------------------------}}
    <div class="bg-white rounded-xl shadow p-4 sm:w-1/2 mb-4">
        <h2 class="text-sm font-semibold mb-2">Overview</h2>
        <div class="relative w-full h-64 ml-32">
            <canvas id="pieChart"></canvas>
        </div>
    </div>

    {{-- ----------------------------------- Review content -------------------------- --}}
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
                        <td class="px-4 py-2 border">{{ $review->business?->business_name ?? 'N/A' }}</td>
                        <td class="px-4 py-2 border">{{ $review->rating }}</td>
                        <td class="px-4 py-2 border truncate max-w-xs">{{ $review->review }}</td>
                        <td class="px-4 py-2 border">{{ $review->created_at->format('Y-m-d') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</main>


<script>
  function toggleDiagonal() {
    document.body.classList.toggle('dark');
  }
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>
    // Pass PHP variables to JS safely
    const ratings = @json($ratings);         // e.g. [1, 2, 3, 4, 5]
    const ratingTotals = @json($ratingTotals); // e.g. [3, 8, 15, 10, 4]

    const ctx = document.getElementById('pieChart').getContext('2d');

    const pieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ratings.map(r => r + ' Star'), // ['1 Star', '2 Star', ...]
            datasets: [{
                label: 'Ratings Count',
                data: ratingTotals,
                backgroundColor: [
                    '#FF6384', // 1 star - red
                    '#FF9F40', // 2 stars - orange
                    '#FFCD56', // 3 stars - yellow
                    '#4BC0C0', // 4 stars - teal
                    '#36A2EB'  // 5 stars - blue
                ],
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
                    text: 'Ratings Distribution'
                }
            }
        }
    });
</script>

@endsection
