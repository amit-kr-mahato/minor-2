<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h6>About</h6>
                <ul class="list-unstyled">
                    <li><a href="{{route('about')}}">About Bizzlisto</a></li>
               
                </ul>
            </div>
            <div class="col-md-4">
                <h6>Bizzlisto for Business</h6>
                <ul class="list-unstyled">
                    <li><a href="{{route('sigin')}}">Login</a></li>
                    <li><a href="{{route('addbusiness')}}">Claim your Business Page</a></li>


                </ul>
            </div>

             <div class="col-md-4">
                <h6>Social Media</h6>
                <ul class="list-unstyled">
                    <li><a href="#">Facebook</a></li>
              
                </ul>
            </div>
        </div>
        <div class="copyright">
            <p>Copyright © 2004–2025 help Inc. Bizzlisto, Elite Squad, <span class="fontt">🙋‍♂️</span> and related
                marks
                are registered trademarks of Bizzlisto.</p>
        </div>
    </div>
</footer>




<!-- Bootstrap JS with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/gsap.min.js"
    integrity="sha512-NcZdtrT77bJr4STcmsGAESr06BYGE8woZdSdEgqnpyqac7sugNO+Tr4bGwGF3MsnEkGKhU2KL2xh6Ec+BqsaHA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/ScrollTrigger.min.js"
    integrity="sha512-P2IDYZfqSwjcSjX0BKeNhwRUH8zRPGlgcWl5n6gBLzdi4Y5/0O4zaXrtO4K9TZK6Hn1BenYpKowuCavNandERg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('frontend/gsap.js') }}"></script>
<script src="{{ asset('frontend/main.js') }}"></script>
{{--
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script> --}}

<!-- Strength + Toggle Logic -->
<script>
    function togglePassword() {
        const input = document.getElementById("myInput");
        const icon = document.getElementById("toggleIcon");

        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }

    function checkStrength(password) {
        const bar = document.getElementById("strengthBar");
        const text = document.getElementById("text");

        let strength = 0;

        const hasUppercase = /[A-Z]/.test(password);
        const hasNumber = /[0-9]/.test(password);
        const hasSpecial = /[\W_]/.test(password);
        const isLong = password.length > 6;

        if (hasUppercase) strength++;
        if (hasNumber) strength++;
        if (hasSpecial) strength++;

        let color = "", message = "";

        if (!password) {
            bar.style.width = "0%";
            bar.className = "progress-bar";
            message = "";
        } else if (!isLong) {
            bar.style.width = "25%";
            bar.className = "progress-bar bg-danger";
            message = "Too Short";
            color = "#dc3545";
        } else if (strength === 0) {
            bar.style.width = "25%";
            bar.className = "progress-bar bg-danger";
            message = "Very Weak";
            color = "#dc3545";
        } else if (strength === 1) {
            bar.style.width = "50%";
            bar.className = "progress-bar bg-warning";
            message = "Weak";
            color = "#ffc107";
        } else if (strength === 2) {
            bar.style.width = "75%";
            bar.className = "progress-bar bg-info";
            message = "Good";
            color = "#0dcaf0";
        } else if (strength === 3 && isLong) {
            bar.style.width = "100%";
            bar.className = "progress-bar bg-success";
            message = "Strong";
            color = "#198754";
        }

        text.innerText = message;
        text.style.color = color;
    }
</script>

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
{{--
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script> --}}