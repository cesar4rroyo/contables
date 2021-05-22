<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fecharegistro')->nullable();
            $table->dateTime('fechaenvio')->nullable();
            $table->dateTime('fechafin')->nullable();
            $table->string('numero')->nullable();
            $table->string('estado')->nullable();
            $table->string('motivo')->nullable();
            $table->decimal('total', 8,2)->nullable();
            $table->integer('asesoria_id')->unsigned()->nullable();
            $table->integer('cliente_id')->unsigned()->nullable();
            $table->foreign('asesoria_id')->references('id')->on('asesoria')->onUpdate('restrict')->onDelete('restrict');
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
        Schema::dropIfExists('venta');
    }
}
