<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('login');
            $table->string('password');
            $table->unsignedInteger('tipousuario_id')->nullable();
            $table->foreign('tipousuario_id', 'fk_usuario_tipousuario')
                ->nullable()
                ->references('id')
                ->on('tipousuario')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->unsignedInteger('personal_id')->nullable();
            $table->foreign('personal_id', 'fk_usuario_personal')
                ->nullable()
                ->references('id')
                ->on('personal')
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
        Schema::dropIfExists('usuario');
    }
}
