<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display all cars
     */
    public function index()
    {
        $cars = Car::orderBy('created_at', 'desc')->get();

        return view('cars', compact('cars'));
    }

    /**
     * Show single car details
     */
    public function show($id)
    {
        $car = Car::findOrFail($id);

        return view('car-details', compact('car'));
    }

    /**
     * Admin - create new car
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:100',
            'brand'         => 'required|string|max:100',
            'price_per_day' => 'required|numeric|min:1',
            'image'         => 'nullable|string',
            'description'   => 'nullable|string',
        ]);

        Car::create($validated);

        return back()->with('success', 'Car added successfully!');
    }

    /**
     * Admin - update car
     */
    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);

        $validated = $request->validate([
            'name'          => 'required|string|max:100',
            'brand'         => 'required|string|max:100',
            'price_per_day' => 'required|numeric|min:1',
            'image'         => 'nullable|string',
            'description'   => 'nullable|string',
        ]);

        $car->update($validated);

        return back()->with('success', 'Car updated successfully!');
    }

    /**
     * Admin - delete car
     */
    public function destroy($id)
    {
        $car = Car::findOrFail($id);

        $car->delete();

        return back()->with('success', 'Car deleted successfully!');
    }
}
