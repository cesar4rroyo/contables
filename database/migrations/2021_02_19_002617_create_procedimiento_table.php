<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcedimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedimiento', function (Blueprint $table) {
            $table->increments('id');
            $table->text('descripcion')->nullable();
            $table->text('observacion')->nullable();
            $table->integer('plazo')->nullable();
            $table->integer('areainicio_id')->unsigned();
            $table->integer('areafin_id')->unsigned();
            $table->foreign('areainicio_id')->references('id')->on('area')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('areafin_id')->references('id')->on('area')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('procedimiento');
    }
}
