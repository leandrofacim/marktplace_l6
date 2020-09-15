@extends('layouts.app')

@section('content')

<h1>Atualizar Produto</h1>
<form action="{{route('admin.products.update', ['product'=> $products->id])}}" method="post" enctype="multipart/form-data">
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
        <label for="">Categoria</label>
        <select class="selectpicker form-control" multiple data-live-search="true" name="categories[]">
            @foreach ($categories as $category)
                <option 
                    value="{{$category->id}}"
                        @if ($products->categories->contains($category)) selected @endif
                    >{{$category->name}}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Fotos do Produto</label>
        <input type="file" class="form-control" name="photos[]" multiple>
    </div>
    <div class="form-group">
        <label for="">Slug</label>
        <input class="form-control" type="text" name="slug" value="{{$products->slug}}">
    </div>

    <div>
        <button class="btn btn-success" type="submit">Atualizar Produto</button>
        <a class="btn btn-primary" href="{{route('admin.products.index')}}">VOLTAR<span class="sr-only"></span></a>
    </div>
</form>

<hr>
<div class="row">
    @foreach ($products->photos as $photo)
        <div class="col-4 text-center" >
            <img src="{{asset('storage/' . $photo->image)}}" alt="">
        <form action="{{route('admin.photo.remove', ['photoName' => $photo->image])}}" method="POST">
            <input type="hidden" name="photoName" value="{{$photo->image}}">
            @method('POST')
            @csrf
            <button type="submit" class="btn btn-sm btn-danger">REMOVER</button>
        </form>
        </div>
    @endforeach
</div>
@endsection



<script>
    $(function () {
        $('select').selectpicker();
    });
</script>
    