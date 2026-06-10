<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SSD | Offers</title>
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
            <li class="nav-item active"><a class="nav-link" href="/offers">Offers</a></li>
            <li class="nav-item"><a class="nav-link" href="/fleet">Fleet</a></li>
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

  <!-- Page Heading -->
  <div class="page-heading" style="background:#f5a425; padding:110px 0px 30px 0px; text-align:center;">
    <div class="container">
      <h2 style="color:#fff; font-weight:700;">Special Offers</h2>
      <p style="color:#fff;">Exclusive deals and discounts on our best cars</p>
    </div>
  </div>

  <div class="container" style="padding:60px 15px;">
    <div class="row">

      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <img src="{{ asset('assets/images/offer-1-370x270.jpg') }}" class="card-img-top" alt="Weekend Special">
          <div class="card-body">
            <span class="badge badge-warning mb-2">Weekend Special</span>
            <h5 class="card-title">Weekend Getaway Package</h5>
            <p class="card-text text-muted">Rent any sedan or hatchback from Friday to Sunday and enjoy a flat 20% discount. Perfect for short trips.</p>
            <h4 style="color:#f5a425;"><small>from</small> $96 <small>per weekend</small></h4>
          </div>
          <div class="card-footer bg-white border-0">
            <a href="/cars" class="btn btn-warning btn-block" style="border-radius:30px;">Browse Cars</a>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <img src="{{ asset('assets/images/offer-2-370x270.jpg') }}" class="card-img-top" alt="Weekly Deal">
          <div class="card-body">
            <span class="badge badge-success mb-2">Weekly Deal</span>
            <h5 class="card-title">7-Day Unlimited Miles</h5>
            <p class="card-text text-muted">Book for a full week and get unlimited mileage with no hidden charges. Ideal for road trips or business travel.</p>
            <h4 style="color:#f5a425;"><small>from</small> $280 <small>per week</small></h4>
          </div>
          <div class="card-footer bg-white border-0">
            <a href="/cars" class="btn btn-warning btn-block" style="border-radius:30px;">Browse Cars</a>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <img src="{{ asset('assets/images/offer-3-370x270.jpg') }}" class="card-img-top" alt="Luxury Deal">
          <div class="card-body">
            <span class="badge badge-danger mb-2">Luxury Deal</span>
            <h5 class="card-title">Luxury Car Experience</h5>
            <p class="card-text text-muted">Upgrade to a luxury or premium SUV for a special occasion. Includes complimentary insurance and GPS navigation.</p>
            <h4 style="color:#f5a425;"><small>from</small> $150 <small>per day</small></h4>
          </div>
          <div class="card-footer bg-white border-0">
            <a href="/cars" class="btn btn-warning btn-block" style="border-radius:30px;">Browse Cars</a>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm border-warning">
          <div class="card-body text-center py-5">
            <i class="fa fa-tag fa-3x text-warning mb-3"></i>
            <h5 class="card-title">First-Time Renter?</h5>
            <p class="card-text text-muted">Register a new account and get 15% off your very first booking automatically applied at checkout.</p>
            <h4 style="color:#f5a425;">15% OFF</h4>
          </div>
          <div class="card-footer bg-white border-0">
            <a href="/register" class="btn btn-outline-warning btn-block" style="border-radius:30px;">Register Now</a>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body text-center py-5">
            <i class="fa fa-calendar fa-3x text-warning mb-3"></i>
            <h5 class="card-title">Long-Term Rental</h5>
            <p class="card-text text-muted">Renting for 30 days or more? Contact us for custom corporate pricing and fleet arrangements.</p>
            <h4 style="color:#f5a425;">Custom Pricing</h4>
          </div>
          <div class="card-footer bg-white border-0">
            <a href="/contact" class="btn btn-outline-warning btn-block" style="border-radius:30px;">Contact Us</a>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body text-center py-5">
            <i class="fa fa-star fa-3x text-warning mb-3"></i>
            <h5 class="card-title">Loyalty Reward</h5>
            <p class="card-text text-muted">Every confirmed booking earns you points. Redeem points for free rental days or upgrades on your next booking.</p>
            <h4 style="color:#f5a425;">Earn Points</h4>
          </div>
          <div class="card-footer bg-white border-0">
            <a href="/booking" class="btn btn-outline-warning btn-block" style="border-radius:30px;">Book Now</a>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- Footer -->
  <footer style="background:#1a1a2e; color:#aaa; padding:40px 0; text-align:center;">
    <p>&copy; {{ date('Y') }} SSD Car Rental. All rights reserved.</p>
  </footer>

  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
