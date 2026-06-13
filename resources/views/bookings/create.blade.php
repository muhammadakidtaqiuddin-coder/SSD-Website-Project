<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SSD | New Booking</title>
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
            <li class="nav-item active"><a class="nav-link" href="/booking">My Bookings</a></li>
            <li class="nav-item">
              <form action="/logout" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="nav-link btn btn-link" style="padding:8px 20px;">Logout</button>
              </form>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <div style="margin-top:80px; padding:40px 0;">
    <div class="container">

      <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb" style="background:transparent; padding:0;">
          <li class="breadcrumb-item"><a href="/" style="color:#f5a425;">Home</a></li>
          <li class="breadcrumb-item"><a href="/booking" style="color:#f5a425;">My Bookings</a></li>
          <li class="breadcrumb-item active">New Booking</li>
        </ol>
      </nav>

      <div class="row justify-content-center">
        <div class="col-md-8">

          {{-- Selected Car Info Card --}}
          @if(isset($car))
          <div class="card shadow-sm mb-4" style="border-left: 4px solid #f5a425;">
            <div class="card-body p-3">
              <div class="d-flex align-items-center">
                @if($car->image)
                  <img src="{{ asset('storage/' . $car->image) }}"
                       alt="{{ $car->name }}"
                       style="width:100px; height:68px; object-fit:cover; border-radius:8px; margin-right:16px;">
                @endif
                <div class="flex-grow-1">
                  <h5 class="mb-1 font-weight-700" style="color:#1a1a2e;">{{ $car->name }}</h5>
                  <div class="text-muted" style="font-size:13px;">
                    {{ $car->brand }} {{ $car->model }} · {{ $car->year }} ·
                    {{ ucfirst($car->transmission) }} · {{ ucfirst($car->fuel_type) }} ·
                    {{ $car->seats }} seats
                  </div>
                </div>
                <div class="text-right ml-3">
                  <div style="font-size:20px; font-weight:700; color:#f5a425;">
                    RM {{ number_format($car->price_per_day, 2) }}
                  </div>
                  <div style="font-size:12px; color:#888;">per day</div>
                  <div style="font-size:12px; color:#888;">Deposit: RM {{ number_format($car->deposit, 2) }}</div>
                </div>
              </div>
            </div>
          </div>
          @endif

          <div class="card shadow-sm">
            <div class="card-header" style="background:#f5a425;">
              <h4 class="mb-0 text-white"><i class="fa fa-car mr-2"></i> New Car Rental Booking</h4>
            </div>
            <div class="card-body p-4">

              @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
              @endif

              @if($errors->any())
                <div class="alert alert-danger">
                  <ul class="mb-0">
                    @foreach($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif

              <form action="{{ route('bookings.store') }}" method="POST">
                @csrf

                {{-- Hidden car_id if car was pre-selected --}}
                @if(isset($car))
                  <input type="hidden" name="car_id" value="{{ $car->id }}">
                @endif

                {{-- Car Name --}}
                <div class="form-group">
                  <label for="car_name" style="font-weight:600;">Car Name <span class="text-danger">*</span></label>
                  <input type="text" name="car_name" id="car_name"
                         class="form-control @error('car_name') is-invalid @enderror"
                         value="{{ old('car_name', isset($car) ? $car->name : '') }}"
                         placeholder="e.g. Toyota Vios"
                         {{ isset($car) ? 'readonly' : 'required' }}>
                  @error('car_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                {{-- Car Type --}}
                <div class="form-group">
                  <label for="car_type" style="font-weight:600;">Car Type <span class="text-danger">*</span></label>
                  <select name="car_type" id="car_type"
                          class="form-control @error('car_type') is-invalid @enderror"
                          {{ isset($car) ? 'disabled' : 'required' }}>
                    <option value="">-- Select Type --</option>
                    @foreach(['Sedan','SUV','Hatchback','Luxury','MPV','Pickup','Van'] as $type)
                      <option value="{{ $type }}"
                        {{ strtolower(old('car_type', isset($car) ? $car->category : '')) == strtolower($type) ? 'selected' : '' }}>
                        {{ $type }}
                      </option>
                    @endforeach
                  </select>
                  {{-- Re-submit value when disabled --}}
                  @if(isset($car))
                    <input type="hidden" name="car_type" value="{{ $car->category }}">
                  @endif
                  @error('car_type')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                {{-- Dates --}}
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="pickup_date" style="font-weight:600;">Pickup Date <span class="text-danger">*</span></label>
                      <input type="date" name="pickup_date" id="pickup_date"
                             class="form-control @error('pickup_date') is-invalid @enderror"
                             value="{{ old('pickup_date') }}"
                             min="{{ date('Y-m-d') }}"
                             required>
                      @error('pickup_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="return_date" style="font-weight:600;">Return Date <span class="text-danger">*</span></label>
                      <input type="date" name="return_date" id="return_date"
                             class="form-control @error('return_date') is-invalid @enderror"
                             value="{{ old('return_date') }}"
                             min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                             required>
                      @error('return_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>

                {{-- Live price estimate --}}
                <div id="price-estimate" class="alert alert-info py-2" style="display:none;">
                  <i class="fa fa-calculator mr-1"></i>
                  Estimated total: <strong id="price-value"></strong>
                  @if(isset($car))
                    <small class="text-muted ml-1">(RM {{ number_format($car->price_per_day, 2) }}/day + RM {{ number_format($car->deposit, 2) }} deposit)</small>
                  @else
                    <small class="text-muted ml-1">(based on RM 50/day)</small>
                  @endif
                </div>

                {{-- Pickup Location --}}
                <div class="form-group">
                  <label for="pickup_location" style="font-weight:600;">Pickup Location <span class="text-danger">*</span></label>
                  <input type="text" name="pickup_location" id="pickup_location"
                         class="form-control @error('pickup_location') is-invalid @enderror"
                         value="{{ old('pickup_location') }}"
                         placeholder="e.g. KL Sentral, Petaling Jaya"
                         required>
                  @error('pickup_location')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                {{-- Notes --}}
                <div class="form-group">
                  <label for="notes" style="font-weight:600;">Notes <small class="text-muted">(optional)</small></label>
                  <textarea name="notes" id="notes" rows="3"
                            class="form-control @error('notes') is-invalid @enderror"
                            placeholder="Any special requests or requirements...">{{ old('notes') }}</textarea>
                  @error('notes')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <hr>
                <div class="d-flex justify-content-between">
                  <a href="{{ route('cars') }}" class="btn btn-outline-secondary" style="border-radius:30px; padding:10px 28px;">
                    <i class="fa fa-arrow-left mr-1"></i> Back to Cars
                  </a>
                  <button type="submit" class="btn btn-warning" style="border-radius:30px; padding:10px 32px; font-weight:600;">
                    <i class="fa fa-check mr-1"></i> Submit Booking
                  </button>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <footer style="background:#1a1a2e; color:#aaa; padding:40px 0; text-align:center; margin-top:40px;">
    <p>&copy; {{ date('Y') }} SSD Car Rental. All rights reserved.</p>
  </footer>

  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script>
    const pricePerDay = {{ isset($car) ? $car->price_per_day : 50 }};
    const deposit     = {{ isset($car) ? $car->deposit : 0 }};

    function updateEstimate() {
      const pickup = document.getElementById('pickup_date').value;
      const ret    = document.getElementById('return_date').value;
      if (pickup && ret) {
        const days = Math.ceil((new Date(ret) - new Date(pickup)) / 86400000);
        if (days > 0) {
          const rental  = days * pricePerDay;
          const total   = rental + deposit;
          const label   = 'RM ' + rental.toFixed(2) + ' (' + days + ' day' + (days > 1 ? 's' : '') + ')'
                        + (deposit > 0 ? ' + RM ' + deposit.toFixed(2) + ' deposit = RM ' + total.toFixed(2) : '');
          document.getElementById('price-value').textContent = label;
          document.getElementById('price-estimate').style.display = 'block';
        } else {
          document.getElementById('price-estimate').style.display = 'none';
        }
      }
    }

    // Set return_date min when pickup changes
    document.getElementById('pickup_date').addEventListener('change', function () {
      const next = new Date(this.value);
      next.setDate(next.getDate() + 1);
      const minReturn = next.toISOString().split('T')[0];
      document.getElementById('return_date').min = minReturn;
      if (document.getElementById('return_date').value < minReturn) {
        document.getElementById('return_date').value = '';
      }
      updateEstimate();
    });

    document.getElementById('return_date').addEventListener('change', updateEstimate);
  </script>
</body>
</html>
