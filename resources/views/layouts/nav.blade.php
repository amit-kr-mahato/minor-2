<header>
    <nav class="navbar navbar-expand-lg  navbar-light  navv">
        <div class="container-fluid" style="gap:4%">
            <div class="logoo">
                <a class="navbar-brand me-5 text-light" href="{{ route('index') }}">
                    <img src="{{ asset('frontend/images/logo.png') }}"
                        style="width: 150%;height:110px;padding-right: 4vw;" alt="">
                </a>
            </div>
            {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> --}}
            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="gap:2%">
                <!-- Inside your navbar layout -->
                <form action="{{ route('business.search') }}" method="GET" class="d-flex me-5">
                    <input class="form-control me-2" type="search" name="name" placeholder="Things to do"
                        value="{{ request('name') }}" required>
                    <input class="form-control me-2" type="search" name="location" placeholder="Location"
                        value="{{ request('location') }}">
                    <button class="btn btn-danger btn-outline-danger text-light" type="submit">Search</button>
                </form>
                <ul class="navbar-nav mb-2 mb-lg-0">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle navver text-light" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Help for Business
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @auth
                                @if(Auth::user()->role !== 'user')
                                    <li>
                                        <a class="dropdown-item" href="{{ route('addbusiness') }}"><i
                                                class="bi bi-house-add-fill me-3"></i>Add a business</a>
                                    </li>
                                @endif
                            @endauth

                            <li><a class="dropdown-item" href="{{ route('claim') }}"><i
                                        class="bi bi-check2-circle me-3"></i>Claim your business</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('Explore') }}"><i
                                        class="bi bi-search me-3"></i>Explore help for Business</a>

                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link me-2 active text-light navver" aria-current="page"
                            href="{{ route('reviews.show') }}">
                            Write a Review
                        </a>
                    </li>




                    {{-- <li class="nav-item">
                        <a class="nav-link me-3  text-light navver" href="{{ route('project') }}">Start a
                            Project</a>
                    </li> --}}


                    @auth
                        <div x-data="{ open: false }" class="mt-1 ms-2">
                            <form method="POST" action="{{ route('logout') }}" @submit="open = false">
                                @csrf
                                <button type="submit" style="background-color: rgb(192, 188, 188); color: rgb(19, 17, 17);"
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

<nav class="navbar navbar-expand-lg" style="background-color: rgb(135, 248, 248); color:white;">
    <div class="container">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">

                    {{-- Restaurants Dropdown --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Restaurants
                        </a>
                        <ul class="dropdown-menu second-menu">
                            <div class="content_1 d-flex">
                                <div class="sub-nav-col left-1 me-4">
                                    @foreach ($categories['restaurants'] ?? [] as $category)
                                        <a href="{{ route('category.show', $category->slug) }}"
                                            class="sub-nav-box text-decoration-none text-dark">
                                            <h4 class="leftt">
                                                <span class="leftt">{!! $category->icon !!}</span> {{-- assuming icon is
                                                HTML emoji or SVG --}}
                                                {{ $category->name }}
                                            </h4>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </ul>
                    </li>


                     {{-- Auto Services Dropdown --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Auto Services
                        </a>
                        <ul class="dropdown-menu second-menu">
                            <div class="content_1 d-flex">
                                <div class="sub-nav-col left-1 me-4">
                                    @foreach ($categories['Auto Services'] ?? [] as $category)
                                        <a href="{{ route('category.show', $category->slug) }}"
                                            class="sub-nav-box text-decoration-none text-dark">
                                            <h4 class="leftt">
                                                <span class="leftt">{!! $category->icon !!}</span> {{-- assuming icon is
                                                HTML emoji or SVG --}}
                                                {{ $category->name }}
                                            </h4>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </ul>
                    </li>

                    {{-- Home Services Dropdown --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Home Services
                        </a>
                        <ul class="dropdown-menu second-menu">
                            <div class="content_1 d-flex">
                                <div class="sub-nav-col left-1 me-4">
                                    @foreach ($categories['home_services'] ?? [] as $category)
                                        <a href="{{ route('category.show', $category->slug) }}"
                                            class="sub-nav-box text-decoration-none text-dark">
                                            <h4 class="leftt">
                                                <span class="leftt">{!! $category->icon !!}</span>
                                                {{ $category->name }}
                                            </h4>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </ul>
                    </li>

                    {{-- Repeat similarly for auto_services, more --}}
                </ul>
            </div>
        </div>
    </div>
</nav>