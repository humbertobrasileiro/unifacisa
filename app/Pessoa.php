<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $primaryKey = 'idPessoa';

    protected $fillable = ['idPessoa', 'Nome', 'cpf', 'dataNascimento'];
}
