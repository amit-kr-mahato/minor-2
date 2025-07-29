@extends('layouts.app')

@section('content')
    <div class=" text-center mt-5">
        <h2><strong>Find a business to review</strong></h2>
        <p>Review anything from your favorite patio spot to your local flower shop.</p>

        <form action="{{ route('business.search') }}" method="GET" class="d-flex me-5">
        <div class="input-group search-box ">
            <input type="text"  name="name" class="form-control" placeholder="Try lunch, yoga studio, plumber"  value="{{ request('name') }}">
            <span class="input-group-text">|</span>
            <input type="text" name="location" class="form-control" placeholder="Current Location"  value="{{ request('location') }}">
            <button class="btn btn-danger w-25 text-light">
                <i class="bi bi-search fs-2"></i>
            </button>
        </div>
         </form>
    </div>

    <div class="review-section">
        <h4><strong>Visited one of these places recently?</strong></h4>
        <img src="https://cdn-icons-png.flaticon.com/512/1040/1040239.png" class="review-img" alt="Thumbs Up">
        <p>We’re out of suggestions for you right now. Keep on using help and we’ll have some more for you soon.</p>
    </div>
@endsection
