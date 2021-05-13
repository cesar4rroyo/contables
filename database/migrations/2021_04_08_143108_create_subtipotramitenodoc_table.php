<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubtipotramitenodocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subtipotramitenodoc', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion')->nullable();
            $table->integer('tipotramitenodoc_id')->unsigned()->nullable();
            $table->foreign('tipotramitenodoc_id')->references('id')->on('tipotramitenodoc')->onUpdate('restrict')->ondelete('restrict')->nullable();
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
        Schema::dropIfExists('subtipotramitenodoc');
    }
}
