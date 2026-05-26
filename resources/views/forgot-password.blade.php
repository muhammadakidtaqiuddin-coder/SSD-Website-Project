<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Car Rental | Forgot Password</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">

    <style>
      .login-section {
        min-height: 80vh;
        display: flex;
        align-items: center;
        padding: 80px 0;
        background-color: #f9f9f9;
      }

      .login-box {
        background: #fff;
        border-radius: 10px;
        padding: 50px 40px;
        box-shadow: 0 5px 30px rgba(0,0,0,0.08);
        max-width: 480px;
        width: 100%;
        margin: 0 auto;
      }

      .login-box h2 {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 8px;
        color: #1a1a2e;
      }

      .login-box h2 em {
        color: #f5a425;
        font-style: normal;
      }

      .login-box p.subtitle {
        color: #888;
        font-size: 14px;
        margin-bottom: 30px;
      }

      .login-box .form-group label {
        font-weight: 600;
        font-size: 13px;
        color: #444;
        margin-bottom: 6px;
      }

      .login-box .form-control {
        border-radius: 6px;
        border: 1px solid #ddd;
        padding: 12px 15px;
        font-size: 14px;
        font-family: 'Poppins', sans-serif;
        transition: border-color 0.3s;
      }

      .login-box .form-control:focus {
        border-color: #f5a425;
        box-shadow: none;
        outline: none;
      }

      .login-box .filled-button {
        width: 100%;
        text-align: center;
        padding: 13px;
        font-size: 15px;
        font-weight: 600;
        border-radius: 6px;
        margin-top: 10px;
        display: block;
        background-color: #f5a425;
        color: #fff;
        border: none;
        cursor: pointer;
        font-family: 'Poppins', sans-serif;
        transition: background-color 0.3s;
      }

      .login-box .filled-button:hover {
        background-color: #e09415;
      }

      .login-box .back-link {
        text-align: center;
        font-size: 14px;
        margin-top: 20px;
        color: #666;
      }

      .login-box .back-link a {
        color: #f5a425;
        font-weight: 600;
        text-decoration: none;
      }

      .login-box .back-link a:hover {
        text-decoration: underline;
      }

      .login-box .alert {
        font-size: 13px;
        border-radius: 6px;
      }

      .hint-text {
        font-size: 13px;
        color: #aaa;
        margin-top: 5px;
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
                <li class="nav-item active"><a class="nav-link" href="/login">Login</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Forgot Password Section -->
    <section class="login-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="login-box">

              <h2>Reset <em>Password</em></h2>
              <p class="subtitle">Enter your email and we'll send you a reset link.</p>

              {{-- Show errors --}}
              @if ($errors->any())
                <div class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                  @endforeach
                </div>
              @endif

              {{-- Show success message --}}
              @if (session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
              @endif

              <form method="POST" action="/forgot-password">
                @csrf

                <div class="form-group">
                  <label for="email">Email Address</label>
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Enter your registered email"
                    value="{{ old('email') }}"
                    required
                  >
                  <p class="hint-text">We'll send a password reset link to this address.</p>
                </div>

                <button type="submit" class="filled-button">Send Reset Link</button>

              </form>

              <div class="back-link">
                Remembered it? <a href="/login">Back to Login</a>
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
