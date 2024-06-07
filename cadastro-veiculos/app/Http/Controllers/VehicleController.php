<?php
namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class VehicleController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index()
    {
        $vehicles = Auth::user()->vehicles;
        return view('vehicles.index', compact('vehicles'));
    }


    public function create()
    {
        return view('vehicles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'plate' => 'required|string|max:255|unique:vehicles',
            'prefix' => 'required|string|max:8|unique:vehicles',
            'year' => 'required|digits:4|integer|min:1900|max:' . (date('Y')),
            'characterized' => 'required',
            'active' => 'required',
            'price' => 'required|numeric|min:0',
            'type' => 'required|in:car,truck,motorcycle',


        ]);

    Auth::user()-> Vehicle::create($request->all());

        return redirect()->route('vehicles.index')->with('success', 'Vehicle created successfully.');
    }

    public function show($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('vehicles.show', compact('vehicle'));
    }

    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'plate' => 'required|string|max:255|unique:vehicles,plate,' . $id,
            'prefix' => 'required|string|max:8|unique:vehicles,prefix,' . $id,
            'year' => 'required|digits:4|integer|min:1900|max:' . (date('Y')),
            'characterized' => 'required|boolean',
            'active' => 'required|boolean',
            'price' => 'required|numeric|min:0',
            'type' => 'required|in:car,truck,motorcycle',



        ]);

        $vehicle = Vehicle::findOrFail($id);
        $vehicle->update($request->all());

        return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully.');
    }

    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();

        return redirect()->route('vehicles.index')->with('success', 'Vehicle deleted successfully.');
    }
}
