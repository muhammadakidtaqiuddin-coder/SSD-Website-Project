<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   /* public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }*/

    /*public function dashboard()
    {
        return view('admin.dashboard');
    }*/

    // Admin dashboard
    public function dashboard()
    {
        $totalUsers    = User::count();
        $totalBookings = Booking::count();
        $pendingBookings = Booking::where('status', 'pending')->count();
        $recentBookings  = Booking::with('user')->orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalBookings',
            'pendingBookings',
            'recentBookings'
        ));
    }

    // View all bookings
    public function bookings()
{
    $bookings = Booking::with('user')
        ->orderBy('created_at', 'desc')
        ->get();

    $totalBookings = Booking::count();
    $pendingBookings = Booking::where('status', 'pending')->count();
    $recentBookings = Booking::with('user')
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();

    return view('admin.bookings', compact(
        'bookings',
        'totalBookings',
        'pendingBookings',
        'recentBookings'
    ));
}

    // Update booking status
    public function updateBookingStatus(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        $booking->update(['status' => $request->status]);

        AuditLog::log(
            'admin_booking_updated',
            'Admin updated booking ID ' . $booking->id . ' to ' . $request->status,
            'success'
        );

        return back()->with('success', 'Booking status updated!');
    }

    // View all users
    public function users()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(15);

        return view('admin.users', compact('users'));
    }

    // Create a new user
    public function storeUser(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'role'     => 'required|in:user,staff,admin',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'role'     => $request->role,
            'password' => bcrypt($request->password),
        ]);

        AuditLog::log(
            'admin_user_created',
            'Admin created user: ' . $request->email,
            'success'
        );

        return back()->with('success', 'User created successfully.');
    }

    // Update an existing user
    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'role'     => 'required|in:user,staff,admin',
            'password' => 'nullable|min:8|confirmed',
        ]);

        $data = [
            'name'  => $request->name,
            'email' => $request->email,
            'role'  => $request->role,
        ];

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        AuditLog::log(
            'admin_user_updated',
            'Admin updated user ID ' . $user->id . ' (' . $user->email . ')',
            'success'
        );

        return back()->with('success', 'User updated successfully.');
    }

    // Delete a user
    public function destroyUser(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot delete your own account.');
        }

        AuditLog::log(
            'admin_user_deleted',
            'Admin deleted user: ' . $user->email,
            'success'
        );

        $user->delete();

        return back()->with('success', 'User deleted successfully.');
    }

    // View audit logs
    public function auditLogs()
    {
        $logs = AuditLog::with('user')->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.audit-logs', compact('logs'));
    }
}
