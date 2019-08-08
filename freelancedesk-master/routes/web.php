<?php

Auth::routes();

Route::group(['middleware'=>['guest']],function(){
    Route::get('/','Auth\LoginController@showLoginForm');
    Route::post('/login', 'Auth\LoginController@login')->name('login');
});
Route::get('/home', 'HomeController@index')->name('home');

Route::post('/proyectos', 'API\ProyectosController@proyectos');
Route::post('/proyectosCliente', 'API\ProyectosController@proyectosCliente');
Route::post('/proyecto', 'API\ProyectosController@mostrarProyecto');

Route::get('{path}', 'HomeController@index')->where( 'path' , '([A-z\d\-\/_.]+)?' );

?>