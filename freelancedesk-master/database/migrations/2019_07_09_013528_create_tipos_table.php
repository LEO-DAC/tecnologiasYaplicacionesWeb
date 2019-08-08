<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\tipos;
class CreateTiposTable extends Migration{

    public function up(){
        Schema::create('tipos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("nombre",50);
            $table->timestamps();
        });
      
        //se crean los tipos de usuario
        $persona = new tipos();
        $persona->nombre  = "Cliente";
        $persona->save();
        $persona = new tipos();
        $persona->nombre  = "ProjectManager";
        $persona->save();
        $persona = new tipos();
        $persona->nombre  = "backend";
        $persona->save();
        $persona = new tipos();
        $persona->nombre  = "fontend";
        $persona->save();
        $persona = new tipos();
        $persona->nombre  = "fullstack";
        $persona->save();
    }

    public function down(){
        Schema::dropIfExists('tipos');
    }
}
