<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColunasArquivoAvaliacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('arquivos');

        Schema::create('arquivos', function (Blueprint $table) {
            $table->id();

            $table->string('dados_pessoais');
            $table->string('curriculum_vitae_lattes');
            $table->string('formacao_academica');
            $table->string('experiencia_didatica')->nullable();
            $table->string('producao_cientifica')->nullable();
            $table->string('experiencia_profissional')->nullable();

            $table->unsignedBigInteger('inscricoes_id');
            $table->foreign('inscricoes_id')->references('id')->on('inscricoes');

            $table->timestamps();
        });

        Schema::table('avaliacoes', function (Blueprint $table) {
            $table->string('ficha_avaliacao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
