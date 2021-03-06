
@extends('extratos.layout')

@section('title',__('Gerando : Extrato (UniFacisa - Desenvolvido com Laravel)'))

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
                        <span><span class="text-info">Gerando </span>: (@lang('Extrato (UniFacisa - Desenvolvido com Laravel)'))</span>
                        <a href="{{ url('extratos') }}" class="btn-info btn-sm">
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
                            <th align="left"><strong>ID-Conta: {{ $conta[0]['idConta'] }}</strong></th>
                            <th align="left">Nome: {{ $conta[0]['Nome'] }}</th>
                            </tr>
                        </tbody>
                    </table>

                    {!! Form::open(['action' => ['ExtratoController@store', 'idConta' => $conta[0]['idConta'], 'idPessoa' => $conta[0]['idPessoa']], 'method' => 'POST']) !!}

                    <div id="accordion">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <input type="radio" checked="true" data-toggle="collapse" data-target="#collapse_periodo" name="tipo" value="P" id="periodo" aria-expanded="true" aria-controls="collapse_periodo">
                                    <label for="periodo">Extrato por per??odo</label>
                                </h5>
                            </div>
                            <div id="collapse_periodo" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                        <div class="form-row">
                                            <div class="col-7">
                                                {!! Form::date("de", date('Y-m-d', strtotime('-30 days')),["class"=>"form-control mmss","required"=>"required"]) !!}
                                            </div>
                                            <div class="col">
                                                {!! Form::date("ate", date('Y-m-d', strtotime(now())) ,["class"=>"form-control mmss","required"=>"required"]) !!}
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <input type="radio" data-toggle="collapse" data-target="#collapse_mensal" name="tipo" value="M" id="mensal" aria-expanded="false" aria-controls="collapse_mensal">
                                    <label for="mensal">Extrato mensal</label>
                                </h5>
                                <div id="collapse_mensal" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                            <div class="form-row">
                                                <div class="col-7">
                                                    M??s: {!! Form::selectMonth('mes', date('n'), ['class' => 'form-control month']) !!}
                                                </div>
                                                <div class="col-5">
                                                    Ano: <br>
                                                    {!! Form::selectYear('ano', date('Y'), date('Y')-100, null, ['class' => 'form-control year']) !!}
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="well well-sm clearfix">
                        <button class="btn btn-success pull-right" title="@lang('Salvar')"
                            type="submit">@lang('Gerar o extrato')</button>
                    </div>

                    {!! Form::close() !!}

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
