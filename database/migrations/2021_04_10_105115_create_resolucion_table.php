<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResolucionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resolucion', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fechaexpedicion');
            $table->dateTime('fechavencimiento');
            $table->string('numero' , 30)->nullable();
            $table->string('contribuyente' , 200)->nullable();
            $table->string('direccion' , 100)->nullable();
            $table->string('localidad' , 100)->nullable();
            $table->string('zona' , 100)->nullable();
            $table->string('categoria' , 100)->nullable();
            $table->string('girocomercial' , 100)->nullable();
            $table->string('razonsocial' , 200)->nullable();
            $table->string('dni' , 20)->nullable();
            $table->string('ruc' , 20)->nullable();
            $table->string('observaciones' , 300)->nullable();
            $table->integer('inspeccion_id')->unsigned()->nullable();
            $table->integer('ordenpago_id')->unsigned()->nullable();
            $table->foreign('inspeccion_id')->references('id')->on('inspeccion')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('ordenpago_id')->references('id')->on('ordenpago')->onDelete('restrict')->onUpdate('restrict');
            $table->integer('tipo_id')->unsigned()->nullable();
            $table->foreign('tipo_id')->references('id')->on('tipotramitenodoc')->onUpdate('restrict')->onDelete('restrict');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resolucion');
    }
}
