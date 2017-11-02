<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBandaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banda', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_usuario');
            $table->string('id_ciudad');
            $table->string('id_disco')->nullable();
            $table->string('id_integrante')->nullable();
            $table->string('id_lirica')->nullable();
            $table->string('id_genero')->nullable();
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('imagen')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('soundcloud')->nullable();
            $table->string('spotify')->nullable();
            $table->string('youtube')->nullable();
            $table->longText('historia')->nullable();
            $table->rememberToken();
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
        //
        Schema::drop('banda');
    }
}
