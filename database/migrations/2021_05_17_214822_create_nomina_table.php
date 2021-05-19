<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNominaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nomina', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fecha');
            $table->integer('total')->nullable();
            $table->string('estado')->nullable();
            $table->integer('empleado_id')->unsigned()->nullable();
            $table->foreign('empleado_id')->references('id')->on('personal')->onUpdate('restrict')->onDelete('restrict');
            $table->integer('impuesto_id')->unsigned()->nullable();
            $table->foreign('impuesto_id')->references('id')->on('impuesto')->onUpdate('restrict')->onDelete('restrict');
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
        Schema::dropIfExists('nomina');
    }
}
