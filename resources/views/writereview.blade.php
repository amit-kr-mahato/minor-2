<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>{{ $business->business_name }} | Review</title>

  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    .star {
      font-size: 2rem;
      cursor: pointer;
      color: #d1d5db;
    }

    .star.selected {
      color: #fbbf24;
    }

    .star:hover,
    .star:hover~.star {
      color: #facc15;
    }

    .custom-scroll::-webkit-scrollbar {
      width: 0px;
      background: transparent;
      /* optional: just in case */
    }

    .custom-scroll {
      -ms-overflow-style: none;
      /* IE and Edge */
      scrollbar-width: none;
      /* Firefox */
    }
  </style>
</head>

<body class="bg-gray-100 py-5">

  <div class="container">
    <div class="row g-4">
      <!-- Left Column: Review Form -->
      <div class="col-md-7">
        <div class="bg-white p-4 rounded shadow">
          <a href="{{ route('businessdetail', ['id' => $business->id]) }}"
            class="text-primary fw-semibold mb-3 d-inline-block">← Back</a>
          <h2 class="mb-3 fw-bold text-dark">{{ $business->business_name }}</h2>

          @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

          @auth
          <form method="POST" action="{{ route('review.submit') }}" onsubmit="return validateReview();">
          @csrf
          <input type="hidden" name="business_id" value="{{ $business->id }}">
          <input type="hidden" name="rating" id="rating-input" value="0">

          <label class="form-label fw-semibold">Rate Your Experience</label>
          <div id="rating" class="mb-2 d-flex gap-2">
            @for($i = 1; $i <= 5; $i++)
          <span class="star" data-value="{{ $i }}">&#9733;</span>
        @endfor
          </div>
          <div id="rating-feedback" class="mb-3 text-sm fw-semibold text-gray-600">Select your rating</div>
          @error('rating')
        <div class="text-danger small">{{ $message }}</div>
        @enderror

          <div class="mb-3">
            <label for="review" class="form-label fw-semibold">Your Review</label>
            <textarea class="form-control" id="review" name="review" placeholder="Write at least 85 characters..."
            rows="5" minlength="85" required></textarea>
            <div class="form-text">Minimum 85 characters.</div>
            @error('review')
          <div class="text-danger small">{{ $message }}</div>
        @enderror
          </div>

          <button type="submit" class="btn btn-primary w-100 fw-bold">Post Review</button>
          </form>
      @else
        <div class="alert alert-warning mt-3">
        Please <a href="{{ route('login') }}" class="text-primary">log in</a> to write a review.
        </div>
      @endauth
        </div>
      </div>

      <!-- Right Column: Review List -->
      <!-- Right Column: Review List -->
      <div class="col-md-5">
        <div class="bg-white p-4 rounded shadow custom-scroll" style="max-height: 600px; overflow-y: auto;">
          <h3 class="mb-4 fw-bold">Customer Reviews</h3>

          @forelse($reviews as $review)
        <div class="mb-4 border-bottom pb-3">
        <div class="d-flex justify-content-between align-items-center mb-1">
          <div class="fw-semibold text-dark">{{ $review->user->name ?? 'Anonymous' }}</div>
          <small class="text-muted">{{ $review->created_at->format('M d, Y') }}</small>
        </div>
        <div class="text-warning fs-5">
          {!! str_repeat('&#9733;', $review->rating) !!}
          {!! str_repeat('&#9734;', 5 - $review->rating) !!}
        </div>
        <p class="mt-2 text-secondary text-wrap break-words" style="white-space: pre-wrap;">{{ $review->review }}
        </p>
        </div>
      @empty
        <p class="text-muted">No reviews yet. Be the first to write one!</p>
      @endforelse
        </div>
      </div>


    </div>
  </div>

  <script>
    const stars = document.querySelectorAll('.star');
    const ratingInput = document.getElementById('rating-input');
    const feedbackText = document.getElementById('rating-feedback');

    const feedbackMessages = {
      1: "Not good",
      2: "Could be better",
      3: "Okay",
      4: "Good",
      5: "Excellent"
    };

    stars.forEach(star => {
      star.addEventListener('click', () => {
        const rating = parseInt(star.getAttribute('data-value'));
        ratingInput.value = rating;

        stars.forEach(s => s.classList.remove('selected'));
        for (let i = 0; i < rating; i++) {
          stars[i].classList.add('selected');
        }

        feedbackText.textContent = feedbackMessages[rating];
      });
    });

    function validateReview() {
      const review = document.getElementById('review').value.trim();
      if (ratingInput.value == 0) {
        alert('Please select a star rating.');
        return false;
      }
      if (review.length < 85) {
        alert('Your review must be at least 85 characters.');
        return false;
      }
      return true;
    }
  </script>

</body>

</html>