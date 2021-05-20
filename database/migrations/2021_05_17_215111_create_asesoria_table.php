<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsesoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asesoria', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fecha');
            $table->integer('cliente_id')->unsigned()->nullable();
            $table->integer('empleado_id')->unsigned()->nullable();
            $table->foreign('cliente_id')->references('id')->on('personal')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('empleado_id')->references('id')->on('personal')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('asesoria');
    }
}
