<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallecomprobanteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallecomprobante', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('precicompra', 8,2)->nullable();
            $table->decimal('precioventa', 8,2)->nullable();
            $table->integer('cantidad')->nullable();
            $table->integer('producto_id')->unsigned()->nullable();
            $table->foreign('producto_id')->references('id')->on('producto')->onUpdate('restrict')->onDelete('restrict');
            $table->integer('activo_id')->unsigned()->nullable();
            $table->foreign('activo_id')->references('id')->on('activo')->onUpdate('restrict')->onDelete('restrict');
            $table->integer('comprobante_id')->unsigned()->nullable();
            $table->foreign('comprobante_id')->references('id')->on('comprobante')->onUpdate('restrict')->onDelete('restrict');
            $table->integer('descuento_id')->unsigned()->nullable();
            $table->foreign('descuento_id')->references('id')->on('descuento')->onUpdate('restrict')->onDelete('restrict');
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
        Schema::dropIfExists('detallecomprobante');
    }
}
