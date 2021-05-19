<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagoclienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagocliente', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fecha');
            $table->decimal('total')->nullable();
            $table->integer('pago_id')->unsigned()->nullable();
            $table->foreign('pago_id')->references('id')->on('pago')->onUpdate('restrict')->onDelete('restrict');
            $table->integer('cliente_id')->unsigned()->nullable();
            $table->foreign('cliente_id')->references('id')->on('personal')->onUpdate('restrict')->onDelete('restrict');
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
        Schema::dropIfExists('pagocliente');
    }
}
