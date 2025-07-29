<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{

    public function showReviewPage()
{
    return view('review');  // this loads resources/views/review.blade.php
}
    // Show the review form for a specific business
    public function Businessreview($id)
{
    $business = Business::with(['reviews.user'])->findOrFail($id);
    $reviews = $business->reviews()->latest()->get();

    return view('writereview', compact('business', 'reviews'));
}


    // Handle review submission (only logged-in users)
    public function submitReview(Request $request)
    {
        // Validate input
        $request->validate([
            'business_id' => 'required|exists:businesses,id',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|min:85',
        ]);

        // Save to database with user_id and business_id
        Review::create([
            'user_id' => Auth::id(),
            'business_id' => $request->business_id,
            'rating' => $request->rating,
            'review' => $request->review,
        ]);

        // Redirect back with success message
        return back()->with('success', 'Review submitted successfully!');
    }
}
