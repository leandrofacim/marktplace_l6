@extends('layouts.front')

@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Carrinho de compras</h2>
            <hr>
        </div>
        <div class="col-12">
            @if ($carts)
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Preço</th>
                            <th>Quantidade</th>
                            <th>Subtotal</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp
                        @foreach ($carts as $cart)
                            <tr>
                                <td> {{ $cart['name'] }} </td>
                                <td> R$ {{ number_format($cart['price'], 2, ',', '.') }} </td>
                                <td> {{ $cart['amount'] }} </td>
                                @php
                                $subtotal = $cart['price'] * $cart['amount'];
                                $total += $subtotal;
                                @endphp
                                <td> R$ {{ number_format($subtotal, 2, ',', '.') }} </td>
                                <td><a href=" {{ route('cart.remove', ['slug' => $cart['slug']]) }} "
                                        class="btn btn-sm btn-danger"> Remover </a></td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3">Total:</td>
                            <td colspan="2"> {{ number_format($total, 2, ',', '.') }} </td>
                        </tr>
                    </tbody>
                </table>
                <hr>
                <div class="com-md-12">
                    <a href=" {{ route('checkout.index') }} " class="btn btn-lg btn-success float-right">Concluir Compra</a>
                    <a href=" {{ route('cart.cancel') }} " class="btn btn-lg btn-danger float-left">Cancelar Compra</a>
                </div>
            @else
                <div class="alert alert-warning">Carrinho vazio...</div>
            @endif
        </div>
    </div>
@endsection
