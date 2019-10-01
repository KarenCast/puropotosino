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
Route::get('/testimonios', 'mainController@testimonios')->name('testimonios');
Route::get('/registro', 'mainController@registro')->name('registro');
Route::get('/productos', 'mainController@productos')->name('productos');
Route::get('/getProductosu','mainController@getProducto');


// Empresa Alta Fase 0
Route::post('/LogIn', 'UserController@LogIn')->name('LogIn');

Route::post('/altaE', 'empresasController@storeE')->name('empresa');

Route::post('/enviarcorreo', 'userController@enviarC')->name('enviarcorreo');



//Actualización de etapas
Route::post('/updatecero', 'UserController@etapacero')->name('etapacero');
Route::post('/updateuno', 'UserController@etapauno')->name('etapauno');
Route::post('/updatedos', 'UserController@etapados')->name('etapados');
Route::post('/updatetres', 'UserController@etapatres')->name('etapatres');
Route::post('/updatecuatro', 'UserController@etapacuatro')->name('etapacuatro');
Route::post('/updatecinco', 'UserController@etapacinco')->name('etapacinco');


//Admin
Route::get('/Login-admin', 'adminController@viewAdmin')->name('Login-admin');
Route::post('/LogInA', 'adminController@LogInA')->name('LogInA');
Route::post('/recuperarContrasena', 'adminController@recuperarContrasena')->name('RecuperaC');
Route::get('/consultaEmpresas', 'adminController@consultae')->name('consultaEmpresas');
Route::get('/Eventos', 'adminController@eventos')->name('eventos');


Route::get('/link/{id}/{arch}', 'adminController@link');
Route::get('/linkprod/{id}/{arch}', 'adminController@linkprod');


//Categorias
Route::get('/consultaCat', 'catController@viewCat')->name('consultaCat'); //Vista Consulta Cat
Route::get('/altaCategorias', 'catController@altaC')->name('altaCategorias'); //Vista Altas Cat
Route::post('/altaCat', 'catController@storeC')->name('categorias'); //Guardar Cat
Route::post('/deleteC', 'catController@deleteC')->name('catdelete'); //Eliminar Cat
Route::get('/getCat','catController@getCat');

Route::get('/consultaSub', 'subcatController@viewSub')->name('consultaSub'); //Vista Consulta SubCat
Route::get('/altaSubcategorias', 'subcatController@altaS')->name('altaSubcategorias'); //Vista Altas SubCat
Route::post('/altaSub', 'subcatController@storeS')->name('subcategorias'); //Guardar SubCat
Route::post('/deleteS', 'subcatController@deleteS')->name('subcatdelete'); //Eliminar SubCat
Route::get('/getSub','subcatController@getSub');


Route::get('/consultaRecetas', 'contenidoController@viewRecetas')->name('consultaRecetas'); //Vista Consulta recetas
Route::get('/altaRecetas', 'contenidoController@viewContenido')->name('altaRecetas'); //Vista Altas recetas
Route::post('/altaRec', 'contenidoController@store')->name('contenido'); //Guardar recetas
Route::post('/altaRec', 'contenidoController@update')->name('actcontenido'); //Guardar recetas
Route::post('/deleteRecetas', 'contenidoController@deleteR')->name('recdelete'); //Eliminar recetas
Route::get('/getCont/{n}','contenidoController@getCont');

Route::get('/consultaTestimonios', 'contenidoController@viewCont')->name('consultaTestimonios'); //Vista Consulta testimonio
Route::get('/altaTestimonios', 'contenidoController@viewContenido')->name('altaTestimonios'); //Vista Altas testimonio
Route::post('/altaTest', 'contenidoController@store')->name('contenido'); //Guardar testimonio
Route::post('/altaRec', 'contenidoController@update')->name('actcontenido'); //Guardar recetas
Route::post('/deleteTestimonios', 'contenidoController@deleteTest')->name('testdelete'); //Eliminar testimonio
Route::get('/getCont/{n}/{T}','contenidoController@getCont'); //Get Contenido en DB
Route::get('/getRec//','contenidoController@getRec'); //Get Contenido en DB
Route::get('/ActualizarContenido/{n}','contenidoController@viewActualizaCont');


/*Eventos*/
Route::get('consultaEventos', 'EventosController@consultaEventos')->name('consultaEventos');

/*Recetas*/
Route::get('Recetas', 'contenidoController@viewRecetasFront')->name('recetas');

Route::get('/getEmpresas','empresasController@getEmpresas');
Route::get('/getEmpresasM','empresasController@getEmpresasM');

Route::get('/verEmpresa/{n}/{tipo}', 'empresasController@viewE')->name('verEmpresa'); //Vista Empresa por admin

//Usuarios
Route::get('/inicioUser', 'UserController@redireccion')->name('inicioUser');
Route::get('/LogOut', 'UserController@LogOut');
Route::get('/consultaEtapas','UserController@viewEtapas')->name('consultaEtapas');


//Marcas
Route::get('/altaMarca','marcaController@viewAltaMarca')->name('altaMarca');
Route::post('/altaM', 'marcaController@storeM')->name('marca');
Route::get('/consultaMarcas', 'marcaController@viewConsultaMarca')->name('consultaMarcas'); //Vista Consulta recetas
Route::get('/getMarca','marcaController@getMarca');
Route::get('/actualizarMarca/{n}','marcaController@viewActualizaMarca');
Route::post('/umarca', 'marcaController@umarca')->name('umarca');


//Productos
Route::get('/altaProducto','productoController@viewAltaProducto')->name('altaProducto');
Route::post('/altaP', 'productoController@storeP')->name('producto');
Route::get('/consultaProductos', 'productoController@viewConsultaProducto')->name('consultaProducto'); //Vista Consulta recetas
Route::get('/getProductos','productoController@getProducto');
Route::get('/actualizarProducto/{n}','productoController@viewActualizaProducto');
Route::post('/uproducto', 'productoController@uproducto')->name('uproducto');
