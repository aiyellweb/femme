<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddServicioTiqueteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicio_tiquete', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->text('observaciones');
            $table->integer('prefijos_id');
            $table->integer('numero_prefijo');
            $table->integer('estado_id')->default(1);
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
        Schema::dropIfExists('servicio_tiquete');
    }
}
