<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controls', function (Blueprint $table) {
            $table->bigIncrements('id'); /*Esta debe ser llave Primaria */
            $table->integer('numero_con')->unique();
            $table->string('nombre_con');

            $table->integer('numero_objc')->unique(); /*Esta debe ser llave foranea */
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
        Schema::dropIfExists('controls');
    }
}
