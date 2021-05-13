<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenpagoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenpago', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero' , 30)->nullable();
            $table->string('contribuyente' , 200)->nullable();
            $table->string('dni_ruc' , 20)->nullable();
            $table->datetime('fecha')->nullable();
            $table->string('descripcion' , 200)->nullable();
            $table->string('direccion' , 200)->nullable();
            $table->double('monto' , 8 , 2)->nullable();
            $table->integer('tipo_id')->unsigned()->nullable();

            $table->foreign('tipo_id')->references('id')->on('tipotramitenodoc')->onUpdate('restrict')->onDelete('restrict');
            
            $table->softDeletes();
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
        Schema::dropIfExists('ordenpago');
    }
}
