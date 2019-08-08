<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingresos', function (Blueprint $table) {
            $table->increments('id');
						$table->string('nombre');
						$table->string('detalle');
						$table->double('cantidad', 10, 2);
						$table->string('fecha');

						
						$table->bigInteger('id_usuario')->unsigned();
						$table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
					
						$table->bigInteger('id_proyecto')->unsigned();
						$table->foreign('id_proyecto')->references('id')->on('proyectos')->onDelete('cascade');
					

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
        Schema::dropIfExists('ingresos');
    }
}
