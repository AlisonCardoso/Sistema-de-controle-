@extends('layout')

@section('content')
    <h1>Edit Vehicle</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('vehicles.update', $vehicle->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="brand">Brand</label>
            <input type="text" name="brand" class="form-control" value="{{ $vehicle->brand }}">
        </div>
        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" name="model" class="form-control" value="{{ $vehicle->model }}">
        </div>
        <div class="form-group">
            <label for="plate">Plate</label>
            <input type="text" name="plate" class="form-control" value="{{ $vehicle->plate }}">
        </div>
        <div class="form-group">
            <label for="year">Year</label>
            <input type="text" name="year" class="form-control" value="{{ $vehicle->year }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
