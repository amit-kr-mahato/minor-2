@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="banner">
        <strong>Finish claiming your free page.</strong> Then redeem your $300 credit when you start Bizzlisto Ads.
    </div>
    <div class="row">
        <div class="col-md-6 mt-5">
            <div class="search-container">
                <h2>Let’s start with your business name!</h2>
                <p>Search for your business. If you can’t find it, you can add your business name so that we can help you claim your Yelp Page.</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Your business name" aria-label="Business Name">
                    <button class="btn btn-danger" type="button"><a href="{{route('addbusiness')}}" class="text-decoration-none text-light">Search</a></button>
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-5">
            <img src="{{asset('frontend/images/image.png')}}" style="width: 400px; height:300px;" alt="">
        </div>
    </div>
</div>
@endsection