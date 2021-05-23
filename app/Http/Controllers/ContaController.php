<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conta;
use App\Pessoa;

class ContaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contadatacriacao = Conta::select(Conta::raw('c.idConta, c.idPessoa, p.Nome, c.saldo, c.limiteSaqueDiario,c.flagAtivo, c.tipoConta, c.dataCriacao'))
            ->from(Conta::raw('contas c'))
            ->join(Conta::raw('pessoas p'), 'p.idPessoa', '=', 'c.idPessoa')
            ->orderBy('Nome', 'DESC')
            ->get();

        return view('contas.index', compact('contadatacriacao'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pessoas = Pessoa::select('idPessoa', 'Nome')
            ->from('pessoas')
            ->get();

        return view('contas.create', compact('pessoas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'idPessoa' => 'required|numeric',
            'saldo' => 'required|numeric',
            'limiteSaqueDiario' => 'required|numeric',
            'flagAtivo' => 'required|boolean',
            'tipoConta' => 'required|numeric',
            'dataCriacao' => 'required|date',
        ]);
        $show = Conta::create($validatedData);
        return redirect('/contas')->with('success', 'Dados da Conta adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idConta)
    {

        $contadatacriacao = Conta::select(Conta::raw('c.idConta, c.idPessoa, p.Nome, c.saldo, c.limiteSaqueDiario,c.flagAtivo, c.tipoConta, c.dataCriacao, c.created_at, c.updated_at'))
            ->from(Conta::raw('contas c'))
            ->join(Conta::raw('pessoas p'), 'p.idPessoa', '=', 'c.idPessoa')
            ->where('c.idConta', '=', $idConta)
            ->limit(1)
            ->get();

        return view('contas.show',compact('contadatacriacao'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idConta)
    {
        $contadatacriacao = Conta::findOrFail($idConta);

        $pessoas = Pessoa::select('idPessoa', 'Nome')
            ->from('pessoas')
            ->get();

        return view('contas.edit', compact('contadatacriacao','pessoas'));
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
        $validatedData = $request->validate([
            'idPessoa' => 'required|numeric',
            'saldo' => 'required|numeric',
            'limiteSaqueDiario' => 'required|numeric',
            'flagAtivo' => 'required|boolean',
            'tipoConta' => 'required|numeric',
            'dataCriacao' => 'required|date',
        ]);
        Conta::where('idConta', '=', $id)->update($validatedData);
        return redirect('/contas')->with('success', 'Dados da Conta atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contadatacriacao = Conta::findOrFail($id);
        $contadatacriacao->delete();
        return redirect('/contas')->with('success', 'Dados da Conta removido com sucesso!');
    }
}
