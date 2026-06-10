<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SSD | Our Fleet</title>
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
            <li class="nav-item active"><a class="nav-link" href="/fleet">Fleet</a></li>
            <li class="nav-item"><a class="nav-link" href="/offers">Offers</a></li>
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
      <h2 style="color:#fff; font-weight:700;">Our Fleet</h2>
      <p style="color:#fff;">Choose from a wide range of vehicles to suit every need</p>
    </div>
  </div>

  <div class="container" style="padding:60px 15px;">

    {{-- Filter bar --}}
    <div class="row mb-4">
      <div class="col-md-12 text-center">
        <div class="btn-group" role="group">
          <a href="/fleet" class="btn btn-outline-warning" style="border-radius:30px; margin:4px;">All</a>
          <a href="/fleet?category=sedan" class="btn btn-outline-warning" style="border-radius:30px; margin:4px;">Sedan</a>
          <a href="/fleet?category=suv" class="btn btn-outline-warning" style="border-radius:30px; margin:4px;">SUV</a>
          <a href="/fleet?category=hatchback" class="btn btn-outline-warning" style="border-radius:30px; margin:4px;">Hatchback</a>
          <a href="/fleet?category=luxury" class="btn btn-outline-warning" style="border-radius:30px; margin:4px;">Luxury</a>
        </div>
      </div>
    </div>

    <div class="row">
      {{-- Fleet intro cards when no car data available yet --}}
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <img src="{{ asset('assets/images/offer-1-370x270.jpg') }}" class="card-img-top" alt="Sedan">
          <div class="card-body">
            <span class="badge badge-primary mb-2">Sedan</span>
            <h5 class="card-title">Economy Sedans</h5>
            <p class="card-text text-muted">Comfortable and fuel-efficient sedans perfect for city driving or business travel.</p>
            <ul class="list-unstyled small text-muted">
              <li><i class="fa fa-user mr-1"></i> 5 seats</li>
              <li><i class="fa fa-tachometer mr-1"></i> Automatic / Manual</li>
              <li><i class="fa fa-gas-pump mr-1"></i> Petrol / Hybrid</li>
            </ul>
          </div>
          <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center">
            <span style="color:#f5a425; font-weight:600;">From $50/day</span>
            <a href="/cars" class="btn btn-warning btn-sm" style="border-radius:30px;">View Cars</a>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <img src="{{ asset('assets/images/offer-2-370x270.jpg') }}" class="card-img-top" alt="SUV">
          <div class="card-body">
            <span class="badge badge-success mb-2">SUV</span>
            <h5 class="card-title">Family SUVs</h5>
            <p class="card-text text-muted">Spacious SUVs with ample boot space for family trips, off-road adventures, or group travel.</p>
            <ul class="list-unstyled small text-muted">
              <li><i class="fa fa-user mr-1"></i> 7 seats</li>
              <li><i class="fa fa-tachometer mr-1"></i> Automatic</li>
              <li><i class="fa fa-gas-pump mr-1"></i> Diesel / Petrol</li>
            </ul>
          </div>
          <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center">
            <span style="color:#f5a425; font-weight:600;">From $80/day</span>
            <a href="/cars" class="btn btn-warning btn-sm" style="border-radius:30px;">View Cars</a>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <img src="{{ asset('assets/images/offer-3-370x270.jpg') }}" class="card-img-top" alt="Luxury">
          <div class="card-body">
            <span class="badge badge-danger mb-2">Luxury</span>
            <h5 class="card-title">Luxury & Premium</h5>
            <p class="card-text text-muted">Premium vehicles for special occasions, executive travel, or when you simply want to arrive in style.</p>
            <ul class="list-unstyled small text-muted">
              <li><i class="fa fa-user mr-1"></i> 4–5 seats</li>
              <li><i class="fa fa-tachometer mr-1"></i> Automatic</li>
              <li><i class="fa fa-gas-pump mr-1"></i> Petrol / Electric</li>
            </ul>
          </div>
          <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center">
            <span style="color:#f5a425; font-weight:600;">From $150/day</span>
            <a href="/cars" class="btn btn-warning btn-sm" style="border-radius:30px;">View Cars</a>
          </div>
        </div>
      </div>
    </div>

    <div class="text-center mt-3">
      <a href="/cars" class="btn btn-warning btn-lg" style="border-radius:30px; padding:12px 40px;">
        <i class="fa fa-car mr-2"></i> Browse All Available Cars
      </a>
    </div>
  </div>

  <footer style="background:#1a1a2e; color:#aaa; padding:40px 0; text-align:center;">
    <p>&copy; {{ date('Y') }} SSD Car Rental. All rights reserved.</p>
  </footer>

  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
