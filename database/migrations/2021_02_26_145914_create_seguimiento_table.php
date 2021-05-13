<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeguimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguimiento', function (Blueprint $table) {
            $table->increments('id');
            $table->string('correlativo')->nullable();
            $table->string('correlativo_anterior')->nullable();
            $table->dateTime('fecha');
            $table->string('accion')->nullable();
            $table->text('observacion')->nullable();
            $table->text('ultimo')->nullable();
            $table->text('area')->nullable();
            $table->text('cargo')->nullable();
            $table->text('persona')->nullable();
            $table->text('recibido')->nullable();
            $table->dateTime('fecharecibe')->nullable();
            $table->string('tiposeguimiento')->nullable();
            $table->string('ruta')->nullable();

            $table->integer('tramite_id')->unsigned()->nullable();
            $table->integer('personal_id')->unsigned()->nullable();
            $table->integer('area_id')->unsigned()->nullable();
            $table->integer('cargo_id')->unsigned()->nullable();
            $table->integer('motivocourier_id')->unsigned()->nullable();
            $table->integer('motivorechazo_id')->unsigned()->nullable();

            $table->foreign('tramite_id')->references('id')->on('tramite')->onUpdate('restrict')->onDelete('restrict')->nullable();
            $table->foreign('personal_id')->references('id')->on('personal')->onUpdate('restrict')->onDelete('restrict')->nullable();
            $table->foreign('area_id')->references('id')->on('area')->onUpdate('restrict')->onDelete('restrict')->nullable();
            $table->foreign('cargo_id')->references('id')->on('cargo')->onUpdate('restrict')->onDelete('restrict')->nullable();
            $table->foreign('motivocourier_id')->references('id')->on('motivocourier')->onUpdate('restrict')->onDelete('restrict')->nullable();
            $table->foreign('motivorechazo_id')->references('id')->on('motivorechazo')->onUpdate('restrict')->onDelete('restrict')->nullable();
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
        Schema::dropIfExists('seguimiento');
    }
}
