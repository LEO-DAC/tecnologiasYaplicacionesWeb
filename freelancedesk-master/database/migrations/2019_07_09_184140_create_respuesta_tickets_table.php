<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespuestaTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuesta_tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("id_usuario");//Un ticket lo puede responder un desarrollador o el project manager
            $table->unsignedBigInteger("id_ticket");
            $table->longText("comentario");
            $table->string("archivo",30);

            $table->foreign("id_usuario")->references("id")->on("users");
            $table->foreign("id_ticket")->references("id")->on("tickets");

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
        Schema::dropIfExists('respuesta_tickets');
    }
}
