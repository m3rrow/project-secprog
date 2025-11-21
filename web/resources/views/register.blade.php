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
      margin-bottom: 3rem;       text-align: center;
    }

    .signup-link {
      font-size: 0.9rem;
    }

    .field-select {
        position: relative;
    }
    .field-select .form-select {
        background-color: #eaf2f7;
        border: 1px solid #eaf2f7;
        border-radius: 30px;
        height: 50px;
        padding-left: 20px;
        padding-right: 40px;
        color: #555;
        font-size: 1rem;
        width: 100%;
        appearance: none;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 16px 12px;
        cursor: pointer;
        transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }
    .field-select .form-select:required:invalid {
        color: #6c757d;
    }
    .field-select .form-select option {
         color: #212529;
    }
    .field-select .form-select option:disabled {
         color: #6c757d;
    }
    .field-select .form-select:focus {
        box-shadow: 0 0 0 0.2rem rgba(79, 70, 229, 0.25);
        border-color: #a9a5f7;
        background-color: #eaf2f7;
        outline: none;
    }

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
      <img src="images/h3khire-logo.png" alt="H3kHire Logo" style="max-height: 80px;">
    </div>

    <div class="login-box">

      <h4>Welcome!</h4>

      <form method="POST" action="{{ route('register.store') }}">
          @csrf

          <div class="mb-3 field-icon"><i class="fas fa-user icon"></i><input type="text" name="name" class="form-control" placeholder="Username" required></div>

          <div class="mb-3 field-icon"><i class="fas fa-envelope icon"></i><input type="email" name="email" class="form-control" placeholder="Email" required></div>

          <div class="mb-3 field-icon">
            <i class="fas fa-lock icon"></i>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
          </div>
          <div style="font-size: 0.8rem; color: @error('password') #dc3545 @else #666 @enderror; margin-top: -10px; margin-bottom: 10px; padding-left: 5px;">
            @error('password')
              {{ $message }}
            @else
              Password must contain at least 8 characters, one uppercase, one lowercase, one number, and one special character (@$!%*?&).
            @enderror
          </div>

          <div class="mb-3 field-icon">
            <i class="fas fa-lock icon"></i>
            <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" placeholder="Confirm Password" required>
          </div>

          <div class="mb-3 field-select">
              <select class="form-select" name="role" required>
                  <option value="" disabled selected>Select your role</option>
                  <option value="user">User</option>
                  <option value="freelancer">Freelancer</option>
              </select>
          </div>

          <div class="form-check mb-3"><input type="checkbox" id="terms" class="form-check-input" required><label for="terms" class="form-check-label" style="font-size: 0.9rem;">I agree to the Terms & Conditions.</label></div>

          <div class="text-center"><button type="submit" class="btn btn-custom"><span>Sign Up</span></button></div>
      </form>

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

  <script>
    const roleSelect = document.querySelector('select[name="role"]');
    const categoryField = document.getElementById('category-field');
    const categoryInput = categoryField ? categoryField.querySelector('input') : null;

    function updateCategoryField() {
      if (!categoryField || !categoryInput) return; 

      if (roleSelect.value === 'freelancer') {
        categoryField.style.display = 'block';
        categoryInput.required = true;
      } else {
        categoryField.style.display = 'none';
        categoryInput.required = false;
        categoryInput.value = ''; 
      }
    }

    if (roleSelect) {
        updateCategoryField();
        roleSelect.addEventListener('change', updateCategoryField);
    }
  </script>

</body>
</html>