@extends('layouts.app')

@section('content')
<h1>Criar Loja</h1>
<form action="{{route('admin.stores.store')}}" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="form-group">
        <label for="">Nome Loja</label>
    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{old('name')}}">
        @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Descrição</label>
        <input class="form-control  @error('description') is-invalid @enderror" type="text" name="description" value="{{old('description')}}">
        @error('description')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Telefone</label>
        <input class="form-control  @error('phone') is-invalid @enderror" type="text" name="phone" value="{{old('phone')}}">
        @error('phone')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Celular</label>
        <input class="form-control @error('mobile_phone') is-invalid @enderror" type="text" name="mobile_phone" value="{{old('mobile_phone')}}">
        @error('mobile_phone')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Slug</label>
        <input class="form-control" type="text" name="slug">
    </div>
    <div>
        <button class="btn btn-success" type="submit">Criar Loja</button>
    </div>
</form>

@endsection