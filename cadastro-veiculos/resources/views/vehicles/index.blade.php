

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



    <div class="mt-5">
        <h1>Lista de Veículos</h1>





        <div class="flex items-center gap-4">


            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>




        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Placa</th>
                <th>Prefixo</th>

                <th>Ano de fabricação</th>
                <th>Preço da FIPE</th>
                <th>Tipo</th>
                <th width="300px">Action</th>
            </tr>
            @foreach ($vehicles as $vehicle)
                <tr>

                    <td>{{ $vehicle->id }}</td>
                    <td>{{ $vehicle->brand }}</td>
                    <td>{{ $vehicle->model }}</td>
                    <td>{{ $vehicle->plate }}</td>
                    <td>{{ $vehicle->prefix }}</td>
                    <td>{{ $vehicle->year }}</td>
                    <td>{{ $vehicle->price }}</td>
                    <td>{{ $vehicle->type }}</td>
                </tr>
                      <div class="flex items-center gap-3">

                        <a class="btn btn-info" href="{{ route('vehicles.show', $vehicle->id) }}">{{ __('Mostrar') }}</a>

                        <a class="btn btn-info" href="{{ route('vehicles.edit', $vehicle->id) }}">{{ __('Editar') }}</a>

                            @if (session('status') === 'vehicle-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600"
                                >{{ __('Saved.') }}</p>
                            @endif





                        <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <x-danger-button class="ms-3">{{ __('Delete') }}</x-danger-button>
                        </div>




                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

</x-app-layout>


