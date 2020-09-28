@extends('layouts.front')

@section('content')
<div class="row front">

    <div class="col-4">
        @if ($store->logo)
        <img  class="img-fluid" src=" {{asset('storage/' . $store->logo)}} " alt=" logo da loja {{$store->name}} ">  
        @else
        <img  class="img-fluid"  src="https://via.placeholder.com/600X300.png?text=logo" alt="Loja sem logo">  
        @endif
    </div>
    <div class="col-8">
        <h2> {{$store->name}} </h2>
        <p>{{$store->description}}</p>
        <p>
            <strong>Contatos:</strong>
            <span>{{$store->phone}}</span> | <span>{{$store->mobile_phone}}</span>
        </p>
    </div>

    <div class="col-12">
        <h3 style="margin-bottom: 30px">Produtos desta loja</h3>
    </div>
    @forelse ($store->products as $key => $product)
    <div class="col-md-4">
        <div class="card shadow p-3 mb-5 bg-white rounded" style="width: 22rem;">
            @if ($product->photos->count())
            <img src="{{ asset('storage/' . $product->photos->first()->image) }}" alt=""
                 class="card-img-top img-card">
            @else
            <img src="{{ asset('assets/img/no-photo.jpg') }}" alt="" class="card-img-top img-card">
            @endif
            <div class="card-body">
                <h2 class="card-title">{{ $product->name }}</h2>
                <p class="card-text"> {{ $product->description }}</p>
                <h3> R$ {{ number_format($product->price, '2', ',', '.') }} </h3>
                <a href=" {{ route('product.single', ['slug' => $product->slug]) }} " class="btn btn-success">
                    Ver Produto
                </a>
            </div>
        </div>
    </div>
    @if (($key + 1) % 3 == 0) </div><div class="row front"> @endif
    @empty
    <div class="col-12">
        <h3 class="alert alert-warning">Nenhum producto encontrado para essa loja!</h3>
    </div>
    @endforelse
</div>

@endsection
