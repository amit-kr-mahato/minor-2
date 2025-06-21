

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Mountain Mike's Pizza Review</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #fff;
      color: #222;
      display: flex;
      justify-content: center;
      padding: 40px 20px;
    }

    .container {
      max-width: 500px;
      width: 100%;
      text-align: center;
    }

    a {
      text-decoration: none;
      color: #007bff;
      display: inline-block;
      margin-bottom: 15px;
      margin-right: 80%;
      font-size: 16px;
    }

    h1 {
      font-size: 24px;
      font-weight: 700;
      text-decoration: underline;
      margin-bottom: 20px;
    }

    h3 {
      font-size: 16px;
      font-weight: bold;
      margin: 15px 0 10px;
    }

    .rating-stars {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-bottom: 10px;
      flex-wrap: wrap;
    }

    .rating-stars span {
      font-size: 28px;
      cursor: pointer;
      color: #ddd;
      margin-right: 5px;
      transition: 0.2s;
    }

    .rating-stars span.selected {
      color: #ffc107;
    }

    .rating-text {
      margin-top: 10px;
      font-size: 14px;
      font-weight: bold;
    }

    .tags {
      margin: 10px 0;
    }

    .tag {
      display: inline-block;
      background-color: #e0e0e0;
      border-radius: 4px;
      padding: 5px 10px;
      font-size: 13px;
      margin: 4px;
    }

    textarea {
      width: 100%;
      height: 140px;
      padding: 10px;
      font-size: 15px;
      margin-top: 8px;
      border: 1px solid #ccc;
      border-radius: 6px;
      resize: vertical;
    }

    .note {
      margin-top: 6px;
      font-size: 13px;
      color: #666;
    }

       /* Add styles for errors */
    .error-message {
      color: red;
      font-size: 13px;
      margin-top: 5px;
    }

    /* Modal styles */
    #review-modal {
      display: none;
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0,0,0,0.5);
      justify-content: center;
      align-items: center;
      z-index: 1000;
    }

    #review-modal .modal-content {
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      max-width: 400px;
      width: 90%;
      text-align: center;
      position: relative;
    }

    #review-modal .modal-content h2 {
      margin-bottom: 15px;
    }

    #review-modal .modal-content p {
      margin: 10px 0;
      white-space: pre-wrap;
    }

    #review-modal .close-btn {
      margin-top: 15px;
      padding: 8px 16px;
      font-size: 16px;
      cursor: pointer;
      border: none;
      border-radius: 5px;
      background: #d32f2f;
      color: white;
    }

    .post-btn {
      background-color: #d32f2f;
      color: white;
      padding: 12px;
      width: 100%;
      font-size: 16px;
      font-weight: bold;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      margin-top: 20px;
    }

    .post-btn:hover {
      background-color: #b71c1c;
    }

    @media (max-width: 600px) {
      h1 {
        font-size: 20px;
      }

      .rating-stars span {
        font-size: 24px;
      }
    }
  </style>
</head>
<body>

  <div class="container">
    <a href="{{route('businessdetail')}}">← Back</a>

    <h1>Mountain Mike's Pizza</h1>

    <h3>How would you rate your experience?</h3>
     <form method="POST" action="{{ route('review') }}" id="review-form" onsubmit="return validateReview();">
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


    <h3>Tell us about your experience</h3>
    <p style="font-size: 14px;">A few things to consider in your review</p>

    <textarea id="review" name="review" placeholder="Start your review..."></textarea>
    <p class="note">Reviews need to be at least 85 characters.</p>

    <button class="post-btn" type="submit" onclick="validateReview()">Post Review</button>
     </form>
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
