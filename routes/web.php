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



//Admin
Route::get('/Login-admin', 'adminController@viewAdmin');
Route::post('/LogInA', 'adminController@LogInA')->name('LogInA');
Route::post('/recuperarContrasena', 'adminController@recuperarContrasena')->name('RecuperaC');
Route::get('/consultaEmpresas', 'adminController@consultae');
Route::get('/Eventos', 'adminController@eventos')->name('eventos');

//Categorias
Route::get('/consultaCat', 'catController@viewCat'); //Vista Consulta Cat
Route::get('/altaCategorias', 'catController@altaC'); //Vista Altas Cat
Route::post('/altaCat', 'catController@storeC')->name('categorias'); //Guardar Cat
Route::post('/deleteC', 'catController@deleteC')->name('catdelete'); //Eliminar Cat

Route::get('/consultaSub', 'subcatController@viewSub'); //Vista Consulta SubCat
Route::get('/altaSubcategorias', 'subcatController@altaS'); //Vista Altas SubCat
Route::post('/altaSub', 'subcatController@storeS')->name('subcategorias'); //Guardar SubCat
Route::post('/deleteS', 'subcatController@deleteS')->name('subcatdelete'); //Eliminar SubCat


Route::get('/consultaRec', 'subcatController@viewSub'); //Vista Consulta recetas
Route::get('/altaRecetas', 'subcatController@altaS'); //Vista Altas recetas
Route::post('/altaRecetas', 'subcatController@storeS')->name('subcategorias'); //Guardar recetas
Route::post('/deleteS', 'subcatController@deleteS')->name('subcatdelete'); //Eliminar recetas
Route::get('/getCat','catController@getCat');

Route::get('/consultaSub', 'subcatController@viewSub'); //Vista Consulta testimonio
Route::get('/altaSubcategorias', 'subcatController@altaS'); //Vista Altas testimonio
Route::post('/altaSub', 'subcatController@storeS')->name('subcategorias'); //Guardar testimonio
Route::post('/deleteS', 'subcatController@deleteS')->name('subcatdelete'); //Eliminar testimonio
Route::get('/getSub','subcatController@getSub');



Route::get('/getEmpresas','empresasController@getEmpresas');
Route::get('/getEmpresasM','empresasController@getEmpresasM');

Route::get('/verEmpresa/{n}', 'empresasController@viewE'); //Vista Empresa



//Usuarios
Route::get('/inicioUser', 'UserController@redireccion'); //Vista Altas Cat



Route::get('/logOut', 'UserController@LogOut'); //Vista Altas Cat


