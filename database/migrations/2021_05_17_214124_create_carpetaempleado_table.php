<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarpetaempleadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carpetaempleado', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('salario', 8,2);
            $table->integer('empleado_id')->unsigned()->nullable();
            $table->foreign('empleado_id')->references('id')->on('personal')->onUpdate('restrict')->onDelete('restrict');
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
        Schema::dropIfExists('carpetaempleado');
    }
}
