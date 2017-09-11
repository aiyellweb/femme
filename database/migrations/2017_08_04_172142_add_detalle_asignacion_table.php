<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDetalleAsignacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_asignacion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('asignacion_id')->unsigned();
            $table->integer('equipo_id')->unsigned();
            $table->text('obersavaciones');
            $table->string('estado')->default('Activo');
            $table->foreign('asignacion_id')->references('id')->on('asignacion');
            $table->foreign('equipo_id')->references('id')->on('equipo');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_asignacion');
    }
}
