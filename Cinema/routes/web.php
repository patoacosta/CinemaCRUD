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
*/

Route::group(['middelware' => ['cors']], function (){
    Route::get('/token', function (){return csrf_token();});

    Route::get('/listar', "PeliculaController@listar");
    Route::post('/registrar', "PeliculaController@registrar");
    Route::post('/eliminar/{id}', "PeliculaController@eliminar");

// test
    Route::get('/test', "PeliculaController@test");
});


