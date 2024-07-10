@extends('layouts.content')
@section('main-content')
<div class="container">
    <div class="col-md-12">
        <div class="form-appl">
            <h3>{{ $title }}</h3>
            <form class="form1" method="post" action="@if (isset($edit->id)) {{ route('categories.update', ['id' => $edit->id]) }}@else{{ route('categories.store') }} @endif" enctype="multipart/form-data">
                @csrf





                <div class="form-group col-md-12 mb-3">
                    <label for="">Nome da Categoria</label>
                    <input class="form-control" type="text" name="name"  value="@if (isset($edit->id)) {{ $edit->name }}@else {{ old('name') }} @endif">
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-12 mb-3">
                    <label for="">Descrição</label>
                    <textarea name="description" id="description" class="form-control"value="@if (isset($edit->id)) {{ $edit->description }}@else {{ old('description') }} @endif"></textarea>
                    @error('description')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-12 mb-3">
                <x-input-label for="is_active" :value="__('Active')" />
                <select name="is_active" class="form-control" value="{{ old('is_active') }}">
                    <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>Sim</option>
                    <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Não</option>
                </select>
                </div>

                <input type="submit" class="btn btn-primary" value="Submit">
                <a class="btn btn-danger" href="{{ route('categories.index') }}">Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection


