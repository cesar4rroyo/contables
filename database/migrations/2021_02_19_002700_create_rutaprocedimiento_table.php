<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRutaprocedimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rutaprocedimiento', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('plazo')->nullable();
            $table->integer('orden')->nullable();
            $table->integer('procedimiento_id')->unsigned()->nullable();
            $table->integer('areainicial_id')->unsigned()->nullable();
            $table->integer('areafinal_id')->unsigned()->nullable();
            $table->foreign('procedimiento_id')->references('id')->on('procedimiento')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('areainicial_id')->references('id')->on('area')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('areafinal_id')->references('id')->on('area')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('rutaprocedimiento');
    }
}
