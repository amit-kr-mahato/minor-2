@extends('layouts.app')

@section('content')
    <div id="feature">
        <div id="featureimg">
            <div id="fleft">

                <div class="container my-4 flet">
                    <h5 class="text-muted">Sponsored Results</h5>
                    <ul>
                        @foreach ($businesses as $business)
                            <a href="{{route('businessdetail')}}" class="text-decoration-none text-dark">
                                <div class="card fleftem mb-3 shadow-sm">
                                    <div class="row box-s g-0">
                                        <div class="col-md-2" style="padding-top:20px;">
                                            <img src="{{ $business->logo ? asset('storage/' . $business->logo) : 'https://via.placeholder.com/100x100?text=No+Logo' }}"
                                                class="restaurant-img" alt="{{ $business->business_name }}">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title fw-bold">{{ $business->business_name }}</h5>
                                                <div class="d-flex align-items-center mb-2">
                                                    <div class="rating-stars me-2">★★★★★</div>
                                                    <div class="text-muted ms-2 font">4.4 (57 reviews)</div>
                                                </div>
                                                <div class="text-muted font">
                                                    📍 {{ $business->city }} <span class="text-danger fw-semibold">Closed until
                                                        10:00 AM</span>
                                                </div>
                                                <div class="mb-2">
                                                    <span class="custom-badge me-2 font">🌱{{ $business->categories }}</span>
                                                    <span class="text-muted font">👥 Large group friendly</span>
                                                </div>
                                                <div class="text-primary mb-1 font">📝 Make an Online Reservation</div>
                                                <p class="card-text text-muted font">“I've been here twice and I enjoyed my
                                                    ramen both
                                                    times... <span class="text-decoration-none">more</span></p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span class="tag">{{ $business->categories }}</span>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>


                        @endforeach

                    </ul>
                </div>
            </div>
            <div id="fright">
                <div class="images">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d56947.66644355438!2d85.7569402747768!3d26.86445967876073!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ec6f054dc2f283%3A0x283f99d0f55f25ed!2sAurahi%2C%2045700!5e0!3m2!1sen!2snp!4v1744282421508!5m2!1sen!2snp"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>

                </div>
            </div>
        </div>
    </div>

    </div>
@endsection