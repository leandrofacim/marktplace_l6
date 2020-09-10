@extends('layouts.app')

@section('content')

<div class="table-responsive-sm">
    <a href="{{route('admin.stores.create')}}" class="btn btn-sm btn-success">Criar Loja</a>
    <table class="table table-striped table-hover ">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Loja</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stores as $store)
                <tr>
                    <td>{{$store->id}}</td>
                    <td>{{$store->name}}</td>
                    <td>
                        <a href="{{route('admin.stores.edit', ['store' => $store->id])}}" class="btn btn-sm btn-warning">Editar</a>
                        <a href="{{route('admin.stores.destroy', ['store' => $store->id])}}" class="btn btn-sm btn-danger">remover</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    {{$stores->links()}}
</div>

@endsection