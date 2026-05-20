<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Audit Logs | Car Rental</title>

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

        .sidebar-brand em {
            color: #f5a425;
            font-style: normal;
        }

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

        .sidebar .nav-link i {
            margin-right: 10px;
            width: 16px;
        }

        .main-content {
            margin-left: 240px;
            padding: 30px;
        }

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

        .badge-success {
            background: #28a745;
            color: #fff;
        }

        .badge-warning {
            background: #ffc107;
            color: #000;
        }

        .badge-danger {
            background: #dc3545;
            color: #fff;
        }

        .table td,
        .table th {
            vertical-align: middle;
        }
    </style>
</head>

<body>

<!-- Sidebar -->
<div class="sidebar">
    <div class="sidebar-brand">
        Car Rental <em>Admin</em>
    </div>

    <nav class="nav flex-column mt-3">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fa fa-tachometer-alt"></i> Dashboard
        </a>

        <a class="nav-link" href="{{ route('admin.bookings') }}">
            <i class="fa fa-calendar"></i> Bookings
        </a>

        <a class="nav-link" href="{{ route('admin.users') }}">
            <i class="fa fa-users"></i> Users
        </a>

        <a class="nav-link active" href="{{ route('admin.audit-logs') }}">
            <i class="fa fa-list"></i> Audit Logs
        </a>

        <hr style="border-color: rgba(255,255,255,0.1);">

        <a class="nav-link" href="{{ route('home') }}">
            <i class="fa fa-globe"></i> View Site
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

    <div class="topbar">
        <h5>Audit Logs</h5>

        <span style="font-size:14px; color:#888;">
            Welcome, {{ auth()->user()->name }}
        </span>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Audit Logs Table -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>System Activity Logs</span>
        </div>

        <div class="card-body p-0">
            <table class="table table-hover mb-0">

                <thead style="background:#f9f9f9;">
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Action</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($logs as $log)
                        <tr>

                            <td>#{{ $log->id }}</td>

                            <td>
                                {{ $log->user->name ?? 'System' }}
                            </td>

                            <td>
                                {{ ucfirst(str_replace('_', ' ', $log->action)) }}
                            </td>

                            <td>
                                {{ $log->description }}
                            </td>

                            <td>
                                <span class="badge
                                    @if($log->status == 'success')
                                        badge-success
                                    @elseif($log->status == 'warning')
                                        badge-warning
                                    @else
                                        badge-danger
                                    @endif
                                ">
                                    {{ ucfirst($log->status) }}
                                </span>
                            </td>

                            <td>
                                {{ $log->created_at->format('d M Y h:i A') }}
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                No audit logs found.
                            </td>
                        </tr>

                    @endforelse

                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="card-footer bg-white">
            {{ $logs->links() }}
        </div>

    </div>

</div>

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
