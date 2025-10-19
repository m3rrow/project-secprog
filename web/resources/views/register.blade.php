<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Register - H3kHire</title>
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
      flex-direction: column;
      padding: 2rem 0;
    }

    .login-box {
      background: #fff;
      padding: 2.5rem;
      border-radius: 15px;
      box-shadow: 0 8px 24px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 480px; 
    }

    .login-box h4 {
      font-weight: 600;
      margin-bottom: 1.5rem;
      text-align: center;
    }

    .signup-link {
      font-size: 0.9rem;
    }

    /* --- PILL SEGMENTED CONTROL TAB STYLES --- */
    .form-tabs .nav-pills {
        display: flex;
        justify-content: stretch;
        gap: 0; 
        border: 1px solid #dee2e6;
        border-radius: 30px; 
        overflow: hidden; 
        background-color: #fff;
    }

    .form-tabs .nav-item {
        flex: 1; 
    }

    .form-tabs .nav-link {
        border-radius: 0; 
        text-align: center;
        color: #555;
        font-weight: 500;
        transition: all 0.3s ease-in-out; 
        border: none; 
        background-color: transparent; 
        width: 100%; 
        padding: 0.75rem 1rem; 
    }

    .form-tabs .nav-item:not(:last-child) .nav-link {
        border-right: 1px solid #dee2e6;
    }

    .form-tabs .nav-link.active {
        background: #4;
        color: #fff;
    }

    .form-tabs .nav-link:hover:not(.active) {
        background-color: #eaf2f7; 
        color: #333;
    }

    /* --- FORM INPUT BOX STYLES --- */
    .field-icon {
        position: relative;
    }
    .field-icon .form-control {
        background-color: #eaf2f7;
        border: 1px solid #eaf2f7;
        border-radius: 30px;
        height: 50px;
        padding-left: 45px;
    }
    .field-icon .icon {
        position: absolute;
        left: 20px;
        top: 50%;
        transform: translateY(-50%);
        color: #0060aa;
    }
    .form-control:focus {
        box-shadow: none;
        border-color: #eaf2f7;
    }

    /* --- SUBMIT BUTTON STYLES --- */
    .btn-custom {
      background: #4f46e5;
      color: #fff;
      border-radius: 24px;
      padding: 0.75rem;
      font-weight: 500;
      width: 200px; 
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
        display: flex;
        align-items: center;
        justify-content: center;
        color: #555;
        position: relative; 
        overflow: hidden;
        transition: all 0.3s;
    }
    .social-login a i {
        position: relative;
        z-index: 2;
        transition: color 0.3s;
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
      <img src="images/h3khire-logo.png" alt="H3kHire Logo" style="max-height: 80px;">
    </div>

    <div class="login-box">
      
      <div class="form-tabs mb-4">
        <ul class="nav nav-pills" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-user-tab" data-bs-toggle="pill" data-bs-target="#pills-user" type="button" role="tab" aria-controls="pills-user" aria-selected="true">User</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-freelancer-tab" data-bs-toggle="pill" data-bs-target="#pills-freelancer" type="button" role="tab" aria-controls="pills-freelancer" aria-selected="false">Freelancer</button>
            </li>
        </ul>
      </div>

      <div class="tab-content" id="pills-tabContent">
        
        <div class="tab-pane fade show active" id="pills-user" role="tabpanel" aria-labelledby="pills-user-tab">
            <h4>Sign Up as User</h4>
            <form method="POST" action="{{ route('register.store') }}">
                @csrf
                <div class="mb-3 field-icon"><i class="fas fa-user icon"></i><input type="text" name="name" class="form-control" placeholder="Full Name" required></div>
                <div class="mb-3 field-icon"><i class="fas fa-envelope icon"></i><input type="email" name="email" class="form-control" placeholder="Email" required></div>
                <div class="mb-3 field-icon"><i class="fas fa-calendar-alt icon"></i><input type="date" name="birthdate" class="form-control" required></div>
                <div class="mb-3 field-icon"><i class="fas fa-lock icon"></i><input type="password" name="password" class="form-control" placeholder="Password" required></div>
                <div class="mb-3 field-icon"><i class="fas fa-lock icon"></i><input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required></div>
                <div class="form-check mb-3"><input type="checkbox" id="terms-user" class="form-check-input" required><label for="terms-user" class="form-check-label" style="font-size: 0.9rem;">I agree to the Terms & Conditions.</label></div>
                <div class="text-center"><button type="submit" class="btn btn-custom"><span>Sign Up</span></button></div>
            </form>
        </div>

        <div class="tab-pane fade" id="pills-freelancer" role="tabpanel" aria-labelledby="pills-freelancer-tab">
            <h4>Sign Up as Freelancer</h4>
            <form method="POST" action="">
                @csrf
                <div class="mb-3 field-icon"><i class="fas fa-user icon"></i><input type="text" name="name" class="form-control" placeholder="Full Name" required></div>
                <div class="mb-3 field-icon"><i class="fas fa-envelope icon"></i><input type="email" name="email" class="form-control" placeholder="Email" required></div>
                <div class="mb-3 field-icon"><i class="fas fa-briefcase icon"></i><input type="text" name="category" class="form-control" placeholder="Category (e.g., Web Developer)" required></div>
                <div class="mb-3 field-icon"><i class="fas fa-lock icon"></i><input type="password" name="password" class="form-control" placeholder="Password" required></div>
                <div class="mb-3 field-icon"><i class="fas fa-lock icon"></i><input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required></div>
                <div class="form-check mb-3"><input type="checkbox" id="terms-freelancer" class="form-check-input" required><label for="terms-freelancer" class="form-check-label" style="font-size: 0.9rem;">I agree to the Terms & Conditions.</label></div>
                <div class="text-center"><button type="submit" class="btn btn-custom"><span>Sign Up</span></button></div>
            </form>
        </div>

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
        Already have an account? <a href="{{ route('login') }}">Sign In now!</a>
      </p>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>