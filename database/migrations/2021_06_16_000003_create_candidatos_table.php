<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidatos', function (Blueprint $table) {
            $table->id();
            $table->string('cpf')->nullable()->unique();
            $table->string('documento_de_identificacao')->nullable();
            $table->string('orgao_emissor')->nullable();
            $table->date('data_de_nascimento');
            $table->string('nome_do_pai')->nullable();
            $table->string('nome_da_mae');
            $table->boolean('estrangeiro');
            $table->string('celular')->nullable();
            $table->string('telefone')->nullable();

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
        Schema::dropIfExists('candidatos');
    }
}
