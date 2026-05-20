<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Cars | Car Rental</title>

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f4f6f9;
        }

        .navbar {
            background: #1a1a2e;
            padding: 15px 30px;
        }

        .navbar-brand {
            color: #fff !important;
            font-weight: 700;
            font-size: 22px;
        }

        .navbar-brand em {
            color: #f5a425;
            font-style: normal;
        }

        .nav-link {
            color: rgba(255,255,255,0.8) !important;
            margin-left: 15px;
        }

        .nav-link:hover {
            color: #fff !important;
        }

        .page-title {
            padding: 40px 0 20px;
        }

        .page-title h2 {
            font-weight: 700;
            color: #1a1a2e;
        }

        .car-card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
            transition: 0.3s;
            height: 100%;
        }

        .car-card:hover {
            transform: translateY(-5px);
        }

        .car-image {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .car-content {
            padding: 20px;
        }

        .car-title {
            font-size: 20px;
            font-weight: 600;
            color: #1a1a2e;
            margin-bottom: 10px;
        }

        .car-brand {
            color: #888;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .car-price {
            font-size: 22px;
            font-weight: 700;
            color: #f5a425;
        }

        .car-price span {
            font-size: 14px;
            color: #888;
            font-weight: 400;
        }

        .btn-book {
            background: #f5a425;
            color: #fff;
            border: none;
            width: 100%;
            margin-top: 15px;
            padding: 10px;
            border-radius: 8px;
            transition: 0.3s;
        }

        .btn-book:hover {
            background: #d89216;
            color: #fff;
        }

        .empty-box {
            background: #fff;
            border-radius: 12px;
            padding: 50px;
            text-align: center;
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
        }
    </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">

    <a class="navbar-brand" href="#">
        Car Rental <em>System</em>
    </a>

    <div class="ml-auto d-flex align-items-center">

        <a class="nav-link" href="{{ route('home') }}">
            Home
        </a>

        <a class="nav-link" href="{{ route('bookings.index') }}">
            My Bookings
        </a>

        @auth
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                class="btn btn-sm btn-outline-light ml-3">
                Logout
            </button>
        </form>
        @endauth

    </div>

</nav>

<div class="container">

    <!-- Page Title -->
    <div class="page-title">
        <h2>Available Cars</h2>
        <p class="text-muted">
            Choose your preferred vehicle for your trip.
        </p>
    </div>

    <!-- Cars -->
    <div class="row">

        @forelse($cars as $car)

        <div class="col-lg-4 col-md-6 mb-4">

            <div class="car-card">

                <img src="{{ $car->image ?? asset('assets/images/default-car.jpg') }}"
                     class="car-image"
                     alt="{{ $car->name }}">

                <div class="car-content">

                    <h4 class="car-title">
                        {{ $car->name }}
                    </h4>

                    <div class="car-brand">
                        {{ $car->brand }}
                    </div>

                    <p class="text-muted">
                        {{ $car->description ?? 'No description available.' }}
                    </p>

                    <div class="car-price">
                        RM {{ number_format($car->price_per_day, 2) }}
                        <span>/ day</span>
                    </div>

                    <a href="{{ route('bookings.create', ['car' => $car->id]) }}"
                       class="btn btn-book">
                        Book Now
                    </a>

                </div>

            </div>

        </div>

        @empty

        <div class="col-12">

            <div class="empty-box">

                <h4>No Cars Available</h4>

                <p class="text-muted mb-0">
                    Please check again later.
                </p>

            </div>

        </div>

        @endforelse

    </div>

</div>

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
