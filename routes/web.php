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

Route::get('/', 'mainController@inicio');
Route::get('/testimonios', 'mainController@testimonios');
Route::get('/registro', 'mainController@registro');
Route::get('/Registrar', 'mainController@register');

// Empresa Alta Fase 0
Route::post('/LogIn', 'UserController@LogIn')->name('LogIn');

Route::post('/altaE', 'empresasController@storeE')->name('empresa');

Route::post('/enviarcorreo', 'userController@enviarC')->name('enviarcorreo');


//Admin
Route::get('/Login-admin', 'adminController@viewAdmin');
Route::post('/LogInA', 'adminController@LogInA')->name('LogInA');
Route::post('/recuperarContrasena', 'adminController@recuperarContrasena')->name('RecuperaC');
Route::get('/consultaEmpresas', 'adminController@consultae');
Route::get('/Eventos', 'adminController@eventos')->name('eventos');


Route::get('/link/{id}/{arch}', 'adminController@link');


//Categorias
Route::get('/consultaCat', 'catController@viewCat'); //Vista Consulta Cat
Route::get('/altaCategorias', 'catController@altaC'); //Vista Altas Cat
Route::post('/altaCat', 'catController@storeC')->name('categorias'); //Guardar Cat
Route::post('/deleteC', 'catController@deleteC')->name('catdelete'); //Eliminar Cat
Route::get('/getCat','catController@getCat');

Route::get('/consultaSub', 'subcatController@viewSub'); //Vista Consulta SubCat
Route::get('/altaSubcategorias', 'subcatController@altaS'); //Vista Altas SubCat
Route::post('/altaSub', 'subcatController@storeS')->name('subcategorias'); //Guardar SubCat
Route::post('/deleteS', 'subcatController@deleteS')->name('subcatdelete'); //Eliminar SubCat
Route::get('/getSub','subcatController@getSub');


Route::get('/consultaRecetas', 'contenidoController@viewCont'); //Vista Consulta recetas
Route::get('/altaRecetas', 'contenidoController@viewContenido'); //Vista Altas recetas
Route::post('/altaRec', 'contenidoController@store')->name('contenido'); //Guardar recetas
Route::post('/altaRec', 'contenidoController@update')->name('actcontenido'); //Guardar recetas
Route::post('/deleteRecetas', 'contenidoController@deleteR')->name('recdelete'); //Eliminar recetas
Route::get('/getCont/{n}','contenidoController@getCont');

Route::get('/consultaTestimonios', 'contenidoController@viewCont')->name('consultaTestimonios'); //Vista Consulta testimonio
Route::get('/altaTestimonios', 'contenidoController@viewContenido'); //Vista Altas testimonio
Route::post('/altaTest', 'contenidoController@store')->name('contenido'); //Guardar testimonio
Route::post('/altaRec', 'contenidoController@update')->name('actcontenido'); //Guardar recetas
Route::post('/deleteTestimonios', 'contenidoController@deleteTest')->name('testdelete'); //Eliminar testimonio
Route::get('/getCont/{n}/{T}','contenidoController@getCont'); //Get Contenido en DB
Route::get('/ActualizarContenido/{n}','contenidoController@viewActualizaCont');


/*Eventos*/
Route::get('consultaEventos', 'EventosController@consultaEventos')->name('consultaEventos');


Route::get('/getEmpresas','empresasController@getEmpresas');
Route::get('/getEmpresasM','empresasController@getEmpresasM');

Route::get('/verEmpresa/{n}/{tipo}', 'empresasController@viewE'); //Vista Empresa


//Usuarios
Route::get('/inicioUser', 'UserController@redireccion'); //Vista Altas Cat



Route::get('/LogOut', 'UserController@LogOut'); //Vista Altas Cat
