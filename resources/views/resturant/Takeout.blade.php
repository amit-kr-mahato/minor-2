@extends('layouts.app')

@section('content')
    <div id="feature">
        <div id="featureimg">
            <div id="fleft">

                <div class="container my-4 flet">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Restaurants</a></li>
                            <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Takeout</a></li>
                        </ol>
                    </nav>

                    <h2 class="fw-bold">Top 10 Best Takeout Near San Francisco, California</h2>

                    <div class="d-flex gap-2 my-3">
                        <button class="btn btn-outline-secondary">Price</button>
                        <button class="btn btn-outline-primary">Open at 11:00 pm</button>
                        <button class="btn btn-outline-secondary">Reservations</button>
                        <button class="btn btn-outline-secondary">Offers Online Waitlist</button>
                        <button class="btn btn-outline-secondary">Offers Delivery</button>
                        <button class="btn btn-outline-secondary">Offers Takeout</button>
                    </div>

                    <h5 class="text-muted">Sponsored Results</h5>
                    <ul>
                     
                    <div class="card  fleftem mb-3 shadow-sm">
                      
                        <div class="row box-s g-0">
                           
                            <div class="col-md-2" style="padding-top:20px ;">
                                <img src="https://images.unsplash.com/photo-1603574670812-d24560880210?fit=crop&w=600&q=80"
                                    class="restaurant-img" alt="Hinodeya Ramen Bar">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Hinodeya Ramen Bar</h5>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="rating-stars me-2">
                                            ★★★★★
                                        </div>
                                        <div class="text-muted ms-2 font">4.4 (57 reviews)</div>
                                    </div>
                                    <div class="text-muted  font">📍 Marina/Cow Hollow · <span
                                            class="text-danger fw-semibold">Closed until 10:00 AM</span></div>
                                    <div class="mb-2">
                                        <span class="custom-badge me-2 font">🌱 Vegan friendly</span>
                                        <span class="text-muted font">👥 Large group friendly</span>
                                    </div>
                                    <div class="text-primary mb-1 font">📝 Make an Online Reservation</div>
                                    <p class="card-text text-muted font">“I've been here twice and I enjoyed my ramen both
                                        times. I've been to the Japantown location a few times and had decent experiences
                                        there. I came in to…” <a href="#" class="text-decoration-none">more</a></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="tag">Ramen</span>
                                        <button class="btn btn-danger ">
                                            <i class="bi bi-calendar-event me-1 magnet"></i> Reserve
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                       
                    </div>
                    
                    <div class="card  fleftem mb-3 shadow-sm">
                        <div class="row box-s g-0">
                            <div class="col-md-2">
                                <img src="https://images.unsplash.com/photo-1603574670812-d24560880210?fit=crop&w=600&q=80"
                                    class="restaurant-img" alt="Hinodeya Ramen Bar">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Hinodeya Ramen Bar</h5>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="rating-stars me-2">
                                            ★★★★★
                                        </div>
                                        <div class="text-muted ms-2 font">4.4 (57 reviews)</div>
                                    </div>
                                    <div class="text-muted  font">📍 Marina/Cow Hollow · <span
                                            class="text-danger fw-semibold">Closed until 10:00 AM</span></div>
                                    <div class="mb-2">
                                        <span class="custom-badge me-2 font">🌱 Vegan friendly</span>
                                        <span class="text-muted font">👥 Large group friendly</span>
                                    </div>
                                    <div class="text-primary mb-1 font">📝 Make an Online Reservation</div>
                                    <p class="card-text text-muted font">“I've been here twice and I enjoyed my ramen both
                                        times. I've been to the Japantown location a few times and had decent experiences
                                        there. I came in to…” <a href="#" class="text-decoration-none">more</a></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="tag">Ramen</span>
                                        <button class="btn btn-danger">
                                            <i class="bi bi-calendar-event me-1"></i> Reserve
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card fleftem mb-3 shadow-sm">
                        <div class="row box-s g-0">
                            <div class="col-md-2">
                                <img src="https://images.unsplash.com/photo-1603574670812-d24560880210?fit=crop&w=600&q=80"
                                    class="restaurant-img" alt="Hinodeya Ramen Bar">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Hinodeya Ramen Bar</h5>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="rating-stars me-2">
                                            ★★★★★
                                        </div>
                                        <div class="text-muted ms-2 font">4.4 (57 reviews)</div>
                                    </div>
                                    <div class="text-muted  font">📍 Marina/Cow Hollow · <span
                                            class="text-danger fw-semibold">Closed until 10:00 AM</span></div>
                                    <div class="mb-2">
                                        <span class="custom-badge me-2 font">🌱 Vegan friendly</span>
                                        <span class="text-muted font">👥 Large group friendly</span>
                                    </div>
                                    <div class="text-primary mb-1 font">📝 Make an Online Reservation</div>
                                    <p class="card-text text-muted font">“I've been here twice and I enjoyed my ramen both
                                        times. I've been to the Japantown location a few times and had decent experiences
                                        there. I came in to…” <a href="#" class="text-decoration-none">more</a></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="tag">Ramen</span>
                                        <button class="btn btn-danger">
                                            <i class="bi bi-calendar-event me-1"></i> Reserve
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card fleftem mb-3 shadow-sm">
                        <div class="row box-s g-0">
                            <div class="col-md-2">
                                <img src="https://images.unsplash.com/photo-1603574670812-d24560880210?fit=crop&w=600&q=80"
                                    class="restaurant-img" alt="Hinodeya Ramen Bar">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Hinodeya Ramen Bar</h5>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="rating-stars me-2">
                                            ★★★★★
                                        </div>
                                        <div class="text-muted ms-2 font">4.4 (57 reviews)</div>
                                    </div>
                                    <div class="text-muted  font">📍 Marina/Cow Hollow · <span
                                            class="text-danger fw-semibold">Closed until 10:00 AM</span></div>
                                    <div class="mb-2">
                                        <span class="custom-badge me-2 font">🌱 Vegan friendly</span>
                                        <span class="text-muted font">👥 Large group friendly</span>
                                    </div>
                                    <div class="text-primary mb-1 font">📝 Make an Online Reservation</div>
                                    <p class="card-text text-muted font">“I've been here twice and I enjoyed my ramen both
                                        times. I've been to the Japantown location a few times and had decent experiences
                                        there. I came in to…” <a href="#" class="text-decoration-none">more</a></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="tag">Ramen</span>
                                        <button class="btn btn-danger">
                                            <i class="bi bi-calendar-event me-1"></i> Reserve
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card fleftem mb-3 shadow-sm">
                        <div class="row box-s g-0">
                            <div class="col-md-2">
                                <img src="https://images.unsplash.com/photo-1603574670812-d24560880210?fit=crop&w=600&q=80"
                                    class="restaurant-img" alt="Hinodeya Ramen Bar">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Hinodeya Ramen Bar</h5>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="rating-stars me-2">
                                            ★★★★★
                                        </div>
                                        <div class="text-muted ms-2 font">4.4 (57 reviews)</div>
                                    </div>
                                    <div class="text-muted  font">📍 Marina/Cow Hollow · <span
                                            class="text-danger fw-semibold">Closed until 10:00 AM</span></div>
                                    <div class="mb-2">
                                        <span class="custom-badge me-2 font">🌱 Vegan friendly</span>
                                        <span class="text-muted font">👥 Large group friendly</span>
                                    </div>
                                    <div class="text-primary mb-1 font">📝 Make an Online Reservation</div>
                                    <p class="card-text text-muted font">“I've been here twice and I enjoyed my ramen both
                                        times. I've been to the Japantown location a few times and had decent experiences
                                        there. I came in to…” <a href="#" class="text-decoration-none">more</a></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="tag">Ramen</span>
                                        <button class="btn btn-danger">
                                            <i class="bi bi-calendar-event me-1"></i> Reserve
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card fleftem mb-3 shadow-sm">
                        <div class="row box-s g-0">
                            <div class="col-md-2">
                                <img src="https://images.unsplash.com/photo-1603574670812-d24560880210?fit=crop&w=600&q=80"
                                    class="restaurant-img" alt="Hinodeya Ramen Bar">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Hinodeya Ramen Bar</h5>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="rating-stars me-2">
                                            ★★★★★
                                        </div>
                                        <div class="text-muted ms-2 font">4.4 (57 reviews)</div>
                                    </div>
                                    <div class="text-muted  font">📍 Marina/Cow Hollow · <span
                                            class="text-danger fw-semibold">Closed until 10:00 AM</span></div>
                                    <div class="mb-2">
                                        <span class="custom-badge me-2 font">🌱 Vegan friendly</span>
                                        <span class="text-muted font">👥 Large group friendly</span>
                                    </div>
                                    <div class="text-primary mb-1 font">📝 Make an Online Reservation</div>
                                    <p class="card-text text-muted font">“I've been here twice and I enjoyed my ramen both
                                        times. I've been to the Japantown location a few times and had decent experiences
                                        there. I came in to…” <a href="#" class="text-decoration-none">more</a></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="tag">Ramen</span>
                                        <button class="btn btn-danger">
                                            <i class="bi bi-calendar-event me-1"></i> Reserve
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card fleftem mb-3 shadow-sm last">
                        <div class="row box-s g-0">
                            <div class="col-md-2">
                                <img src="https://images.unsplash.com/photo-1603574670812-d24560880210?fit=crop&w=600&q=80"
                                    class="restaurant-img" alt="Hinodeya Ramen Bar">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Hinodeya Ramen Bar</h5>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="rating-stars me-2">
                                            ★★★★★
                                        </div>
                                        <div class="text-muted ms-2 font">4.4 (57 reviews)</div>
                                    </div>
                                    <div class="text-muted  font">📍 Marina/Cow Hollow · <span
                                            class="text-danger fw-semibold">Closed until 10:00 AM</span></div>
                                    <div class="mb-2">
                                        <span class="custom-badge me-2 font">🌱 Vegan friendly</span>
                                        <span class="text-muted font">👥 Large group friendly</span>
                                    </div>
                                    <div class="text-primary mb-1 font">📝 Make an Online Reservation</div>
                                    <p class="card-text text-muted font">“I've been here twice and I enjoyed my ramen both
                                        times. I've been to the Japantown location a few times and had decent experiences
                                        there. I came in to…” <a href="#" class="text-decoration-none">more</a></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="tag">Ramen</span>
                                        <button class="btn btn-danger">
                                            <i class="bi bi-calendar-event me-1"></i> Reserve
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
