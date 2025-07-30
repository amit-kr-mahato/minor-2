@extends('layouts.app')

@section('content')

    <!-- --------------------image-slider-------------------->
    <div class="carousel">
        <div class="list">
            @if($ads->isNotEmpty())
                @foreach($ads as $ad)
                    <div class="item" style="background-image:url('{{ asset('storage/' . $ad->image) }}')">
                        <div class="content">
                            <div class="title mb-4" style="color:white;">{{ $ad->title }}</div>

                        </div>
                    </div>

                @endforeach
            @else
                <div class="item" style="background-image:url('{{ asset('frontend/images/Chicken-Soup-main-2.webp') }}')">
                    <div class="content">
                        <div class="title mb-4" style="color:white;">Praiseworthy soup</div>

                    </div>
                </div>
                <div class="item"
                    style="background-image:url('{{ asset('frontend/images/plumber-fixing-white-sink-pipe-with-adjustable-wrench-picture-id1150199946.jpg') }}')">

                    <div class="content">
                        <div class="container">
                            <div class="title mb-4" style="color:white;">Time for a tune-up?</div>


                        </div>
                    </div>

                </div>

                <div class="item"
                    style="background-image:url('{{ asset('frontend/images/6126-08643014en_Masterfile.jpg') }}');">

                    <div class="content">
                        <div class="title mb-4" style="color:white;">Nothing like a new coat of paint</div>

                    </div>

                </div>
            @endif
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
            @foreach ($reviews as $review)
                <div class="col-md-4">
                    <div class="card p-3 shadow-sm h-100">
                        <!-- User Info -->
                        <div class="d-flex align-items-center mb-2">
                            <img src="{{ asset('frontend/images/Chicken-Soup-main-2.webp') }}" class="rounded-circle me-2"
                                width="50" height="50" alt="User">
                            <div>
                                <p class="mb-0"><strong>{{ $review->user->name ?? 'Anonymous' }}</strong> wrote a review</p>
                                <small class="text-muted">{{ $review->created_at->diffForHumans() }}</small>
                            </div>
                        </div>

                        <!-- Business Banner -->
                        @if($review->business && $review->business->banner)
                            <img src="{{ asset('storage/' . $review->business->banner) }}" class="img-fluid rounded mb-2"
                                alt="Business Image">
                        @endif

                        <!-- Business Name  -->
                        <h5>{{ $review->business->business_name ?? 'Business Name' }}</h5>
                        <!-- Rating Stars -->
                        <p class="text-danger mb-1">
                            {{ str_repeat('★', $review->rating) . str_repeat('☆', 5 - $review->rating) }}
                        </p>

                        <!-- Comment -->
                        <p class="short-paragraph">{{ Str::limit($review->review, 100) }}</p>
                        <p class="full-paragraph" style="display: none;">{{ $review->review }}</p>

                        <!-- Toggle Read More -->
                        <a href="javascript:void(0);" class="text-dark read-more">Read more</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>



    <!------------------------------category-------------------------------->
    {{-- <div class="container mt-5">
        <h1 class="text-center">Categories</h1>

        @foreach($categories as $groupName => $groupedCategories)
            <h3 class="mt-4 text-capitalize">{{ str_replace('_', ' ', $groupName) }}</h3>

            <div class="row g-4">
                @foreach($groupedCategories as $category)
                    <div class="col-md-3">
                        <div class="category-card text-center border rounded p-3 shadow-sm">
                            <a class="text-decoration-none" href="{{ route('category.show', $category->slug) }}">
                                <div class="category-icon fs-3">{{ $category->icon ?? '📁' }}</div>
                                <p class="text-dark fw-bold">{{ $category->name }}</p>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div> --}}






    {{-- <div class="container cont  mt-5 mb-5" id="moreCategories" style="display: none;">
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

    </div> --}}
@endsection
<!-- Read More Toggle Script -->
@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll('.read-more').forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    const card = this.closest('.card');
                    const shortPara = card.querySelector('.short-paragraph');
                    const fullPara = card.querySelector('.full-paragraph');

                    if (fullPara.style.display === 'none') {
                        fullPara.style.display = 'block';
                        shortPara.style.display = 'none';
                        this.textContent = 'Show less';
                    } else {
                        fullPara.style.display = 'none';
                        shortPara.style.display = 'block';
                        this.textContent = 'Read more';
                    }
                });
            });
        });
    </script>
@endpush