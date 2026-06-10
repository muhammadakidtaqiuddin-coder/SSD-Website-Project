<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SSD | About Us</title>
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="/"><h2>Car Rental <em>Website</em></h2></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
            <li class="nav-item active"><a class="nav-link" href="/about">About</a></li>
            <li class="nav-item"><a class="nav-link" href="/fleet">Fleet</a></li>
            <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
            @guest
              <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
            @endguest
            @auth
              <li class="nav-item">
                <form action="/logout" method="POST" style="display:inline;">
                  @csrf
                  <button type="submit" class="nav-link btn btn-link" style="padding:8px 20px;">Logout</button>
                </form>
              </li>
            @endauth
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <div class="page-heading" style="background:#f5a425; padding:110px 0px 30px 0px; text-align:center;">
    <div class="container">
      <h2 style="color:#fff; font-weight:700;">About Us</h2>
      <p style="color:#fff;">Who we are and what drives us</p>
    </div>
  </div>

  <div class="container" style="padding:60px 15px;">

    {{-- Mission --}}
    <div class="row align-items-center mb-5">
      <div class="col-md-6 mb-4 mb-md-0">
        <img src="{{ asset('assets/images/offer-1-370x270.jpg') }}" class="img-fluid rounded shadow" alt="Our fleet">
      </div>
      <div class="col-md-6">
        <h3 style="font-weight:700; color:#1a1a2e;">Our Mission</h3>
        <p class="text-muted">SSD Car Rental is committed to providing safe, reliable, and affordable vehicle rental solutions for every journey. Whether you need a car for a quick city errand, a family road trip, or a corporate event, we have the right vehicle for you.</p>
        <p class="text-muted">Founded in Malaysia, we believe that getting from A to B should be stress-free. Our modern fleet is maintained to the highest standards, and our booking process is designed to be fast and transparent.</p>
        <a href="/fleet" class="btn btn-warning mt-2" style="border-radius:30px; padding:10px 32px; font-weight:600;">
          <i class="fa fa-car mr-2"></i> View Our Fleet
        </a>
      </div>
    </div>

    <hr>

    {{-- Stats --}}
    <div class="row text-center my-5">
      <div class="col-md-3 mb-4">
        <div style="font-size:2.5rem; font-weight:700; color:#f5a425;">50+</div>
        <div class="text-muted">Vehicles Available</div>
      </div>
      <div class="col-md-3 mb-4">
        <div style="font-size:2.5rem; font-weight:700; color:#f5a425;">1,200+</div>
        <div class="text-muted">Happy Customers</div>
      </div>
      <div class="col-md-3 mb-4">
        <div style="font-size:2.5rem; font-weight:700; color:#f5a425;">5</div>
        <div class="text-muted">Years in Business</div>
      </div>
      <div class="col-md-3 mb-4">
        <div style="font-size:2.5rem; font-weight:700; color:#f5a425;">4.8★</div>
        <div class="text-muted">Average Rating</div>
      </div>
    </div>

    <hr>

    {{-- Why choose us --}}
    <div class="row my-5">
      <div class="col-md-12 mb-4 text-center">
        <h3 style="font-weight:700; color:#1a1a2e;">Why Choose SSD Car Rental?</h3>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card h-100 border-0 shadow-sm p-3 text-center">
          <i class="fa fa-shield fa-3x text-warning mb-3"></i>
          <h5 style="font-weight:600;">Fully Insured</h5>
          <p class="text-muted small">Every vehicle comes with comprehensive insurance coverage for your peace of mind on every journey.</p>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card h-100 border-0 shadow-sm p-3 text-center">
          <i class="fa fa-wrench fa-3x text-warning mb-3"></i>
          <h5 style="font-weight:600;">Well Maintained</h5>
          <p class="text-muted small">Our fleet undergoes regular servicing and safety checks so every car you rent is in top condition.</p>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card h-100 border-0 shadow-sm p-3 text-center">
          <i class="fa fa-mobile fa-3x text-warning mb-3"></i>
          <h5 style="font-weight:600;">Easy Booking</h5>
          <p class="text-muted small">Book online in minutes, modify or cancel pending bookings from your dashboard — no phone calls needed.</p>
        </div>
      </div>
    </div>

  </div>

  <footer style="background:#1a1a2e; color:#aaa; padding:40px 0; text-align:center;">
    <p>&copy; {{ date('Y') }} SSD Car Rental. All rights reserved.</p>
  </footer>

  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
