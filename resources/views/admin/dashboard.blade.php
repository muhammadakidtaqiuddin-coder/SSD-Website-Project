<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bookings | Car Rental</title>
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background: #f4f6f9; }
        .sidebar {
            min-height: 100vh;
            background: #1a1a2e;
            padding: 0;
            position: fixed;
            width: 240px;
        }
        .sidebar-brand {
            padding: 20px;
            color: #fff;
            font-size: 18px;
            font-weight: 700;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .sidebar-brand em { color: #f5a425; font-style: normal; }
        .sidebar .nav-link {
            color: rgba(255,255,255,0.7);
            padding: 12px 20px;
            font-size: 14px;
            border-left: 3px solid transparent;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: #fff;
            background: rgba(255,255,255,0.05);
            border-left-color: #f5a425;
        }
        .sidebar .nav-link i { margin-right: 10px; width: 16px; }
        .main-content { margin-left: 240px; padding: 30px; }
        .stat-card {
            background: #fff;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
            border-left: 4px solid #f5a425;
        }
        .stat-card h3 { font-size: 32px; font-weight: 700; color: #1a1a2e; margin: 0; }
        .stat-card p { color: #888; margin: 0; font-size: 14px; }
        .stat-card i { font-size: 30px; color: #f5a425; }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
        }
        .card-header {
            background: #fff;
            border-bottom: 1px solid #f0f0f0;
            font-weight: 600;
            color: #1a1a2e;
            border-radius: 10px 10px 0 0 !important;
        }
        .badge-pending { background: #ffc107; color: #000; }
        .badge-confirmed { background: #28a745; color: #fff; }
        .badge-cancelled { background: #dc3545; color: #fff; }
        .topbar {
            background: #fff;
            padding: 15px 30px;
            margin: -30px -30px 30px -30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .topbar h5 { margin: 0; font-weight: 600; color: #1a1a2e; }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <div class="sidebar-brand">Car Rental <em>Admin</em></div>
    <nav class="nav flex-column mt-3">
        <a class="nav-link active" href="{{ route('admin.dashboard') }}"><i class="fa fa-tachometer-alt"></i> Dashboard</a>
        <a class="nav-link" href="{{ route('admin.bookings') }}"><i class="fa fa-calendar"></i> Bookings</a>
        <a class="nav-link" href="{{ route('admin.users') }}"><i class="fa fa-users"></i> Users</a>
        <a class="nav-link" href="{{ route('admin.audit-logs') }}"><i class="fa fa-list"></i> Audit Logs</a>
        <hr style="border-color: rgba(255,255,255,0.1);">
        <a class="nav-link" href="{{ route('home') }}"><i class="fa fa-globe"></i> View Site</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="nav-link btn btn-link text-left" style="width:100%;"><i class="fa fa-sign-out-alt"></i> Logout</button>
        </form>
    </nav>
</div>

<!-- Main Content -->
<div class="main-content">
    <div class="topbar">
        <h5>Booking Details</h5>
        <span style="font-size:14px; color:#888;">Welcome, {{ auth()->user()->name }}</span>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Stats -->
    <div class="row mb-4">
        <div class="col-md-4 mb-3">
            <div class="stat-card d-flex justify-content-between align-items-center">
                <div>
                    <h3>{{ $totalUsers }}</h3>
                    <p>Total Users</p>
                </div>
                <i class="fa fa-users"></i>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="stat-card d-flex justify-content-between align-items-center">
                <div>
                    <h3>{{ $totalBookings }}</h3>
                    <p>Total Bookings</p>
                </div>
                <i class="fa fa-calendar"></i>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="stat-card d-flex justify-content-between align-items-center">
                <div>
                    <h3>{{ $pendingBookings }}</h3>
                    <p>Pending Bookings</p>
                </div>
                <i class="fa fa-clock"></i>
            </div>
        </div>
    </div>

    <!-- Recent Bookings -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Recent Bookings</span>
            <a href="{{ route('admin.bookings') }}" style="font-size:13px; color:#f5a425;">View All</a>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead style="background:#f9f9f9;">
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Car</th>
                        <th>Pickup</th>
                        <th>Return</th>
                        <th>Price</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentBookings as $booking)
                    <tr>
                        <td>#{{ $booking->id }}</td>
                        <td>{{ $booking->user->name ?? 'N/A' }}</td>
                        <td>{{ $booking->car_name }}</td>
                        <td>{{ $booking->pickup_date->format('d M Y') }}</td>
                        <td>{{ $booking->return_date->format('d M Y') }}</td>
                        <td>${{ number_format($booking->total_price, 2) }}</td>
                        <td><span class="badge badge-{{ $booking->status }}">{{ ucfirst($booking->status) }}</span></td>
                    </tr>
                    @empty
                    <tr><td colspan="7" class="text-center text-muted py-3">No bookings yet.</td></tr>
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


