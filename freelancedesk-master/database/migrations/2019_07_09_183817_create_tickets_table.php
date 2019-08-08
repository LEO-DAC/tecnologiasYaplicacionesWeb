<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("id_cliente");
            $table->unsignedBigInteger("id_proyecto");
            $table->longText("descripcion");
            $table->longText("status");
            $table->string("archivo",30)->default("Sin archivo");
            $table->string("fecha",20);

            $table->foreign("id_cliente")->references("id")->on("users");
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
        Schema::dropIfExists('tickets');
    }
}
