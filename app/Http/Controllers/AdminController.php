<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    // Admin dashboard
    public function dashboard()
    {
        $totalUsers    = User::where('role', 'user')->count();
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
        $bookings = Booking::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.bookings', compact('bookings'));
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
        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin.users', compact('users'));
    }

    // View audit logs
    public function auditLogs()
    {
        $logs = AuditLog::with('user')->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.audit-logs', compact('logs'));
    }
}
