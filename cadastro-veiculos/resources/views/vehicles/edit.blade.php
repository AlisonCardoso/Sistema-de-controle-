@extends('layout')

@section('content')
    <h1>Editar Veículo</h1>

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
            <label for="brand">Marca</label>
            <input type="text" name="brand" class="form-control" value="{{ $vehicle->brand }}">
        </div>
        <div class="form-group">
            <label for="model">Modelo</label>
            <input type="text" name="model" class="form-control" value="{{ $vehicle->model }}">
        </div>
        <div class="form-group">
            <label for="plate">Placa</label>
            <input type="text" name="plate" class="form-control" value="{{ $vehicle->plate }}">
        </div>
        <div class="form-group">
            <label for="year">Ano</label>
            <input type="text" name="year" class="form-control" value="{{ $vehicle->year }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
