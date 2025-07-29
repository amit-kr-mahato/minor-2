<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>{{ $business->business_name }} | Review</title>

  <style>
    /* [Your original styles remain unchanged — skipped here for brevity] */
  </style>
</head>

<body>

  <div class="container">
    <a href="{{ route('businessdetail', ['id' => $business->id]) }}">← Back</a>

    <h1>{{ $business->business_name }}</h1>

    @if(session('success'))
      <div class="text-green-600">{{ session('success') }}</div>
    @endif

    <h3>How would you rate your experience?</h3>

    @auth
      <form method="POST" action="{{ route('review.submit') }}" id="review-form" onsubmit="return validateReview();">
        @csrf
        <input type="hidden" name="rating" id="rating-input" value="0">

        <div class="rating-stars" id="rating">
          <span data-value="1">&#9733;</span>
          <span data-value="2">&#9733;</span>
          <span data-value="3">&#9733;</span>
          <span data-value="4">&#9733;</span>
          <span data-value="5">&#9733;</span>
        </div>

        <div class="rating-text" id="rating-feedback">Select your rating</div>
        @error('rating')
          <div class="error-message">{{ $message }}</div>
        @enderror

        <h3>Tell us about your experience</h3>
        <p style="font-size: 14px;">A few things to consider in your review</p>

        <textarea id="review" name="review" placeholder="Start your review..."></textarea>
        <p class="note">Reviews need to be at least 85 characters.</p>
        @error('review')
          <div class="error-message">{{ $message }}</div>
        @enderror

        <button class="post-btn" type="submit">Post Review</button>
      </form>
    @else
      <div class="alert alert-warning" style="margin-top: 20px;">
        Please <a href="{{ route('login') }}">log in</a> to write a review.
      </div>
    @endauth
  </div>

  <script>
    const stars = document.querySelectorAll('.rating-stars span');
    const feedbackText = document.getElementById('rating-feedback');
    const ratingInput = document.getElementById('rating-input');
    let selectedRating = 0;

    const feedbackMessages = {
      1: { text: 'Not good', color: 'red' },
      2: { text: 'Could have been better', color: 'orange' },
      3: { text: 'Okay', color: '#f9a825' },
      4: { text: 'Good', color: 'green' },
      5: { text: 'Excellent', color: 'darkgreen' }
    };

    stars.forEach(star => {
      star.addEventListener('click', () => {
        selectedRating = parseInt(star.getAttribute('data-value'));
        ratingInput.value = selectedRating;

        stars.forEach(s => {
          s.classList.remove('selected');
          if (parseInt(s.getAttribute('data-value')) <= selectedRating) {
            s.classList.add('selected');
          }
        });

        const feedback = feedbackMessages[selectedRating];
        feedbackText.textContent = feedback.text;
        feedbackText.style.color = feedback.color;
      });
    });

    function validateReview() {
      const reviewText = document.getElementById('review').value.trim();
      if (ratingInput.value == 0) {
        alert("Please select a rating.");
        return false;
      }
      if (reviewText.length < 85) {
        alert("Your review must be at least 85 characters.");
        return false;
      }
      return true;
    }
  </script>

</body>
</html>
