<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login/Register with Forgot Password</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      background-color: #202835;
    }

    .container {
      background: #0c42c2;
      color: rgb(238, 232, 232);
      display: flex;
      justify-content: center;
      flex-direction: column;
      width: 400px;
      position: relative;
      background: #053b8d;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 0 25px rgba(0, 0, 0, 0.4);
      margin-left: 40%;
      margin-top: 10%;
    }

    .form-box {
      padding: 40px 30px;
      display: none;
      flex-direction: column;
      gap: 15px;
    }

    .form-box.active {
      display: flex;
    }

    .form-box h2 {
      text-align: center;
    }

    .input-group {
      position: relative;
    }

    .input-group i {
      position: absolute;
      top: 10px;
      left: 10px;
      color: #3f79ff;
    }

    .input-group input {
      width: 90%;
      padding: 10px 10px 10px 35px;
      border: none;
      border-radius: 8px;
      outline: none;
    }

    .forgot {
      font-size: 14px;
      text-align: right;
      color: #eff1f3;
      cursor: pointer;
      text-decoration: underline;
    }

    button {
      padding: 12px;
      background-color: #3f79ff;
      color: rgb(242, 240, 248);
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-weight: bold;
    }

    .switch-panel {
      text-align: center;
      background: #3f79ff;
      padding: 15px;
      border-radius: 0 0 20px 20px;
    }

    .switch-panel button {
      background: rgb(123, 192, 238);
      color: #01050f;
      border-radius: 20px;
      padding: 8px 16px;
      font-weight: bold;
      margin: 0 10px;
    }

    /* Forgot Password Popup */
    .popup {
      position: fixed;
      color: #f5f6f8;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%) scale(0);
      background: #1e293b;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 0 30px rgba(0, 0, 0, 0.6);
      width: 300px;
      z-index: 1000;
      text-align: center;
    }

    .popup.active {
      transform: translate(-50%, -50%) scale(1);
      transition: all 0.3s ease;
    }

    .popup input {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      border-radius: 8px;
      border: none;
      outline: none;
    }

    .popup button {
      margin-top: 15px;
      background-color: #3f79ff;
    }

    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      background: rgba(0, 0, 0, 0.6);
      display: none;
      z-index: 900;
    }

    .overlay.active {
      display: block;
    }
  </style>
</head>

<body>

  <div class="container" id="formContainer">
    <div class="business" style="background-color: #eff1f3;color:#0c42c2;text-align:center;">
      <h2>Business-Owner Login</h2>
    </div>
    <!-- Login Form -->
    <div class="form-box active" id="loginForm">
      <h2><i class="fas fa-sign-in-alt"></i> Login</h2>
      <div class="input-group">
        <i class="fas fa-user"></i>
        <input type="text" placeholder="Username">
      </div>
      <div class="input-group">
        <i class="fas fa-lock"></i>
        <input type="password" placeholder="Password">
      </div>
      <div class="forgot" onclick="openForgot()">Forgot Password?</div>
      <button>Login</button>
      {{-- <button style="background-color: white" class="text-decoration-none">
      <div class="input-group mb-3">
        <a href="{{ route('google.login') }}"
          class="btn btn-lg btn-light w-100 fs-6 d-flex align-items-center justify-content-center text-dark">
          <img src="{{ asset('frontend/images/google.png') }}" alt="Google" style="width:20px;" class="me-2">
          <small>Sign In with Google</small>
        </a>
      </div>
    </button> --}}
    </div>

    <!-- Register Form -->
    <div class="form-box" id="registerForm">
      <h2><i class="fas fa-user-plus"></i> Register</h2>
      <div class="input-group">
        <i class="fas fa-user"></i>
        <input type="text" placeholder="Username">
      </div>
      <div class="input-group">
        <i class="fas fa-envelope"></i>
        <input type="email" placeholder="Email">
      </div>
      <div class="input-group">
        <i class="fas fa-lock"></i>
        <input type="password" placeholder="Password">
      </div>
      <button>Register</button>
    </div>

    <!-- Switch Buttons -->
    <div class="switch-panel">
      <button onclick="showLogin()">Login</button>
      <button onclick="showRegister()">Register</button>
    </div>
  </div>

  <!-- Forgot Password Popup -->
  <div class="overlay" id="overlay" onclick="closeForgot()"></div>
  <div class="popup" id="forgotPopup">
    <h3><i class="fas fa-key"></i> Forgot Password</h3>
    <p>Please enter your email address</p>
    <input type="email" placeholder="Email">
    <button onclick="closeForgot()">Submit</button>
  </div>

  <script>
    const loginForm = document.getElementById("loginForm");
    const registerForm = document.getElementById("registerForm");
    const container = document.getElementById("formContainer");

    const popup = document.getElementById("forgotPopup");
    const overlay = document.getElementById("overlay");

    function showLogin() {
      gsap.to(container, {
        x: 0, duration: 0.5, onComplete: () => {
          registerForm.classList.remove("active");
          loginForm.classList.add("active");
        }
      });
    }

    function showRegister() {
      gsap.to(container, {
        x: 0, duration: 0.5, onComplete: () => {
          loginForm.classList.remove("active");
          registerForm.classList.add("active");
        }
      });
    }

    function openForgot() {
      popup.classList.add("active");
      overlay.classList.add("active");
    }

    function closeForgot() {
      popup.classList.remove("active");
      overlay.classList.remove("active");
    }
  </script>

</body>

</html>