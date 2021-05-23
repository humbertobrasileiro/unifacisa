<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pessoa;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoacpf = Pessoa::all();
        return view('pessoas.index', compact('pessoacpf'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pessoas.create');
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
            'Nome' => 'required|max:255',
            'cpf' => 'required|max:14',
            'dataNascimento' => 'required|date',
        ]);
        $show = Pessoa::create($validatedData);
        return redirect('/pessoas')->with('success', 'Dados da Pessoa adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idPessoa)
    {
        $pessoacpf = Pessoa::findOrFail($idPessoa);
        return view('pessoas.show',compact('pessoacpf'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idPessoa)
    {
        $pessoacpf = Pessoa::findOrFail($idPessoa);
        return view('pessoas.edit', compact('pessoacpf'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idPessoa)
    {
        $validatedData = $request->validate([
            'Nome' => 'required|max:255',
            'cpf' => 'required|max:14',
            'dataNascimento' => 'required|date',
        ]);
        Pessoa::where('idPessoa', '=', $idPessoa)->update($validatedData);
        return redirect('/pessoas')->with('success', 'Dados da Pessoa atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idPessoa)
    {
        $pessoacpf = Pessoa::findOrFail($idPessoa);
        $pessoacpf->delete();
        return redirect('/pessoas')->with('success', 'Dados da Pessoa removido com sucesso!');
    }

}
