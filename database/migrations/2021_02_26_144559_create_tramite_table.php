<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTramiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tramite', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero');
            $table->string('tipo')->nullable();
            $table->dateTime('fecha');
            $table->string('asunto')->nullable();
            $table->string('remitente')->nullable();
            $table->string('formarecepcion')->nullable();
            $table->integer('folios')->nullable();
            $table->text('observacion')->nullable();
            $table->string('prioridad')->nullable();
            $table->string('situacion')->nullable();
            $table->integer('tipodocumento_id')->unsigned()->nullable();
            $table->integer('procedimiento_id')->unsigned()->nullable();
            $table->integer('personal_id')->unsigned()->nullable();
            $table->integer('archivador_id')->unsigned()->nullable();
            $table->integer('motivorechazo_id')->unsigned()->nullable();
            $table->integer('empresacourier_id')->unsigned()->nullable();
            $table->integer('tramiteref_id')->unsigned()->nullable();
            
            $table->foreign('tipodocumento_id')->references('id')->on('tipodocumento')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign('procedimiento_id')->references('id')->on('procedimiento')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign('personal_id')->references('id')->on('personal')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign('archivador_id')->references('id')->on('archivador')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign('motivorechazo_id')->references('id')->on('motivorechazo')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign('empresacourier_id')->references('id')->on('empresacourier')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign('tramiteref_id')->references('id')->on('tramite')->onUpdate('restrict')->onDelete('restrict');
            
            $table->string('correo')->nullable();
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
        Schema::dropIfExists('tramite');
    }
}
