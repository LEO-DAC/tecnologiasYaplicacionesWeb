<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//se incluye el modelo
use App\Categorias;
class CategoriasController extends Controller{

    public function index()
    {
        //declaramos un array llamado "Categorias" este devolvera todo lo que el metodo "all"
        // de la clase categoria tiene (El cual es el modelo., y cada vez que hacemos referencia a esta funcion index
        // se retorna un array $categorias )
        $categorias = Categorias::all();
        return $categorias;    
    }


    public function store(Request $request)
    {
        //
    }

    public function update(Request $request)
    {
        //
    }

    public function activar(Request $request){
        //
    }

    public function desactivar(Request $request){
        //
    }


}
