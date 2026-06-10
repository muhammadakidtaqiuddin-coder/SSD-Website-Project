<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SSD | {{ $car->name }} Details</title>
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
            <li class="nav-item"><a class="nav-link" href="/fleet">Fleet</a></li>
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

  <div style="margin-top:80px; padding:40px 0;">
    <div class="container">

      {{-- Breadcrumb --}}
      <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb" style="background:transparent; padding:0;">
          <li class="breadcrumb-item"><a href="/" style="color:#f5a425;">Home</a></li>
          <li class="breadcrumb-item"><a href="/cars" style="color:#f5a425;">Cars</a></li>
          <li class="breadcrumb-item active">{{ $car->name }}</li>
        </ol>
      </nav>

      <div class="row">
        {{-- Car Image --}}
        <div class="col-md-6 mb-4">
          <img src="{{ $car->image_url }}"
               alt="{{ $car->name }}"
               class="img-fluid rounded shadow"
               style="width:100%; object-fit:cover; max-height:380px;">
        </div>

        {{-- Car Info --}}
        <div class="col-md-6">
          <h2 style="font-weight:700;">{{ $car->brand }} {{ $car->name }}</h2>
          <p class="text-muted">{{ $car->year ?? '' }} &bull; {{ $car->category ?? 'Car' }}</p>

          <div class="d-flex align-items-center mb-3">
            <h3 style="color:#f5a425; font-weight:700; margin:0;">
              ${{ number_format($car->price_per_day, 2) }}
            </h3>
            <span class="text-muted ml-2">/ day</span>
            @if($car->deposit)
              <span class="text-muted ml-3" style="font-size:0.9rem;">Deposit: ${{ number_format($car->deposit, 2) }}</span>
            @endif
          </div>

          @if($car->is_available)
            <span class="badge badge-success mb-3" style="padding:8px 16px; font-size:0.85rem;">
              <i class="fa fa-check-circle mr-1"></i> Available
            </span>
          @else
            <span class="badge badge-danger mb-3" style="padding:8px 16px; font-size:0.85rem;">
              <i class="fa fa-times-circle mr-1"></i> Unavailable
            </span>
          @endif

          {{-- Specs --}}
          <div class="row mb-3">
            @if($car->seats)
            <div class="col-6 mb-2">
              <div class="p-2 border rounded text-center">
                <i class="fa fa-users text-warning"></i>
                <small class="d-block text-muted mt-1">{{ $car->seats }} Seats</small>
              </div>
            </div>
            @endif
            @if($car->transmission)
            <div class="col-6 mb-2">
              <div class="p-2 border rounded text-center">
                <i class="fa fa-cogs text-warning"></i>
                <small class="d-block text-muted mt-1">{{ $car->transmission }}</small>
              </div>
            </div>
            @endif
            @if($car->fuel_type)
            <div class="col-6 mb-2">
              <div class="p-2 border rounded text-center">
                <i class="fa fa-tint text-warning"></i>
                <small class="d-block text-muted mt-1">{{ $car->fuel_type }}</small>
              </div>
            </div>
            @endif
            @if($car->engine_cc)
            <div class="col-6 mb-2">
              <div class="p-2 border rounded text-center">
                <i class="fa fa-bolt text-warning"></i>
                <small class="d-block text-muted mt-1">{{ $car->engine_cc }} cc</small>
              </div>
            </div>
            @endif
          </div>

          @if($car->description)
          <p class="text-muted mb-3">{{ $car->description }}</p>
          @endif

          {{-- Features --}}
          @if(!empty($car->features))
          <div class="mb-4">
            <h6 style="font-weight:600;">Features</h6>
            <div>
              @foreach($car->features as $feature)
                <span class="badge badge-light border mr-1 mb-1" style="padding:6px 10px;">
                  <i class="fa fa-check text-success mr-1"></i>{{ $feature }}
                </span>
              @endforeach
            </div>
          </div>
          @endif

          {{-- Book Now / Login --}}
          @if($car->is_available)
            @auth
              <a href="{{ route('bookings.create') }}?car_id={{ $car->id }}"
                 class="btn btn-warning btn-lg btn-block" style="border-radius:30px;">
                <i class="fa fa-calendar-check-o mr-2"></i> Book This Car
              </a>
            @else
              <a href="/login" class="btn btn-warning btn-lg btn-block" style="border-radius:30px;">
                <i class="fa fa-lock mr-2"></i> Login to Book
              </a>
              <p class="text-muted text-center mt-2" style="font-size:0.85rem;">
                Don't have an account? <a href="/register" style="color:#f5a425;">Register here</a>
              </p>
            @endauth
          @else
            <button class="btn btn-secondary btn-lg btn-block" disabled style="border-radius:30px;">
              Currently Unavailable
            </button>
          @endif
        </div>
      </div>

      {{-- Back link --}}
      <div class="mt-4">
        <a href="/cars" style="color:#f5a425;">
          <i class="fa fa-arrow-left mr-1"></i> Back to All Cars
        </a>
      </div>

    </div>
  </div>

  <footer style="background:#1a1a2e; color:#aaa; padding:40px 0; text-align:center; margin-top:40px;">
    <p>&copy; {{ date('Y') }} SSD Car Rental. All rights reserved.</p>
  </footer>

  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
