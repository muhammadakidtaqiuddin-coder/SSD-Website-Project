<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Fleet Management | Car Rental</title>
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
            padding: 15px 20px;
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
        .topbar h5 { margin: 0; font-weight: 600; color: #1a1a2e; }
        .btn-add {
            background: #f5a425;
            color: #fff;
            border: none;
            padding: 8px 18px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
        }
        .btn-add:hover { background: #e09410; color: #fff; }
        .car-thumb {
            width: 60px;
            height: 40px;
            object-fit: cover;
            border-radius: 5px;
        }
        .badge-available { background: #28a745; color: #fff; }
        .badge-unavailable { background: #dc3545; color: #fff; }
        .badge-featured { background: #f5a425; color: #fff; }
        .table th { font-size: 13px; color: #888; font-weight: 600; }
        .table td { font-size: 13px; vertical-align: middle; }
        .action-btn {
            padding: 4px 10px;
            font-size: 12px;
            border-radius: 5px;
            margin-right: 4px;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <div class="sidebar-brand">Car Rental <em>Admin</em></div>
    <nav class="nav flex-column mt-3">
        <a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fa fa-tachometer-alt"></i> Dashboard</a>
        <a class="nav-link" href="{{ route('admin.bookings') }}"><i class="fa fa-calendar"></i> Bookings</a>
        <a class="nav-link" href="{{ route('admin.users') }}"><i class="fa fa-users"></i> Users</a>
        <a class="nav-link active" href="{{ route('admin.fleet') }}"><i class="fa fa-car"></i> Fleet</a>
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
        <h5>Fleet Management</h5>
        <span style="font-size:14px; color:#888;">Welcome, {{ auth()->user()->name }}</span>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>All Cars ({{ $cars->count() }})</span>
            <a href="{{ route('admin.fleet.create') }}" class="btn-add"><i class="fa fa-plus mr-1"></i> Add Car</a>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead style="background:#f9f9f9;">
                    <tr>
                        <th class="pl-3">#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Year</th>
                        <th>Category</th>
                        <th>Transmission</th>
                        <th>Price/Day</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($cars as $index => $car)
                    <tr>
                        <td class="pl-3">{{ $index + 1 }}</td>
                        <td>
                            @if($car->image)
                                <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}" class="car-thumb">
                            @else
                                <div style="width:60px;height:40px;background:#f0f0f0;border-radius:5px;display:flex;align-items:center;justify-content:center;">
                                    <i class="fa fa-car" style="color:#ccc;"></i>
                                </div>
                            @endif
                        </td>
                        <td><strong>{{ $car->name }}</strong></td>
                        <td>{{ $car->brand }}</td>
                        <td>{{ $car->model }}</td>
                        <td>{{ $car->year }}</td>
                        <td>{{ $car->category }}</td>
                        <td>{{ ucfirst($car->transmission) }}</td>
                        <td>RM {{ number_format($car->price_per_day, 2) }}</td>
                        <td>
                            @if($car->is_available)
                                <span class="badge badge-available">Available</span>
                            @else
                                <span class="badge badge-unavailable">Unavailable</span>
                            @endif
                            @if($car->is_featured)
                                <span class="badge badge-featured ml-1">Featured</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.fleet.edit', $car->id) }}" class="btn btn-warning action-btn">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <form method="POST" action="{{ route('admin.fleet.destroy', $car->id) }}" style="display:inline;" onsubmit="return confirm('Delete this car?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger action-btn">
                                    <i class="fa fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="11" class="text-center text-muted py-4">No cars found. <a href="{{ route('admin.fleet.create') }}" style="color:#f5a425;">Add one now.</a></td>
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
