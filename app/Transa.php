<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transa extends Model
{
    protected $primaryKey = 'idTransacao';

    protected $fillable = ['idTransacao', 'idConta', 'valor', 'dataTransacao'];
}
