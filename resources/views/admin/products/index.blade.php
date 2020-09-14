@extends('layouts.app')

@section('content')

<div class="table-responsive-sm">
    <a href="{{route('admin.products.create')}}" class="btn btn-sm btn-success">Criar Produto</a>
    <table class="table table-striped table-hover ">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Preço</th>
                <th scope="col">Loja</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>R$ {{number_format($product->price, 2, ',', '.')}}</td>
                    <td>{{$product->store->name}}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Button group">
                            <a class="btn btn-sm btn-warning " href="{{route('admin.products.edit', ['product' => $product->id])}}">Editar</a>

                            <form action="{{route('admin.products.destroy', ['product' => $product->id])}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button  class="btn btn-sm btn-danger ml-1" type="submit">Remover</button>
                            </form>    
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    {{$products->links()}}
</div>

@endsection