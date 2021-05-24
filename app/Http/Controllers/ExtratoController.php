<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conta;
use App\Transa;

class ExtratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contas = Conta::select(Conta::raw('c.idConta, c.idPessoa, p.Nome, c.saldo, c.limiteSaqueDiario,c.flagAtivo, c.tipoConta, c.dataCriacao'))
            ->from(Conta::raw('contas c'))
            ->join(Conta::raw('pessoas p'), 'p.idPessoa', '=', 'c.idPessoa')
            ->orderBy('Nome', 'DESC')
            ->get();

        return view('extratos.index', compact('contas') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        return redirect('/extratos')->with('success', 'Extrato gerado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idConta)
    {
        $conta = Conta::select(Conta::raw('c.idConta, c.idPessoa, p.Nome, c.saldo, c.limiteSaqueDiario,c.flagAtivo, c.tipoConta, c.dataCriacao, c.created_at, c.updated_at'))
            ->from(Conta::raw('contas c'))
            ->join(Conta::raw('pessoas p'), 'p.idPessoa', '=', 'c.idPessoa')
            ->where('c.idConta', '=', $idConta)
            ->limit(1)
            ->get();

        return view('extratos.show', compact('conta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idConta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
