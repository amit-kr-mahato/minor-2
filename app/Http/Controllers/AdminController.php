<?php

namespace App\Http\Controllers;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Business;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\BusinessController;
use Carbon\Carbon;

class AdminController extends Controller {
public function dashboard()
{
    // Total counts
    $totalUsers = User::count();
    $totalBusinesses = Business::count();
    $totalReviews = Review::count();

    // User signups grouped by week for last 8 weeks
    $signups = User::select(
        DB::raw('YEAR(created_at) as year'),
        DB::raw('WEEK(created_at, 1) as week'), // ISO week number
        DB::raw('COUNT(*) as count')
    )
    ->where('created_at', '>=', now()->subWeeks(8))
    ->groupBy('year', 'week')
    ->orderBy('year')
    ->orderBy('week')
    ->get();

    $labels = [];
    $data = [];

    $startWeek = now()->subWeeks(7)->startOfWeek();

    for ($i = 0; $i < 8; $i++) {
        $weekStart = $startWeek->copy()->addWeeks($i);
        $year = $weekStart->year;
        $week = $weekStart->weekOfYear;

        $labels[] = $weekStart->format('M d'); // e.g. 'Jun 01'

        $match = $signups->first(fn($s) => $s->year == $year && $s->week == $week);
        $data[] = $match ? $match->count : 0;
    }

    // Fetch recent reviews with related user and business
    $reviews = Review::with(['user', 'business'])
        ->latest()
        ->take(10)
        ->get();

    return view('admin.dashboard', compact(
        'totalUsers',
        'totalBusinesses',
        'totalReviews',
        'labels',
        'data',
        'reviews'  // <-- Pass reviews here
    ));
}


    // App\Http\Controllers\Admin\BusinessController.php

public function updateStatus(Request $request, Business $business)
{
    $request->validate([
        'status' => 'required|in:approved,suspended,banned',
    ]);

    $business->status = $request->status;
    $business->save();

    return back()->with('success', 'Business status updated successfully!');
}



}
