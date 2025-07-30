<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  {{-- @foreach ($businesses as $business) --}}
  <title>{{ $business->business_name }}</title>
  {{-- @endforeach --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href='{{asset('frontend/resturant.css')}}'>
</head>
<style>
  .btn {
    display: inline-block;
    padding: 10px 15px;
    background-color: #8b7676;
    color: #f3eeee;
    border-radius: 6px;
    text-decoration: none;
    font-size: 15px;
    margin: 5px;
    border: 1px solid #ccc;
    transition: background-color 0.3s;
  }

  .btn i {
    margin-right: 6px;
    color: rgb(238, 20, 67);
  }

  .btn:hover {
    background-color: #0f0c0c;
    color: white
  }
</style>

<body>


  <!-- Slider Section -->
  <div class="slider-container">
    {{-- @foreach ($businesses as $business) --}}
    <div class="business-slideRr slide">
      <img style="width: 100%"
        src="{{ $business->banner ? asset('storage/' . $business->banner) : asset('frontend/images/default-banner.jpg') }}"
        alt="{{ $business->business_name }} Banner" />

    </div>

    <div class="overlay" style="margin-bottom: 5%">
      <div class="title" style="color: #faf8f8;margin-bottom: 1%">{{ $business->business_name }}</div>
      <div class="stars">
        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
        <i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
        <span style="color: #faf8f8;margin-bottom: 2%">{{ $business->reviews->count() }}</span>
      </div>
      <div class="info" style="margin-bottom: 2%">
        <span style="color: #faf8f8;margin-bottom: 2%"><i class="fas fa-check-circle" style="color:lightblue"></i>
          Claimed</span>
        <span style="color: #faf8f8">{{ $business->categories }}</span>
      </div>
      <div class="info" style="color: #faf8f8;margin-top: 1%">
        <span class="status">Open</span> 10:00 AM - 9:00 PM
      </div>
      <div class="info" style="margin-top: 2%">
        {{-- <a href="#" class="button">See hours</a> --}}
        <span style="color:lightblue">Updated {{ $business->updated_at->diffForHumans() }}</span>
      </div>
    </div>

    {{-- <a href="{{ route('seemorebusinessdetail', $business->id) }}" target="_blank" class="photos-link">
      See all photos
    </a> --}}
  </div>

  </div>


  <!-- Top bar with action buttons -->
  <div class="top-bar">
    <div class="action-buttons">
      <a href="{{ route('writereview', ['id' => $business->id]) }}" target="_blank" class="btn">
        <i class="fa-solid fa-star"></i> Write a review
      </a>
      {{-- <a href="{{route('addphoto')}}" target="_blank" class="btn"><i class="fa-solid fa-camera"></i> Add photo</a>
      --}}

      <a href="{{ route('public.menu', ['business_id' => $business->id]) }}" class="btn btn-primary" target="_blank">
        <i class="fa-solid fa-link"></i> View Menu
      </a>
    </div>
  </div>

  <!-- Page Content -->
  <div class="container">
    <div class="left-section">
      <div class="section-title">Menu</div>

      <div class="section-title" style="font-size: 18px; margin-bottom: 10px;">Popular Dishes</div>
      <div class="popular-dishes">
        @forelse($business->menuItems->take(5) as $menu)
      <div class="dish">
        <img src="{{ $menu->image ? asset('storage/' . $menu->image) : asset('frontend/images/default-dish.jpg') }}"
        alt="{{ $menu->name }}">
        <div class="dish-name">{{ $menu->name }}</div>
      </div>
    @empty
      <p>No menu items added.</p>
    @endforelse
      </div>


      <div class="location-hours">
        <h2>
          Location & Hours
          <span class="edit-link">
            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828911.png" alt="Edit Icon" />
            Suggest an edit
          </span>
        </h2>

        <div class="map-hours-container">
          <div class="map">
            {{-- Live Google Map iframe --}}
            @if($business->latitude && $business->longitude)
        <iframe width="100%" height="300" style="border:0; border-radius: 8px;" loading="lazy" allowfullscreen
          referrerpolicy="no-referrer-when-downgrade"
          src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCvOvXuE9F5s5Rr7tDn3ZaBqBJjg1Txa3k&q={{ $business->latitude }},{{ $business->longitude }}">
        </iframe>
      @else
        <p class="text-red-500">Location coordinates not available for this business.</p>
      @endif

            {{-- Address & Directions --}}
            <div class="address mt-2">
              @php
        $fullAddress = "{$business->address1}, {$business->city}, {$business->province} {$business->postal_code}";
      @endphp

              <a href="https://www.google.com/maps?q={{ urlencode($fullAddress) }}" target="_blank"
                rel="noopener noreferrer">
                {{ $business->address1 }}
              </a><br />
              {{ $business->city }}, {{ $business->province }} {{ $business->postal_code }}<br />

              <button class="mt-2 bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-700"
                onclick="window.open('https://www.google.com/maps/dir/?api=1&destination={{ urlencode($fullAddress) }}', '_blank')">
                Get directions
              </button>
            </div>
          </div>



          <div class="hours">
            <div><span>Mon</span><span>9:30 AM - 1:00 AM <i>(Next day)</i></span></div>
            <div><span>Tue</span><span>9:30 AM - 1:00 AM <i>(Next day)</i></span></div>
            <div><span>Wed</span><span>9:30 AM - 1:00 AM <i>(Next day)</i></span></div>
            <div><span>Thu</span><span>9:30 AM - 1:00 AM <i>(Next day)</i></span></div>
            <div><span>Fri</span><span>9:30 AM - 2:00 AM <i>(Next day)</i></span></div>
            <div><span>Sat</span><span>10:00 AM - 2:00 AM <i>(Next day)</i></span></div>
            <div>
              <span>Sun</span>
              <span>
                10:00 AM - 1:00 AM <i>(Next day)</i>
                <strong class="open">Open now</strong>
              </span>
            </div>
          </div>
        </div>

      </div>
      <br>
      <section class="recommendation-section" aria-label="Sponsored Recommendations">
        <div class="header">
          <div>You Might Also Consider</div>
          <div class="sponsored" title="Sponsored content">Sponsored <i>ℹ</i></div>
        </div>

        <!-- Recommendation 1 -->
        @foreach($recommendations as $rec)
        <article class="recommendation" role="article">
          <img src="{{ asset('storage/' . $rec->logo) }}" class="rec-image" alt="{{ $rec->business_name }}">

          <div class="rec-content">
          <h3 class="rec-title">{{ $rec->business_name }}</h3>

          <div class="stars">
            @php
          $avg = round($rec->reviews_avg_rating ?? 0);
          echo str_repeat('★', $avg) . str_repeat('☆', 5 - $avg);
        @endphp
            <span class="review-count">({{ $rec->reviews_count }} reviews)</span>
          </div>

          @php
          $latestReview = $rec->reviews->first();
        @endphp

          @if($latestReview)
        <p class="rec-review">
          <span class="reviewer">{{ $latestReview->user->name }} said</span>
          <span class="quote-text">"{{ \Illuminate\Support\Str::limit($latestReview->review, 150, '...') }}"</span>
          {{-- <span class="read-more" tabindex="0">read more</span> --}}
        </p>
        @endif

          <div class="category">
            in
            {{ is_array(json_decode($rec->categories)) ? implode(', ', json_decode($rec->categories)) : $rec->categories }}
          </div>
          </div>
        </article>
    @endforeach
      </section>
    </div>
  </div>
  </div>

</body>

</html>