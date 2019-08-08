<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources(['user' => 'API\UserController']);

Route::apiResources(['proyectos' => 'API\ProyectosController']);
Route::apiResources(['tipos' => 'API\TiposController']);
Route::apiResources(['usuarios_proyectos' => 'API\UsuariosProyectosController']);
Route::apiResources(['empresas' => 'API\EmpresasController']);
Route::apiResources(['pagos' => 'API\PagosController']);
Route::apiResources(['clientes' => 'API\ClientesController']);
Route::apiResources(['ingresos' => 'API\IngresosController']);
Route::apiResources(['incidencias' => 'API\IssuesController']);
Route::apiResources(['projectIssue' => 'API\projectIssueController']);
Route::apiResources(['tareas' => 'API\TareasController']);
Route::apiResources(['tickets' => 'API\TicketsController']);


Route::get('/obtenerTareasDesarrollador/{idProyecto}/{idDesarrollador}', 'API\TareasController@ObtenerTareasDesarrollador');
Route::get('/obtenerProyectosDesarrollador/{id}','API\ProyectosController@obtenerProyectosDesarrollador');
Route::get('/obtenerProyecto/{id}', 'API\ProyectosController@obtenerProyecto');
Route::get('/obtenerAbonos/{id}', 'API\IngresosController@obtenerAbonos');
Route::get('/tickets/{id_cliente}', 'API\TicketsController@getProyectos');
