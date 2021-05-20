<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fechasolicitud');
            $table->dateTime('fechaesperada');
            $table->dateTime('fechaentrega')->nullable();
            $table->string('factura')->nullable();
            $table->string('observacion')->nullable();
            $table->string('estado')->nullable();
            $table->string('numero')->nullable();
            $table->string('tipo')->nullable();
            $table->decimal('total', 8,2)->nullable();
            $table->integer('proveedor_id')->unsigned()->nullable();
            $table->foreign('proveedor_id')->references('id')->on('proveedor')->onUpdate('restrict')->onDelete('restrict');
            $table->integer('area_id')->unsigned()->nullable();
            $table->foreign('area_id')->references('id')->on('area')->onUpdate('restrict')->onDelete('restrict');
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
        Schema::dropIfExists('compra');
    }
}
