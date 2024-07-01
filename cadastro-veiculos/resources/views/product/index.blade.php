@extends('layout.layout')
@section('content')
<div class="container">

    <div class="row d-flex justify-content-center mt-4">
        <div class="col md-10 d-flex justify-content-end">
            <a href="{{route('products.create')}}" class="btn btn-dark ml-3"> Criar produto</a>
        </div>
    </div>


<div class="row d-flex justify-content-center">

    @if (Session::has('sucess'))
    <div class="col-md-10 mt-4">
        <div class="alert- alert-sucess"></div>
        {{Session::get('sucess')}}
    </div>



    @endif
</div>
<h3>lista de produtos com foto</h3>




</div>





    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<table class="table table-bordered table-striped" id="produtos-lista">

    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>MARCA</th>
        <th>DESCRICAO</th>
        <th>PREÇO</th>

        
        <th width="300px">Action</th>
    </tr>
    @foreach ($products as $product)
        <tr>

            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->brand }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>

        </tr>
              <div class="flex items-center gap-3">

                <a class="btn btn-info" href="{{ route('products.show', $product->id) }}">{{ __('Mostrar') }}</a>

                <a class="btn btn-dark" href="{{ route('products.edit', $product->id) }}">{{ __('Editar') }}</a>

                    @if (session('status') === 'products-updated')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600"
                        >{{ __('Saved.') }}</p>
                    @endif





                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline">
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



@endsection
