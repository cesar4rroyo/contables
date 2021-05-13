<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresacourierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresacourier', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ruc',30);
            $table->string('razonsocial', 200);
            $table->text('direccion')->nullable();
            $table->text('representante')->nullable();
            $table->string('telefono',30)->nullable();
            $table->string('email',150)->nullable();
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
        Schema::dropIfExists('empresacourier');
    }
}
