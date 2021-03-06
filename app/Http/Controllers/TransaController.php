<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transa;
use App\Conta;

class TransaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transadatatransacao = Transa::all();
        return view('transas.index', compact('transadatatransacao'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipotransa = 'D';

        $contas = Conta::select(Conta::raw('c.idConta, p.Nome'))
            ->from(Conta::raw('contas c'))
            ->join(Conta::raw('pessoas p'), 'p.idPessoa', '=', 'c.idPessoa')
            ->orderBy('Nome', 'DESC')
            ->get();

        return view('transas.create', compact('tipotransa, contas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $tipo = $request->input('tipo');

        $valor = (float) $request->input('valor');

        if($tipo === 'S') {

            $valor = $valor * -1;

            $request->merge(['valor' => (string) $valor]);

        }

    //    $valor = (float) $request->input('valor');

   //    echo 'testando - ' . $tipo . ' [ ' . $valor . ' ] ';

    //   var_dump($request->all()); die;

        $validatedData = $request->validate([
            'idConta' => 'required|numeric',
            'valor' => 'required|numeric',
            'dataTransacao' => 'required|date',
        ]);
        $show = Transa::create($validatedData);
        return redirect('/transas')->with('success', 'Dados da Transação adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transadatatransacao = Transa::findOrFail($id);

        $idConta = $transadatatransacao->idConta;

        if ($transadatatransacao->valor > 0) {

            $tipotransa = 'Depósito';

        } else {

            $tipotransa = 'Saque';

        }

        $pessoa = Conta::select(Conta::raw('c.idConta, p.idPessoa, p.Nome'))
            ->from(Conta::raw('contas c'))
            ->join(Conta::raw('pessoas p'), 'p.idPessoa', '=', 'c.idPessoa')
            ->where('c.idConta', '=', $idConta)
            ->get();

        return view('transas.show', compact('transadatatransacao', 'tipotransa', 'pessoa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transadatatransacao = Transa::findOrFail($id);

        if ($transadatatransacao->valor > 0) {

            $tipotransa = 'Depósito';

        } else {

            $tipotransa = 'Saque';

        }

        $contas = Conta::select(Conta::raw('c.idConta, p.Nome'))
            ->from(Conta::raw('contas c'))
            ->join(Conta::raw('pessoas p'), 'p.idPessoa', '=', 'c.idPessoa')
            ->orderBy('Nome', 'DESC')
            ->get();

        return view('transas.edit', compact('transadatatransacao', 'tipotransa', 'contas'));
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
            'idConta' => 'required|numeric',
            'valor' => 'required|numeric',
            'dataTransacao' => 'required|date',
        ]);
        Transa::where('idTransacao', '=', $id)->update($validatedData);
        return redirect('/transas')->with('success', 'Dados da Transação atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transadatatransacao = Transa::findOrFail($id);
        $transadatatransacao->delete();
        return redirect('/transas')->with('success', 'Dados da Transação removido com sucesso!');
    }
}
