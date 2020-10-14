<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GaleriaImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galeria_imagen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('img',100);
            $table->unsignedBigInteger('id_galeria');
            $table->timestamps();

            $table->foreign('id_galeria')
            ->references('id')
            ->on('galeria')
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
        Schema::dropIfExists('galeria_imagen');
    }
}
