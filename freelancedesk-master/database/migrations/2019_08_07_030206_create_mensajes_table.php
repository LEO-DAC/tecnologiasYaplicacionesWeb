<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensajes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger("id_emisor");
            $table->unsignedBigInteger("id_ticket");
            $table->longText('mensaje');
            $table->string("fecha",30);
            $table->string("archivo",30)->default("Sin archivo");
            $table->timestamps();
          
            $table->foreign("id_ticket")->references("id")->on("tickets");
            $table->foreign("id_emisor")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mensajes');
    }
}
