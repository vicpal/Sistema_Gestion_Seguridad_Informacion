<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjcontrolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objcontrols', function (Blueprint $table) {
            $table->bigIncrements('id'); /*Esta debe ser llave Primaria */
            $table->tinyint('numero_objc')->unique();
            $table->string('nombre_objc');

            $table->tinyint('numero_dom')->unique(); /*Esta debe ser llave foranea */
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
        Schema::dropIfExists('objcontrols');
    }
}
