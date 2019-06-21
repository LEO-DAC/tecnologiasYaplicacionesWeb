<?php

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Cuando un usuario hace una petición HTTP, laravel busca en los archivos de rutas una definición que coincida con el patron de la URL según el método utilizado, en este caso HTTP, encontrando una coincidencia, la muestra

Route::get('/', function () {
    //return Excel::download(new UsersExport, 'users.xlsx');
    return view('welcome');
});

Route::get('formulario', 'StorageController@index');

Route::post('storage/create', 'StorageController@save');

Route::get('storage/{archivo}', function ($archivo) {
    $public_path = public_path();
    $url = $public_path.'/storage/'.$archivo;
    //verificamos si el archivo existe y lo retornamos
    if (Storage::exists($archivo))
    {
      return response()->download($url);
    }
    //si no se encuentra lanzamos un error 404.
    abort(404);

});

Route::get('/usuario', function(){
  return ('Mostrando ID del usuario: '.$_GET['id']);
});

// Ruta con Laravel mostrando el ID de usuario con parámetros limpios
Route::get('/usuario2/{id}', function($id){
  return "Mostrando ID del usuario: {$id}";
})->where('id', '[0-9]+');

// Ruta con 2 parámetros (Nombre y apodo)
Route::get('saludo/{name}/{nickname}', function($name, $nickname){
  return "Bienvenido {$name}, tu apodo es {$nickname}";
});

// Ruta con 2 parámetros (Nombre y apodo OPCIONAL)
Route::get('saludo2/{name}/{nickname?}', function($name, $nickname=null){
  if($nickname)
    return "Bienvenido {$name}, tu apodo es {$nickname}";
  else
    return "Bienvenido {$name}";
});

// Ruta para principal, listado de la plantilla CON SECTION & YIELD
Route::get('principal', function(){
  return view('principal/contenido');
});

Route::get('/categoria', 'CategoriasController@index');
