<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->bigIncrements('id'); /*Esta debe ser llave Primaria */
            $table->integer('numero_preg')->unique();
            $table->string('nombre_preg');
            
            $table->unsignedBigInteger('dominio_id');
            $table->unsignedBigInteger('objcontrol_id');
            $table->unsignedBigInteger('control_id');

            $table->foreign('dominio_id')->references('id')->on('dominios');   
            $table->foreign('objcontrol_id')->references('id')->on('objcontrols');           
            $table->foreign('control_id')->references('id')->on('controls');

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
        Schema::dropIfExists('preguntas');
    }
}
