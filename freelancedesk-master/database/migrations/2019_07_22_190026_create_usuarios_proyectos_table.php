<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosProyectosTable extends Migration{

    public function up(){
        Schema::create('usuarios_proyectos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger("id_proyecto");
            $table->unsignedBigInteger("id_usuario");
            $table->unsignedBigInteger("id_tipo");
            $table->string("status",20);
            $table->longText("comentarios");
            $table->foreign("id_proyecto")->references("id")->on("proyectos");
            $table->foreign("id_usuario")->references("id")->on("users");
            $table->foreign("id_tipo")->references("id")->on("tipos");
            $table->timestamps();
        }); 
       
    }

    public function down(){
        Schema::dropIfExists('usuarios_proyectos');
    }
}
