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
      {{-- <a href="{{route('writereview',['id' => $business->id])}}" target="_blank" class="btn"><i
          class="fa-solid fa-star"></i> Write a review</a> --}}
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
        <div class="dish">
          <img src="D:\yelp website\rest\KATHM-P0464-Sesame.16x9.webp" alt="Pizza">
          <div class="dish-name">Pizza</div>
          <div class="dish-info">2 Reviews</div>
        </div>
        <div class="dish">
          <img src="D:\yelp website\rest\krishnarpan-restaurant.jpg" alt="Pineapple Pizza">
          <div class="dish-name">Pineapple Chicken</div>
          <div class="dish-info">3 Photos • 3 Reviews</div>
        </div>
        <div class="dish">
          <img src="D:\yelp website\rest\mezze-rooftop.jpg" alt="Boneless Chicken">
          <div class="dish-name">Boneless Wings</div>
          <div class="dish-info">1 Photo • 2 Reviews</div>
        </div>
        <div class="dish">
          <img src="D:\yelp website\rest\Nepali-Food-1.jpg" alt="BBQ Chicken">
          <div class="dish-name">BBQ Chicken</div>
          <div class="dish-info">1 Photo • 2 Reviews</div>
        </div>
        <div class="dish">
          <img src="D:\yelp website\rest\Nepali-Food-1.jpg" alt="BBQ Chicken">
          <div class="dish-name">BBQ Chicken</div>
          <div class="dish-info">1 Photo • 2 Reviews</div>
        </div>

      </div>


      <br>
      <div class="vibe-section">
        <h2>What's the vibe?</h2>

        <div class="photo-grid">
          <div class="photo-card">
            <img src="D:\yelp website\rest\krishnarpan-restaurant.jpg" alt="Inside" />
            <div class="photo-label">
              <strong>Inside</strong>
              <span>48 photos</span>
            </div>
          </div>

          <div class="photo-card">
            <img src="D:\yelp website\rest\a-green-hug-from-the.jpg" alt="Outside" />
            <div class="photo-label">
              <strong>Outside</strong>
              <span>14 photos</span>
            </div>
          </div>

          <div class="photo-card">
            <img src="D:\yelp website\rest\Nepali-Food-1.jpg" alt="All photos" />
            <div class="photo-label">
              <strong>All photos</strong>
              <span>146 photos</span>
            </div>
          </div>
        </div>


        <br>


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
              <!-- Link wrapping the map image -->
              <a href="https://www.google.com/maps/dir/?api=1&destination=35+Skyline+Plaza,+Daly+City,+CA+94015"
                target="_blank" rel="noopener noreferrer" title="Get directions to 35 Skyline Plaza">
                <img src="D:\yelp website\rest\GoogleMapTA.webp" alt="Map of 35 Skyline Plaza" />
              </a>
              <div class="address">
                <a href="https://www.google.com/maps?q=35+Skyline+Plaza,+Daly+City,+CA+94015" target="_blank"
                  rel="noopener noreferrer">
                  35 Skyline Plaza
                </a><br />
                Daly City, CA 94015<br />
                <button
                  onclick="window.open('//www.google.com/maps/dir/?api=1&destination=35+Skyline+Plaza,+Daly+City,+CA+94015', '_blank')">Get
                  directions</button>
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
          <article class="recommendation" role="article" aria-labelledby="rec1-title">
            <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?auto=format&fit=crop&w=80&q=80"
              alt="IHOP pancakes" class="rec-image" />
            <div class="rec-content">
              <h3 class="rec-title" id="rec1-title">IHOP</h3>
              <div class="rec-distance" aria-label="Distance">
                <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                  <path
                    d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5S13.38 11.5 12 11.5z" />
                </svg>
                1.2 miles away from Mountain Mike's Pizza
              </div>
              <p class="rec-review"><span class="reviewer">Jake C. said</span> <span class="quote-text">"my wife and i
                  went here the other day for some breakfast. at first things were going fine ordered my food then my
                  job
                  called me in(i am an on call driver for a local auto dealership). they said it was a short local run
                  so
                  i figured..."</span><span class="read-more" tabindex="0">read more</span></p>
              <div class="category" aria-label="Categories">in Burgers, American, Breakfast &amp; Brunch</div>
            </div>
          </article>

          <!-- Recommendation 2 -->
          <article class="recommendation" role="article" aria-labelledby="rec2-title">
            <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=80&q=80"
              alt="Dish from Lers Ros" class="rec-image" />
            <div class="rec-content">
              <div class="stars" aria-label="4 out of 5 stars rating">
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star empty">&#9733;</span>
                <span class="review-count">(2.4k reviews)</span>
              </div>
              <h3 class="rec-title" id="rec2-title">Lers Ros</h3>
              <p class="rec-review"><span class="reviewer">Manny F. said</span> <span class="quote-text">"I've been a
                  few
                  times now and a very embarrassing thing happened to me. We just finished paying and I went up the
                  stairs
                  to use the bathroom. The mens room was full and I really needed to go so I used the womens room. Not
                  only did I..."</span><span class="read-more" tabindex="0">read more</span></p>
              <div class="category" aria-label="Category">in Thai</div>
            </div>
          </article>
        </section>
      </div>
    </div>

    {{-- <div class="info-card">
      <a href="#">🌐 mountainmikespizza.com</a><br><br>
      📞 (415) 830-5064<br><br>


    </div>

    <div class="recommend">
      <div class="section-title" style="font-size: 16px;">You Might Also Consider</div>
      <div class="recommend-info">
        <img src="D:\yelp website\rest\utse-restaurant-kathmandu-scaled-e1668068274998.webp" alt="Koi Palace">
        <div class="recommend-text">
          <strong>Koi Palace</strong><br>
          <span class="rating">⭐⭐⭐✰</span> (3.9k reviews)<br>
          1.6 miles
        </div>
      </div>
      <div class="recommend-info">
        <img src="D:\yelp website\rest\utse-restaurant-kathmandu-scaled-e1668068274998.webp" alt="Koi Palace">
        <div class="recommend-text">
          <strong>Koi Palace</strong><br>
          <span class="rating">⭐⭐⭐✰</span> (3.9k reviews)<br>
          1.6 miles
        </div>
      </div>
    </div>
  </div> --}}
  {{-- @endforeach --}}
  </div>

</body>

</html>