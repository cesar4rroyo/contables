<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('fecha')->nullable();
            $table->string('numero')->nullable();
            $table->string('descripcion')->nullable();            
            $table->string('subtipo')->nullable();
            $table->string('funcionario')->nullable();
            $table->string('telefono')->nullable();
            $table->string('contribuyente')->nullable();
            $table->string('solicito')->nullable(); //renovacion o apertura
            $table->string('duracion')->nullable(); //definitivo o temporal
            $table->string('direccion')->nullable();
            $table->string('razonsocial')->nullable();
            $table->string('ruc')->nullable();
            $table->string('dni')->nullable();
            $table->string('nombrenegocio')->nullable();
            $table->string('girocomercial')->nullable();
            $table->string('nrocertificado_nuevo')->nullable();
            $table->string('nrocertificado_vencido')->nullable();
            $table->string('representante')->nullable();
            $table->string('situacion')->nullable();
            $table->string('observacion')->nullable();
            $table->integer('tipo_id')->unsigned()->nullable();
            $table->foreign('tipo_id')->references('id')->on('tipotramitenodoc')->onUpdate('restrict')->onDelete('restrict');
            $table->integer('ordenpago_id')->unsigned()->nullable();
            $table->foreign('ordenpago_id')->references('id')->on('ordenpago')->onDelete('restrict')->onUpdate('restrict')->nullable();
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
        Schema::dropIfExists('solicitud');
    }
}
