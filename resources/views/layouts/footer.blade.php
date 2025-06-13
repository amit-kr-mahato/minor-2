<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h6>About</h6>
                <ul class="list-unstyled">
                    <li><a href="#">About Yelp</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Press</a></li>
                    <li><a href="#">Investor Relations</a></li>
                    <li><a href="#">Trust & Safety</a></li>
                    <li><a href="#">Content Guidelines</a></li>
                    <li><a href="#">Accessibility Statement</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Ad Choices</a></li>
                    <li><a href="#">Your Privacy Choices</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h6>Discover</h6>
                <ul class="list-unstyled">
                    <li><a href="#">Yelp Project Cost Guides</a></li>
                    <li><a href="#">Collections</a></li>
                    <li><a href="#">Talk</a></li>
                    <li><a href="#">Events</a></li>
                    <li><a href="#">Yelp Blog</a></li>
                    <li><a href="#">Support</a></li>
                    <li><a href="#">Yelp Mobile</a></li>
                    <li><a href="#">Developers</a></li>
                    <li><a href="#">RSS</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h6>Yelp for Business</h6>
                <ul class="list-unstyled">
                    <li><a href="#">Yelp for Business</a></li>
                    <li><a href="#">Business Owner Login</a></li>
                    <li><a href="#">Claim your Business Page</a></li>
                    <li><a href="#">Advertise on Yelp</a></li>
                    <li><a href="#">Yelp for Restaurant Owners</a></li>
                    <li><a href="#">Table Management</a></li>
                    <li><a href="#">Business Success Stories</a></li>
                    <li><a href="#">Business Support</a></li>
                    <li><a href="#">Yelp Blog for Business</a></li>
                    <li><a href="#">Yelp Data for B2B</a></li>
                    <li><a href="#">Yelp Data for B2C</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h6>Languages</h6>
                <ul class="list-unstyled">
                    <li><a href="#">English ▼</a>
                        <form action="" method="get">
                            <input list="browsers" name="browser" id="browser">
                            <datalist id="browsers">
                                <option value="Edge">
                                <option value="Firefox">
                                <option value="Chrome">
                                <option value="Opera">
                                <option value="Safari">
                            </datalist>
                        </form>
                    </li>
                </ul>
                <h6>Cities</h6>
                <ul class="list-unstyled">
                    <li><a href="#">Explore a City ▼</a>
                        <form action="" method="get">
                            <input list="browsers" name="browser" id="browser">
                            <datalist id="browsers">
                                <option value="Edge">
                                <option value="Firefox">
                                <option value="Chrome">
                                <option value="Opera">
                                <option value="Safari">
                            </datalist>
                        </form>

                    </li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            <p>Copyright © 2004–2025 help Inc. help, Elite Squad, <span class="fontt">🙋‍♂️</span> and related marks
                are registered trademarks of help.</p>
        </div>
    </div>
</footer>




<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/gsap.min.js"
    integrity="sha512-NcZdtrT77bJr4STcmsGAESr06BYGE8woZdSdEgqnpyqac7sugNO+Tr4bGwGF3MsnEkGKhU2KL2xh6Ec+BqsaHA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/ScrollTrigger.min.js"
    integrity="sha512-P2IDYZfqSwjcSjX0BKeNhwRUH8zRPGlgcWl5n6gBLzdi4Y5/0O4zaXrtO4K9TZK6Hn1BenYpKowuCavNandERg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('frontend/gsap.js') }}"></script>
<script src="{{ asset('frontend/main.js') }}"></script>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
    function validateForm() {
      const fields = [
        'country',
        'businessName',
        'address1',
        'city',
        'postalCode',
        'phone',
        'category',
        'email'
      ];

      let isValid = true;

      fields.forEach(field => {
        const input = document.getElementById(field);
        const errorDiv = document.getElementById(`error-${field}`);

        if (input.value.trim() === '') {
          errorDiv.textContent = `${input.previousElementSibling.textContent.replace('*', '').trim()} is required.`;
          isValid = false;
        } else {
          errorDiv.textContent = '';
        }
      });

      if (isValid) {
        alert("Form submitted successfully!");
        // Here you can send the form data or reset the form
        document.getElementById("businessForm").reset();
      }
    }
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "timeOut": "5000"
    };
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
