@extends('layout')

@section('content')
    <h1>Vehicles</h1>
    <a href="{{ route('vehicles.create') }}" class="btn btn-primary">Cadastrar novo Veículo</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @endif


    <table class="table-secondary">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Marca</th>
                <th scope="col">Modelo</th>
                <th scope="col">Placa</th>
                <th scope="col">Ano</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>
             
            
       
        @foreach ($vehicles as $vehicle)
        <tr>
            //<td scope="row">{{ $vehicle->id }} </td>
            <td>{{ $vehicle->brand }}</td>
            <td>{{ $vehicle->model }}</td>
            <td>{{ $vehicle->plate }}</td>
            <td>{{ $vehicle->year }}</td>
            <td>
                <a href="{{ route('vehicles.show', $vehicle->id) }}" class="btn btn-info">Mostrar</a>
                <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    </tbody>


        @endforeach
    </table>
@endsection
