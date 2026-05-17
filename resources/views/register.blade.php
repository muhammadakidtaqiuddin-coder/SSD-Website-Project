<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Car Rental | Register</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">

    <style>
      .register-section {
        min-height: 80vh;
        display: flex;
        align-items: center;
        padding: 80px 0;
        background-color: #f9f9f9;
      }

      .register-box {
        background: #fff;
        border-radius: 10px;
        padding: 50px 40px;
        box-shadow: 0 5px 30px rgba(0,0,0,0.08);
        max-width: 550px;
        width: 100%;
        margin: 0 auto;
      }

      .register-box h2 {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 8px;
        color: #1a1a2e;
      }

      .register-box h2 em {
        color: #f5a425;
        font-style: normal;
      }

      .register-box p.subtitle {
        color: #888;
        font-size: 14px;
        margin-bottom: 30px;
      }

      .register-box .form-group label {
        font-weight: 600;
        font-size: 13px;
        color: #444;
        margin-bottom: 6px;
      }

      .register-box .form-control {
        border-radius: 6px;
        border: 1px solid #ddd;
        padding: 12px 15px;
        font-size: 14px;
        font-family: 'Poppins', sans-serif;
        transition: border-color 0.3s;
      }

      .register-box .form-control:focus {
        border-color: #f5a425;
        box-shadow: none;
        outline: none;
      }

      .register-box .filled-button {
        width: 100%;
        text-align: center;
        padding: 13px;
        font-size: 15px;
        font-weight: 600;
        border-radius: 6px;
        margin-top: 10px;
        display: block;
        border: none;
        cursor: pointer;
      }

      .register-box .divider {
        text-align: center;
        margin: 20px 0;
        color: #aaa;
        font-size: 13px;
        position: relative;
      }

      .register-box .divider::before,
      .register-box .divider::after {
        content: '';
        position: absolute;
        top: 50%;
        width: 42%;
        height: 1px;
        background: #ddd;
      }

      .register-box .divider::before { left: 0; }
      .register-box .divider::after { right: 0; }

      .register-box .login-link {
        text-align: center;
        font-size: 14px;
        margin-top: 20px;
        color: #666;
      }

      .register-box .login-link a {
        color: #f5a425;
        font-weight: 600;
        text-decoration: none;
      }

      .register-box .login-link a:hover {
        text-decoration: underline;
      }

      .register-box .alert {
        font-size: 13px;
        border-radius: 6px;
      }

      .password-hint {
        font-size: 11px;
        color: #aaa;
        margin-top: 4px;
      }
    </style>

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="/"><h2>Car Rental <em>Website</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="/fleet">Fleet</a></li>
                <li class="nav-item"><a class="nav-link" href="/offers">Offers</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">More</a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="/blog">Blog</a>
                      <a class="dropdown-item" href="/team">Team</a>
                      <a class="dropdown-item" href="/testimonials">Testimonials</a>
                      <a class="dropdown-item" href="/terms">Terms</a>
                    </div>
                </li>

                <li class="nav-item"><a class="nav-link" href="/about">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="/contact">Contact Us</a></li>
                <li class="nav-item"><a class="nav-link filled-button" href="/login" style="padding: 8px 20px; margin-left: 10px;">Login</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Register Section -->
    <section class="register-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7">
            <div class="register-box">

              <h2>Create an <em>Account!</em></h2>
              <p class="subtitle">Fill in the details below to get started</p>

              {{-- Show errors --}}
              @if ($errors->any())
                <div class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                  @endforeach
                </div>
              @endif

              <form method="POST" action="/register">
                @csrf

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="first_name">First Name</label>
                      <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter your first name" value="{{ old('first_name') }}" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="last_name">Last Name</label>
                      <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter your last name" value="{{ old('last_name') }}" required>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="email">Email Address</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                  <label for="phone">Phone Number</label>
                  <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" value="{{ old('phone') }}">
                </div>

                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Create a password" required>
                  <p class="password-hint">Minimum 8 characters</p>
                </div>

                <div class="form-group">
                  <label for="password_confirmation">Confirm Password</label>
                  <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" required>
                </div>

                <div class="form-group form-check mt-2">
                  <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                  <label class="form-check-label" for="terms" style="font-size:13px; color:#666;">
                    I agree to the <a href="/terms" style="color:#f5a425;">Terms & Conditions</a>
                  </label>
                </div>

                <button type="submit" class="filled-button">Create Account</button>

              </form>

              <div class="divider">or</div>

              <div class="login-link">
                Already have an account? <a href="/login">Login here</a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright © 2020 Company Name - Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Additional Scripts -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/owl.js') }}"></script>
  </body>
</html>
