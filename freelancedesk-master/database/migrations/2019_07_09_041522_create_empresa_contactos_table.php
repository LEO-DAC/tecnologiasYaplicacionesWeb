<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaContactosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa_contactos', function (Blueprint $table) {
            
            $table->unsignedBigInteger("id_empresa")->unique();
            $table->unsignedBigInteger("id_contacto")->unique();

            $table->foreign("id_empresa")->references("id")->on("empresas");
            $table->foreign("id_contacto")->references("id")->on("users");
            $table->primary(['id_empresa','id_contacto']);

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
        Schema::dropIfExists('empresa_contactos');
    }
}
