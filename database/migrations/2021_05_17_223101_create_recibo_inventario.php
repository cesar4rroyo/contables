<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReciboInventario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reciboinventario', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fecha');
            $table->string('numero')->nullable();
            $table->integer('compra_id')->unsigned()->nullable();
            $table->foreign('compra_id')->references('id')->on('compra')->onUpdate('restrict')->onDelete('restrict');
            $table->integer('detallecompra_id')->unsigned()->nullable();
            $table->foreign('detallecompra_id')->references('id')->on('detallecompra')->onUpdate('restrict')->onDelete('restrict');
            $table->integer('envio_id')->unsigned()->nullable();
            $table->foreign('envio_id')->references('id')->on('envio')->onUpdate('restrict')->onDelete('restrict');
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
        Schema::dropIfExists('recibo_inventario');
    }
}
