<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{

    // List user's bookings
    public function index()
    {
        $bookings = Booking::where('user_id', Auth::id())
                           ->orderBy('created_at', 'desc')
                           ->get();
        return view('booking', compact('bookings'));
    }

    // Show create form
    public function create(Request $request)
    {
        $car = null;

        if ($request->has('car')) {
            $car = Car::find($request->car);
        }

        return view('bookings.create', compact('car'));
    }

    // Store new booking
    public function store(Request $request)
    {
        $validated = $request->validate([
            'car_name'        => 'required|string|max:100',
            'car_type'        => 'required|string|max:50',
            'pickup_date'     => 'required|date|after_or_equal:today',
            'return_date'     => 'required|date|after:pickup_date',
            'pickup_location' => 'required|string|max:255',
            'notes'           => 'nullable|string|max:500',
        ]);

        // Calculate total price (example: $50/day)
        $days  = \Carbon\Carbon::parse($validated['pickup_date'])
                               ->diffInDays($validated['return_date']);
        $price = $days * 50;

        $booking = Booking::create([
            'user_id'         => Auth::id(),
            'car_name'        => $validated['car_name'],
            'car_type'        => $validated['car_type'],
            'pickup_date'     => $validated['pickup_date'],
            'return_date'     => $validated['return_date'],
            'pickup_location' => $validated['pickup_location'],
            'total_price'     => $price,
            'notes'           => $validated['notes'],
            'status'          => 'pending',
        ]);

        AuditLog::log('booking_created', 'Booking created: ID ' . $booking->id, 'success');

        return redirect()->route('bookings.index')
                         ->with('success', 'Booking created successfully!');
    }

    // Show single booking
    public function show(Booking $booking)
    {
        // Prevent users from viewing others' bookings
        if ($booking->user_id !== Auth::id() && !Auth::user()->isAdmin()) {
            abort(403);
        }

        return view('bookings.show', compact('booking'));
    }

    // Show edit form
    public function edit(Booking $booking)
    {
        if ($booking->user_id !== Auth::id()) {
            abort(403);
        }

        if ($booking->status !== 'pending') {
            return back()->with('error', 'Only pending bookings can be edited.');
        }

        return view('bookings.edit', compact('booking'));
    }

    // Update booking
    public function update(Request $request, Booking $booking)
    {
        if ($booking->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'car_name'        => 'required|string|max:100',
            'car_type'        => 'required|string|max:50',
            'pickup_date'     => 'required|date|after_or_equal:today',
            'return_date'     => 'required|date|after:pickup_date',
            'pickup_location' => 'required|string|max:255',
            'notes'           => 'nullable|string|max:500',
        ]);

        $days  = \Carbon\Carbon::parse($validated['pickup_date'])
                               ->diffInDays($validated['return_date']);
        $price = $days * 50;

        $booking->update([
            'car_name'        => $validated['car_name'],
            'car_type'        => $validated['car_type'],
            'pickup_date'     => $validated['pickup_date'],
            'return_date'     => $validated['return_date'],
            'pickup_location' => $validated['pickup_location'],
            'total_price'     => $price,
            'notes'           => $validated['notes'],
        ]);

        AuditLog::log('booking_updated', 'Booking updated: ID ' . $booking->id, 'success');

        return redirect()->route('bookings.index')
                         ->with('success', 'Booking updated successfully!');
    }

    // Cancel booking
    public function destroy(Booking $booking)
    {
        if ($booking->user_id !== Auth::id() && !Auth::user()->isAdmin()) {
            abort(403);
        }

        $booking->update(['status' => 'cancelled']);

        AuditLog::log('booking_cancelled', 'Booking cancelled: ID ' . $booking->id, 'success');

        return redirect()->route('bookings.index')
                         ->with('success', 'Booking cancelled successfully!');
    }

}
