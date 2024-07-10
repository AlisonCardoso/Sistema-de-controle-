@extends('layouts.content')
@section('main-content')
<div class="container">
    <h2>

    </h2>
    <div class="text-end mb-5">
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Nova Categoria</a>
    </div>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <table class="table table-bordered table-striped text-center">
        <thead class="thead-dark">
            <tr>
            <th scope="col">ID</th>
            <th scope="col">NOME</th>
            <th scope="col">descriçao</th>
            <th scope="col">Ativa</th>
            <th scope="col">Açoes</th>

            </tr>
        </thead>

            <tbody>
                @forelse($categories as $category)
                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <th scope="row">{{$category->name}}</th>
                    <th scope="row">{{$category->description}}</th>
                      <td>    @if ($category->is_active) Ativo @else Inativo   @endif   </th>

                    <th scope="row">
                      <div class="flex items-center gap-3">
                      <a class="btn btn-info" href="{{ route('categories.show', $category->id) }}">{{ __('Mostrar') }}</a>
                      <a class="btn btn-dark" href="{{ route('categories.edit', $category->id) }}">{{ __('Editar') }}</a>
                      <a class="btn btn-danger" href="{{ route('categories.destroy', $category->id) }}">{{ __('Excluir') }}</a>

                    </th>
                </tr>


                @empty
                <tr>
                    <td colspan="5">No Users Found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@include ('admin.modal_delete')
@endsection

@push('js')
<script>
    function deleteFunction(id) {
        document.getElementById('delete_id').value = id;
        $("#modalDelete").modal('show');
    }
</script>
@endpush


