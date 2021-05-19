<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarjetacontrolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarjetacontrol', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fecha');
            $table->integer('horastrabajadas')->nullable();
            $table->integer('empleado_id')->unsigned()->nullable();
            $table->foreign('empleado_id')->references('id')->on('personal')->onUpdate('restrict')->onDelete('restrict');
            $table->integer('carpetaempleado_id')->unsigned()->nullable();
            $table->foreign('carpetaempleado_id')->references('id')->on('carpetaempleado')->onUpdate('restrict')->onDelete('restrict');
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
        Schema::dropIfExists('tarjetacontrol');
    }
}
