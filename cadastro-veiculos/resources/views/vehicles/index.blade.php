@extends('layout')

@section('content')
    <h1>Vehicles</h1>
    <a href="{{ route('vehicles.create') }}" class="btn btn-primary">Create New Vehicle</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @endif

    <table class="table">
        <tr>
            <th>Brand</th>
            <th>Model</th>
            <th>Plate</th>
            <th>Year</th>
            <th>Actions</th>
        </tr>
        @foreach ($vehicles as $vehicle)
        <tr>
            <td>{{ $vehicle->brand }}</td>
            <td>{{ $vehicle->model }}</td>
            <td>{{ $vehicle->plate }}</td>
            <td>{{ $vehicle->year }}</td>
            <td>
                <a href="{{ route('vehicles.show', $vehicle->id) }}" class="btn btn-info">Show</a>
                <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
