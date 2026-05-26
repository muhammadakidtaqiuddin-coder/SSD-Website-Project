<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Car | Car Rental Admin</title>
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; background: #f4f6f9; margin: 0; }

        /* ── Sidebar ── */
        .sidebar {
            min-height: 100vh;
            background: #1a1a2e;
            padding: 0;
            position: fixed;
            width: 240px;
            top: 0; left: 0;
            z-index: 100;
            display: flex;
            flex-direction: column;
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
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.2s;
            text-decoration: none;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: #fff;
            background: rgba(255,255,255,0.05);
            border-left-color: #f5a425;
        }
        .sidebar .nav-link i { width: 16px; text-align: center; }
        .sidebar hr { border-color: rgba(255,255,255,0.1); margin: 8px 20px; }
        .sidebar-footer {
            margin-top: auto;
            padding: 16px 20px;
            border-top: 1px solid rgba(255,255,255,0.08);
        }
        .sidebar-footer .user-name { font-size: 13px; color: #fff; font-weight: 600; }
        .sidebar-footer .user-role { font-size: 11px; color: rgba(255,255,255,0.4); }

        /* ── Main ── */
        .main-content { margin-left: 240px; padding: 0; min-height: 100vh; }

        /* ── Topbar ── */
        .topbar {
            background: #fff;
            padding: 16px 28px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 50;
        }
        .topbar h5 { margin: 0; font-weight: 700; color: #1a1a2e; font-size: 16px; }
        .topbar .breadcrumb {
            margin: 0;
            background: none;
            padding: 0;
            font-size: 12px;
            color: #aaa;
        }
        .topbar .breadcrumb a { color: #f5a425; text-decoration: none; }
        .topbar .breadcrumb-item + .breadcrumb-item::before { color: #ccc; }

        /* ── Page Body ── */
        .page-body { padding: 28px; }

        /* ── Form Card ── */
        .form-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 20px rgba(0,0,0,0.06);
            overflow: hidden;
        }
        .form-card .section-header {
            padding: 18px 24px;
            border-bottom: 1px solid #f0f0f0;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .form-card .section-header .section-icon {
            width: 34px; height: 34px;
            background: rgba(245,164,37,0.12);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #f5a425;
            font-size: 14px;
        }
        .form-card .section-header h6 {
            margin: 0;
            font-weight: 700;
            font-size: 14px;
            color: #1a1a2e;
        }
        .form-card .section-header p {
            margin: 0;
            font-size: 11px;
            color: #aaa;
        }
        .form-card .form-body { padding: 24px; }

        /* ── Form Controls ── */
        .form-label {
            font-size: 12px;
            font-weight: 600;
            color: #555;
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }
        .form-control, .custom-select {
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            border: 1.5px solid #e8e8e8;
            border-radius: 8px;
            padding: 10px 14px;
            color: #333;
            transition: border-color 0.2s, box-shadow 0.2s;
            background: #fafafa;
        }
        .form-control:focus, .custom-select:focus {
            border-color: #f5a425;
            box-shadow: 0 0 0 3px rgba(245,164,37,0.12);
            background: #fff;
            outline: none;
        }
        .form-control.is-invalid { border-color: #dc3545; }
        .invalid-feedback { font-size: 11px; }
        textarea.form-control { resize: vertical; min-height: 100px; }

        /* ── Image Upload ── */
        .upload-zone {
            border: 2px dashed #e0e0e0;
            border-radius: 10px;
            padding: 40px 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.25s;
            background: #fafafa;
            position: relative;
        }
        .upload-zone:hover, .upload-zone.dragover {
            border-color: #f5a425;
            background: rgba(245,164,37,0.04);
        }
        .upload-zone input[type="file"] {
            position: absolute;
            inset: 0;
            opacity: 0;
            cursor: pointer;
            width: 100%;
            height: 100%;
        }
        .upload-zone i { font-size: 32px; color: #ddd; margin-bottom: 10px; display: block; }
        .upload-zone p { margin: 0; font-size: 13px; color: #aaa; }
        .upload-zone span { font-size: 11px; color: #ccc; }
        .preview-img {
            width: 100%;
            max-height: 200px;
            object-fit: cover;
            border-radius: 8px;
            display: none;
            margin-top: 12px;
        }

        /* ── Feature Checkboxes ── */
        .feature-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }
        .feature-item {
            border: 1.5px solid #e8e8e8;
            border-radius: 8px;
            padding: 10px 12px;
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            transition: all 0.2s;
            font-size: 12px;
            color: #555;
            user-select: none;
        }
        .feature-item:hover { border-color: #f5a425; background: rgba(245,164,37,0.04); }
        .feature-item input[type="checkbox"] { accent-color: #f5a425; width: 15px; height: 15px; }
        .feature-item.checked { border-color: #f5a425; background: rgba(245,164,37,0.08); color: #1a1a2e; font-weight: 600; }

        /* ── Availability Toggle ── */
        .toggle-switch { position: relative; display: inline-block; width: 46px; height: 24px; }
        .toggle-switch input { opacity: 0; width: 0; height: 0; }
        .slider {
            position: absolute; inset: 0;
            background: #ddd;
            border-radius: 24px;
            cursor: pointer;
            transition: 0.3s;
        }
        .slider:before {
            content: '';
            position: absolute;
            width: 18px; height: 18px;
            left: 3px; bottom: 3px;
            background: #fff;
            border-radius: 50%;
            transition: 0.3s;
            box-shadow: 0 1px 4px rgba(0,0,0,0.2);
        }
        input:checked + .slider { background: #f5a425; }
        input:checked + .slider:before { transform: translateX(22px); }

        /* ── Buttons ── */
        .btn-submit {
            background: #f5a425;
            color: #fff;
            border: none;
            padding: 12px 32px;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s, transform 0.1s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .btn-submit:hover { background: #e0931a; }
        .btn-submit:active { transform: scale(0.98); }
        .btn-cancel {
            background: #f4f4f4;
            color: #666;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: background 0.2s;
        }
        .btn-cancel:hover { background: #e8e8e8; color: #444; text-decoration: none; }

        /* ── Divider ── */
        .section-divider { height: 1px; background: #f0f0f0; margin: 0 24px; }

        /* ── Alert ── */
        .alert { font-size: 13px; border-radius: 8px; }

        /* ── Char counter ── */
        .char-counter { font-size: 11px; color: #bbb; text-align: right; margin-top: 4px; }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <div class="sidebar-brand">Car Rental <em>Admin</em></div>
    <nav class="nav flex-column mt-2">
        <a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fa fa-tachometer-alt"></i> Dashboard</a>
        <a class="nav-link" href="{{ route('admin.bookings') }}"><i class="fa fa-calendar-alt"></i> Bookings</a>
        <a class="nav-link" href="{{ route('admin.users') }}"><i class="fa fa-users"></i> Users</a>
        <a class="nav-link active" href="{{ route('admin.fleet') }}"><i class="fa fa-car"></i> Fleet</a>
        <hr>
        <a class="nav-link" href="{{ route('admin.audit-logs') }}"><i class="fa fa-list-alt"></i> Audit Logs</a>
        <hr>
        <a class="nav-link" href="{{ route('home') }}"><i class="fa fa-globe"></i> View Site</a>
    </nav>
    <div class="sidebar-footer">
        <div class="user-name">{{ Auth::user()->name }}</div>
        <div class="user-role">Administrator</div>
        <form method="POST" action="{{ route('logout') }}" class="mt-2">
            @csrf
            <button type="submit" style="background:none;border:none;color:rgba(255,255,255,0.4);font-size:12px;font-family:'Poppins',sans-serif;cursor:pointer;padding:0;">
                <i class="fa fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </div>
</div>

<!-- Main Content -->
<div class="main-content">

    <!-- Topbar -->
    <div class="topbar">
        <div>
            <h5>Add New Car</h5>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.fleet') }}">Fleet</a></li>
                    <li class="breadcrumb-item active">Add Car</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('admin.fleet') }}" class="btn-cancel">
            <i class="fa fa-arrow-left"></i> Back to Fleet
        </a>
    </div>

    <div class="page-body">

        @if ($errors->any())
            <div class="alert alert-danger mb-4">
                <strong><i class="fa fa-exclamation-circle"></i> Please fix the following errors:</strong>
                <ul class="mb-0 mt-2 pl-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.fleet.store') }}" enctype="multipart/form-data" id="addCarForm">
            @csrf

            <div class="row">

                <!-- LEFT COLUMN -->
                <div class="col-lg-8">

                    <!-- Basic Info -->
                    <div class="form-card mb-4">
                        <div class="section-header">
                            <div class="section-icon"><i class="fa fa-info-circle"></i></div>
                            <div>
                                <h6>Basic Information</h6>
                                <p>Car name, brand, model details</p>
                            </div>
                        </div>
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label class="form-label">Car Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        placeholder="e.g. Toyota Vios" value="{{ old('name') }}" required>
                                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="form-label">Brand <span class="text-danger">*</span></label>
                                    <select name="brand" class="form-control custom-select @error('brand') is-invalid @enderror" required>
                                        <option value="">-- Select Brand --</option>
                                        @foreach(['Toyota','Honda','Nissan','Mazda','Perodua','Proton','BMW','Mercedes-Benz','Audi','Hyundai','Kia','Ford','Volkswagen','Mitsubishi','Suzuki'] as $brand)
                                            <option value="{{ $brand }}" {{ old('brand') == $brand ? 'selected' : '' }}>{{ $brand }}</option>
                                        @endforeach
                                    </select>
                                    @error('brand')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label class="form-label">Model <span class="text-danger">*</span></label>
                                    <input type="text" name="model" class="form-control @error('model') is-invalid @enderror"
                                        placeholder="e.g. Vios 1.5G" value="{{ old('model') }}" required>
                                    @error('model')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="form-label">Year <span class="text-danger">*</span></label>
                                    <select name="year" class="form-control custom-select @error('year') is-invalid @enderror" required>
                                        <option value="">-- Year --</option>
                                        @for($y = date('Y'); $y >= 2010; $y--)
                                            <option value="{{ $y }}" {{ old('year') == $y ? 'selected' : '' }}>{{ $y }}</option>
                                        @endfor
                                    </select>
                                    @error('year')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="form-label">Color</label>
                                    <input type="text" name="color" class="form-control @error('color') is-invalid @enderror"
                                        placeholder="e.g. Silver" value="{{ old('color') }}">
                                    @error('color')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Description</label>
                                <textarea name="description" id="descField" class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Brief description of this car..." maxlength="500">{{ old('description') }}</textarea>
                                <div class="char-counter"><span id="descCount">0</span>/500</div>
                                @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>

                    <!-- Specs -->
                    <div class="form-card mb-4">
                        <div class="section-header">
                            <div class="section-icon"><i class="fa fa-cog"></i></div>
                            <div>
                                <h6>Specifications</h6>
                                <p>Engine, transmission, seating capacity</p>
                            </div>
                        </div>
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label class="form-label">Category <span class="text-danger">*</span></label>
                                    <select name="category" class="form-control custom-select @error('category') is-invalid @enderror" required>
                                        <option value="">-- Select --</option>
                                        @foreach(['Sedan','SUV','Hatchback','MPV','Pickup Truck','Luxury','Sports','Van'] as $cat)
                                            <option value="{{ $cat }}" {{ old('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="form-label">Transmission <span class="text-danger">*</span></label>
                                    <select name="transmission" class="form-control custom-select @error('transmission') is-invalid @enderror" required>
                                        <option value="">-- Select --</option>
                                        <option value="Auto"   {{ old('transmission') == 'Auto'   ? 'selected' : '' }}>Automatic</option>
                                        <option value="Manual" {{ old('transmission') == 'Manual' ? 'selected' : '' }}>Manual</option>
                                    </select>
                                    @error('transmission')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="form-label">Fuel Type <span class="text-danger">*</span></label>
                                    <select name="fuel_type" class="form-control custom-select @error('fuel_type') is-invalid @enderror" required>
                                        <option value="">-- Select --</option>
                                        <option value="Petrol"   {{ old('fuel_type') == 'Petrol'   ? 'selected' : '' }}>Petrol</option>
                                        <option value="Diesel"   {{ old('fuel_type') == 'Diesel'   ? 'selected' : '' }}>Diesel</option>
                                        <option value="Electric" {{ old('fuel_type') == 'Electric' ? 'selected' : '' }}>Electric</option>
                                        <option value="Hybrid"   {{ old('fuel_type') == 'Hybrid'   ? 'selected' : '' }}>Hybrid</option>
                                    </select>
                                    @error('fuel_type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label class="form-label">Seats <span class="text-danger">*</span></label>
                                    <select name="seats" class="form-control custom-select @error('seats') is-invalid @enderror" required>
                                        <option value="">-- Seats --</option>
                                        @foreach([2,4,5,6,7,8,9,12,15] as $s)
                                            <option value="{{ $s }}" {{ old('seats') == $s ? 'selected' : '' }}>{{ $s }} Seats</option>
                                        @endforeach
                                    </select>
                                    @error('seats')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="form-label">Engine (cc)</label>
                                    <input type="number" name="engine_cc" class="form-control @error('engine_cc') is-invalid @enderror"
                                        placeholder="e.g. 1500" value="{{ old('engine_cc') }}" min="600" max="8000">
                                    @error('engine_cc')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="form-label">Mileage (km)</label>
                                    <input type="number" name="mileage" class="form-control @error('mileage') is-invalid @enderror"
                                        placeholder="e.g. 15000" value="{{ old('mileage') }}" min="0">
                                    @error('mileage')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <label class="form-label">Features / Extras</label>
                                <div class="feature-grid mt-1">
                                    @foreach([
                                        ['GPS Navigation','fa-map-marker-alt','gps'],
                                        ['Bluetooth','fa-bluetooth','bluetooth'],
                                        ['Air Conditioning','fa-snowflake','air_conditioning'],
                                        ['Backup Camera','fa-camera','backup_camera'],
                                        ['Sunroof','fa-sun','sunroof'],
                                        ['Cruise Control','fa-tachometer-alt','cruise_control'],
                                        ['USB Charging','fa-usb','usb_charging'],
                                        ['Child Seat','fa-baby','child_seat'],
                                        ['Parking Sensor','fa-parking','parking_sensor'],
                                    ] as [$label, $icon, $value])
                                    <label class="feature-item {{ in_array($value, old('features', [])) ? 'checked' : '' }}" id="fl-{{ $value }}">
                                        <input type="checkbox" name="features[]" value="{{ $value }}"
                                            {{ in_array($value, old('features', [])) ? 'checked' : '' }}
                                            onchange="toggleFeature('{{ $value }}')">
                                        <i class="fa {{ $icon }}"></i> {{ $label }}
                                    </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- RIGHT COLUMN -->
                <div class="col-lg-4">

                    <!-- Photo Upload -->
                    <div class="form-card mb-4">
                        <div class="section-header">
                            <div class="section-icon"><i class="fa fa-image"></i></div>
                            <div>
                                <h6>Car Photo</h6>
                                <p>JPG, PNG — max 2MB</p>
                            </div>
                        </div>
                        <div class="form-body">
                            <div class="upload-zone" id="uploadZone">
                                <input type="file" name="image" id="imageInput" accept="image/jpeg,image/png,image/webp"
                                    onchange="previewImage(this)">
                                <i class="fa fa-cloud-upload-alt" id="uploadIcon"></i>
                                <p id="uploadText">Click or drag & drop image here</p>
                                <span id="uploadHint">JPG, PNG, WebP up to 2MB</span>
                            </div>
                            <img id="previewImg" class="preview-img" src="#" alt="Preview">
                            @error('image')<div class="invalid-feedback d-block mt-2">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <!-- Pricing -->
                    <div class="form-card mb-4">
                        <div class="section-header">
                            <div class="section-icon"><i class="fa fa-tag"></i></div>
                            <div>
                                <h6>Pricing</h6>
                                <p>Daily rental rate</p>
                            </div>
                        </div>
                        <div class="form-body">
                            <div class="form-group mb-3">
                                <label class="form-label">Price per Day (RM) <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="font-size:13px; font-family:'Poppins',sans-serif; border-radius:8px 0 0 8px; border:1.5px solid #e8e8e8; border-right:none; background:#f0f0f0; color:#888;">RM</span>
                                    </div>
                                    <input type="number" name="price_per_day"
                                        class="form-control @error('price_per_day') is-invalid @enderror"
                                        placeholder="0.00" step="0.01" min="0"
                                        value="{{ old('price_per_day') }}"
                                        style="border-radius:0 8px 8px 0;" required>
                                    @error('price_per_day')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <label class="form-label">Deposit (RM)</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="font-size:13px; font-family:'Poppins',sans-serif; border-radius:8px 0 0 8px; border:1.5px solid #e8e8e8; border-right:none; background:#f0f0f0; color:#888;">RM</span>
                                    </div>
                                    <input type="number" name="deposit"
                                        class="form-control @error('deposit') is-invalid @enderror"
                                        placeholder="0.00" step="0.01" min="0"
                                        value="{{ old('deposit') }}"
                                        style="border-radius:0 8px 8px 0;">
                                    @error('deposit')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Availability -->
                    <div class="form-card mb-4">
                        <div class="section-header">
                            <div class="section-icon"><i class="fa fa-toggle-on"></i></div>
                            <div>
                                <h6>Availability</h6>
                                <p>Visible to customers?</p>
                            </div>
                        </div>
                        <div class="form-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <div style="font-size:13px; font-weight:600; color:#333;">Available for Rent</div>
                                    <div style="font-size:11px; color:#aaa;">Toggle off to hide from listings</div>
                                </div>
                                <label class="toggle-switch">
                                    <input type="checkbox" name="is_available" id="availToggle"
                                        {{ old('is_available', true) ? 'checked' : '' }}>
                                    <span class="slider"></span>
                                </label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-3">
                                <div>
                                    <div style="font-size:13px; font-weight:600; color:#333;">Featured Car</div>
                                    <div style="font-size:11px; color:#aaa;">Show on homepage highlights</div>
                                </div>
                                <label class="toggle-switch">
                                    <input type="checkbox" name="is_featured" id="featuredToggle"
                                        {{ old('is_featured') ? 'checked' : '' }}>
                                    <span class="slider"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="d-flex flex-column" style="gap:10px;">
                        <button type="submit" class="btn-submit" style="justify-content:center;">
                            <i class="fa fa-plus-circle"></i> Add Car to Fleet
                        </button>
                        <a href="{{ route('admin.fleet') }}" class="btn-cancel" style="justify-content:center;">
                            <i class="fa fa-times"></i> Cancel
                        </a>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script>
    // Image preview
    function previewImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = e => {
                const img = document.getElementById('previewImg');
                img.src = e.target.result;
                img.style.display = 'block';
                document.getElementById('uploadIcon').style.display = 'none';
                document.getElementById('uploadText').textContent = input.files[0].name;
                document.getElementById('uploadHint').style.display = 'none';
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Drag & drop highlight
    const zone = document.getElementById('uploadZone');
    zone.addEventListener('dragover', e => { e.preventDefault(); zone.classList.add('dragover'); });
    zone.addEventListener('dragleave', () => zone.classList.remove('dragover'));
    zone.addEventListener('drop', e => { e.preventDefault(); zone.classList.remove('dragover'); });

    // Feature checkbox toggle style
    function toggleFeature(value) {
        const label = document.getElementById('fl-' + value);
        const cb = label.querySelector('input');
        label.classList.toggle('checked', cb.checked);
    }

    // Char counter
    const descField = document.getElementById('descField');
    const descCount = document.getElementById('descCount');
    descField.addEventListener('input', () => descCount.textContent = descField.value.length);
    descCount.textContent = descField.value.length;
</script>
</body>
</html>
