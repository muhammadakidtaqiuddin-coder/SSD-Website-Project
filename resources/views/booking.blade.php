<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>My Bookings | Car Rental</title>

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f4f6f9;
        }

        .sidebar {
            min-height: 100vh;
            background: #1a1a2e;
            position: fixed;
            width: 240px;
        }

        .sidebar-brand {
            padding: 20px;
            color: #fff;
            font-size: 20px;
            font-weight: 700;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-brand em {
            color: #f5a425;
            font-style: normal;
        }

        .sidebar .nav-link {
            color: rgba(255,255,255,0.7);
            padding: 12px 20px;
            border-left: 3px solid transparent;
            transition: 0.3s;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: #fff;
            background: rgba(255,255,255,0.05);
            border-left-color: #f5a425;
        }

        .sidebar .nav-link i {
            margin-right: 10px;
        }

        .main-content {
            margin-left: 240px;
            padding: 30px;
        }

        .topbar {
            background: #fff;
            padding: 15px 30px;
            margin: -30px -30px 30px -30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);

            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topbar h5 {
            margin: 0;
            font-weight: 600;
            color: #1a1a2e;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
        }

        .card-header {
            background: #fff;
            border-bottom: 1px solid #f0f0f0;
            font-weight: 600;
            border-radius: 12px 12px 0 0 !important;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .badge-pending {
            background: #ffc107;
            color: #000;
            padding: 6px 10px;
            border-radius: 20px;
        }

        .badge-confirmed {
            background: #28a745;
            color: #fff;
            padding: 6px 10px;
            border-radius: 20px;
        }

        .badge-cancelled {
            background: #dc3545;
            color: #fff;
            padding: 6px 10px;
            border-radius: 20px;
        }

        .btn-cancel {
            background: #dc3545;
            color: #fff;
            border: none;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 13px;
        }

        .btn-cancel:hover {
            background: #bb2d3b;
            color: #fff;
        }
    </style>
</head>

<body>

<!-- Sidebar -->
<div class="sidebar">

    <div class="sidebar-brand">
        Car Rental <em>User</em>
    </div>

    <nav class="nav flex-column mt-3">

        <a class="nav-link" href="{{ route('home') }}">
            <i class="fa fa-home"></i> Home
        </a>

        <a class="nav-link active" href="{{ route('bookings.index') }}">
            <i class="fa fa-calendar"></i> My Bookings
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                class="nav-link btn btn-link text-left"
                style="width:100%;">
                <i class="fa fa-sign-out-alt"></i> Logout
            </button>
        </form>

    </nav>

</div>

<!-- Main Content -->
<div class="main-content">

    <!-- Topbar -->
    <div class="topbar">

        <h5>My Bookings</h5>

        <span style="font-size:14px; color:#888;">
            Welcome, {{ auth()->user()->name }}
        </span>

    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Booking Table -->
    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">

            <span>Booking History</span>

            <a href="{{ route('cars') }}"
               class="btn btn-sm btn-warning text-white">
                Book New Car
            </a>

        </div>

        <div class="card-body p-0">

            <table class="table table-hover mb-0">

                <thead style="background:#f9f9f9;">
                    <tr>
                        <th>ID</th>
                        <th>Car</th>
                        <th>Pickup Date</th>
                        <th>Return Date</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Booked At</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($bookings as $booking)

                    <tr>

                        <td>#{{ $booking->id }}</td>

                        <td>{{ $booking->car_name }}</td>

                        <td>
                            {{ \Carbon\Carbon::parse($booking->pickup_date)->format('d M Y') }}
                        </td>

                        <td>
                            {{ \Carbon\Carbon::parse($booking->return_date)->format('d M Y') }}
                        </td>

                        <td>
                            RM {{ number_format($booking->total_price, 2) }}
                        </td>

                        <td>
                            <span class="badge-{{ $booking->status }}">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </td>

                        <td>
                            {{ $booking->created_at->format('d M Y') }}
                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">
                            You have no bookings yet.
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
