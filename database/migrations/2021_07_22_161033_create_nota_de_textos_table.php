<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotaDeTextosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota_de_textos', function (Blueprint $table) {
            $table->id();
            $table->text("titulo");
            $table->text("texto");
            $table->integer("tipo");
            $table->string("cor")->nullable();
            $table->string("anexo")->nullable();
            $table->unsignedBigInteger('concursos_id');
            $table->foreign('concursos_id')->references('id')->on('concursos');
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
        Schema::dropIfExists('nota_de_textos');
    }
}
