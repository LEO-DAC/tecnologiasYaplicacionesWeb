<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("id_cliente");
            $table->unsignedBigInteger("id_project_manager");
            $table->foreign("id_project_manager")->references("id")->on("users");
            $table->foreign("id_cliente")->references("id")->on("users");
            $table->string("nombre",50)->unique();
            $table->string("fecha_inicio",20);
            $table->string("fecha_fin",20);
            $table->string("status",20);
            $table->decimal("precio",8,2);
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
        Schema::dropIfExists('proyectos');
    }
}
