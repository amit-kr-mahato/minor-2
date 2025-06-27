<?php

namespace App\Http\Controllers;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Business;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminController extends Controller {
    public function dashboard() {
        // Total users count
        $totalUsers = User::count();
        $totalBusinesses = Business::count();
        // Total reviews count
        $totalReviews = Review::count();

        // Get user signups grouped by week for the last 8 weeks
        $signups = User::select(
            DB::raw( 'YEAR(created_at) as year' ),
            DB::raw( 'WEEK(created_at, 1) as week' ),  // ISO week number, Monday start
            DB::raw( 'COUNT(*) as count' )
        )
        ->where( 'created_at', '>=', now()->subWeeks( 8 ) )
        ->groupBy( 'year', 'week' )
        ->orderBy( 'year' )
        ->orderBy( 'week' )
        ->get();

        // Prepare labels and data arrays
        $labels = [];
        $data = [];

        $startWeek = now()->subWeeks( 7 )->startOfWeek();
        // 8 weeks ago Monday

        for ( $i = 0; $i < 8; $i++ ) {
            $weekStart = $startWeek->copy()->addWeeks( $i );
            $year = $weekStart->year;
            $week = $weekStart->weekOfYear;

            $labels[] = $weekStart->format( 'M d' );
            // e.g. 'Jun 01'

            $match = $signups->first( fn( $s ) => $s->year == $year && $s->week == $week );
            $data[] = $match ? $match->count : 0;
        }

        // Pass all data to view
        return view( 'admin.dashboard', compact( 'totalUsers', 'totalBusinesses', 'totalReviews', 'labels', 'data' ) );

    }
}
