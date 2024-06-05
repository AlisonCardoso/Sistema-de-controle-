@extends('layout.layout')

@section('content')
    <div class="mt-5">
        <h1>Adicionar  Vehicle</h1>
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
                <label for="prefix">Prefixo</label>
                <input type="text" name="prefix" class="form-control" value="{{ old('prefix') }}">
            </div>
            <div class="form-group">
                <label for="year">Ano de Fabricação</label>
                <input type="text" name="year" class="form-control" value="{{ old('year') }}">
            </div>
            <div class="form-group">
                <label for="price">Preço da tabela FIPE</label>
                <input type="text" name="price" class="form-control" value="{{ old('price') }}">
            </div>
            <div class="form-group">
                <label for="type">Tipo de veículo</label>
                <select name="type" class="form-control">
                    <option value="car" {{ old('type') == 'car' ? 'selected' : '' }}>Car</option>
                    <option value="truck" {{ old('type') == 'truck' ? 'selected' : '' }}>Truck</option>
                    <option value="motorcycle" {{ old('type') == 'motorcycle' ? 'selected' : '' }}>Motorcycle</option>
                </select>
            </div>
            <div class="form-group">
                <label for="characterized">characterized</label>
                <select name="characterized" class="form-control" value="{{ old('characterized') }}">
                    <option value="1" {{ old('active') == '1' ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ old('active') == '0' ? 'selected' : '' }}>No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="active">Active</label>
                <select name="active" class="form-control" value="{{ old('active') }}">
                    <option value="1" {{ old('active') == '1' ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ old('active') == '0' ? 'selected' : '' }}>No</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
@endsection
