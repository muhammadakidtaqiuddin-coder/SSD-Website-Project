<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SSD | Contact Us</title>
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
            <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
            <li class="nav-item active"><a class="nav-link" href="/contact">Contact</a></li>
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
      <h2 style="color:#fff; font-weight:700;">Contact Us</h2>
      <p style="color:#fff;">We're happy to hear from you</p>
    </div>
  </div>

  <div class="container" style="padding:60px 15px;">

    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-check-circle mr-2"></i>{{ session('success') }}
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
      </div>
    @endif

    <div class="row">

      {{-- Contact Info --}}
      <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm h-100 p-3">
          <div class="card-body">
            <h5 style="font-weight:700; color:#1a1a2e; margin-bottom:24px;">Get In Touch</h5>

            <div class="d-flex mb-4">
              <div style="width:44px; height:44px; background:#f5a425; border-radius:50%;
                          display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                <i class="fa fa-map-marker text-white"></i>
              </div>
              <div class="ml-3">
                <strong style="font-size:0.9rem;">Our Location</strong>
                <p class="text-muted small mb-0">No. 12, Jalan SSD 1/1,<br>Taman Teknologi, 50480 Kuala Lumpur.</p>
              </div>
            </div>

            <div class="d-flex mb-4">
              <div style="width:44px; height:44px; background:#f5a425; border-radius:50%;
                          display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                <i class="fa fa-phone text-white"></i>
              </div>
              <div class="ml-3">
                <strong style="font-size:0.9rem;">Phone</strong>
                <p class="text-muted small mb-0">+603-1234 5678<br>+6011-9876 5432</p>
              </div>
            </div>

            <div class="d-flex mb-4">
              <div style="width:44px; height:44px; background:#f5a425; border-radius:50%;
                          display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                <i class="fa fa-envelope text-white"></i>
              </div>
              <div class="ml-3">
                <strong style="font-size:0.9rem;">Email</strong>
                <p class="text-muted small mb-0">info@ssdcarrental.com<br>support@ssdcarrental.com</p>
              </div>
            </div>

            <div class="d-flex">
              <div style="width:44px; height:44px; background:#f5a425; border-radius:50%;
                          display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                <i class="fa fa-clock-o text-white"></i>
              </div>
              <div class="ml-3">
                <strong style="font-size:0.9rem;">Business Hours</strong>
                <p class="text-muted small mb-0">Mon – Fri: 8:00 AM – 7:00 PM<br>Sat – Sun: 9:00 AM – 5:00 PM</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- Contact Form --}}
      <div class="col-md-8 mb-4">
        <div class="card border-0 shadow-sm">
          <div class="card-body p-4">
            <h5 style="font-weight:700; color:#1a1a2e; margin-bottom:24px;">Send Us a Message</h5>
            <form action="/contact" method="POST">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label style="font-weight:600;">Full Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control"
                           value="{{ old('name') }}" placeholder="Ahmad Rizal" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label style="font-weight:600;">Email Address <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control"
                           value="{{ old('email') }}" placeholder="ahmad@example.com" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label style="font-weight:600;">Subject <span class="text-danger">*</span></label>
                <select name="subject" class="form-control" required>
                  <option value="">-- Select Subject --</option>
                  <option value="booking_inquiry" {{ old('subject')=='booking_inquiry' ? 'selected' : '' }}>Booking Inquiry</option>
                  <option value="pricing"         {{ old('subject')=='pricing'         ? 'selected' : '' }}>Pricing & Offers</option>
                  <option value="complaint"       {{ old('subject')=='complaint'       ? 'selected' : '' }}>Complaint / Feedback</option>
                  <option value="corporate"       {{ old('subject')=='corporate'       ? 'selected' : '' }}>Corporate / Long-Term Rental</option>
                  <option value="other"           {{ old('subject')=='other'           ? 'selected' : '' }}>Other</option>
                </select>
              </div>
              <div class="form-group">
                <label style="font-weight:600;">Message <span class="text-danger">*</span></label>
                <textarea name="message" rows="5" class="form-control"
                          placeholder="How can we help you?" required>{{ old('message') }}</textarea>
              </div>
              <button type="submit" class="btn btn-warning btn-block" style="border-radius:30px; font-weight:600; padding:12px;">
                <i class="fa fa-paper-plane mr-2"></i> Send Message
              </button>
            </form>
          </div>
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
