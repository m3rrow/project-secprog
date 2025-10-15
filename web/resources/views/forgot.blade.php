<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Forgot Password - Tabula</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    body {
      background: #f3f4f6;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .forgot-container {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .forgot-box {
      background: #fff;
      padding: 2.5rem;
      border-radius: 15px;
      box-shadow: 0 8px 24px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 420px;
    }
    .forgot-box h4 {
      font-weight: 600;
      margin-bottom: 1rem;
      text-align: center;
    }
    .form-control {
      border-radius: 12px;
      padding: 0.75rem 1rem;
    }
    .btn-custom {
      background: #4f46e5;
      color: #fff;
      border-radius: 12px;
      padding: 0.75rem;
      font-weight: 500;
      width: 100%;
      transition: 0.3s;
    }
    .btn-custom:hover {
      background: #3730a3;
    }
    .back-link {
      display: block;
      margin-top: 1rem;
      text-align: center;
      font-size: 0.9rem;
    }
  </style>
</head>
<body>
  <div class="forgot-container">
    <div class="forgot-box">
      <div class="text-center mb-4">
        <img src="images/index1-logo.png" alt="logo" style="max-height:50px;">
      </div>

      <h4>Forgot Password</h4>
      <p class="text-muted text-center mb-4">
        Enter your email address and we’ll send you a link to reset your password.
      </p>

      <form method="POST" action="http://127.0.0.1:8000/forgot-password">
        <input type="hidden" name="_token" value="yourCsrfTokenHere">

        <div class="mb-3">
          <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
        </div>

        <button type="submit" class="btn btn-custom">Send Reset Link</button>

        <a href="{{ route('login') }}" class="back-link">← Back to Sign in</a>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>