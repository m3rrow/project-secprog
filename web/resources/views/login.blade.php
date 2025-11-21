<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Login - H3kHire</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <link rel="shortcut icon" type="image/png" href="images/fav-icon.png" />

  <style>
    body {
      background: #f3f4f6;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .login-container {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column; /* Stacks the logo and login box vertically */
    }

    .login-box {
      background: #fff;
      padding: 2.5rem;
      border-radius: 15px;
      box-shadow: 0 8px 24px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 420px;
    }

    .login-box h4 {
      font-weight: 600;
      margin-bottom: 1.5rem;
      text-align: center;
    }

    .forgot-link, .signup-link {
      font-size: 0.9rem;
    }

    /* --- FORM INPUT BOX STYLES --- */
    .field-icon {
        position: relative;
        margin-bottom: 1rem;
    }
    .field-icon .form-control {
        background-color: #eaf2f7;
        border: 1px solid #eaf2f7;
        border-radius: 30px;
        height: 50px;
        padding-left: 45px;
    }
    .field-icon .form-control.is-invalid {
        border-color: #dc3545;
        background-color: #fff5f5;
    }
    .field-icon .icon {
        position: absolute;
        left: 20px;
        top: 15px;
        color: #0060aa;
        z-index: 10;
        pointer-events: none;
    }
    .field-icon.has-error .icon {
        color: #dc3545;
    }
    .form-control:focus {
        box-shadow: none;
        border-color: #eaf2f7;
    }
    .form-control.is-invalid:focus {
        border-color: #dc3545;
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
    }
    .invalid-feedback {
        padding-left: 15px;
        margin-top: 0.25rem;
    }

    /* --- SUBMIT BUTTON STYLES --- */
    .btn-custom {
      background: #4f46e5;
      color: #fff;
      border-radius: 24px;
      padding: 0.75rem;
      font-weight: 500;
      width: 200px; /* Smaller, fixed width */
      border: none;
      position: relative; 
      overflow: hidden;  
      z-index: 1;        
    }
    .btn-custom span {
        position: relative;
        z-index: 2;
    }
    .btn-custom::after {
        content: "";
        position: absolute;
        top: 0;
        left: -35%;
        width: 0;
        height: 100%;
        background: #0a3382;
        transform: skew(50deg);
        transition-duration: 0.6s;
        z-index: 1;
    }
    .btn-custom:hover::after {
        width: 150%;
    }
    .btn-custom:hover {
        background: #4f46e5;
        color: #fff;
    }

    /* --- SOCIAL BUTTON STYLES --- */
    .social-login {
      display: flex;
      justify-content: center;
      gap: 10px;
      margin: 1rem 0;
    }
    .social-login a {
        border: 1px solid #ccc;
        border-radius: 50%;
        width: 45px;
        height: 45px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: #555;
        background: #fff;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
        text-decoration: none;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
    .social-login a i {
        position: relative;
        z-index: 2;
        transition: color 0.3s ease;
        font-size: 16px;
        line-height: 0;
    }
    .social-login a::after {
        content: "";
        position: absolute;
        top: 0;
        left: -38%;
        width: 0;
        height: 100%;
        background: #0060aa;
        transform: skew(26deg);
        transition: width 0.4s;
        z-index: 1;
    }
    .social-login a:hover {
        border-color: #0060aa;
    }
    .social-login a:hover i {
        color: #fff;
    }
    .social-login a:hover::after {
        width: 150%;
    }

  </style>
</head>
<body>
  <div class="login-container">
    
    <div class="text-center mb-4">
      <img src="images/h3khire-logo.png" alt="H3kHire Logo" style="max-height: 100px;">
    </div>

    <div class="login-box">
      <h4>Welcome back!</h4>

      <form method="POST" action="{{ route('login.attempt') }}">
        @csrf
        <div class="field-icon @error('login') has-error @enderror">
          <i class="fas fa-user icon"></i>
          <input type="email" name="email" class="form-control @error('login') is-invalid @enderror" 
                 placeholder="Email" value="{{ old('email') }}" required>
        </div>

        <div class="field-icon @error('login') has-error @enderror">
          <i class="fas fa-lock icon"></i>
          <input type="password" name="password" class="form-control @error('login') is-invalid @enderror" 
                 placeholder="Password" required>
        </div>

        @if($errors->any())
          <div style="margin-top: 0.25rem; margin-bottom: 0.5rem; padding-left: 5px;">
            @foreach($errors->all() as $error)
              <div style="color: #dc3545; font-size: 0.875rem; margin-bottom: 2px;">
                <i class="fas fa-exclamation-circle" style="margin-right: 8px;"></i>{{ $error }}
              </div>
            @endforeach
          </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-3">
          <div class="form-check">
            <input type="checkbox" name="remember" id="remember" class="form-check-input">
            <label for="remember" class="form-check-label">Remember Me</label>
          </div>
          <a href="{{ route('forgot') }}" class="forgot-link">Forgot Password?</a>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-custom">
                <span>Sign In</span>
            </button>
        </div>

        <div class="text-center mt-3">
          <span>- OR -</span>
        </div>

        <div class="social-login">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-google"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
        </div>

        <p class="text-center signup-link mt-3">
          Don’t have an account? <a href="{{ route('register') }}">Sign Up now!</a>
        </p>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>