<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("id_beneficiario");
            $table->unsignedBigInteger("id_benefactor");
            $table->double("monto",8,2);
            $table->longText("descripcion");
            $table->string("fecha",20);


            $table->foreign("id_beneficiario")->references("id")->on("users");
            $table->foreign("id_benefactor")->references("id")->on("users");
            
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
        Schema::dropIfExists('pagos');
    }
}
