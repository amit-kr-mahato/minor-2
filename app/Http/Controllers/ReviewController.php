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
        //dd($request->all());
        // Validate input
        $request->validate([
            'rating' => 'required',
            'review' => 'required',
        ]);

        // Save to database
        Review::create([
            'rating' => $request->rating,
            'review' => $request->review,
        ]);

        // $r = Review::new();
        // $r->rating = $request->rating;
        // $r->rating =$request->review;
        // $r->save();

        // Redirect with success message
        return back()->with('success', 'Review submitted successfully!');
    }
}
