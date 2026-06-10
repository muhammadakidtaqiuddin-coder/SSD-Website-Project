<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SSD | Edit Booking #{{ $booking->id }}</title>
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
        <div class="collapse navbar-collapse">
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
          <li class="breadcrumb-item"><a href="{{ route('bookings.show', $booking->id) }}" style="color:#f5a425;">Booking #{{ $booking->id }}</a></li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
      </nav>

      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card shadow-sm">
            <div class="card-header" style="background:#f5a425;">
              <h4 class="mb-0 text-white"><i class="fa fa-pencil mr-2"></i> Edit Booking #{{ $booking->id }}</h4>
            </div>
            <div class="card-body p-4">

              <div class="alert alert-info">
                <i class="fa fa-info-circle mr-2"></i>
                You can only edit bookings that are still <strong>pending</strong> review.
              </div>

              @if($errors->any())
                <div class="alert alert-danger">
                  <ul class="mb-0">
                    @foreach($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif

              <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                  <label for="car_name" style="font-weight:600;">Car Name <span class="text-danger">*</span></label>
                  <input type="text" name="car_name" id="car_name"
                         class="form-control @error('car_name') is-invalid @enderror"
                         value="{{ old('car_name', $booking->car_name) }}" required>
                  @error('car_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                  <label for="car_type" style="font-weight:600;">Car Type <span class="text-danger">*</span></label>
                  <select name="car_type" id="car_type" class="form-control @error('car_type') is-invalid @enderror" required>
                    <option value="">-- Select Type --</option>
                    @foreach(['Sedan','SUV','Hatchback','Luxury','MPV','Pickup Truck'] as $type)
                      <option value="{{ $type }}" {{ old('car_type', $booking->car_type) == $type ? 'selected' : '' }}>
                        {{ $type }}
                      </option>
                    @endforeach
                  </select>
                  @error('car_type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="pickup_date" style="font-weight:600;">Pickup Date <span class="text-danger">*</span></label>
                      <input type="date" name="pickup_date" id="pickup_date"
                             class="form-control @error('pickup_date') is-invalid @enderror"
                             value="{{ old('pickup_date', $booking->pickup_date->format('Y-m-d')) }}"
                             min="{{ date('Y-m-d') }}" required>
                      @error('pickup_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="return_date" style="font-weight:600;">Return Date <span class="text-danger">*</span></label>
                      <input type="date" name="return_date" id="return_date"
                             class="form-control @error('return_date') is-invalid @enderror"
                             value="{{ old('return_date', $booking->return_date->format('Y-m-d')) }}"
                             min="{{ date('Y-m-d', strtotime('+1 day')) }}" required>
                      @error('return_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                  </div>
                </div>

                <div id="price-estimate" class="alert alert-info py-2">
                  <i class="fa fa-calculator mr-1"></i>
                  Estimated total: <strong id="price-value"></strong>
                  <small class="text-muted ml-1">(based on $50/day)</small>
                </div>

                <div class="form-group">
                  <label for="pickup_location" style="font-weight:600;">Pickup Location <span class="text-danger">*</span></label>
                  <input type="text" name="pickup_location" id="pickup_location"
                         class="form-control @error('pickup_location') is-invalid @enderror"
                         value="{{ old('pickup_location', $booking->pickup_location) }}" required>
                  @error('pickup_location')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                  <label for="notes" style="font-weight:600;">Notes <small class="text-muted">(optional)</small></label>
                  <textarea name="notes" id="notes" rows="3"
                            class="form-control @error('notes') is-invalid @enderror">{{ old('notes', $booking->notes) }}</textarea>
                  @error('notes')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <hr>
                <div class="d-flex justify-content-between">
                  <a href="{{ route('bookings.show', $booking->id) }}" class="btn btn-outline-secondary" style="border-radius:30px; padding:10px 28px;">
                    <i class="fa fa-arrow-left mr-1"></i> Back
                  </a>
                  <button type="submit" class="btn btn-warning" style="border-radius:30px; padding:10px 32px; font-weight:600;">
                    <i class="fa fa-save mr-1"></i> Save Changes
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
    function updateEstimate() {
      const pickup = document.getElementById('pickup_date').value;
      const ret    = document.getElementById('return_date').value;
      if (pickup && ret) {
        const days = Math.ceil((new Date(ret) - new Date(pickup)) / 86400000);
        if (days > 0) {
          document.getElementById('price-value').textContent = '$' + (days * 50).toFixed(2) + ' (' + days + ' day' + (days > 1 ? 's' : '') + ')';
          document.getElementById('price-estimate').style.display = 'block';
        }
      }
    }
    document.getElementById('pickup_date').addEventListener('change', updateEstimate);
    document.getElementById('return_date').addEventListener('change', updateEstimate);
    updateEstimate(); // run on load
  </script>
</body>
</html>
