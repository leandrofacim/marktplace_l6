@extends('layouts.app')

@section('content')
<h1>Editar Loja</h1>

<form class="form" action="{{route('admin.stores.update', ['store' => $store->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="">Nome Loja</label>
        <input class="form-control" type="text" name="name" value="{{$store->name}}">
    </div>
    <div class="form-group">
        <label for="">Descrição</label>
        <input class="form-control" type="text" name="description" value="{{$store->description}}">
    </div>
    <div class="form-group">
        <label for="">Telefone</label>
        <input class="form-control" type="text" name="phone" value="{{$store->phone}}">
    </div>
    <div class="form-group">
        <label for="">Celular</label>
        <input class="form-control" type="text" name="mobile_phone" value="{{$store->mobile_phone}}">
    </div>
    <div class="form-group">
        <p>
            <img src="{{asset('storage/' . $store->logo)}}" alt="logo">
        </p>
        <label>Logo</label>
        <input type="file" class="form-control" name="logo">
    </div>
    <div class="form-group">
        <label for="">Slug</label>
        <input class="form-control" type="text" name="slug" value="{{$store->slug}}">
    </div>
    <div>
        <button class="btn btn-success" type="submit">Atualizar Loja</button>
        <a class="btn btn-primary" href="{{route('admin.stores.index')}}">VOLTAR<span class="sr-only"></span></a>
    </div>
</form>

@endsection