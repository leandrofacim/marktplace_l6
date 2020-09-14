@extends('layouts.app')

@section('content')

<div class="table-responsive-sm">
    @if (!$store)
        <a href="{{route('admin.stores.create')}}" class="btn btn-sm btn-success">Criar Loja</a>
    @endif
    <table class="table table-striped table-hover ">
        <thead class="thead-light">
            <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Loja</th>
                <th scope="col">Toral de Produtos</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$store->id}}</td>
                <td>{{$store->name}}</td>
                <td>{{$store->products->count()}}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{route('admin.stores.edit', ['store' => $store->id])}}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{route('admin.stores.destroy', ['store' => $store->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger ml-1">Remover</button>
                        </form>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    
</div>

@endsection