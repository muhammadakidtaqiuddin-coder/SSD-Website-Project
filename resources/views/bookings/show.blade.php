<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SSD | Booking #{{ $booking->id }}</title>
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
          <li class="breadcrumb-item active">Booking #{{ $booking->id }}</li>
        </ol>
      </nav>

      <div class="row justify-content-center">
        <div class="col-md-8">

          @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <i class="fa fa-check-circle mr-2"></i>{{ session('success') }}
              <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            </div>
          @endif

          <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center"
                 style="background:#1a1a2e;">
              <h5 class="mb-0 text-white">
                <i class="fa fa-file-text-o mr-2"></i> Booking #{{ $booking->id }}
              </h5>
              @php
                $statusColors = [
                  'pending'   => 'warning',
                  'confirmed' => 'success',
                  'cancelled' => 'danger',
                  'completed' => 'info',
                ];
                $color = $statusColors[$booking->status] ?? 'secondary';
              @endphp
              <span class="badge badge-{{ $color }}" style="padding:8px 16px; font-size:0.85rem;">
                {{ ucfirst($booking->status) }}
              </span>
            </div>

            <div class="card-body p-4">
              <div class="row">
                <div class="col-md-6">
                  <h6 style="color:#f5a425; font-weight:700; text-transform:uppercase; font-size:0.75rem; letter-spacing:1px;">Car Details</h6>
                  <table class="table table-sm table-borderless">
                    <tr>
                      <td class="text-muted" style="width:45%;">Car Name</td>
                      <td><strong>{{ $booking->car_name }}</strong></td>
                    </tr>
                    <tr>
                      <td class="text-muted">Car Type</td>
                      <td>{{ $booking->car_type }}</td>
                    </tr>
                  </table>
                </div>
                <div class="col-md-6">
                  <h6 style="color:#f5a425; font-weight:700; text-transform:uppercase; font-size:0.75rem; letter-spacing:1px;">Rental Period</h6>
                  <table class="table table-sm table-borderless">
                    <tr>
                      <td class="text-muted" style="width:45%;">Pickup Date</td>
                      <td><strong>{{ $booking->pickup_date->format('d M Y') }}</strong></td>
                    </tr>
                    <tr>
                      <td class="text-muted">Return Date</td>
                      <td><strong>{{ $booking->return_date->format('d M Y') }}</strong></td>
                    </tr>
                    <tr>
                      <td class="text-muted">Duration</td>
                      <td>{{ $booking->pickup_date->diffInDays($booking->return_date) }} day(s)</td>
                    </tr>
                  </table>
                </div>
              </div>

              <hr>

              <div class="row">
                <div class="col-md-6">
                  <h6 style="color:#f5a425; font-weight:700; text-transform:uppercase; font-size:0.75rem; letter-spacing:1px;">Pickup Info</h6>
                  <p><i class="fa fa-map-marker mr-2 text-warning"></i>{{ $booking->pickup_location }}</p>
                </div>
                <div class="col-md-6">
                  <h6 style="color:#f5a425; font-weight:700; text-transform:uppercase; font-size:0.75rem; letter-spacing:1px;">Payment</h6>
                  <h4 style="color:#f5a425; font-weight:700;">
                    ${{ number_format($booking->total_price, 2) }}
                  </h4>
                  <small class="text-muted">Total rental cost</small>
                </div>
              </div>

              @if($booking->notes)
              <hr>
              <h6 style="color:#f5a425; font-weight:700; text-transform:uppercase; font-size:0.75rem; letter-spacing:1px;">Notes</h6>
              <p class="text-muted">{{ $booking->notes }}</p>
              @endif

              <hr>
              <small class="text-muted">
                <i class="fa fa-clock-o mr-1"></i> Submitted on {{ $booking->created_at->format('d M Y, h:i A') }}
              </small>
            </div>

            <div class="card-footer bg-white d-flex justify-content-between">
              <a href="/booking" class="btn btn-outline-secondary" style="border-radius:30px;">
                <i class="fa fa-arrow-left mr-1"></i> Back to My Bookings
              </a>
              @if($booking->status === 'pending')
                <div>
                  <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-outline-warning mr-2" style="border-radius:30px;">
                    <i class="fa fa-pencil mr-1"></i> Edit
                  </a>
                  <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" style="display:inline;"
                        onsubmit="return confirm('Are you sure you want to cancel this booking?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger" style="border-radius:30px;">
                      <i class="fa fa-times mr-1"></i> Cancel Booking
                    </button>
                  </form>
                </div>
              @endif
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
</body>
</html>
