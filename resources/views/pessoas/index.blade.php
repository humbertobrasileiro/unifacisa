
@extends('pessoas.layout')

@section('title',__('Pessoas (UniFacisa - Desenvolvido com Laravel)'))

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
                        <span>@lang('Pessoas (UniFacisa - Desenvolvido com Laravel)')</span>
                        <a href="{{ url('/pessoas/create') }}" class="btn-primary btn-sm">
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
                                <td>@lang('Nome do Responsável pela Conta')</td>
                                <td>@lang('Nº do CPF')</td>
                                <td>@lang('Dta. Nascimento')</td>
                                <td colspan="3" class="text-center">@lang('Ações')</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pessoacpf as $case)
                            <tr>
                                <td>{{ $case->idPessoa }}</td>
                                <td>{{ $case->Nome }}</td>
                                <td>{{ $case->cpf }}</td>
                                <td>{{ $case->dataNascimento }}</td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <a href="{{ route('pessoas.extrato', $case->idPessoa)}}"
                                        class="btn btn-info btn-sm">@lang('Extrato')
                                    </a>
                                </td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <a href="{{ route('pessoas.show', $case->idPessoa)}}"
                                        class="btn btn-info btn-sm">@lang('Abrir')
                                    </a>
                                </td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <a href="{{ route('pessoas.edit', $case->idPessoa)}}"
                                        class="btn btn-primary btn-sm">@lang('Editar')
                                    </a>
                                </td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <form action="{{ route('pessoas.destroy', $case->idPessoa)}}" method="post">
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
