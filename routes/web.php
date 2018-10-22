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
		Route::get('exportar', 'ExcelController@exportar');
		Route::get('importar', 'ExcelController@importar');
		Route::get('bladeToExcel', 'ExcelController@bladeToExcel');
	});

    
});
/*
	Route::put('post/{id}', function ($id) {
	    //
	})->middleware('auth', 'role:admin');
*/




	
	