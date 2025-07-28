@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <header class=" p-4">
            <div class="containr">
                <h3 class="fs-1">Project Ideas</h3>

                <button type="button" class="btn btn-danger p-3" data-bs-toggle="modal" data-bs-target="#homeProjectModal">+
                    Get quotes</button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="homeProjectModal" tabindex="-1" aria-labelledby="homeProjectModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="homeProjectModalLabel">Ready to start your next home project?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Choose a category to start creating your project</p>
                            <div class="modal-category">
                                <a href="{{route('repair')}}" class="text-decoration-none text-dark">
                                    <div class="category-card_1">🔧<br>Auto Repair</div>
                                </a>
                                <a href="" class="text-decoration-none text-dark">
                                    <div class="category-card_1">🏗<br>Contractors</div>
                                </a>
                                <a href="" class="text-decoration-none text-dark">
                                    <div class="category-card_1">⚡<br>Electricians</div>
                                </a>
                                <a href="" class="text-decoration-none text-dark">
                                    <div class="category-card_1">🛠<br>Handyman</div>
                                </a>
                                <a href="" class="text-decoration-none text-dark">
                                    <div class="category-card_1">❄️<br>Heating & AC</div>
                                </a>
                                <a href="" class="text-decoration-none text-dark">
                                    <div class="category-card_1">🧹<br>Home Cleaning</div>
                                </a>
                                <a href="" class="text-decoration-none text-dark">
                                    <div class="category-card_1">🌿<br>Landscaping</div>
                                </a>
                                <a href="" class="text-decoration-none text-dark">
                                    <div class="category-card_1">🚚<br>Movers</div>
                                </a>
                                <a href="" class="text-decoration-none text-dark">
                                    <div class="category-card_1">🎨<br>Painters</div>
                                </a>
                                <a href="" class="text-decoration-none text-dark">
                                    <div class="category-card_1">🚰<br>Plumbers</div>
                                </a>
                                <a href="" class="text-decoration-none text-dark">
                                    <div class="category-card_1">🐜<br>Pest Control</div>
                                </a>
                                <a href="" class="text-decoration-none text-dark">
                                    <div class="category-card_1">🏠<br>Roofers</div>
                                </a>

                            </div>
                            <div class="text-center mt-3">
                                <a href="#">Search for other home services</a>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" disabled>Next</button>
                        </div>
                    </div>
                </div>
            </div>

        </header>
        <section class="container mt-4">
            <h3>Hire a local pro today</h3>
            <div class="row text-center mt-5">
                <div class="col-md-1 fs-4">
                    <a href="" class="text-decoration-none text-dark qqq" data-bs-toggle="modal"
                        data-bs-target="#exampleModalToggle"> 🚛
                        <h5>Movers</h5>
                    </a>




                </div>
                <div class="col-md-2 fs-4">
                    <a href="" class="text-decoration-none text-dark qqq" data-bs-toggle="modal"
                        data-bs-target="#exampleModalToggle1"> 🧹
                        <h5> Home cleaning</h5>
                    </a>
    

                </div>
                <div class="col-md-1 fs-4">
                    <a href="" class="text-decoration-none text-dark qqq"> 🔧

                        <h5> Plumbers </h5>
                    </a>
                </div>
                <div class="col-md-2 fs-4">
                    <a href="" class="text-decoration-none text-dark qqq"> 🛠️
                        <h5> Appliance repair </h5>
                    </a>
                </div>
                <div class="col-md-2 fs-4">
                    <a href="" class="text-decoration-none text-dark qqq"> ⚡
                        <h5> Electricians </h5>
                    </a>
                </div>
                <div class="col-md-2 fs-4">
                    <a href="" class="text-decoration-none text-dark qqq"> 🚗
                        <h5> Auto detailing </h5>
                    </a>
                </div>

                <div class="col-md-2 fs-4">
                    <a href="" class="text-decoration-none text-dark qqq" data-bs-toggle="modal"
                        data-bs-target="#homeProjectModal">
                        <i class="bi bi-three-dots text-dark"></i>
                        <h5> more </h5>
                        <div class="modal fade" id="homeProjectModal" tabindex="-1"
                            aria-labelledby="homeProjectModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="homeProjectModalLabel">Ready to start your next home
                                            project?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Choose a category to start creating your project</p>
                                        <div class="modal-category">
                                            <a href="" class="text-decoration-none text-dark">
                                                <div class="category-card_1">🔧<br>Auto Repair</div>
                                            </a>
                                            <a href="" class="text-decoration-none text-dark">
                                                <div class="category-card_1">🏗<br>Contractors</div>
                                            </a>
                                            <a href="" class="text-decoration-none text-dark">
                                                <div class="category-card_1">⚡<br>Electricians</div>
                                            </a>
                                            <a href="" class="text-decoration-none text-dark">
                                                <div class="category-card_1">🛠<br>Handyman</div>
                                            </a>

                                            <a href="" class="text-decoration-none text-dark">
                                                <div class="category-card_1">🧹<br>Home Cleaning</div>
                                            </a>

                                            <a href="" class="text-decoration-none text-dark">
                                                <div class="category-card_1">🚚<br>Movers</div>
                                            </a>
                                            <a href="" class="text-decoration-none text-dark">
                                                <div class="category-card_1">🎨<br>Painters</div>
                                            </a>
                                            <a href="" class="text-decoration-none text-dark">
                                                <div class="category-card_1">🚰<br>Plumbers</div>
                                            </a>
                                            <a href="" class="text-decoration-none text-dark">
                                                <div class="category-card_1">🐜<br>Pest Control</div>
                                            </a>
                                            <a href="" class="text-decoration-none text-dark">
                                                <div class="category-card_1">🏠<br>Roofers</div>
                                            </a>

                                        </div>
                                        <div class="text-center mt-3">
                                            <a href="#">Search for other home services</a>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" disabled>Next</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        <section class="container mt-4">
            <h4>Make your home your happier place</h4>
            <div class="row">
                <div class="col-md-3 p-2 ">
                    <a href="" class="text-decoration-none text-dark">
                        <div class="card carrd">
                            <img src="{{ asset('frontend/images/Chicken-Soup-main-2.webp') }}" class="card-img-top"
                                alt="Kitchen">
                            <div class="card-body">
                                <h5 class="card-title">Upgrade the heart of your home</h5>
                                <a href="#" class="btn btn-light border-dark">Find kitchen pros</a>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 p-2">
                    <a href="" class="text-decoration-none text-dark">
                        <div class="card carrd">
                            <img src="{{ asset('frontend/images/plumber-fixing-white-sink-pipe-with-adjustable-wrench-picture-id1150199946.jpg') }}"
                                class="card-img-top" alt="Landscape">
                            <div class="card-body">
                                <h5 class="card-title">Spruce up your curb appeal</h5>
                                <a href="#" class="btn btn-light border-dark">Find landscapers</a>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 p-2">
                    <a href="" class="text-decoration-none text-dark">
                        <div class="card carrd">
                            <img src="{{ asset('frontend/images/Roofing_iStock-934626558.0-1-scaled.jpg.optimal.jpg') }}"
                                class="card-img-top" alt="Lighting">
                            <div class="card-body">
                                <h5 class="card-title">Give your home a glow up with new lighting</h5>
                                <a href="#" class="btn btn-light border-dark">Find electricians</a>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 p-2">
                    <a href="" class="text-decoration-none text-dark">
                        <div class="card carrd">
                            <img src="{{ asset('frontend/images/Chicken-Soup-main-2.webp') }}" class="card-img-top"
                                alt="Bathroom">
                            <div class="card-body">
                                <h5 class="card-title">Get bathroom bliss and create a luxury space</h5>
                                <a href="#" class="btn btn-light border-dark">Find bathroom pros</a>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <section class="container mt-4">
            <h4>Create a backyard retreat</h4>
            <div class="row">
                <div class="col-md-3 p-2 ">
                    <a href="" class="text-decoration-none text-dark">
                        <div class="card carrd">
                            <img src="{{ asset('frontend/images/Chicken-Soup-main-2.webp') }}" class="card-img-top"
                                alt="Kitchen">
                            <div class="card-body">
                                <h5 class="card-title">Upgrade the heart of your home</h5>
                                <a href="#" class="btn btn-light border-dark">Find kitchen pros</a>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 p-2">
                    <a href="" class="text-decoration-none text-dark">
                        <div class="card carrd">
                            <img src="{{ asset('frontend/images/plumber-fixing-white-sink-pipe-with-adjustable-wrench-picture-id1150199946.jpg') }}"
                                class="card-img-top" alt="Landscape">
                            <div class="card-body">
                                <h5 class="card-title">Spruce up your curb appeal</h5>
                                <a href="#" class="btn btn-light border-dark">Find landscapers</a>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 p-2">
                    <a href="" class="text-decoration-none text-dark">
                        <div class="card carrd">
                            <img src="{{ asset('frontend/images/Roofing_iStock-934626558.0-1-scaled.jpg.optimal.jpg') }}"
                                class="card-img-top" alt="Lighting">
                            <div class="card-body">
                                <h5 class="card-title">Give your home a glow up with new lighting</h5>
                                <a href="#" class="btn btn-light border-dark">Find electricians</a>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 p-2">
                    <a href="" class="text-decoration-none text-dark">
                        <div class="card carrd">
                            <img src="{{ asset('frontend/images/Chicken-Soup-main-2.webp') }}" class="card-img-top"
                                alt="Bathroom">
                            <div class="card-body">
                                <h5 class="card-title">Get bathroom bliss and create a luxury space</h5>
                                <a href="#" class="btn btn-light border-dark">Find bathroom pros</a>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <section class="container mt-4">
            <h4>Make sure the maintenance is maintaining</h4>
            <div class="row">
                <div class="col-md-3 p-2 ">
                    <a href="" class="text-decoration-none text-dark">
                        <div class="card carrd">
                            <img src="{{ asset('frontend/images/Chicken-Soup-main-2.webp') }}" class="card-img-top"
                                alt="Kitchen">
                            <div class="card-body">
                                <h5 class="card-title">Upgrade the heart of your home</h5>
                                <a href="#" class="btn btn-light border-dark">Find kitchen pros</a>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 p-2">
                    <a href="" class="text-decoration-none text-dark">
                        <div class="card carrd">
                            <img src="{{ asset('frontend/images/plumber-fixing-white-sink-pipe-with-adjustable-wrench-picture-id1150199946.jpg') }}"
                                class="card-img-top" alt="Landscape">
                            <div class="card-body">
                                <h5 class="card-title">Spruce up your curb appeal</h5>
                                <a href="#" class="btn btn-light border-dark">Find landscapers</a>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 p-2">
                    <a href="" class="text-decoration-none text-dark">
                        <div class="card carrd">
                            <img src="{{ asset('frontend/images/Roofing_iStock-934626558.0-1-scaled.jpg.optimal.jpg') }}"
                                class="card-img-top" alt="Lighting">
                            <div class="card-body">
                                <h5 class="card-title">Give your home a glow up with new lighting</h5>
                                <a href="#" class="btn btn-light border-dark">Find electricians</a>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 p-2">
                    <a href="" class="text-decoration-none text-dark">
                        <div class="card carrd">
                            <img src="{{ asset('frontend/images/Chicken-Soup-main-2.webp') }}" class="card-img-top"
                                alt="Bathroom">
                            <div class="card-body">
                                <h5 class="card-title">Get bathroom bliss and create a luxury space</h5>
                                <a href="#" class="btn btn-light border-dark">Find bathroom pros</a>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </section>

        <section class="container mt-4">
            <h4>Get these inside projects done to keep things fresh</h4>
            <div class="row">
                <div class="col-md-3 p-2 ">
                    <a href="" class="text-decoration-none text-dark">
                        <div class="card carrd">
                            <img src="{{ asset('frontend/images/Chicken-Soup-main-2.webp') }}" class="card-img-top"
                                alt="Kitchen">
                            <div class="card-body">
                                <h5 class="card-title">Upgrade the heart of your home</h5>
                                <a href="#" class="btn btn-light border-dark">Find kitchen pros</a>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 p-2">
                    <a href="" class="text-decoration-none text-dark">
                        <div class="card carrd">
                            <img src="{{ asset('frontend/images/plumber-fixing-white-sink-pipe-with-adjustable-wrench-picture-id1150199946.jpg') }}"
                                class="card-img-top" alt="Landscape">
                            <div class="card-body">
                                <h5 class="card-title">Spruce up your curb appeal</h5>
                                <a href="#" class="btn btn-light border-dark">Find landscapers</a>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 p-2">
                    <a href="" class="text-decoration-none text-dark">
                        <div class="card carrd">
                            <img src="{{ asset('frontend/images/Roofing_iStock-934626558.0-1-scaled.jpg.optimal.jpg') }}"
                                class="card-img-top" alt="Lighting">
                            <div class="card-body">
                                <h5 class="card-title">Give your home a glow up with new lighting</h5>
                                <a href="#" class="btn btn-light border-dark">Find electricians</a>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 p-2">
                    <a href="" class="text-decoration-none text-dark">
                        <div class="card carrd">
                            <img src="{{ asset('frontend/images/Chicken-Soup-main-2.webp') }}" class="card-img-top"
                                alt="Bathroom">
                            <div class="card-body">
                                <h5 class="card-title">Get bathroom bliss and create a luxury space</h5>
                                <a href="#" class="btn btn-light border-dark">Find bathroom pros</a>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </div>
@endsection
