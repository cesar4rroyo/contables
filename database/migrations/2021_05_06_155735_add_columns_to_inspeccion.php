<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToInspeccion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inspeccion', function (Blueprint $table) {
            $table->string('localidad')->nullable();
            $table->string('observacion2')->nullable();
            $table->string('conclusion2')->nullable();
            $table->string('estado')->nullable();
            $table->double('area' , 8 , 2)->nullable();
            $table->integer('solicitud_id')->unsigned()->nullable();
            $table->foreign('solicitud_id')->references('id')->on('solicitud')->onUpdate('restrict')->onDelete('restrict');
            $table->string('inspector')->nullable();
         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inspeccion', function (Blueprint $table) {
            $table->dropColumn('localidad');
            $table->dropColumn('area');
            $table->dropColumn('estado');
            $table->dropColumn('solicitud_id');
            $table->dropColumn('inspector');
            $table->dropColumn('observacion2');
            $table->dropColumn('conclusion2');
        });
    }
}
