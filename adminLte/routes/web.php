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
    return view('plantilla');
});

// Route::view('/', 'paginas.blog');
// Route::view('/administradores', 'paginas.administradores');
// Route::view('/categorias', 'paginas.categorias');
// Route::view('/articulos', 'paginas.articulos');
// Route::view('/opiniones', 'paginas.opiniones');
// Route::view('/banner', 'paginas.banner');
// Route::view('/anuncios', 'paginas.anuncios');

// Route::get('/','BlogController@traerBlog'); ///ruta a donde va como principal, nombre del controlador y con @ nombre del metdo
// Route::get('/administradores','AdministradoresController@traerAdministradores');
// Route::get('/categorias','CategoriasController@traerCategorias');
// Route::get('/articulos', 'ArticulosController@traerAnuncios');
// Route::get('/banner','BannerController@traerBanners');
// Route::get('/opiniones', 'OpinionesController@traerOpiniones');
// Route::get('/anuncios','AnunciosController@traerAnuncios');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//rutas con todos los metodos
Route::resource('/', 'BlogController');
Route::resource('/administradores','AdministradoresController');
Route::resource('/categorias','CategoriasController');
Route::resource('/articulos', 'ArticulosController');
Route::resource('/banner','BannerController');
Route::resource('/opiniones', 'OpinionesController');
Route::resource('/anuncios','AnunciosController');

