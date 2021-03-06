<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActualizacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actualizacion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_banda');
            $table->string('id_ciudad');
            $table->integer('id_show')->nulleable();
            $table->string('id_disco')->nullable();
            $table->string('detalles');
            $table->datetime('fecha');
            $table->string('id_region');
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
        Schema::dropIfExists('actualizacion');
    }
}
