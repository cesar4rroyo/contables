<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChequeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cheque', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fecha');
            $table->string('numero')->nullable();
            $table->string('banco')->nullable();
            $table->string('cuenta')->nullable();
            $table->string('beneficiario')->nullable();
            $table->decimal('cantidad')->nullable();
            $table->string('tipo')->nullable();
            $table->integer('compra_id')->unsigned()->nullable();
            $table->foreign('compra_id')->references('id')->on('compra')->onUpdate('restrict')->onDelete('restrict');
            $table->integer('comprobante_id')->unsigned()->nullable();
            $table->foreign('comprobante_id')->references('id')->on('comprobante')->onUpdate('restrict')->onDelete('restrict');
            $table->integer('nomina_id')->unsigned()->nullable();
            $table->foreign('nomina_id')->references('id')->on('nomina')->onUpdate('restrict')->onDelete('restrict');
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
        Schema::dropIfExists('cheque');
    }
}
