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
            $table->dateTime('fecha');
            $table->string('accion')->nullable();
            $table->string('observacion')->nullable();
            $table->integer('orden')->nullable();
            $table->integer('ultimo')->nullable();
            $table->integer('compra_id')->unsigned()->nullable();
            $table->foreign('compra_id')->references('id')->on('compra')->onUpdate('restrict')->onDelete('restrict');
            $table->integer('nomina_id')->unsigned()->nullable();
            $table->foreign('nomina_id')->references('id')->on('nomina')->onUpdate('restrict')->onDelete('restrict');
            $table->integer('devolucion_id')->unsigned()->nullable();
            $table->foreign('devolucion_id')->references('id')->on('devolucion')->onUpdate('restrict')->onDelete('restrict');
            $table->integer('venta_id')->unsigned()->nullable();
            $table->foreign('venta_id')->references('id')->on('venta')->onUpdate('restrict')->onDelete('restrict');
            $table->integer('usuario_id')->unsigned()->nullable();
            $table->foreign('usuario_id')->references('id')->on('usuario')->onUpdate('restrict')->onDelete('restrict');
            $table->integer('area_id')->unsigned()->nullable();
            $table->foreign('area_id')->references('id')->on('area')->onUpdate('restrict')->onDelete('restrict');
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
