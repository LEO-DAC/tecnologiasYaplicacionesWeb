<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("id_proyecto");
            $table->unsignedBigInteger("id_desarrollador");
            $table->longText("nombre");
            $table->longText("descripcion");
            $table->string("status",20);
            $table->decimal("monto",10,2);

            //$table->foreign("id_desarrollador")->referenes("id")->on("usuarios");
            //$table->foreign("id_proyecto")->referenes("id")->on("proyectos");
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
        Schema::dropIfExists('tareas');
    }
}
