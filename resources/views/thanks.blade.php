@extends('layouts.front')

@section('content')
    <h2 class="alert alert-success">
        Muito obrigado @if ($user->name) {{$user->name}} por realizar essa compra! @endif 
    </h2>
    <h3>
        Seu pedido foi processado, código do pedido: {{ request()->get('order') }}
    </h3>
@endsection