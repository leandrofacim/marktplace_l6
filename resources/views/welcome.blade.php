@extends('layouts.front')

@section('content')
    <div class="row front">
        @foreach ($products as $key => $product)
            <div class="col-md-4">
                <div class="card shadow p-3 mb-5 bg-white rounded" style="width: 22rem;">
                    @if ($product->photos->count())
                        <img src="{{ asset('storage/' . $product->thumb) }}" alt=""
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
        @endforeach
    </div>

    <div class="row">
        <div class="col-12">
            <h2>Lojas Destaques</h2>
            <hr>
        </div>
        @foreach ($stores as $store)
            <div class="col-4">
                @if ($store->logo)
                    <img  class="img-fluid" src=" {{asset('storage/' . $store->logo)}} " alt=" logo da loja {{$store->name}} ">  
                    @else
                    <img  class="img-fluid"  src="https://via.placeholder.com/600X300.png?text=logo" alt="Loja sem logo">  
                @endif
                <h3> {{$store->name}} </h3>
                <p> {{$store->description}} </p>
                <a class="btn btn-success btn-sm" href="{{route('store.single', ['slug' => $store->slug])}}">Ver Loja</a>
            </div>
        @endforeach
    </div>
@endsection
