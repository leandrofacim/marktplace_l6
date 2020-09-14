@extends('layouts.app')

@section('content')

<h1>Atualizar Produto</h1>
<form action="{{route('admin.products.update', ['product'=> $products->id])}}" method="post">
    @csrf
    @method('PUT')
    
    <div class="form-group">
        <label for="">Nome Produto</label>
        <input class="form-control" type="text" name="name"  value="{{$products->name}}">
    </div>
    <div class="form-group">
        <label for="">Descrição</label>
        <input class="form-control" type="text" name="description"  value="{{$products->description}}">
    </div>
    <div class="form-group">
        <label for="">Conteúdo</label>
        <textarea class="form-control" name="body" cols="30" rows="10" >{{$products->body}}</textarea>
    </div>
    <div class="form-group">
        <label for="">Preço</label>
        <input class="form-control" type="text" name="price"  value="{{$products->price}}">
    </div>
    <div class="form-group">
        <label for="">Slug</label>
        <input class="form-control" type="text" name="slug" value="{{$products->slug}}">
    </div>

    <div>
        <button class="btn btn-success" type="submit">Atualizar Produto</button>
    </div>
</form>


@endsection