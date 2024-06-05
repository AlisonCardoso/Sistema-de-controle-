@extends('layout')

@section('content')
    <h1>Create User and Vehicle</h1>

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

        <h2>User Information</h2>
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        <h2>Vehicle Information</h2>
        <div class="form-group">
            <label for="brand">Marca</label>
            <input type="text" name="brand" class="form-control" value="{{ old('brand') }}">
        </div>
        <div class="form-group">
            <label for="model">Modelo</label>
            <input type="text" name="model" class="form-control" value="{{ old('model') }}">
        </div>
        <div class="form-group">
            <label for="plate">placa</label>
            <input type="text" name="plate" class="form-control" value="{{ old('plate') }}">
        </div>
        <div class="form-group">
            <label for="year">Ano</label>
            <input type="text" name="year" class="form-control" value="{{ old('year') }}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
