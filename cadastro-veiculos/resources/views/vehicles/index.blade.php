@extends('layout.layout')

@section('content')
    <div class="mt-5">
        <h1>Vehicle List</h1>
        <a href="{{ route('vehicles.create') }}" class="btn btn-primary mb-3">Add Vehicle</a>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Plate</th>
                <th>Year</th>
                <th>Price</th>
                <th>Type</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($vehicles as $vehicle)
                <tr>
                    <td>{{ $vehicle->id }}</td>
                    <td>{{ $vehicle->brand }}</td>
                    <td>{{ $vehicle->model }}</td>
                    <td>{{ $vehicle->plate }}</td>
                    <td>{{ $vehicle->year }}</td>
                    <td>{{ $vehicle->price }}</td>
                    <td>{{ $vehicle->type }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('vehicles.show', $vehicle->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('vehicles.edit', $vehicle->id) }}">Edit</a>
                        <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
