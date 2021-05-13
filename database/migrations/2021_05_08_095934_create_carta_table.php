<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carta', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fechainicial');
            $table->dateTime('fechalimite')->nullable();
            $table->string('numero')->nullable();
            $table->string('asunto')->nullable();
            $table->string('aviso')->nullable();
            $table->integer('plazo')->nullable();
            $table->string('nombrecomercial')->nullable();
            $table->string('destinatario')->nullable();
            $table->string('direccion')->nullable();
            $table->string('razonsocial')->nullable();
            $table->string('cuerpo',8000)->nullable();
            $table->integer('tipo_id')->unsigned()->nullable();
            $table->foreign('tipo_id')->references('id')->on('tipotramitenodoc')->onUpdate('restrict')->onDelete('restrict');
            $table->integer('inspeccion_id')->unsigned()->nullable();
            $table->foreign('inspeccion_id')->references('id')->on('inspeccion')->onUpdate('restrict')->onDelete('restrict');
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
        Schema::dropIfExists('carta');
    }
}
