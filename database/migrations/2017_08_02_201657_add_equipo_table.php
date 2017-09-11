<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEquipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo_equipo_id')->unsigned();
            $table->string('marca')->nullable();
            $table->string('sistema')->nullable();
            $table->string('procesador')->nullable();
            $table->string('ram')->nullable();
            $table->string('discoduro')->nullable();
            $table->string('parlantes')->nullable();

            $table->string('teclado')->nullable();
            $table->string('ip')->nullable();
            $table->string('mouse')->nullable();
            $table->string('serial_sistema')->nullable();
            $table->string('serial_procesador')->nullable();
            $table->string('serial_discoduro')->nullable();
            $table->string('serial_ram')->nullable();
            $table->string('serial_parlantes')->nullable();

            $table->string('marca_ram')->nullable();
            $table->string('marca_mouse')->nullable();
            $table->string('marca_procesador')->nullable();
            $table->string('marca_sistema')->nullable();
            $table->string('marca_parlantes')->nullable();

            $table->string('modelo_mouse')->nullable();
            $table->string('modelo_procesador')->nullable();
            $table->string('modelo_monitor')->nullable();
            $table->string('modelo_parlantes')->nullable();
            $table->string('modelo_teclado')->nullable();
            $table->string('modelo_ram')->nullable();
            $table->string('otros_descripcion');
            $table->string('marca_unica');
            $table->integer('estado_id')->unsigned();          

            $table->timestamps();

            //relaciones
            $table->foreign('estado_id')->references('id')->on('estado');
            $table->foreign('tipo_equipo_id')->references('id')->on('tipo_equipo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipo');
    }
}
