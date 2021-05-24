<?php

use Illuminate\Support\Facades\Route;
use App\Conta;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/deposito', function () {

    $tipotransa = 'D';

    $contas = Conta::select(Conta::raw('c.idConta, p.Nome'))
        ->from(Conta::raw('contas c'))
        ->join(Conta::raw('pessoas p'), 'p.idPessoa', '=', 'c.idPessoa')
        ->orderBy('Nome', 'DESC')
        ->get();

    return view('transas/create', compact('tipotransa', 'contas'));
});

Route::get('/saque', function () {

    $tipotransa = 'S';

    $contas = Conta::select(Conta::raw('c.idConta, p.Nome'))
        ->from(Conta::raw('contas c'))
        ->join(Conta::raw('pessoas p'), 'p.idPessoa', '=', 'c.idPessoa')
        ->orderBy('Nome', 'DESC')
        ->get();

    return view('transas/create', compact('tipotransa', 'contas'));
});

Route::resource('contas', 'ContaController');

Route::resource('transas', 'TransaController');

Route::resource('pessoas', 'PessoaController');

Route::resource('extratos', 'ExtratoController');
