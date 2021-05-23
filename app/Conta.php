<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    protected $primaryKey = 'idConta';

    protected $fillable = ['idConta', 'idPessoa', 'saldo', 'limiteSaqueDiario', 'flagAtivo', 'tipoConta', 'dataCriacao'];
}
