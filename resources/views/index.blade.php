@extends('layouts.app')

@section('content')
    <!-- --------------------image-slider-------------------->
    <div class="carousel">

        <div class="list">

            <div class="item" style="background-image:url('{{ asset('frontend/images/Chicken-Soup-main-2.webp') }}')">
                <div class="content">
                    <div class="title mb-4" style="color:white;">Praiseworthy soup</div>
                    <div class="btn">
                        <a href="#" class="btn btn-danger text-light text-decoration-none fw-bolder">Italian</a>
                    </div>
                </div>
            </div>

            <div class="item"
                style="background-image:url('{{ asset('frontend/images/plumber-fixing-white-sink-pipe-with-adjustable-wrench-picture-id1150199946.jpg') }}')">

                <div class="content">
                    <div class="container">
                        <div class="title mb-4" style="color:white;">Time for a tune-up?</div>

                        <div class="btn">
                            <button class=" btn-danger" style="background-color: red;color:white"> <a href=""
                                    class="text-light text-decoration-none fw-bolder">Auto Repaire</a></button>

                        </div>
                    </div>
                </div>

            </div>

            <div class="item"
                style="background-image:url('{{ asset('frontend/images/6126-08643014en_Masterfile.jpg') }}');">

                <div class="content">
                    <div class="title mb-4" style="color:white;">Nothing like a new coat of paint</div>
                    <div class="btn">
                        <button class=" btn-danger" style="background-color: red;color:white"><a href=""
                                class="text-light text-decoration-none fw-bolder">Painter</a></button>

                    </div>
                </div>

            </div>

        </div>

        <div class="arrows">
            <button class="prev">></button>

            <button class="next">></button>
        </div>

    </div>

    <!------------------------------ Recent Acativity-------------------------------->

    <div class="container mt-4">
        <h1 class="text-center">Recent Activity</h1>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card p-3 shadow-sm">
                    <div class="d-flex align-items-center mb-2">
                        <img src="{{ asset('frontend/images/Chicken-Soup-main-2.webp') }}" class="rounded-circle me-2"
                            width="50" height="50" alt="User Image">
                        <div>
                            <p class="mb-0"><strong>Phil A.</strong> wrote a review</p>
                            <small class="text-muted">28 minutes ago</small>
                        </div>
                    </div>
                    <img src="{{ asset('frontend/images/plumber-fixing-white-sink-pipe-with-adjustable-wrench-picture-id1150199946.jpg') }}"
                        class="img-fluid rounded mb-2" alt="City Image">
                    <a href="#" class="text-dark text-decoration-none">
                        <h5>city of the evil</h5>
                    </a>
                    <p class="text-danger">★★★★☆</p>
                    <p class="short-paragraph">Emeryville is a small city, right next to the bay, that's sandwiched in
                        between Oakland and Berkeley!...</p>
                    <p class="full-paragraph" style="display: none;">Emeryville is a small city, right next to the bay,
                        that's sandwiched in between Oakland and Berkeley! It has a vibrant community and offers various
                        activities for residents and visitors alike. The city is known for its art scene, parks, and
                        waterfront views. Whether you're looking to explore local shops or enjoy a meal at one of the many
                        restaurants, Emeryville has something for everyone.</p>
                    <a href="#" class="text-dark read-more">Read more</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3 shadow-sm">
                    <div class="d-flex align-items-center mb-2">
                        <img src="{{ asset('frontend/images/Chicken-Soup-main-2.webp') }}" class="rounded-circle me-2"
                            width="50" height="50" alt="User Image">
                        <div>
                            <p class="mb-0"><strong>Thomas M.</strong> wrote a review</p>
                            <small class="text-muted">30 minutes ago</small>
                        </div>
                    </div>
                    <img src="{{ asset('frontend/images/Roofing_iStock-934626558.0-1-scaled.jpg.optimal.jpg') }}"
                        class="img-fluid rounded mb-2" alt="Restaurant Image">
                    <a href="#" class="text-dark text-decoration-none">
                        <h5>606</h5>
                    </a>
                    <p class="text-danger">★★★★★</p>
                    <p class="short-paragraph">Emeryville is a small city, right next to the bay, that's sandwiched in
                        between Oakland and Berkeley!...</p>
                    <p class="full-paragraph" style="display: none;">Emeryville is a small city, right next to the bay,
                        that's sandwiched in between Oakland and Berkeley! It has a vibrant community and offers various
                        activities for residents and visitors alike. The city is known for its art scene, parks, and
                        waterfront views. Whether you're looking to explore local shops or enjoy a meal at one of the many
                        restaurants, Emeryville has something for everyone.</p>
                    <a href="#" class="text-dark read-more">Read more</a>
                </div>
            </div>
        </div>

    </div>

    <!------------------------------category-------------------------------->

    <div class="container mt-5">
        <h1 class="text-center">category</h1>
        <div class="row g-4">
            <div class="col-md-3">
                <div class="category-card">
                    <a class="text-decoration-none" href="#">
                        <div class="category-icon">🍽️</div>
                        <p class="text-dark">Restaurants</p>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="category-card">
                    <a class="text-decoration-none" href="#">
                        <div class="category-icon">🎁</div>
                        <p class="text-dark">Shopping</p>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="category-card">
                    <a class="text-decoration-none" href="#">
                        <div class="category-icon">✨</div>
                        <p class="text-dark">Nightlife</p>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="category-card">
                    <a class="text-decoration-none" href="#">
                        <div class="category-icon">🎯</div>
                        <p class="text-dark">Active Life</p>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="category-card">
                    <a class="text-decoration-none" href="#">
                        <div class="category-icon">💇‍♂️</div>
                        <p class="text-dark">Beauty & Spas</p>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="category-card">
                    <a class="text-decoration-none" href="#">
                        <div class="category-icon">🚗</div>
                        <p class="text-dark">Automotive</p>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="category-card">
                    <a class="text-decoration-none" href="#">
                        <div class="category-icon">🏠</div>
                        <p class="text-dark">Home Services</p>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="category-card">
                    <a class="text-decoration-none" href="#" onclick="toggleCategories(event)">
                        <div class="category-icon">
                            <i class="bi bi-three-dots text-dark"></i>
                        </div>
                        <p class="text-dark">More</p>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="container cont  mt-5 mb-5" id="moreCategories" style="display: none;">
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
            <div class="col">
                <a class="text-decoration-none" href="#">
                    <div class="category text-dark"> ☕ Coffee & Tea</div>
                </a>
                </a>
            </div>
            <div class="col">
                <a class="text-decoration-none" href="#">
                    <div class="category text-dark"> 🍽️ Food</div>
                </a>
            </div>
            <div class="col">
                <a class="text-decoration-none" href="#">
                    <div class="category text-dark"> 🎨 Arts & Entertainment</div>
                </a>
            </div>
            <div class="col">
                <a class="text-decoration-none" href="#">
                    <div class="category text-dark"> 🏥 Health & Medical</div>
                </a>
            </div>
            <div class="col">
                <a class="text-decoration-none" href="#">
                    <div class="category text-dark"> 💼 Professional Services</div>
                </a>
            </div>
            <div class="col">
                <a class="text-decoration-none" href="#">
                    <div class="category text-dark">🐾 Pets</div>
                </a>
            </div>
            <div class="col">
                <a class="text-decoration-none" href="#">
                    <div class="category text-dark"> 🏡 Real Estate</div>
                </a>
            </div>
            <div class="col">
                <a class="text-decoration-none" href="#">
                    <div class="category text-dark">🏨 Hotels & Travel</div>
                </a>
            </div>
            <div class="col">
                <a class="text-decoration-none" href="#">
                    <div class="category text-dark"> 📍 Local Services</div>
                </a>
            </div>
            <div class="col">
                <a class="text-decoration-none" href="#">
                    <div class="category text-dark">📅 Event Planning & Services</div>
                </a>
            </div>
            <div class="col">
                <a class="text-decoration-none" href="#">
                    <div class="category text-dark"> 🏛️ Public Services & Government</div>
                </a>
            </div>
            <div class="col">
                <a class="text-decoration-none" href="#">
                    <div class="category text-dark"> 📈 Financial Services</div>
                </a>
            </div>
            <div class="col">
                <a class="text-decoration-none" href="#">
                    <div class="category text-dark"> 🎓 Education</div>
                </a>
            </div>
            <div class="col">
                <a class="text-decoration-none" href="#">
                    <div class="category text-dark">⛪ Religious Organizations</div>
                </a>
            </div>
            <div class="col">
                <a class="text-decoration-none" href="#">
                    <div class="category text-dark"> 🌱 Local Flavor</div>
                </a>
            </div>
            <div class="col">
                <a class="text-decoration-none" href="#">
                    <div class="category text-dark"> 📰 Mass Media</div>
                </a>

            </div>
        </div>

    </div>
@endsection
