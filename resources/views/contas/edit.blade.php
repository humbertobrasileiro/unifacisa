
@extends('contas.layout')

@section('title',__('Editar (UniFacisa - Desenvolvido com Laravel)'))

@push('css')
<style>
    /* Personalizar layout*/
</style>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between w-100">
                        <span>@lang('Editar (UniFacisa - Desenvolvido com Laravel)')</span>
                        <a href="{{ url('contas') }}" class="btn-info btn-sm">
                            <i class="fa fa-arrow-left"></i> @lang('Voltar')
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {!! Form::open(['action' => ['ContaController@update',$contadatacriacao->idConta], 'method' => 'PUT'])!!}

                    <div class="form-group">
                        {!! Form::label(__('Selecione responsável pela conta:')) !!}
                        <select id="pessoa" name="idPessoa" class="form-control">
                            @foreach($pessoas as $pessoa)

                                    @if($pessoa['idPessoa'] == $contadatacriacao->idPessoa)
                                        <option id="pessoa" selected="selected" value="{{ $pessoa['idPessoa'] }}">{{ $pessoa->Nome }}</option>
                                    @else
                                        <option id="pessoa" value="{{ $pessoa['idPessoa'] }}">{{ $pessoa->Nome }}</option>
                                    @endif

                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        {!! Form::label(__('Saldo da conta:')) !!}
                        {!! Form::number("saldo", $contadatacriacao->saldo ,["class"=>"form-control mmss","required"=>"required"]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label(__('Limite de saque diário:')) !!}
                        {!! Form::number("limiteSaqueDiario", $contadatacriacao->limiteSaqueDiario ,["class"=>"form-control mmss","required"=>"required"]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label(__('Status da conta:')) !!}
                        <select id="flagAtivo" name="flagAtivo" class="form-control">
                            <option @if($contadatacriacao->flagAtivo == 0) selected="selected" @endif id="flagAtivo" value="0">Aberta</option>
                            <option @if($contadatacriacao->flagAtivo == 1) selected="selected" @endif id="flagAtivo" value="1">Bloqueada</option>                            
                        </select>
                    </div>

                    <div class="form-group">
                        {!! Form::label(__('Tipo da conta:')) !!}
                        <select id="tipoConta" name="tipoConta" class="form-control">
                            <option @if($contadatacriacao->tipoConta == 1) selected="selected" @endif id="tipoConta" value="1">Conta corrente</option>
                            <option @if($contadatacriacao->tipoConta == 2) selected="selected" @endif id="tipoConta" value="2">Poupança</option>
                            <option @if($contadatacriacao->tipoConta == 3) selected="selected" @endif id="tipoConta" value="3">Conta salário</option>                            
                        </select>
                    </div>

                    <div class="form-group">
                        {!! Form::label(__('Data criação da conta:')) !!}
                        {!! Form::date("dataCriacao", $contadatacriacao->dataCriacao ,["class"=>"form-control mmss","required"=>"required"]) !!}
                    </div>

                    <div class="well well-sm clearfix">
                        <button class="btn btn-success pull-right" title="@lang('Salvar')"
                            type="submit">@lang('Adicionar')</button>
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script language='JavaScript'>
    $(".mmss").focusout(function () {
        var idConta = $(this).attr('idConta');
        var vall = $(this).val();
        var regex = /[^0-9]/gm;
        const result = vall.replace(regex, ``);
        $('#' + idConta).val(result);
    });
</script>
@endpush
