<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;


class BusinessReviewController extends Controller
{
    public function index()
    {
        // Load reviews with associated user and business
        $reviews = Review::with(['user', 'business'])->get();
        return view('businessdashboard.reviews.index', compact('reviews'));
    }

    public function edit($id)
    {
        // Load a single review with relationships
        $review = Review::with(['user', 'business'])->findOrFail($id);
        return view('businessdashboard.reviews.edit', compact('review'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $review = Review::findOrFail($id);
        $review->update([
            'comment' => $request->comment,
            'rating' => $request->rating,
        ]);

        return redirect()->route('businessdashboard.reviews.index')->with('success', 'Review updated.');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('businessdashboard.reviews.index')->with('success', 'Review deleted.');
    }
}
