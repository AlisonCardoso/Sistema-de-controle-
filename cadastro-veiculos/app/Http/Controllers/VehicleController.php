<?php

namespace App\Http\Controllers;

use App\Models\vehicle;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class VehicleController extends Controller

{
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        return view('vehicles.create');
    }

    public function store(Request $request)
    {
        $$request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'plate' => 'required|string|max:255|unique:vehicles',
            'year' => 'required|digits:4|integer|min:1900|max:' . (date('Y')),
        ]);

        DB::transaction(function () use ($request) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]); Vehicle::create([
                'user_id' => $user->id,
                'brand' => $request->brand,
                'model' => $request->model,
                'plate' => $request->plate,
                'year' => $request->year,
            ]);
        });

        Vehicle::create($request->all());

        return redirect()->route('vehicles.index')->with('success', 'Vehicle created successfully.');
    }

    public function show(Vehicle $vehicle)
    {
        return view('vehicles.show', compact('vehicle'));
    }

    public function edit(Vehicle $vehicle)
    {
        return view('vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'plate' => 'required|unique:vehicles,plate,' . $vehicle->id,
            'year' => 'required|digits:4|integer|min:1900|max:' . (date('Y')),
        ]);

        $vehicle->update($request->all());

        return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully.');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        return redirect()->route('vehicles.index')->with('success', 'Vehicle deleted successfully.');
    }
}
