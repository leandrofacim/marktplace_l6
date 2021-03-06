@extends('layouts.app')

@section('content')
    <h1>Criar Loja</h1>
    <form action="{{ route('admin.stores.store') }}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="">Nome Loja</label>
            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                value="{{ old('name') }}">
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Descrição</label>
            <input class="form-control  @error('description') is-invalid @enderror" type="text" name="description"
                value="{{ old('description') }}">
            @error('description')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Telefone</label>
            <input 
                class="form-control  @error('phone') is-invalid @enderror" 
                type="text" 
                name="phone"
                value="{{ old('phone') }}"
                id="phone"
                >
            @error('phone')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Celular</label>
            <input 
            class="form-control @error('mobile_phone') is-invalid @enderror" 
            type="text" 
            id="mobile_phone"
            name="mobile_phone"
                value="{{ old('mobile_phone') }}">
            @error('mobile_phone')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Logo</label>
            <input type="file" class="form-control @error('logo') is-invalid @enderror" name="logo">
            @error('logo')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div>
            <button class="btn btn-success" type="submit">Criar Loja</button>
        </div>
    </form>

@endsection

@section('scripts')
    <script>
        var imPhone = document.getElementById("phone");
        var im = new Inputmask("(99) 9999-9999");
        im.mask(imPhone);

        var imPhoneMobile = document.getElementById("mobile_phone");
        var im = new Inputmask("(99) 99999-9999");
        im.mask(imPhoneMobile);
    </script>
@endsection 
