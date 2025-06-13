@extends('layouts.app')

@section('content')
<div class="container promo-container">
    <div class="promo-text">
        <h1>It's to be on Bizzlisto</h1>
        <ul class="list-unstyled fs-3">
            <li>✅ 34% of Nelp users have an annual household income of $1000 or more</li>
            <li>✅ 73% of users hire or buy from a business they found on Nelp</li>

        </ul>
        <p><strong class="fs-5">Get found on Nelp today!</strong></p>
        <button class="verify-btn fw-bolder"><a href="{{route('claim')}}" class="text-light text-decoration-none">Verify my listing</a></button>
    </div>

    <div class="promo-image position-relative" id="promo">
        <img src="{{asset('frontend/images/homepage-hero-florist-woman (1).webp')}}" class="img-fluid rounded" alt="Business Owner" style="width: 80%;height:60%;">
        <div class="message-box" id="promo-1">
            <strong>Message from Abby:</strong><br>
            Do you offer a flower delivery service?
        </div>
        <div class="message-box-2" id="promo-2">
            <strong>Bloom & Co:</strong><br>
            Yes we do,How can we help?
        </div>
        <div class="message-box_1" id="promo-3">
            Bloom & Co did an AMAZING job with our arrangement order!
        </div>
    </div>
</div>

<div class="container" style="background-color: antiquewhite; height:180px;border-radius:20px;text-align: center;padding-top:70px;">
    <div class="container">
        <div class="container">
            <div class="container">
                <div class="wrapper">
                    <div class="static-txt text-dark">Join the millions of other</div>
                    <ul class="dynamic-txts">
                        <li><span>YouTuber</span></li>
                        <li><span>Designer</span></li>
                        <li><span>Developer</span></li>
                        <li><span>Freelancer</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="contert mt-5">
    <div class="container">
        <div class="contr mt-5">
            <div class="icon text-center ">
                <img class="rounded-circle border-primary icon-1 border-3" src="{{ asset('frontend/images/pngtree-hand-drawn-red-speaker-megaphone-illustration-png-image_2255153-removebg-preview.png') }}" style="height: 60px;width:60px" alt="">
            </div>
            <h5 class="text-success text-center">Claim your free page</h5>
            <h2 class="text-center"><strong>Establish trust and help customers</strong></h2>
            <h3 class="text-center"><strong>get to know your business</strong></h3>


            <div class="row align-items-center hero-section">
                <div class="col-md-6 text-center">

                    <p>Over 2.4 million people visit Yelp daily to find home services, restaurants, and other businesses.</p>
                    <ul class="feature-list list-unstyled">
                        <li><i class="bi bi-check-circle"></i> Update your business info so people can find you</li>
                        <li><i class="bi bi-check-circle"></i> Respond to reviews and messages as soon as they come in</li>
                        <li><i class="bi bi-check-circle"></i> Add photos to showcase the best of your business</li>
                    </ul>
                    <button class="verify-btn fw-bolder"><a href="{{route ('claim') }}" class="text-light text-decoration-none">Verify my listing</a></button>
                </div>
                <div class="col-md-6 text-center">
                    <img src="{{asset('frontend/images/homepage-claim-your-listing-1.webp')}}" class="img-fluid rounded" alt="Yelp Business Listing" style="width: 70%; height:60%">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="contertt " style="height: 600px;padding-top:100px;width:100%;">
    <div class=" align-items-center" id="hero" style="display: flex;">
        <div class="testimonial-card me-4">
            <span class="quote-icon">❝</span>
            <p class="testimonial-text">
            “Bizzlisto has been invaluable to us, not only for lead referral but also for validation and credibility.”
            </p>
            <p><span class="author">Ken-Mar Rescue</span>, <span class="location">CA</span></p>
        </div>

        <div class="testimonial-card me-4">
            <span class="quote-icon">❝</span>
            <p class="testimonial-text">
            “Bizzlisto has been invaluable to us, not only for lead referral but also for validation and credibility.”
            </p>
            <p><span class="author">Ken-Mar Rescue</span>, <span class="location">CA</span></p>
        </div>

        <div class="testimonial-card me-4">
            <span class="quote-icon">❝</span>
            <p class="testimonial-text">
            “Bizzlisto has been invaluable to us, not only for lead referral but also for validation and credibility.”
            </p>
            <p><span class="author">Ken-Mar Rescue</span>, <span class="location">CA</span></p>
        </div>
        <div class="testimonial-card me-4">
            <span class="quote-icon">❝</span>
            <p class="testimonial-text">
            “Bizzlisto has been invaluable to us, not only for lead referral but also for validation and credibility.”
            </p>
            <p><span class="author">Ken-Mar Rescue</span>, <span class="location">CA</span></p>
        </div>

        <div class="testimonial-card me-4">
            <span class="quote-icon">❝</span>
            <p class="testimonial-text">
            “Bizzlisto has been invaluable to us, not only for lead referral but also for validation and credibility.”
            </p>
            <p><span class="author">Ken-Mar Rescue</span>, <span class="location">CA</span></p>
        </div>

        <div class="testimonial-card me-4">
            <span class="quote-icon">❝</span>
            <p class="testimonial-text">
            “Bizzlisto has been invaluable to us, not only for lead referral but also for validation and credibility.”
            </p>
            <p><span class="author">Ken-Mar Rescue</span>, <span class="location">CA</span></p>
        </div>

        <div class="testimonial-card me-4">
            <span class="quote-icon">❝</span>
            <p class="testimonial-text">
            “Bizzlisto has been invaluable to us, not only for lead referral but also for validation and credibility.”
            </p>
            <p><span class="author">Ken-Mar Rescue</span>, <span class="location">CA</span></p>
        </div>

        <div class="testimonial-card me-4">
            <span class="quote-icon">❝</span>
            <p class="testimonial-text">
                “Bizzlisto has been invaluable to us, not only for lead referral but also for validation and credibility.”
            </p>
            <p><span class="author">Ken-Mar Rescue</span>, <span class="location">CA</span></p>
        </div>
    </div>
</div>
@endsection

