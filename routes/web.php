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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('login/', 'Auth\LoginController@showLoginForm');

/*Route::get('/admin/home', 'HomeController@index');
Route::get('/admin/exportarDashboard/{tipo}/{marca}/{valor_marca}/{filtro}','HomeController@exportar_dashboard')->name('admin.exportar.dashboard');
Route::post('admin/cargar/dashboard','HomeController@cargar_dashboard')->name('admin.cargar.dashboard');*/

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {

	Route::get('/home', 'HomeController@carteras')->name('home');
	Route::get('/resumen-ejecutivos', 'HomeController@resumen_ejecutivos')->name('resumen-ejecutivos');
	Route::get('/seleccion', 'HomeController@seleccion')->name('seleccion');
	Route::get('/gestion-diaria', 'GestionController@gestion_diaria')->name('gestion-diaria');

    Route::resource('usuarios', 'UserController');

	Route::group(['prefix' => 'usuarios'], function () {
		Route::get('eliminar/{usuario}', 'UserController@destroy')->name('usuarios.borrar');
		Route::get('table/listado', 'UserController@list')->name('usuarios.listado');
	});

	Route::group(['prefix' => 'archivos'], function () {
		Route::get('cargar', 'ArchivosController@cargar')->name('archivos.cargar'); 
		Route::get('exportar', 'ArchivosController@exportar');
		Route::post('importar', 'ArchivosController@importar')->name('archivos.importar'); 
	});

	Route::resource('deudores', 'DeudorController');
	//Route::post('deudores/listado_filtro','DeudorController@listado_filtro')->name('deudores.listado_filtro');

	Route::group(['prefix' => 'deudores'], function () {
		Route::get('table/listado/{cartera}/{marca}', 'DeudorController@list')->name('deudores.listado');
		
		//Route::get('gestion/nueva/{iddeudor}', 'DeudorController@gestion')->name("deudores.gestion");
		
		Route::get('gestion/historico/{iddeudor}', 'DeudorController@gestionhistorica')->name('deudores.gestion.historico'); 
		Route::get('detalles-resumen/{iddeudor}', 'DeudorController@detallesdeudor')->name('deudores.resumen');  
		Route::get('gestion/direcciones/{iddeudor}','DeudorController@direcciones')->name('deudores.direcciones');
		Route::get('gestion/documentos/{iddeudor}','DeudorController@documentos')->name('deudores.documentos');
		Route::get('gestion/historial/{iddeudor}','DeudorController@gestioneshistorial')->name('deudores.gestion.historial');
		
		Route::get('gestion/nueva/{iddeudor}','DeudorController@gestionnueva')->name('deudores.gestion');
		
		Route::post('agregar/contacto/','DeudorController@agregar_contacto')->name('deudores.agregar.contacto');
		Route::post('modificar/contacto/','DeudorController@modificar_contacto')->name('deudores.modificar.contacto');
	});

	Route::resource('gestores', 'GestorController');
	Route::group(['prefix' => 'gestores'], function () {
		Route::get('crear/cartera','GestorController@nuevacartera')->name('gestores.nueva.cartera');
		Route::post('crear/cartera', 'GestorController@crearcartera')->name('gestores.store.cartera');
		Route::get('table/listado', 'GestorController@list')->name('gestores.listado');  
	});

	Route::resource('carteras', 'CarteraController');
	Route::group(['prefix' => 'carteras'], function () {
		Route::get('table/listado', 'CarteraController@list')->name('carteras.listado');  
	});

	Route::resource('documentos', 'DocumentoController');
	Route::group(['prefix' => 'documentos'], function () {
		Route::get('table/listado/{iddeudor}', 'DocumentoController@documentos')->name('documentos.listado');  
	}); 

	Route::resource('regiones', 'RegionController');
	Route::group(['prefix' => 'regiones'], function () {
		Route::get('table/listado', 'RegionController@list')->name('regiones.listado');  
	});

	Route::resource('provincias', 'ProvinciaController');
	Route::group(['prefix' => 'provincias'], function () {
		Route::get('table/listado', 'ProvinciaController@list')->name('provincias.listado');  
	}); 

	Route::resource('comunas', 'ComunaController');
	Route::group(['prefix' => 'comunas'], function () {
		Route::get('table/listado', 'ComunaController@list')->name('comunas.listado');  
	});

	Route::resource('gestiones', 'GestionController');
	Route::group(['prefix' => 'gestiones'], function () {
		Route::post('buscar-rut', 'GestionController@search')->name('gestiones.buscar');
		Route::post('cargar-rut', 'GestionController@index')->name('gestiones.rut');
		Route::get('nueva/consultar-respuestas/{idgestion}','GestionController@consultarrespuesta')->name('gestiones.consultar-respuesta');
		Route::get('nueva/consultar-detalles/{idrespuesta}','GestionController@consultardetallesrespuesta')->name('gestiones.consultar-detalles');
		Route::post('historial/deudor','GestionController@historial')->name('gestion.historial');
		
	});
});