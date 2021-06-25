<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscricaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscricoes', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->string('titulacao');
            $table->string('area_conhecimento');
            $table->boolean('cotista');
            $table->boolean('pcd');

            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');

            $table->unsignedBigInteger('concursos_id');
            $table->foreign('concursos_id')->references('id')->on('concursos');

            $table->unsignedBigInteger('vagas_id');
            $table->foreign('vagas_id')->references('id')->on('opcoes_vagas');

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
        Schema::dropIfExists('inscricoes');
    }
}
