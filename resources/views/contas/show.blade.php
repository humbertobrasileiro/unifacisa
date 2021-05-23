
@extends('contas.layout')

@section('title',__('Exibindo : Conta (UniFacisa - Desenvolvido com Laravel)'))

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
                        <span><span class="text-info">Exibindo </span>: (@lang('Conta (UniFacisa - Desenvolvido com Laravel)'))</span>
                        <a href="{{ url('contas') }}" class="btn-info btn-sm">
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
                                <th align="left">{{$contadatacriacao[0]['idConta']}}</th>
                            </tr>
                            <tr>
                                <th align="left"><strong>@lang('Nome do Responsável da Conta')</strong>:</th>
                                <th align="left">{{$contadatacriacao[0]['idPessoa'] . ' - ' . $contadatacriacao[0]['Nome'] }}</th>
                            </tr>
                            <tr>
                                <th align="left"><strong>@lang('Saldo da conta')</strong>:</th>
                                <th align="left">{{$contadatacriacao[0]['saldo']}}</th>
                            </tr>
                            <tr>
                                <th align="left"><strong>@lang('Limite de saque diário')</strong>:</th>
                                <th align="left">{{$contadatacriacao[0]['limiteSaqueDiario']}}</th>
                            </tr>
                            <tr>
                                <th align="left"><strong>@lang('Status da conta')</strong>:</th>
                                <th align="left">@if($contadatacriacao[0]['flagAtivo'] == 0) Ativo @else Bloqueada @endif</th>
                            </tr>
                            <tr>
                                <th align="left"><strong>@lang('Tipo da conta')</strong>:</th>

                                @if($contadatacriacao[0]['tipoConta'] == 0)
                                    <th align="left"></th>
                                @elseif($contadatacriacao[0]['tipoConta'] == 1)
                                    <th align="left">Conta corrente</th>
                                @elseif($contadatacriacao[0]['tipoConta'] == 2)
                                    <th>Poupança</th>
                                @else
                                    <th>Conta salário</th>                            
                                @endif
                                
                            </tr>
                            <tr>
                                <th align="left"><strong>@lang('Data criação da conta')</strong>:</th>
                                <th align="left">{{$contadatacriacao[0]['dataCriacao']}}</th>
                            </tr>
                            <tr>
                                <th align="left"><strong>@lang('Adicionado')</strong>:</th>
                                <th align="left">{{$contadatacriacao[0]['created_at']}}</th>
                            </tr>
                            <tr>
                                <th align="left"><strong>@lang('Atualizado')</strong>:</th>
                                <th align="left">{{$contadatacriacao[0]['updated_at']}}</th>
                            </tr>
                        </tbody>
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
