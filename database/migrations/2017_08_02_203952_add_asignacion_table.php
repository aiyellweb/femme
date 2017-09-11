<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAsignacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('equipo_id')->unsigned();
            $table->string('fecha_entraga');
            $table->string('fecha_final')->nullable();
            $table->integer('estado_id')->unsigned();
            $table->text('obersavaciones');
            $table->timestamps();

            //relaciones
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('equipo_id')->references('id')->on('equipo');
            $table->foreign('estado_id')->references('id')->on('estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignacion');
    }
}
