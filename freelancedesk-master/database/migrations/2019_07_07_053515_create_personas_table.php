<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("nombre",50);
            $table->string("paterno",50);
            $table->string("materno",50);
            $table->string("correo",50)->unique();
            $table->string("telefono",25);
            $table->string("password",20);
            $table->string("pais",50);
            $table->string("estado",50);
            $table->string("ciudad",50);
            
            $table->timestamps();
        });
    }

    /*
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
