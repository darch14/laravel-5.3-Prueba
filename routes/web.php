<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//CLASE::METODO('NOMBRE_DE_RUTA', 'NOMBRE_DEL_CONTROLADOR@FUNCION')
Route::get('/home', 'HomeController@index');

// Noticias
Route::resource('/noticias', 'Noticias');
