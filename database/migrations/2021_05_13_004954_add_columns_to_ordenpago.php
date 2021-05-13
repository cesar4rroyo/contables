<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToOrdenpago extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ordenpago', function (Blueprint $table) {
            $table->string('representante')->nullable();
            $table->string('estado')->nullable();
            $table->string('cuenta')->nullable();
            $table->string('numerooperacion')->nullable();
            $table->date('fechaoperacion')->nullable();
            $table->string('imagen')->nullable();

            $table->integer('subtipo_id')->unsigned()->nullable();
            $table->integer('tramiteref_id')->unsigned()->nullable();
            $table->foreign('subtipo_id')->references('id')->on('subtipotramitenodoc')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign('tramiteref_id')->references('id')->on('tramite')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ordenpago', function (Blueprint $table) {
            $table->dropColumn('representante');
            $table->dropColumn('estado');
            $table->dropColumn('cuenta');
            $table->dropColumn('numerooperacion');
            $table->dropColumn('fechaoperacion');
            $table->dropColumn('imagen');
            $table->dropColumn('subtipo_id');
            $table->dropColumn('tramiteref_id');
        });
    }
}
