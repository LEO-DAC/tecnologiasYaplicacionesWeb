<?php

use Illuminate\Http\Request;
use App\Persona;
Route::get('personas',function(){

    return Persona::get();
});


//obtener una persona
Route::get('personas/{id}',function($id){
       $persona = Persona::findOrFail($id);
       return $persona; 
});



//obtener una persona
Route::get('test',function(){
    return view('test'); 
});


//ruta para guardar una persona
Route::post('personas',function(Request $request){
   //se valdian los campos recividos por el objeto request mediante el metodo post
    $request->validate([
        'nombre'=>'required|max:50',
        'apellidos'=>'required|max:50',
        'correo'=>'required|max:50|email|unique:personas',
        'pais'=>'required',
        'estado'=>'required'        
        ]);    
    $persona = new Persona();
    $persona->nombre  = $request->input('nombre');
    $persona->apellidos  = $request->input('apellidos');
    $persona->correo = $request->input('correo');
    $persona->pais = $request->input('pais');
    $persona->estado = $request->input('estado');
    $persona->save();
    return 'Persona creada';
});


//ruta para actualizar una persona
Route::put('personas/{id}',function(Request $request, $id){
    $persona = Persona::findOrFail($id);
    
    $request->validate([
        'nombre'=>'required|max:50',
        'apellidos'=>'required|max:50',
        'correo'=>'required|max:50|email|unique:personas,correo,'.$id,
        'pais'=>'required',
        'estado'=>'required'        
        ]);    
    $persona->nombre  = $request->input('nombre');
    $persona->apellidos  = $request->input('apellidos');
    $persona->correo = $request->input('correo');
    $persona->pais = $request->input('pais');
    $persona->estado = $request->input('estado');
    $persona->save();
    return 'Persona Aztualizada';

});

//ruta para eliminar una persona
Route::delete('personas/{id}',function(Request $request,$id){
    $persona = Persona::findOrFail($id);
    $persona->delete();
    return 'Persona eliminada exitosamente';
});