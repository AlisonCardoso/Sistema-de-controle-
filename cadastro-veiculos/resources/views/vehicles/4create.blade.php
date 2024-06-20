
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
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

    <form action="{{ route('vehicles.store') }}" method="POST" class="mt-6 space-y-6">
        @csrf



        <div class="form-group">
            <x-input-label for="user_id" >id usuario</x-input-label>
            <input type="text" name="user_id" class="form-control" value="{{ Auth::user()->id}}">
        </div>


       
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

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Cadastrar') }}</x-primary-button>
        </div>




    </form>
</div>
</div>
</div>
</div>
</x-app-layout>
