
@extends('transas.layout')

@section('title',__('Transações (UniFacisa - Desenvolvido com Laravel)'))

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
                        <span>@lang('Transações (UniFacisa - Desenvolvido com Laravel)')</span>
                        <a href="{{ url('deposito') }}" class="btn-primary btn-sm">
                            <i class="fa fa-plus"></i> @lang('Depositar')
                        </a>
                        <a href="{{ url('saque') }}" class="btn-primary btn-sm">
                            <i class="fa fa-plus"></i> @lang('Sacar')
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
                                <td>@lang('ID da Conta')</td>
                                <td>@lang('Valor (R$)')</td>
                                <td>@lang('Dta. Transação')</td>
                                <td colspan="3" class="text-center">@lang('Ações')</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transadatatransacao as $case)
                            <tr>
                                <td>{{ $case->idTransacao }}</td>
                                <td>{{ $case->idConta }}</td>
                                <td>{{ number_format($case->valor,0,",",".") }}</td>
                                <td>{{ $case->dataTransacao }}</td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <a href="{{ route('transas.show', $case->idTransacao)}}"
                                        class="btn btn-info btn-sm">@lang('Abrir')
                                    </a>
                                </td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <a href="{{ route('transas.edit', $case->idTransacao)}}"
                                        class="btn btn-primary btn-sm">@lang('Editar')
                                    </a>
                                </td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <form action="{{ route('transas.destroy', $case->idTransacao)}}" method="post">
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
