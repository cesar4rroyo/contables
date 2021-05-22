<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleasesoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalleasesoria', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('asesoria_id')->unsigned()->nullable();
            $table->foreign('asesoria_id')->references('id')->on('asesoria')->onUpdate('restrict')->onDelete('restrict');
            $table->integer('producto_id')->unsigned()->nullable();
            $table->foreign('producto_id')->references('id')->on('producto')->onUpdate('restrict')->onDelete('restrict');
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
        Schema::dropIfExists('detalleasesoria');
    }
}
