<?php

namespace App\Http\Controllers\API;

use App\tipos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TiposController extends Controller{
   
  
      public function index(){
				$tipos = tipos::where([
                                ['nombre','!=','Cliente'],        // se limita a no mostrar a:
                                ['nombre','!=','ProjectManager'], //  Cliente y ProjectManager como opciones en tipos para Desarrolladores 
                              ])->latest()->paginate(10); //se paginan 10 registros a la vez
				return $tipos;
    }
	
	    public function show(tipos $tipos)
    {
        //
    }
  
}
