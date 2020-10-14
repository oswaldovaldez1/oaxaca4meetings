<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeccionImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seccion_image', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('img',255);
            $table->text('titulo');
            $table->text('pie_pagina');
            $table->unsignedBigInteger('id_seccion');
            $table->timestamps();

            $table->foreign('id_seccion')
            ->references('id')
            ->on('secciones')
            ->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seccion_image');
    }
}
