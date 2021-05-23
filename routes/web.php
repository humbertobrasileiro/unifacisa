<?php

use Illuminate\Support\Facades\Route;

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

    return view('transas/create', compact('tipotransa'));
});

Route::get('/saque', function () {

    $tipotransa = 'S';

    return view('transas/create', compact('tipotransa'));
});

Route::resource('contas', 'ContaController');

Route::resource('transas', 'TransaController');

Route::resource('pessoas', 'PessoaController');

Route::resource('extratos', 'ExtratoController');
