<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprobanteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comprobante', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fecha');
            $table->string('numero')->nullable();
            $table->string('tipodocumento')->nullable();
            $table->string('comentario')->nullable();
            $table->string('tipo')->nullable();
            $table->decimal('total', 8,2)->nullable();
            $table->integer('proveedor_id')->unsigned()->nullable();
            $table->foreign('proveedor_id')->references('id')->on('proveedor')->onUpdate('restrict')->onDelete('restrict');
            $table->integer('compra_id')->unsigned()->nullable();
            $table->foreign('compra_id')->references('id')->on('compra')->onUpdate('restrict')->onDelete('restrict');
            $table->integer('venta_id')->unsigned()->nullable();
            $table->foreign('venta_id')->references('id')->on('venta')->onUpdate('restrict')->onDelete('restrict');
            $table->integer('cliente_id')->unsigned()->nullable();
            $table->foreign('cliente_id')->references('id')->on('personal')->onUpdate('restrict')->onDelete('restrict');
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
        Schema::dropIfExists('comprobante');
    }
}
