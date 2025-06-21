<?php

namespace App\Http\Controllers;
// use\App\Http\Controllers\Review;

use App\Models\Review;
use Inertia\Inertia;


use Illuminate\Http\Request;

class ReviewController extends Controller {
    public function review() {
        return view( 'writereview' );

    }

    public function submitReview(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|min:85',
        ]);

        Review::create([
            'rating' => $request->input('rating'),
            'review' => $request->input('review'),
        ]);

        return back()->with('success', 'Review submitted successfully!');
    }
}

