<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInversionProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inversion_proyectos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger("id_proyecto");
            $table->longText("nombre");
            $table->longText("descripcion");

            $table->foreign("id_proyecto")->references("id")->on("proyectos");

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
        Schema::dropIfExists('inversion_proyectos');
    }
}
