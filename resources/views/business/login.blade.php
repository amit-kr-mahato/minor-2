<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Modern Auth Forms</title>

<style>


  .container {
    width: 380px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 12px 40px rgba(0,0,0,0.1);
    overflow: hidden;
    position: relative;
  }

  .tabs {
    display: flex;
  }
  .tabs button {
    flex: 1;
    padding: 1rem;
    cursor: pointer;
    background: #e4e6eb;
    border: none;
    font-weight: bold;
    transition: background-color 0.3s;
  }
  .tabs button.active {
    background: #1877f2;
    color: white;
  }

  form {
    padding: 2rem;
    display: none;
    animation: fadeIn 0.6s ease forwards;
  }
  form.active {
    display: block;
  }

  input {
    width: 100%;
    margin-bottom: 1.2rem;
    padding: 0.8rem 1rem;
    font-size: 1rem;
    border-radius: 6px;
    border: 1px solid #ccc;
    transition: border-color 0.3s;
  }
  input:focus {
    border-color: #1877f2;
    outline: none;
  }

  button.submit-btn {
    width: 100%;
    padding: 0.85rem;
    background: #1877f2;
    border: none;
    border-radius: 6px;
    color: white;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.3s;
  }
  button.submit-btn:hover {
    background: #155db2;
  }

  .form-footer {
    text-align: center;
    font-size: 0.9rem;
  }
  .form-footer a {
    color: #1877f2;
    cursor: pointer;
    text-decoration: none;
  }
  .form-footer a:hover {
    text-decoration: underline;
  }

  @keyframes fadeIn {
    from {opacity: 0;}
    to {opacity: 1;}
  }
</style>
</head>
<body>

<div class="container">
  <div class="tabs">
    <button id="tab-login" class="active">Login</button>
    <button id="tab-register">Register</button>
    <button id="tab-forgot">Forgot Password</button>
  </div>

  <!-- LOGIN FORM -->
  <form method="POST" action="{{ route('') }}" id="form-login" class="active">
    @csrf
    <input type="email" name="email" placeholder="Email" required autocomplete="email" />
    <input type="password" name="password" placeholder="Password" required autocomplete="current-password" />
    <button type="submit" class="submit-btn">Login</button>
    <div class="form-footer" style="margin-top:1rem;">
      <a id="link-to-forgot">Forgot Password?</a>
    </div>
  </form>

  <!-- REGISTER FORM -->
  <form method="POST" action="{{ route('') }}" id="form-register">
    @csrf
    <input type="text" name="name" placeholder="Full Name" required autocomplete="name" />
    <input type="email" name="email" placeholder="Email" required autocomplete="email" />
    <input type="password" name="password" placeholder="Password" required autocomplete="new-password" />
    <input type="password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password" />
    <button type="submit" class="submit-btn">Register</button>
    <div class="form-footer" style="margin-top:1rem;">
      <a id="link-to-login-from-register">Already have an account? Login</a>
    </div>
  </form>

  <!-- FORGOT PASSWORD FORM -->
  <form method="POST" action="{{ route('') }}" id="form-forgot">
    @csrf
    <input type="email" name="email" placeholder="Enter your email" required autocomplete="email" />
    <button type="submit" class="submit-btn">Send Reset Link</button>
    <div class="form-footer" style="margin-top:1rem;">
      <a id="link-to-login-from-forgot">Back to Login</a>
    </div>
  </form>
</div>

<script>
  const tabLogin = document.getElementById('tab-login');
  const tabRegister = document.getElementById('tab-register');
  const tabForgot = document.getElementById('tab-forgot');

  const formLogin = document.getElementById('form-login');
  const formRegister = document.getElementById('form-register');
  const formForgot = document.getElementById('form-forgot');

  const linkToForgot = document.getElementById('link-to-forgot');
  const linkToLoginFromRegister = document.getElementById('link-to-login-from-register');
  const linkToLoginFromForgot = document.getElementById('link-to-login-from-forgot');

  function clearActiveTabs() {
    tabLogin.classList.remove('active');
    tabRegister.classList.remove('active');
    tabForgot.classList.remove('active');
  }

  function clearActiveForms() {
    formLogin.classList.remove('active');
    formRegister.classList.remove('active');
    formForgot.classList.remove('active');
  }

  tabLogin.onclick = () => {
    clearActiveTabs();
    tabLogin.classList.add('active');
    clearActiveForms();
    formLogin.classList.add('active');
  };

  tabRegister.onclick = () => {
    clearActiveTabs();
    tabRegister.classList.add('active');
    clearActiveForms();
    formRegister.classList.add('active');
  };

  tabForgot.onclick = () => {
    clearActiveTabs();
    tabForgot.classList.add('active');
    clearActiveForms();
    formForgot.classList.add('active');
  };

  linkToForgot.onclick = (e) => {
    e.preventDefault();
    tabForgot.click();
  };

  linkToLoginFromRegister.onclick = (e) => {
    e.preventDefault();
    tabLogin.click();
  };

  linkToLoginFromForgot.onclick = (e) => {
    e.preventDefault();
    tabLogin.click();
  };
</script>

</body>
</html>
