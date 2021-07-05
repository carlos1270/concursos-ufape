<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArquivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arquivos', function (Blueprint $table) {
            $table->id();
            $table->string('formacao_academica');
            $table->string('experiencia_didatica');
            $table->string('producao_cientifica');
            $table->string('experiencia_profissional');

            $table->unsignedBigInteger('inscricoes_id');
            $table->foreign('inscricoes_id')->references('id')->on('inscricoes');

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
        Schema::dropIfExists('arquivo');
    }
}
