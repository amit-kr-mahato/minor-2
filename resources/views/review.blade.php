@extends('layouts.app')

@section('content')
    <div class=" text-center mt-5">
        <h2><strong>Find a business to review</strong></h2>
        <p>Review anything from your favorite patio spot to your local flower shop.</p>

        <div class="input-group search-box ">

            <input type="text" class="form-control" placeholder="Try lunch, yoga studio, plumber">
            <span class="input-group-text">|</span>
            <input type="text" class="form-control" placeholder="Current Location">
            <button class="btn btn-danger w-25 text-light">
                <i class="bi bi-search fs-2"></i>
            </button>
        </div>
    </div>

    <div class="review-section">
        <h4><strong>Visited one of these places recently?</strong></h4>
        <img src="https://cdn-icons-png.flaticon.com/512/1040/1040239.png" class="review-img" alt="Thumbs Up">
        <p>We’re out of suggestions for you right now. Keep on using help and we’ll have some more for you soon.</p>
    </div>
@endsection
