
@extends('transas.layout')

@section('title',__('Criar (UniFacisa - Desenvolvido com Laravel)'))

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
                        <span><b>{{ $tipotransa === 'D' ? 'Depósito' : 'Saque' }}</b> @lang(' (UniFacisa - Desenvolvido com Laravel)') </span>
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

                    {!! Form::open(['action' => ['TransaController@store', 'tipo' => $tipotransa], 'method' => 'POST'])!!}

                    <div class="form-group">
                        {!! Form::label(__('ID da Conta:')) !!}
                        <select id="idConta" name="idConta" class="form-control">
                            <option id="idConta" selected="selected" value=""></option>
                            @foreach($contas as $conta)

                                <option id="idConta" value="{{ $conta['idConta'] }}">{{ $conta['idConta'] . ' - ' . $conta['Nome'] }}</option>

                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        {!! Form::label(__('Valor (R$):')) !!}
                        {!! Form::number("valor", null ,["type"=>"numeric","class"=>"form-control mmss","required"=>"required"]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label(__('Data da Transação:')) !!}
                        {!! Form::date("dataTransacao", null ,["class"=>"form-control mmss","required"=>"required"]) !!}
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
        var idTransacao = $(this).attr('idTransacao');
        var vall = $(this).val();
        var regex = /[^0-9]/gm;
        const result = vall.replace(regex, ``);
        $('#' + idTransacao).val(result);
    });
</script>
@endpush
