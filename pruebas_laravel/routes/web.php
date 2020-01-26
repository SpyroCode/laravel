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

//metodos http comunes

//GET: Conseguir Datos o redursos
//POST: Guadar datos o recursos->logia o hacer algo
//PUT: Actualizar recursos o datos
//DELETE: Eliminar datos o recursos


//rutas de controlador de usuarios

Route::post('/api/register','UserController@register');
Route::post('/api/login','UserController@login');

