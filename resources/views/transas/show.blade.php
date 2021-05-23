
@extends('transas.layout')

@section('title',__('Exibindo : Transação (UniFacisa - Desenvolvido com Laravel)'))

@push('css')
<style>
table{
font-family: Verdana,sans-serif;
border: 1px solid #ccc;
margin: 20px 0;
}

table th{
    padding:10px;
    font-weight: normal;
}
</style>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between w-100">
                        <span><span class="text-info">Exibindo </span>: (@lang('Transação (UniFacisa - Desenvolvido com Laravel)'))</span>
                        <a href="{{ url('transas') }}" class="btn-info btn-sm">
                            <i class="fa fa-arrow-left"></i> @lang('Voltar')
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif


                    <table class="w3-table-all notranslate" width="100%" border="1">
                        <tbody>
                        <tr>
                          <th align="left"><strong>ID:</strong></th>
                          <th align="left">{{$transadatatransacao->idTransacao}}</th>
                        </tr>
                        <tr>
                            <th align="left"><strong>@lang('ID da Conta')</strong>:</th>
                            <th align="left">{{$transadatatransacao->idConta}}</th>
                        </tr>
                        <tr>
                            <th align="left"><strong>@lang('Valor (R$)')</strong>:</th>
                            <th align="left">{{$transadatatransacao->valor}}</th>
                          </tr>
                          <tr>
                              <th align="left"><strong>@lang('Data da Transação')</strong>:</th>
                              <th align="left">{{$transadatatransacao->dataTransacao}}</th>
                          </tr>
                        </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    // Script personalizado
</script>
@endpush
