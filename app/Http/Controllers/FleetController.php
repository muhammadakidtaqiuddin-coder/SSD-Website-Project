<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FleetController extends Controller
{
    // GET /admin/fleet
    public function index()
    {
        $cars = Car::latest()->paginate(12);
        return view('admin.fleet.index', compact('cars'));
    }

    // GET /admin/fleet/create
    public function create()
    {
        return view('admin.fleet.create');
    }

    // POST /admin/fleet
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:100',
            'brand'         => 'required|string|max:50',
            'model'         => 'required|string|max:100',
            'year'          => 'required|digits:4|integer|min:2000|max:' . (date('Y') + 1),
            'color'         => 'nullable|string|max:50',
            'description'   => 'nullable|string|max:500',
            'category'      => 'required|string',
            'transmission'  => 'required|in:Auto,Manual',
            'fuel_type'     => 'required|in:Petrol,Diesel,Electric,Hybrid',
            'seats'         => 'required|integer|min:2|max:20',
            'engine_cc'     => 'nullable|integer|min:600|max:8000',
            'mileage'       => 'nullable|integer|min:0',
            'features'      => 'nullable|array',
            'features.*'    => 'string',
            'image'         => 'nullable|image|mimes:jpeg,png,webp|max:2048',
            'price_per_day' => 'required|numeric|min:0',
            'deposit'       => 'nullable|numeric|min:0',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('cars', 'public');
        }

        // Handle checkboxes (unchecked = not in request)
        $validated['is_available'] = $request->has('is_available');
        $validated['is_featured']  = $request->has('is_featured');
        $validated['deposit']      = $validated['deposit'] ?? 0;

        Car::create($validated);

        return redirect()->route('admin.fleet')
            ->with('success', 'Car "' . $validated['name'] . '" added to fleet successfully!');
    }

    // GET /admin/fleet/{car}/edit
    public function edit(Car $car)
    {
        return view('admin.fleet.edit', compact('car'));
    }

    // PUT /admin/fleet/{car}
    public function update(Request $request, Car $car)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:100',
            'brand'         => 'required|string|max:50',
            'model'         => 'required|string|max:100',
            'year'          => 'required|digits:4|integer|min:2000|max:' . (date('Y') + 1),
            'color'         => 'nullable|string|max:50',
            'description'   => 'nullable|string|max:500',
            'category'      => 'required|string',
            'transmission'  => 'required|in:Auto,Manual',
            'fuel_type'     => 'required|in:Petrol,Diesel,Electric,Hybrid',
            'seats'         => 'required|integer|min:2|max:20',
            'engine_cc'     => 'nullable|integer|min:600|max:8000',
            'mileage'       => 'nullable|integer|min:0',
            'features'      => 'nullable|array',
            'features.*'    => 'string',
            'image'         => 'nullable|image|mimes:jpeg,png,webp|max:2048',
            'price_per_day' => 'required|numeric|min:0',
            'deposit'       => 'nullable|numeric|min:0',
        ]);

        // Replace image if new one uploaded
        if ($request->hasFile('image')) {
            if ($car->image) Storage::disk('public')->delete($car->image);
            $validated['image'] = $request->file('image')->store('cars', 'public');
        }

        $validated['is_available'] = $request->has('is_available');
        $validated['is_featured']  = $request->has('is_featured');
        $validated['deposit']      = $validated['deposit'] ?? 0;

        $car->update($validated);

        return redirect()->route('admin.fleet')
            ->with('success', 'Car updated successfully!');
    }

    // DELETE /admin/fleet/{car}
    public function destroy(Car $car)
    {
        if ($car->image) {
            Storage::disk('public')->delete($car->image);
        }

        $car->delete();

        return redirect()->route('admin.fleet')
            ->with('success', 'Car removed from fleet.');
    }

    // PATCH /admin/fleet/{car}/toggle
    public function toggleAvailability(Car $car)
    {
        $car->update(['is_available' => !$car->is_available]);

        return back()->with('success', 'Car availability updated.');
    }
}
