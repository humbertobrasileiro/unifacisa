<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contas', function (Blueprint $table) {
            $table->increments('idConta');
            $table->integer('idPessoa');
            $table->decimal('saldo', 12, 2);
            $table->decimal('limiteSaqueDiario', 12, 2);
            $table->boolean('flagAtivo', 0);
            $table->integer('tipoConta');
            $table->date('dataCriacao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contas');
    }
}
