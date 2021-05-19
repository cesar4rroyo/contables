<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dni')->nullable();
            $table->string('apellidopaterno', 200)->nullable();
            $table->string('apellidomaterno', 200)->nullable();
            $table->string('nombres', 200)->nullable();
            $table->string('ruc')->nullable();
            $table->string('razonsocial', 200)->nullable();
            $table->string('representante', 200)->nullable();
            $table->string('telefono')->nullable();
            $table->string('direccion', 200)->nullable();
            $table->string('email', 200)->nullable();
            $table->unsignedInteger('area_id')->nullable();
            $table->foreign('area_id', 'fk_personal_area')
                ->nullable()
                ->references('id')
                ->on('area')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->unsignedInteger('cargo_id')->nullable();
            $table->foreign('cargo_id', 'fk_personal_cargo')
                ->nullable()
                ->references('id')
                ->on('cargo')
                ->onDelete('restrict')
                ->onUpdate('restrict');
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
        Schema::dropIfExists('personal');
    }
}
