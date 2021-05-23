
@extends('extratos.layout')

@section('title',__('Conta (UniFacisa - Desenvolvido com Laravel)'))

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
                        <span>@lang('Extrato (UniFacisa - Desafio de Programação)')</span>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>@lang('Responsável')</td>
                                <td>@lang('Saldo')</td>
                                <td>@lang('Limite saque diário')</td>
                                <td>@lang('Status')</td>
                                <td>@lang('Tipo')</td>
                                <td>@lang('Dta. Criação')</td>
                                <td colspan="3" class="text-center">@lang('Ações')</td>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($contas as $case)

                            <tr>
                                <td>{{ $case->idConta }}</td>
                                <td>{{ $case->idPessoa . ' - ' . $case->Nome }}</td>
                                <td>{{ number_format($case->saldo,0,",",".") }}</td>
                                <td>{{ number_format($case->limiteSaqueDiario,0,",",".") }}</td>
                                <td>{{ $case->flagAtivo }}</td>
                                <td>{{ $case->tipoConta }}</td>
                                <td>{{ $case->dataCriacao }}</td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <a href="{{ route('extratos.show', $case->idConta)}}"
                                        class="btn btn-info btn-sm">@lang('Extrato')
                                    </a>
                                </td>
                            </tr>
                            @endforeach
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
