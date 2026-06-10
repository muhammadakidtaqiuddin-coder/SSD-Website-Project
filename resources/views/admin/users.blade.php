<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Users | Car Rental Admin</title>
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
            padding: 16px 20px;
        }
        /* Search */
        .search-box { position: relative; max-width: 260px; }
        .search-box input {
            padding-left: 34px;
            border-radius: 6px;
            border: 1px solid #ddd;
            font-size: 13px;
            height: 36px;
        }
        .search-box i {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
            font-size: 13px;
        }
        /* Table */
        .table thead th {
            background: #f9f9f9;
            font-size: 13px;
            font-weight: 600;
            color: #555;
            border-bottom: 1px solid #eee;
        }
        .table tbody td { font-size: 13px; vertical-align: middle; color: #444; }
        .table tbody tr:hover { background: #fafafa; }
        /* Role badges */
        .badge-admin { background: #1a1a2e; color: #fff; padding: 4px 10px; border-radius: 20px; font-size: 11px; font-weight: 600; }
        .badge-user  { background: #e8f4fd; color: #1a7abf; padding: 4px 10px; border-radius: 20px; font-size: 11px; font-weight: 600; }
        .badge-staff { background: #fff3cd; color: #856404; padding: 4px 10px; border-radius: 20px; font-size: 11px; font-weight: 600; }
        /* Avatar */
        .avatar {
            width: 34px; height: 34px; border-radius: 50%;
            background: #f5a425; color: #fff;
            font-size: 13px; font-weight: 700;
            display: inline-flex; align-items: center; justify-content: center;
            margin-right: 8px; flex-shrink: 0;
        }
        .user-cell { display: flex; align-items: center; }
        /* Action buttons */
        .btn-edit {
            background: #f5a425; color: #fff; border: none;
            border-radius: 5px; padding: 5px 12px; font-size: 12px;
            cursor: pointer; transition: background 0.2s;
        }
        .btn-edit:hover { background: #d48c15; color: #fff; }
        .btn-delete {
            background: #dc3545; color: #fff; border: none;
            border-radius: 5px; padding: 5px 12px; font-size: 12px;
            cursor: pointer; transition: background 0.2s;
        }
        .btn-delete:hover { background: #b52a37; color: #fff; }
        .btn-add {
            background: #1a1a2e; color: #fff; border: none;
            border-radius: 6px; padding: 8px 18px; font-size: 13px;
            font-weight: 600; cursor: pointer; transition: background 0.2s;
        }
        .btn-add:hover { background: #f5a425; color: #fff; }
        /* Modal */
        .modal-header { background: #1a1a2e; color: #fff; border-radius: 10px 10px 0 0; }
        .modal-header .close { color: #fff; opacity: 0.8; }
        .modal-content { border: none; border-radius: 10px; }
        .modal-title { font-size: 16px; font-weight: 600; }
        .form-label { font-size: 13px; font-weight: 600; color: #444; margin-bottom: 4px; }
        .form-control { font-size: 13px; border-radius: 6px; }
        .form-control:focus { border-color: #f5a425; box-shadow: 0 0 0 0.2rem rgba(245,164,37,0.2); }
        /* Delete modal */
        .delete-modal-icon {
            width: 60px; height: 60px; background: #fdecea;
            border-radius: 50%; display: flex; align-items: center;
            justify-content: center; margin: 0 auto 16px;
        }
        .delete-modal-icon i { font-size: 26px; color: #dc3545; }
        /* Empty state */
        .empty-state { padding: 50px 20px; text-align: center; color: #aaa; }
        .empty-state i { font-size: 40px; margin-bottom: 12px; display: block; }
        /* Pagination */
        .pagination .page-link { font-size: 13px; color: #1a1a2e; }
        .pagination .page-item.active .page-link { background: #f5a425; border-color: #f5a425; color: #fff; }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <div class="sidebar-brand">Car Rental <em>Admin</em></div>
    <nav class="nav flex-column mt-3">
        <a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fa fa-tachometer-alt"></i> Dashboard</a>
        <a class="nav-link" href="{{ route('admin.bookings') }}"><i class="fa fa-calendar"></i> Bookings</a>
        <a class="nav-link active" href="{{ route('admin.users') }}"><i class="fa fa-users"></i> Users</a>
        <a class="nav-link" href="{{ route('admin.audit-logs') }}"><i class="fa fa-list"></i> Audit Logs</a>
        <hr style="border-color: rgba(255,255,255,0.1);">
        <a class="nav-link" href="{{ route('home') }}"><i class="fa fa-globe"></i> View Site</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="nav-link btn btn-link text-left" style="width:100%;">
                <i class="fa fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </nav>
</div>

<!-- Main Content -->
<div class="main-content">
    <div class="topbar">
        <h5><i class="fa fa-users" style="color:#f5a425; margin-right:8px;"></i> Users</h5>
        <span style="font-size:14px; color:#888;">Welcome, {{ auth()->user()->name }}</span>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-check-circle mr-2"></i>{{ session('success') }}
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle mr-2"></i>{{ session('error') }}
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
        </div>
    @endif

    <!-- Users Table Card -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center flex-wrap" style="gap:10px;">
            <span>
                All Users
                <span class="text-muted" style="font-weight:400; font-size:13px;">({{ $users->total() }} total)</span>
            </span>
            <div class="d-flex align-items-center flex-wrap" style="gap:10px;">
                <!-- Search -->
                <div class="search-box">
                    <i class="fa fa-search"></i>
                    <input type="text" id="searchInput" class="form-control" placeholder="Search name or email...">
                </div>
                <!-- Role Filter -->
                <select id="roleFilter" class="form-control" style="font-size:13px; height:36px; width:130px; border-radius:6px;">
                    <option value="">All Roles</option>
                    <option value="admin">Admin</option>
                    <option value="staff">Staff</option>
                    <option value="user">User</option>
                </select>
                <!-- Add User -->
                <button class="btn-add" data-toggle="modal" data-target="#userModal" onclick="openAddModal()">
                    <i class="fa fa-plus mr-1"></i> Add User
                </button>
            </div>
        </div>

        <div class="card-body p-0">
            <table class="table table-hover mb-0" id="usersTable">
                <thead>
                    <tr>
                        <th style="padding-left:20px;">ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Joined</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr data-name="{{ strtolower($user->name) }}"
                        data-email="{{ strtolower($user->email) }}"
                        data-role="{{ $user->role }}">
                        <td style="padding-left:20px; color:#aaa;">#{{ $user->id }}</td>
                        <td>
                            <div class="user-cell">
                                <div class="avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
                                {{ $user->name }}
                            </div>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->role === 'admin')
                                <span class="badge-admin">Admin</span>
                            @elseif($user->role === 'staff')
                                <span class="badge-staff">Staff</span>
                            @else
                                <span class="badge-user">User</span>
                            @endif
                        </td>
                        <td>{{ $user->created_at->format('d M Y') }}</td>
                        <td class="text-center">
                            <button class="btn-edit"
                                onclick="openEditModal({{ $user->id }}, '{{ addslashes($user->name) }}', '{{ $user->email }}', '{{ $user->role }}')">
                                <i class="fa fa-pencil-alt"></i> Edit
                            </button>
                            @if($user->id !== auth()->id())
                                <button class="btn-delete ml-1"
                                    onclick="openDeleteModal({{ $user->id }}, '{{ addslashes($user->name) }}')">
                                    <i class="fa fa-trash"></i> Delete
                                </button>
                            @else
                                <button class="btn-delete ml-1" disabled
                                    style="opacity:0.4; cursor:not-allowed;"
                                    title="You cannot delete your own account">
                                    <i class="fa fa-trash"></i> Delete
                                </button>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">
                            <div class="empty-state">
                                <i class="fa fa-users"></i>
                                No users found.
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <div id="noResults" class="empty-state" style="display:none;">
                <i class="fa fa-search"></i>
                No users match your search.
            </div>
        </div>

        @if($users->hasPages())
        <div class="card-footer bg-white border-top-0 d-flex justify-content-between align-items-center"
             style="font-size:13px; color:#888; padding: 14px 20px;">
            <span>Showing {{ $users->firstItem() }}–{{ $users->lastItem() }} of {{ $users->total() }}</span>
            {{ $users->links() }}
        </div>
        @endif
    </div>
</div>

<!-- ====== ADD / EDIT USER MODAL ====== -->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalTitle">Add New User</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form id="userForm" method="POST">
                @csrf
                <span id="methodField"></span>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Full Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="fieldName" class="form-control"
                            placeholder="e.g. Ahmad Razif" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email Address <span class="text-danger">*</span></label>
                        <input type="email" name="email" id="fieldEmail" class="form-control"
                            placeholder="e.g. ahmad@email.com" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Role <span class="text-danger">*</span></label>
                        <select name="role" id="fieldRole" class="form-control" required>
                            <option value="user">User</option>
                            <option value="staff">Staff</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">
                            Password
                            <span class="text-danger" id="passwordRequired">*</span>
                        </label>
                        <input type="password" name="password" id="fieldPassword" class="form-control"
                            placeholder="Min. 8 characters">
                        <small id="passwordHint" class="text-muted" style="display:none;">
                            Leave blank to keep current password.
                        </small>
                    </div>
                    <div class="form-group">
                        <label class="form-label">
                            Confirm Password
                            <span class="text-danger" id="confirmRequired">*</span>
                        </label>
                        <input type="password" name="password_confirmation" id="fieldPasswordConfirm"
                            class="form-control" placeholder="Re-enter password">
                    </div>

                    @if($errors->any())
                    <div class="alert alert-danger py-2" style="font-size:13px;">
                        <ul class="mb-0 pl-3">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="userSubmitBtn" class="btn btn-sm"
                        style="background:#1a1a2e; color:#fff; font-weight:600; padding:7px 20px;">
                        <i class="fa fa-save mr-1"></i> Save User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ====== DELETE CONFIRM MODAL ====== -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body text-center py-4">
                <div class="delete-modal-icon">
                    <i class="fa fa-trash"></i>
                </div>
                <h6 style="font-weight:700; color:#1a1a2e; margin-bottom:6px;">Delete User?</h6>
                <p style="font-size:13px; color:#666; margin-bottom:20px;">
                    You are about to delete <strong id="deleteUserName"></strong>.
                    This action cannot be undone.
                </p>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary btn-sm mr-2" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="fa fa-trash mr-1"></i> Yes, Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script>
    // ── ADD modal ──────────────────────────────────────────────
    function openAddModal() {
        document.getElementById('userModalTitle').textContent = 'Add New User';
        document.getElementById('userSubmitBtn').innerHTML = '<i class="fa fa-plus mr-1"></i> Add User';
        document.getElementById('userForm').action = '{{ route("admin.users.store") }}';
        document.getElementById('methodField').innerHTML = '';

        document.getElementById('fieldName').value            = '';
        document.getElementById('fieldEmail').value           = '';
        document.getElementById('fieldRole').value            = 'user';
        document.getElementById('fieldPassword').value        = '';
        document.getElementById('fieldPasswordConfirm').value = '';

        document.getElementById('fieldPassword').required        = true;
        document.getElementById('fieldPasswordConfirm').required = true;
        document.getElementById('passwordRequired').style.display = 'inline';
        document.getElementById('confirmRequired').style.display  = 'inline';
        document.getElementById('passwordHint').style.display     = 'none';
    }

    // ── EDIT modal ─────────────────────────────────────────────
    function openEditModal(id, name, email, role) {
        document.getElementById('userModalTitle').textContent = 'Edit User';
        document.getElementById('userSubmitBtn').innerHTML = '<i class="fa fa-save mr-1"></i> Save Changes';

        document.getElementById('userForm').action = '/admin/users/' + id;
        document.getElementById('methodField').innerHTML =
            '<input type="hidden" name="_method" value="PUT">';

        document.getElementById('fieldName').value            = name;
        document.getElementById('fieldEmail').value           = email;
        document.getElementById('fieldRole').value            = role;
        document.getElementById('fieldPassword').value        = '';
        document.getElementById('fieldPasswordConfirm').value = '';

        document.getElementById('fieldPassword').required        = false;
        document.getElementById('fieldPasswordConfirm').required = false;
        document.getElementById('passwordRequired').style.display = 'none';
        document.getElementById('confirmRequired').style.display  = 'none';
        document.getElementById('passwordHint').style.display     = 'block';

        $('#userModal').modal('show');
    }

    // ── DELETE modal ───────────────────────────────────────────
    function openDeleteModal(id, name) {
        document.getElementById('deleteUserName').textContent = name;
        document.getElementById('deleteForm').action = '/admin/users/' + id;
        $('#deleteModal').modal('show');
    }

    // ── Client-side search + role filter ──────────────────────
    function applyFilters() {
        const search = document.getElementById('searchInput').value.toLowerCase();
        const role   = document.getElementById('roleFilter').value.toLowerCase();
        const rows   = document.querySelectorAll('#usersTable tbody tr[data-name]');
        let visible  = 0;

        rows.forEach(row => {
            const nameMatch  = row.dataset.name.includes(search);
            const emailMatch = row.dataset.email.includes(search);
            const roleMatch  = role === '' || row.dataset.role === role;

            if ((nameMatch || emailMatch) && roleMatch) {
                row.style.display = '';
                visible++;
            } else {
                row.style.display = 'none';
            }
        });

        document.getElementById('noResults').style.display = visible === 0 ? 'block' : 'none';
    }

    document.getElementById('searchInput').addEventListener('input', applyFilters);
    document.getElementById('roleFilter').addEventListener('change', applyFilters);

    // ── Re-open modal if validation failed ────────────────────
    @if($errors->any())
        $('#userModal').modal('show');
    @endif
</script>
</body>
</html>
