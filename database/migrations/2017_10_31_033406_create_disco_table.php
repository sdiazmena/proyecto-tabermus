<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disco', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_banda');
            $table->string('nombre');
            $table->integer('año');
            $table->string('sello');
            $table->string('tipo');
            $table->string('caratula');
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
        Schema::dropIfExists('disco');
    }
}
