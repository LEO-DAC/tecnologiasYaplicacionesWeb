<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;

class PersonasController extends Controller
{
  public function mostrarPersonas(){
    
    return Persona::get();
    
  }
}
