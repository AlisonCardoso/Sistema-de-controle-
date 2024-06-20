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







                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>

                          </tr>
                        </thead>
                        <tbody>

                            @foreach ($customers as $clientes)
                            <tr>
                            <th scope="row">{{$clientes->name}}</th>
                            <th scope="row">{{$clientes->email}}</th>

                            </tr>
                                  <div class="flex items-center gap-3">

                                    <a class="btn btn-info" href="{{ route('customers.show', $customer->id) }}">{{ __('Mostrar') }}</a>

                                    <a class="btn btn-info" href="{{ route('customers.edit', $customer->id) }}">{{ __('Editar') }}</a>

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
