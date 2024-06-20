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

                    <form method="post" action="{{ route('vehicles.store') }}" class="mt-6 space-y-6">
                        @csrf

                        <div>
                            <x-text-input id="user_id" name="user_id" type="hidden" class="mt-1 block w-full" autocomplete="user_id" value="{{Auth::user()->id}}" />
                        </div>

                        <div>
                            <x-input-label for="plate" :value="__('Plate')" />
                            <x-text-input id="plate" name="plate" type="text" class="mt-1 block w-full"  autocomplete="plate" required autofocus/>
                            <x-input-error :messages="$errors->get('plate')" class="mt-2" />

                        </div>

                        <div>
                            <x-input-label for="brand" :value="__('Brand')" />
                            <x-text-input id="brand" name="brand" type="text" class="mt-1 block w-full" autocomplete="brand" required autofocus/>
                            <x-input-error :messages="$errors->get('brand')" class="mt-2" />

                        </div>
                        <div>
                            <x-input-label for="model" :value="__('Model')" />
                            <x-text-input id="model" name="model" type="text" class="mt-1 block w-full" autocomplete="model" required autofocus/>
                            <x-input-error :messages="$errors->get('model')" class="mt-2" />

                        </div>


                        <div>
                            <x-input-label for="prefix" :value="__('Prefix')" />
                            <x-text-input id="prefix" name="prefix" type="text" class="mt-1 block w-full" autocomplete="prefix" required autofocus/>
                            <x-input-error :messages="$errors->get('prefix')" class="mt-2" />

                        </div>
                        <div>
                            <x-input-label for="year" :value="__('Year')" />
                            <x-text-input id="year" name="year" type="text" class="mt-1 block w-full" autocomplete="year" required autofocus/>
                            <x-input-error :messages="$errors->get('year')" class="mt-2" />


                            <x-input-label for="price" :value="__('Price')" />
                            <x-text-input id="price" name="price" type="text" class="mt-1 block w-full" autocomplete="price" required autofocus/>
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />



                        </div>

                        <div class="form-group">

                            <x-input-label for="type" :value="__('Type')" />
                            <select name="type" class="form-control">
                                <option value="car" {{ old('type') == 'car' ? 'selected' : '' }}>Carro</option>
                                <option value="truck" {{ old('type') == 'truck' ? 'selected' : '' }}>Caminhão</option>
                                <option value="motorcycle" {{ old('type') == 'motorcycle' ? 'selected' : '' }}>Moto</option>
                            </select>


                            <x-input-label for="characterized" :value="__('Characterized')" />
                            <select name="characterized" class="form-control" value="{{ old('characterized') }}">
                                <option value="1" {{ old('active') == '1' ? 'selected' : '' }}>Sim</option>
                                <option value="0" {{ old('active') == '0' ? 'selected' : '' }}>Não</option>
                            </select>

                            <x-input-label for="active" :value="__('Active')" />
                            <select name="active" class="form-control" value="{{ old('active') }}">
                                <option value="1" {{ old('active') == '1' ? 'selected' : '' }}>Sim</option>
                                <option value="0" {{ old('active') == '0' ? 'selected' : '' }}>Não</option>
                            </select>
                        </div>



                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Create') }}</x-primary-button>
                        </div>
                        <div class="mb-3">
                            @if (@session('msg'))
                            <p> {{session('msg')}} </p>
                            @endif

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>




</section>









