<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDescuentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descuento', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('porcentaje', 8,2)->nullable();
            $table->integer('cliente_id')->unsigned()->nullable();
            $table->integer('producto_id')->unsigned()->nullable();
            $table->foreign('cliente_id')->references('id')->on('personal')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('producto_id')->references('id')->on('producto')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('descuento');
    }
}
