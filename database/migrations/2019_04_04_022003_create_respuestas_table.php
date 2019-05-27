<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestas', function (Blueprint $table) {
            $table->bigIncrements('id'); /*Esta debe ser llave Primaria */
            $table->unsignedBigInteger('control_id');
            $table->unsignedBigInteger('pregunta_id');
            $table->enum('respuesta', ['SI', 'NO', 'N/A']);
            
            $table->unsignedBigInteger('dominio_id');
            $table->unsignedBigInteger('objcontrol_id');
            
            $table->foreign('dominio_id')->references('id')->on('dominios');
            $table->foreign('objcontrol_id')->references('id')->on('objcontrols');
            $table->foreign('control_id')->references('id')->on('controls');
            $table->foreign('pregunta_id')->references('id')->on('preguntas');
            
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
        Schema::dropIfExists('respuestas');
    }
}
