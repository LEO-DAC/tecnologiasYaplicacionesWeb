<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*///cuando un usuariio hace una peticion HTTP, laravel busca en los archivos de rutas una definición que coincide con el patron de la URL segun el metodo utilizado.

Route::get('/', function () {
    return view('welcome');
});

/*
Route::get('/principal', function () {
    return view('principal');
});

*/
Route::get('/principal', function () {
    return view('principal/contenido');
});



Route::get('/usuario', function () {
    return view('Mostrando ID del usuario:'.$_GET['id']);
});
//en la url poner /usr/?id=5


//ruta con laravel mostrando el ID de usuario con parámetros LIMPIOS

Route::get('/usuario2/{id}', function ($id) {
    return "Mostrando ID del usuario:{$id}";
})->where ('id','[0-9]+');

//ruta con 2 parámetros(nombre y apodo)
Route::get('/saludo/{name}/{nickname}', function ($name,$nickname) {
    return "Bienvenido: {$name}, tu nickname es: {$nickname}";
});


//ruta con 2 parámetros(nombre y apodo OPCIONAL)
Route::get('/saludo2/{name}/{nickname?}', function ($name,$nickname=null) {

  	if($nickname){
      return "Bienvenido: {$name}, tu nickname es: {$nickname}";
	}else{
      return "Bienvenido: {$name}, no tienes apodo";

	}
});

Route::get('/categoria','CategoriasController@index');








