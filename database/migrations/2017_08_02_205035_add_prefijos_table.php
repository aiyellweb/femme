<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPrefijosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prefijos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('prefijo');
            $table->integer('inicial');
            $table->integer('actual');
            $table->integer('final');
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
        Schema::dropIfExists('prefijos');
    }
}
