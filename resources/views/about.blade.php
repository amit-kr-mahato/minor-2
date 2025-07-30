@extends('layouts.app')

@section('content')

<!-- Hero Section -->
{{-- <section class="relative h-[75vh]">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQcliHHYN-R_Ex-lBzJLGJkABnN9Cw36CR9o6sOOWUX0I8JAN5qJk__pEE&s" alt="Yelp Banner" class="absolute inset-0 w-full h-full object-cover">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="relative z-10 flex items-center justify-center h-full text-center px-6">
        <h1 class="text-white text-4xl md:text-5xl font-extrabold leading-tight drop-shadow-lg">
            bizzlisto connects people with<br class="hidden md:block"> great local businesses.
        </h1>
    </div>
</section> --}}

<!-- Info Cards Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

         <div class="bg-white rounded-2xl shadow hover:shadow-xl transition p-6 flex flex-col items-center text-center">
    <img src="https://s3-media0.fl.yelpcdn.com/assets/public/careers_350x160_v2.yji-c8e47416ae48b41b821d.svg" alt="Careers" class="h-28 mb-4">
    <h3 class="text-lg font-semibold text-gray-900 mb-2">Careers</h3>
    <p class="text-gray-600 text-sm leading-relaxed">
        Start a five star career with meaningful opportunities, engaging learning programs, and a rich culture.
    </p>
</div>


            <!-- Card 2 -->
            <div class="bg-white rounded-2xl shadow hover:shadow-xl transition p-6 flex flex-col items-center text-center">
                <img src="https://s3-media0.fl.yelpcdn.com/assets/public/careers_350x160_v2.yji-c8e47416ae48b41b821d.svg" alt="Newsroom" class="h-28 mb-4">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Newsroom</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    News and information about business, our people, and products.
                </p>
            </div>

            <!-- Card 3 -->
            <div class="bg-white rounded-2xl shadow hover:shadow-xl transition p-6 flex flex-col items-center text-center">
                <img src="https://s3-media0.fl.yelpcdn.com/assets/public/press_350x160_v2.yji-0c795d13b77f4a2c43bf.svg" alt="Investor Relations" class="h-28 mb-4">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Investor Relations</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Get all the financial information you’re looking for about business.
                </p>
            </div>

            <!-- Card 4 -->
            <div class="bg-white rounded-2xl shadow hover:shadow-xl transition p-6 flex flex-col items-center text-center">
                <img src="https://s3-media0.fl.yelpcdn.com/assets/public/advertiser_faq_300x137_v2.yji-3d7fc658aab78fb6f660.svg" alt="Trust & Safety" class="h-28 mb-4">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Trust & Safety</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Learn how business works hard to maintain our community's trust and keep the platform helpful.
                </p>
            </div>

        </div>
    </div>
</section>

@endsection