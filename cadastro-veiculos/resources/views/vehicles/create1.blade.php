@extends('layout')

@section('content')
    <h1>Cadastrar Veículo</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('vehicles.store') }}" method="POST">
        @csrf 
        <div class="form-group">
            <label for="brand">Marca</label>
            <input type="text" name="brand" class="form-control" value="{{ old('brand') }}">
        </div>
        <div class="form-group">
            <label for="model">Modelo</label>
            <input type="text" name="model" class="form-control" value="{{ old('model') }}">
        </div>
        <div class="form-group">
            <label for="plate">Placa</label>
            <input type="text" name="plate" class="form-control" value="{{ old('plate') }}">
        </div>
        <div class="form-group">
            <label for="year">Ano</label>
            <input type="text" name="year" class="form-control" value="{{ old('year') }}">
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
@endsection
