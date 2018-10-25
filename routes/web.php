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

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes

    Route::resource('usuarios', 'UserController');

	Route::group(['prefix' => 'usuarios'], function () {
		Route::get('eliminar/{usuario}', 'UserController@destroy')->name('usuarios.borrar');
		Route::get('table/listado', 'UserController@list')->name('usuarios.listado');
	});

	Route::group(['prefix' => 'asignaciones'], function () {
		Route::get('cargar-archivos', 'AsignacionController@cargar')->name('asignaciones.cargar'); 
		Route::get('exportar', 'AsignacionController@exportar');
		Route::post('importar', 'AsignacionController@importar')->name('asignaciones.importar'); 
	});

	Route::resource('deudores', 'DeudorController');
	Route::group(['prefix' => 'deudores'], function () {
		Route::get('table/listado', 'DeudorController@list')->name('deudores.listado');  
	});

	Route::resource('proveedores', 'ProveedorController');
	Route::group(['prefix' => 'proveedores'], function () {
		Route::get('table/listado', 'ProveedorController@list')->name('proveedores.listado');  
	});

	Route::resource('documentos', 'DocumentoController');
	Route::group(['prefix' => 'documentos'], function () {
		Route::get('table/listado', 'DocumentoController@list')->name('documentos.listado');  
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
});
/*
	Route::put('post/{id}', function ($id) {
	    //
	})->middleware('auth', 'role:admin');
*/




	
	