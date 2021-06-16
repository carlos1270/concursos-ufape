<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConcursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concursos', function (Blueprint $table) {
            $table->id();
            $table->integer('qtd_vagas');
            $table->string('descricao');
            $table->date('data_inicio_inscricao');
            $table->date('data_fim_inscricao');
            $table->date('data_inicio_isencao_inscricao');
            $table->date('data_fim_isencao_inscricao');
            $table->date('data_fim_pagamento_inscricao');
            $table->date('data_inicio_envio_doc');
            $table->date('data_fim_envio_doc');
            $table->date('data_resultado_selecao');
            $table->string('modelos_documentos');
            $table->string('edital');

            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');

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
        Schema::dropIfExists('concursos');
    }
}
