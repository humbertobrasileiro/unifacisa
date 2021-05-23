
@extends('pessoas.layout')

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
                        <span>@lang('Editar (UniFacisa - Desenvolvido com Laravel) - Responsáveis')</span>
                        <a href="{{ url('pessoas') }}" class="btn-info btn-sm">
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

                    {!! Form::open(['action' => ['PessoaController@update',$pessoacpf->idPessoa], 'method' => 'PUT'])!!}

                    <div class="form-group">
                        {!! Form::label(__('Nome do Responsável:')) !!}
                        {!! Form::text("Nome", $pessoacpf->Nome, ["class"=>"form-control","required"=>"required"]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label(__('Nº do CPF:')) !!}
                        {!! Form::text("cpf", $pessoacpf->cpf, ["class"=>"form-control mmss","required"=>"required"]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label(__('Data de Nascimento:')) !!}
                        {!! Form::date("dataNascimento", $pessoacpf->dataNascimento, ["class"=>"form-control mmss","required"=>"required"]) !!}
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
        var idPessoa = $(this).attr('idPessoa');
        var vall = $(this).val();
        var regex = /[^0-9]/gm;
        const result = vall.replace(regex, ``);
        $('#' + idPessoa).val(result);
    });
</script>
@endpush
