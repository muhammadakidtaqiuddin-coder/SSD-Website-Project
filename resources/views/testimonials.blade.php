<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SSD | Testimonials</title>
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
            <li class="nav-item active"><a class="nav-link" href="/testimonials">Testimonials</a></li>
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
      <h2 style="color:#fff; font-weight:700;">Customer Reviews</h2>
      <p style="color:#fff;">What our customers say about their experience</p>
    </div>
  </div>

  <div class="container" style="padding:60px 15px;">

    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-check-circle mr-2"></i>{{ session('success') }}
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
      </div>
    @endif

    {{-- Leave a Review form (auth only) --}}
    @auth
    <div class="row justify-content-center mb-5">
      <div class="col-md-8">
        <div class="card shadow-sm">
          <div class="card-header" style="background:#1a1a2e;">
            <h5 class="mb-0 text-white"><i class="fa fa-star mr-2 text-warning"></i> Leave a Review</h5>
          </div>
          <div class="card-body p-4">
            <form action="/testimonials" method="POST">
              @csrf
              <div class="form-group">
                <label style="font-weight:600;">Your Rating</label>
                <div class="d-flex" id="star-rating" style="font-size:1.8rem; cursor:pointer; color:#ddd;">
                  @for($i=1; $i<=5; $i++)
                    <span class="star" data-val="{{ $i }}" style="margin-right:4px;">&#9733;</span>
                  @endfor
                </div>
                <input type="hidden" name="rating" id="rating-input" value="5">
              </div>
              <div class="form-group">
                <label for="author_name" style="font-weight:600;">Your Name</label>
                <input type="text" name="author_name" id="author_name"
                       class="form-control" value="{{ auth()->user()->name }}" readonly>
              </div>
              <div class="form-group">
                <label for="review_text" style="font-weight:600;">Your Review <span class="text-danger">*</span></label>
                <textarea name="review_text" id="review_text" rows="4"
                          class="form-control" placeholder="Share your experience with us..." required></textarea>
              </div>
              <button type="submit" class="btn btn-warning btn-block" style="border-radius:30px; font-weight:600;">
                <i class="fa fa-paper-plane mr-2"></i> Submit Review
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
    @else
    <div class="text-center mb-5">
      <div class="alert alert-info d-inline-block">
        <i class="fa fa-info-circle mr-2"></i>
        <a href="/login" style="color:#f5a425; font-weight:600;">Log in</a> or
        <a href="/register" style="color:#f5a425; font-weight:600;">register</a> to leave a review.
      </div>
    </div>
    @endauth

    {{-- Static sample testimonials --}}
    <h4 class="mb-4" style="font-weight:700;">What Our Customers Say</h4>
    <div class="row">
      @php
        $reviews = [
          ['name'=>'Ahmad Rizal','rating'=>5,'date'=>'Jan 2025','text'=>'Excellent service! The car was clean, well-maintained and the booking process was straightforward. Highly recommended for anyone needing a rental in KL.'],
          ['name'=>'Siti Norzahra','rating'=>5,'date'=>'Feb 2025','text'=>'Very smooth experience from start to finish. The staff were helpful and the vehicle was in great condition. Will definitely rent again!'],
          ['name'=>'Chong Wei Liang','rating'=>4,'date'=>'Mar 2025','text'=>'Good value for money and convenient pickup location. The online booking system is easy to use. Minor delay in confirmation but overall great.'],
          ['name'=>'Priya Nair','rating'=>5,'date'=>'Apr 2025','text'=>'Rented an SUV for a family trip and it was perfect. Spacious, comfortable and great mileage. The price was fair too. 5 stars!'],
          ['name'=>'Nurul Izzah','rating'=>4,'date'=>'May 2025','text'=>'Professional service and easy online booking. The car was ready on time. Would be perfect with a loyalty rewards programme.'],
          ['name'=>'Hafizuddin Zulkifli','rating'=>5,'date'=>'Jun 2025','text'=>'Used this service for a business trip. The luxury sedan made a great impression. Clean, punctual, and professional. Highly recommend!'],
        ];
      @endphp

      @foreach($reviews as $review)
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <div class="d-flex align-items-center">
                <div style="width:42px; height:42px; background:#f5a425; border-radius:50%;
                            display:flex; align-items:center; justify-content:center;
                            color:#fff; font-weight:700; font-size:1rem; flex-shrink:0;">
                  {{ strtoupper(substr($review['name'],0,1)) }}
                </div>
                <div class="ml-3">
                  <strong style="font-size:0.9rem;">{{ $review['name'] }}</strong>
                  <div style="font-size:0.75rem; color:#aaa;">{{ $review['date'] }}</div>
                </div>
              </div>
              <div style="color:#f5a425; font-size:0.9rem;">
                @for($i=0; $i<$review['rating']; $i++) &#9733; @endfor
                @for($i=$review['rating']; $i<5; $i++) <span style="color:#ddd;">&#9733;</span> @endfor
              </div>
            </div>
            <p class="text-muted mb-0" style="font-size:0.9rem; line-height:1.6;">"{{ $review['text'] }}"</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>

  </div>

  <footer style="background:#1a1a2e; color:#aaa; padding:40px 0; text-align:center; margin-top:40px;">
    <p>&copy; {{ date('Y') }} SSD Car Rental. All rights reserved.</p>
  </footer>

  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script>
    // Star rating interaction
    const stars = document.querySelectorAll('.star');
    stars.forEach(s => {
      s.addEventListener('mouseover', function() {
        const val = this.dataset.val;
        stars.forEach(st => { st.style.color = st.dataset.val <= val ? '#f5a425' : '#ddd'; });
      });
      s.addEventListener('click', function() {
        document.getElementById('rating-input').value = this.dataset.val;
        stars.forEach(st => { st.style.color = st.dataset.val <= this.dataset.val ? '#f5a425' : '#ddd'; });
      });
    });
    // Default: highlight all 5
    stars.forEach(st => { st.style.color = '#f5a425'; });
  </script>
</body>
</html>
