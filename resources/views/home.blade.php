<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SSD Car Rental – Reliable, affordable, and flexible vehicle rental services for every journey.">
    <meta name="author" content="SSD Car Rental">
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>SSD Car Rental – Drive with Confidence</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">

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
          <a class="navbar-brand" href="/"><h2>SSD <em>Car Rental</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav  ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home
                      <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item"><a class="nav-link" href="/booking" style="padding: 8px 20px; margin-left: 10px;">Booking</a></li>
                <li class="nav-item"><a class="nav-link" href="/about" style="padding: 8px 20px; margin-left: 10px;">About</a></li>
                <li class="nav-item"><a class="nav-link" href="/contact" style="padding: 8px 20px; margin-left: 10px;">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="/testimonials" style="padding: 8px 20px; margin-left: 10px;">Testimonials</a></li>

                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="/login" style="padding: 8px 20px; margin-left: 10px;">Login</a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="handleLogout(event)">Logout</a>
                    </li>
                @endauth
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            <h4>Your journey starts here</h4>
            <h2>Find the perfect car for every occasion</h2>
          </div>
        </div>
        <div class="banner-item-02">
          <div class="text-content">
            <h4>Flexible Rental Plans</h4>
            <h2>Daily, weekly, and long-term rentals available</h2>
          </div>
        </div>
        <div class="banner-item-03">
          <div class="text-content">
            <h4>Drive with Peace of Mind</h4>
            <h2>Fully insured vehicles and 24/7 roadside support</h2>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->

    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Current Offers</h2>
              <a href="/offers">view more <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
          <div class="col-md-4">
            <div class="product-item">
              <a href="/offers"><img src="{{ asset('assets/images/offer-1-370x270.jpg') }}" alt="Weekend Getaway Deal"></a>
              <div class="down-content">
                <a href="/offers"><h4>Weekend Getaway – Economy & Compact Cars</h4></a>
                <h6><small>from</small> $120 <small>per weekend</small></h6>
                <p>Enjoy a stress-free weekend escape with our affordable economy and compact car packages. Unlimited mileage included.</p>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="product-item">
              <a href="/offers"><img src="{{ asset('assets/images/offer-2-370x270.jpg') }}" alt="Family Road Trip Package"></a>
              <div class="down-content">
                <a href="/offers"><h4>Family Road Trip – SUV & MPV Packages</h4></a>
                <h6><small>from</small> $150 <small>per weekend</small></h6>
                <p>Spacious and comfortable SUVs and MPVs for your family trips. Child seat and GPS navigation available upon request.</p>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="product-item">
              <a href="/offers"><img src="{{ asset('assets/images/offer-3-370x270.jpg') }}" alt="Business Travel Deal"></a>
              <div class="down-content">
                <a href="/offers"><h4>Business Travel – Premium Sedan Deals</h4></a>
                <h6><small>from</small> $150 <small>per weekend</small></h6>
                <p>Make a lasting impression with our premium sedans. Ideal for corporate events, airport transfers, and client meetings.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="best-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>About Us</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <p>SSD Car Rental has been providing reliable and affordable vehicle rental services to individuals, families, and businesses. We are committed to delivering a seamless rental experience — from booking to return — with a focus on <a href="/fleet">vehicle quality</a>, <a href="/contact">customer support</a>, and transparent pricing.</p>
              <ul class="featured-list">
                <li><a href="#">Wide selection of well-maintained vehicles</a></li>
                <li><a href="#">Flexible rental durations with no hidden fees</a></li>
                <li><a href="#">Comprehensive insurance coverage included</a></li>
                <li><a href="#">24/7 roadside assistance and customer support</a></li>
              </ul>
              <a href="/about" class="filled-button">Read More</a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="{{ asset('assets/images/about-1-570x350.jpg') }}" alt="About SSD Car Rental">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="services" style="background-image: url({{ asset('assets/images/other-image-fullscren-1-1920x900.jpg') }});">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest Blog Posts</h2>
              <a href="/blog">read more <i class="fa fa-angle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="service-item">
              <a href="#" class="services-item-image"><img src="{{ asset('assets/images/blog-1-370x270.jpg') }}" class="img-fluid" alt="Road trip planning tips"></a>
              <div class="down-content">
                <h4><a href="#">Top 5 Tips for Planning a Stress-Free Road Trip</a></h4>
                <p style="margin: 0;"> SSD Editorial &nbsp;&nbsp;|&nbsp;&nbsp; 10/06/2025 09:00 &nbsp;&nbsp;|&nbsp;&nbsp; 248</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="service-item">
              <a href="#" class="services-item-image"><img src="{{ asset('assets/images/blog-2-370x270.jpg') }}" class="img-fluid" alt="Choosing the right rental car"></a>
              <div class="down-content">
                <h4><a href="#">How to Choose the Right Car for Your Trip</a></h4>
                <p style="margin: 0;"> SSD Editorial &nbsp;&nbsp;|&nbsp;&nbsp; 02/06/2025 11:00 &nbsp;&nbsp;|&nbsp;&nbsp; 185</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="service-item">
              <a href="#" class="services-item-image"><img src="{{ asset('assets/images/blog-3-370x270.jpg') }}" class="img-fluid" alt="Understanding rental insurance"></a>
              <div class="down-content">
                <h4><a href="#">Understanding Car Rental Insurance: What You Need to Know</a></h4>
                <p style="margin: 0;"> SSD Editorial &nbsp;&nbsp;|&nbsp;&nbsp; 25/05/2025 08:30 &nbsp;&nbsp;|&nbsp;&nbsp; 310</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="happy-clients">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>What Our Clients Say</h2>
              <a href="/testimonials">read more <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
          <div class="col-md-12">
            <div class="owl-clients owl-carousel text-center">
              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Ahmad Razif</h4>
                  <p class="n-m"><em>"Booking was quick and easy. The car was in excellent condition and the staff were very professional. Will definitely rent again."</em></p>
                </div>
              </div>

              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Sarah Lim</h4>
                  <p class="n-m"><em>"Great value for money. SSD Car Rental made our family vacation so much easier. The SUV was spacious and comfortable throughout the trip."</em></p>
                </div>
              </div>

              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>David Raj</h4>
                  <p class="n-m"><em>"Reliable service and transparent pricing. No hidden charges, and the 24/7 support gave me real peace of mind during my business trip."</em></p>
                </div>
              </div>

              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Nurul Ain</h4>
                  <p class="n-m"><em>"I was impressed by how smooth the entire process was, from online booking to vehicle pickup. Highly recommended for anyone travelling in the area."</em></p>
                </div>
              </div>

              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Kevin Tan</h4>
                  <p class="n-m"><em>"The premium sedan I rented for a client event was immaculate. SSD Car Rental is now my go-to for all business travel needs."</em></p>
                </div>
              </div>

              <div class="service-item">
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="down-content">
                  <h4>Priya Menon</h4>
                  <p class="n-m"><em>"Affordable rates without compromising on quality. The team was courteous and the vehicle was ready exactly on time. Five stars!"</em></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <div class="row">
                <div class="col-md-8">
                  <h4>Ready to hit the road? Reserve your vehicle today.</h4>
                  <p>Our team is available to assist you in finding the right vehicle at the right price. Get in touch and we'll handle the rest.</p>
                </div>
                <div class="col-lg-4 col-md-6 text-right">
                  <a href="/contact" class="filled-button">Contact Us</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright &copy; 2025 SSD Car Rental. All rights reserved.</p>
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

    <script>
        function handleLogout(e) {
            e.preventDefault();

            // Clear client-side storage
            localStorage.clear();
            sessionStorage.clear();

            // Submit a POST request to Laravel's logout route (requires CSRF token)
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '/logout';

            const csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}';

            form.appendChild(csrfToken);
            document.body.appendChild(form);
            form.submit();
        }
    </script>

  </body>
</html>


<!--
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
-->
