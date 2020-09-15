@extends('layouts.app')

@section('content')
<h1>Criar Produto</h1>
<form action="{{route('admin.products.store')}}" method="post" enctype="multipart/form-data">
   @csrf
   
    <div class="form-group">
        <label for="">Nome Produto</label>
        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name">
        @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Descrição</label>
        <input class="form-control  @error('description') is-invalid @enderror" type="text" name="description">
        @error('description')
        <div class="invalid-feedback">
            {{$message}}
        </div>
    @enderror
    </div>
    <div class="form-group">
        <label for="">Conteúdo</label>
        <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="" cols="30" rows="10"></textarea>
        @error('body')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Preço</label>
        <input class="form-control @error('price') is-invalid @enderror" type="text" name="price">
        @error('price')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Categoria</label>
        <select class="selectpicker form-control" id="select-category" title="Selecione as Categorias" multiple data-live-search="true" name="categories[]">
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Fotos do Produto</label>
        <input type="file" class="form-control" name="photos[]" multiple>
    </div>
    <div class="form-group">
        <label for="">Slug</label>
        <input class="form-control" type="text" name="slug">
    </div>
    <div>
        <button class="btn btn-success" type="submit">Criar Produto</button>
    </div>
</form>

@endsection

<script>
$(function () {
    $('select').selectpicker();
});
</script>
