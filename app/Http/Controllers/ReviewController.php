<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // Show the review form
    public function review()
    {
        return view('writereview');
    }

    // Handle review submission
    public function submitReview(Request $request)
    {
        // Validate input
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:85',
        ]);

        // Save to database
        Review::create([
            'rating' => $request->rating,
            'review' => $request->review,
        ]);

        // Redirect with success message
        return back()->with('success', 'Review submitted successfully!');
    }
}
