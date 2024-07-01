
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-600">
                    <form method="post" action="{{ route('customers.store') }}" class="mt-6 space-y-6">
                        @csrf

                        <div>

                            <x-text-input id="user_id" name="user_id" type="hidden" class="mt-1 block w-full" autocomplete="user_id" value="{{Auth::user()->id}}" />

                        </div>


                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" autocomplete="name" required autofocus/>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="email" :value="__('E-mail')" />
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" autocomplete="new-email" required/>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
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
