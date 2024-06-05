@extends('layout.layout')

@section('content')
    <h1>Vehicle Details</h1>

    <div class="form-group">
        <strong>Brand:</strong>
        {{ $vehicle->brand }}
    </div>
    <div class="form-group">
        <strong>Model:</strong>
        {{ $vehicle->model }}
    </div>
    <div class="form-group">
        <strong>Plate:</strong>
        {{ $vehicle->plate }}
    </div>
    <div class="form-group">
        <strong>Year:</strong>
        {{ $vehicle->year }}
    </div>

    <a href="{{ route('vehicles.index') }}" class="btn btn-primary">Back</a>
@endsection

