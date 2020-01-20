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

Route::get('/', function () {
    return view('welcome');
});
//rutas de pruebas
Route::get('pruebas', function(){
    
    return view('pruebas');
});

Route::get('/pruebas/usuarios', 'PruebasController@index');

Route::get('/test-orm', 'PruebasController@testOrm');

Route::get('/usuarios/pruebas', 'UserController@pruebas');
Route::get('/categorias/pruebas', 'CategoryController@pruebas');
Route::get('/post/pruebas', 'PostController@pruebas');
//rutas de pruebas   

//Me

//rutas de controlador de usuarios

Route::post('users/{id}', function ($id) {
    
});


//rutas de controlador de usuarios


