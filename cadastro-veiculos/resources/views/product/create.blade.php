@extends('layout.layout')
@section('content')

<div class="bg-dark py-3">
    <h3 class="text-white text-center">cadastro de produtos</h3>
</div>
<div class="container">
    <div class="row d-flex justify-content-center mt-4">
        <div class="col md-10 d-flex justify-content-end">
            <a href="{{route('products.index')}}" class="btn btn-dark"> voltar</a>
        </div>
    </div>
    <div class="row d-flex jistify-content-center">
        <div class="col-md-10">
            <div class="card borde-0 shadow-lg my-3">
                <div class="card-header bg-dark">
                    <h3 class="text-white">Novo Produto</h3>
                </div>
                <form enctype="multipart/form-data" action="{{route('products.store')}}" method="post">
                    @csrf

                    <div class="card-body">

                    <div class="mb-3">
                        <label for="name" class="form-label h5">Nome</label>
                        <input :value="old('name')" type="text" class="@error('name')is-invalid @enderror form-control form-control-lg " id="name" autocomplete="name" required placeholder="Nome" name="name">
                        @error('name')
                            <p class="invalid-feedback">{{ $message}}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="brand" class="form-label h5">Marca</label>
                        <input :value="old('brand')" type="text" class="@error('brand')is-invalid @enderror form-control form-control-lg " id="brand" placeholder="Marca" name="brand">
                        @error('brand')
                        <p class="invalid-feedback">{{ $message}}</p>
                    @enderror
                    </div>

                    <div class="mb-3">
                        <Preço for="price" class="form-label h5" > Preço</label>
                        <input type="text" :value="old('price')" class=" @error('price')is-invalid @enderror form-control form-control-lg " id="price" placeholder="Preço" name="price">
                        @error('price')
                        <p class="invalid-feedback">{{ $message}}</p>
                    @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label h5">Descrição</label>
                        <textarea name="description" id="description" cols="30" rows="5"  class="form-control form-control-lg" :value="old('description')">  </textarea>

                    </div>



                    <div class="mb-3">
                        <label for="image" class="form-label h5">Imagem</label>
                        <input type="file" :value="old('image')" class="form-control form-control-lg " id="image" name="imagem">
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary"type="submit" >Enviar</button>

                    </div>




                </div>

                </form>

            </div>

        </div>


@endsection
