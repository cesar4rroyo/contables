<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInspeccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspeccion', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fecha');
            $table->string('numero')->nullable();
            $table->string('observacion')->nullable();
            $table->string('conclusiones')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('direccion')->nullable();
            $table->string('razonsocial')->nullable();
            $table->string('ruc')->nullable();
            $table->string('dni')->nullable();
            $table->string('girocomercial')->nullable();
            $table->string('representante')->nullable();
            $table->string('situacion')->nullable();
            $table->string('archivo')->nullable();
            $table->integer('ordenpago_id')->unsigned()->nullable();
            $table->foreign('ordenpago_id')->references('id')->on('ordenpago')->onDelete('restrict')->onUpdate('restrict')->nullable();
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
        Schema::dropIfExists('inspeccion');
    }
}
