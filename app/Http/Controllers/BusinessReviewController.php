<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class BusinessReviewController extends Controller {
    // Display all reviews with related user and business

    public function index() {
        $reviews = Review::with( [ 'user', 'business' ] )->get();

        return view( 'businessdashboard.reviews.index', compact( 'reviews' ) );
    }

    // Show the form for editing a specific review

    public function edit( $id ) {
        $review = Review::with( [ 'user', 'business' ] )->findOrFail( $id );

        return view( 'businessdashboard.reviews.edit', compact( 'review' ) );
    }

    // Update a specific review

    public function update( Request $request, $id ) {
        $request->validate( [
            'comment' => 'required|string',
            'rating'  => 'required|integer|min:1|max:5',
        ] );

        $review = Review::findOrFail( $id );

        $review->update( [
            'review' => $request->input( 'comment' ),
            'rating' => $request->input( 'rating' ),
        ] );

        return redirect()->route( 'businessdashboard.reviews.index' )
        ->with( 'success', 'Review updated successfully.' );
    }

    // Delete a specific review

    public function destroy( $id ) {
        $review = Review::findOrFail( $id );

        $review->delete();

        return redirect()->route( 'businessdashboard.reviews.index' )
        ->with( 'success', 'Review deleted successfully.' );
    }
}
