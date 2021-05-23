
@extends('contas.layout')

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
                        <span>@lang('Conta (UniFacisa - Desafio de Programação)')</span>
                        <a href="{{ url('/contas/create') }}" class="btn-primary btn-sm">
                            <i class="fa fa-plus"></i> @lang('Criar Novo')
                        </a>
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
                            @foreach($contadatacriacao as $case)

                            <tr>
                                <td>{{ $case->idConta }}</td>
                                <td>{{ $case->idPessoa . ' - ' . $case->Nome }}</td>
                                <td>{{ number_format($case->saldo,0,",",".") }}</td>
                                <td>{{ number_format($case->limiteSaqueDiario,0,",",".") }}</td>
                                <td>{{ $case->flagAtivo }}</td>
                                <td>{{ $case->tipoConta }}</td>
                                <td>{{ $case->dataCriacao }}</td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <a href="{{ route('contas.show', $case->idConta)}}"
                                        class="btn btn-info btn-sm">@lang('Abrir')
                                    </a>
                                </td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <a href="{{ route('contas.edit', $case->idConta)}}"
                                        class="btn btn-primary btn-sm">@lang('Editar')
                                    </a>
                                </td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <form action="{{ route('contas.destroy', $case->idConta)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                    </form>
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
