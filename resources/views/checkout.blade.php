@extends('layouts.front')

@section('stylesheets')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endsection

@section('content')
    <div class="container">
        <div class="col-md-6">
            <div class="row">
                <div class="col-ms-12 msg">
                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2>Dados para Pagamentos</h2>
                </div>
            </div>
            <hr>
            <form action="" method="POST">
                
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label>Nome no cartão</label>
                        <input type="text" class="form-control" name="card_name">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 form-group">
                        <label>Número do cartão <span class="brand"></span></label>
                        <input type="text" class="form-control" name="card_number">
                        <input type="hidden" name="card_brand">
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-md-4 ">
                        <label>Mês de expiração</label>
                        <input type="text" class="form-control" name="card_month">
                    </div>
                    <div class="form-group col-md-4 ">
                        <label>Ano de expiração</label>
                        <input type="text" class="form-control" name="card_year">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-5 ">
                        <label>Codigo de Segurança</label>
                        <input type="text" class="form-control" name="card_cvv">
                    </div>
                    <div class="com-md-12 installments form-group">

                    </div>
                </div>

                <button class="btn btn-success btn-lg processCheckout">Efetuar Pagamento</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <script>
        const sessionId = '{{session()->get('pagseguro_session_code')}}';
        const urlThanks = '{{route('checkout.thanks')}}';
        const urlProcess = '{{ route('checkout.proccess') }}';
        const amountTransaction = '{{$cartItems}}';
        const csrf = '{{csrf_token()}}';
        PagSeguroDirectPayment.setSessionId(sessionId);
    </script>
    <script src=" {{asset('js/pagseguro_functions.js')}} "></script>
    <script src=" {{asset('js/pagseguro_events.js')}} "></script>
@endsection