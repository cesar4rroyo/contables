<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolpersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rolpersonal', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('personal_id');
            $table->foreign('personal_id', 'fk_rolpersonal_personal')
                ->references('id')
                ->on('personal');
            $table->unsignedInteger('rol_id');
            $table->foreign('rol_id', 'fk_rolpersonal_rol')
                ->references('id')
                ->on('rol');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rolpersonal');
    }
}
