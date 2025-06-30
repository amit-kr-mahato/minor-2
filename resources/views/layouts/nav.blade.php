<header>
    <nav class="navbar navbar-expand-lg  navbar-light  navv">
        <div class="container-fluid">
            <a class="navbar-brand me-5 text-light" href="{{ route('index') }}">
                <img src="{{ asset('frontend/images/logo.png') }}" style="width: 150%;height:110px;padding-right: 4vw;"
                    alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex me-5">
                    <input class="form-control me-2" type="search" placeholder="Things to do" aria-label="Search">
                    <input class="form-control me-2" type="search" placeholder="Location" aria-label="Search">
                    <button class="btn btn-danger btn-outline-danger text-light" type="submit">Search</button>
                </form>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    
                        
                 
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle navver text-light" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Help for Business
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('addbusiness') }}"><i
                                        class="bi bi-house-add-fill me-3"></i>Add a business</a></li>
                            <li><a class="dropdown-item" href="{{ route('claim') }}"><i
                                        class="bi bi-check2-circle me-3"></i>Claim your business</a></li>
                            <li><a class="dropdown-item" href="{{ route('business-login') }}"><i
                                        class="bi bi-person-circle me-3"></i>Log in to Business Account</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('Explore') }}"><i
                                        class="bi bi-search me-3"></i>Explore help for Business</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2 active text-light navver" aria-current="page"
                            href="{{ route('review') }}">Write a Review</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-3  text-light navver" href="{{ route('project') }}">Start a
                            Project</a>
                    </li>
                    

                    @auth
                        <div x-data="{ open: false }" class="mt-1 ms-2">
                            <form method="POST" action="{{ route('logout') }}" @submit="open = false">
                                @csrf
                                <button type="submit" style="background-color: rgb(207, 27, 27); color: white;"
                                    class="flex items-center justify-between bg-red-600  rounded hover:bg-red-500  font-semibold px-2 py-2">
                                    <span class="flex items-center gap-3">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
                                    </span>
                                </button>
                            </form>
                        </div>

                    @else
                        <li class="nav-item">
                            <a class="nav-link me-3 text-decoration-none bg-primary rounded  text-light navver"
                                href="{{ route('sigin') }}">Login</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link me-3 text-decoration-none bg-danger rounded  text-light navver"
                                href="{{ route('signup') }}">Signup</a>
                        </li>
                    @endauth

                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- =============================another navbar============================= -->

<nav class="navbar navbar-expand-lg " style="background-color: rgb(135, 248, 248);color:white">
    <div class="container">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Restaurants
                        </a>
                        <ul class="dropdown-menu second-menu">
                            <div class="content_1 d-flex">
                                <div class="sub-nav-col left-1 me-4">
                                    <a href="{{ route('takeout') }}" class="sub-nav-box  text-decoration-none text-dark"
                                        id="box-1">

                                        <h4 class="leftt"> <span class="leftt">🗑</span>Takeout</h4>

                                    </a>
                                    <a href="" class="sub-nav-box text-decoration-none text-dark" id="box-2">

                                        <h4 class="leftt"> <span class="leftt">🍔</span>burger</h4>

                                    </a>
                                    <a href="#" class="sub-nav-box text-decoration-none text-dark" id="box-3">

                                        <h4 class="leftt"> <span class="leftt">🏯</span>chinese</h4>

                                    </a>

                                </div>
                                <div class="sub-nav-col right-1">
                                    <a href="#" class="sub-nav-box text-decoration-none text-dark" id="box-5">

                                        <h4 class="leftt"> <span class="leftt">🗓️</span>Reservations</h4>

                                    </a>
                                    <a href="#" class="sub-nav-box text-decoration-none text-dark" id="box-6">

                                        <h4 class="leftt"> <span class="leftt">🚚</span>Delivery</h4>

                                    </a>
                                    <a href="#" class="sub-nav-box text-decoration-none text-dark" id="box-7">

                                        <h4 class="leftt"> <span class="leftt">🌮</span>Mexican</h4>

                                    </a>

                                </div>
                            </div>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Home Services
                        </a>
                        <ul class="dropdown-menu second-menu">
                            <div class="content_1 d-flex">
                                <div class="sub-nav-col left-1 me-4">
                                    <a href="{{ route('contractor') }}"
                                        class="sub-nav-box  text-decoration-none text-dark" id="box-1">

                                        <h4 class="leftt"> <span class="leftt">🛠️</span>Contractors</h4>

                                    </a>
                                    <a href="#" class="sub-nav-box text-decoration-none text-dark" id="box-2">

                                        <h4 class="leftt"> <span class="leftt">🔌</span>Electricians</h4>

                                    </a>
                                    <a href="#" class="sub-nav-box text-decoration-none text-dark" id="box-3">

                                        <h4 class="leftt"> <span class="leftt">🖲</span>Home Cleaner</h4>

                                    </a>

                                </div>
                                <div class="sub-nav-col right-1 me-1">
                                    <a href="#" class="sub-nav-box text-decoration-none text-dark" id="box-4">

                                        <h4 class="leftt"><span class="leftt">🧑‍🌾</span>Landscaping</h4>

                                    </a>
                                    <a href="#" class="sub-nav-box text-decoration-none text-dark" id="box-5">

                                        <h4 class="leftt"> <span class="leftt">🚚</span>Movers</h4>

                                    </a>
                                    <a href="#" class="sub-nav-box text-decoration-none text-dark" id="box-6">

                                        <h4 class="leftt"> <span class="leftt">👷🏾</span>Plumbers</h4>

                                    </a>
                                </div>
                            </div>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Auto Services
                        </a>
                        <ul class="dropdown-menu second-menu">
                            <div class="content_1 d-flex">
                                <div class="sub-nav-col left-1 me-4">
                                    <a href="#" class="sub-nav-box  text-decoration-none text-dark" id="box-1">

                                        <h4 class="leftt"> <span class="leftt">🦿</span>Auto Repair</h4>

                                    </a>
                                    <a href="#" class="sub-nav-box text-decoration-none text-dark" id="box-2">

                                        <h4 class="leftt"> <span class="leftt">⚗</span>Auto detailing</h4>

                                    </a>
                                    <a href="#" class="sub-nav-box text-decoration-none text-dark" id="box-3">

                                        <h4 class="leftt"> <span class="leftt">🔫</span>Car Wash</h4>

                                    </a>
                                </div>
                                <div class="sub-nav-col right-1">
                                    <a href="#" class="sub-nav-box text-decoration-none text-dark" id="box-5">

                                        <h4 class="leftt"> <span class="leftt">🏚</span>Car Dealers</h4>

                                    </a>
                                    <a href="#" class="sub-nav-box text-decoration-none text-dark" id="box-6">

                                        <h4 class="leftt"> <span class="leftt">👨🏻‍🔧</span>Oil Change</h4>

                                    </a>
                                    <a href="#" class="sub-nav-box text-decoration-none text-dark" id="box-7">

                                        <h4 class="leftt"> <span class="leftt">🅿</span>Parking</h4>

                                    </a>

                                </div>
                            </div>
                        </ul>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            More
                        </a>
                        <ul class="dropdown-menu second-menu">
                            <div class="content_1 d-flex">
                                <div class="sub-nav-col left-1 me-4">
                                    <a href="#" class="sub-nav-box  text-decoration-none text-dark" id="box-1">

                                        <h4 class="leftt"> <span class="leftt">🖱</span>Dry Cleaning</h4>

                                    </a>
                                    <a href="#" class="sub-nav-box text-decoration-none text-dark" id="box-2">

                                        <h4 class="leftt"> <span class="leftt">📲</span>phone repair</h4>

                                    </a>
                                    <a href="#" class="sub-nav-box text-decoration-none text-dark" id="box-3">

                                        <h4 class="leftt"> <span class="leftt">🍹</span>Nightlife</h4>

                                    </a>
                                    <a href="#" class="sub-nav-box text-decoration-none text-dark" id="box-4">

                                        <h4 class="leftt"><span class="leftt">✂</span>Hair Salons</h4>

                                    </a>
                                </div>
                                <div class="sub-nav-col right-1">
                                    <a href="#" class="sub-nav-box text-decoration-none text-dark" id="box-5">

                                        <h4 class="leftt"> <span class="leftt">🏋🏿‍♂️</span>Gyms</h4>

                                    </a>
                                    <a href="#" class="sub-nav-box text-decoration-none text-dark" id="box-6">

                                        <h4 class="leftt"> <span class="leftt">💆🏻‍♀️</span>Massage</h4>

                                    </a>
                                    <a href="#" class="sub-nav-box text-decoration-none text-dark" id="box-7">

                                        <h4 class="leftt"> <span class="leftt">🛍️</span>Shopping</h4>

                                    </a>
                                    <a href="#" class="sub-nav-box text-decoration-none text-dark" id="box-8">

                                        <h4 class="leftt"> <span class="leftt">🍺</span>Bars</h4>

                                    </a>
                                </div>
                            </div>
                        </ul>

                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>