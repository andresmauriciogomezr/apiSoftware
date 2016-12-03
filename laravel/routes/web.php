<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::any('prueba', 'HomeController@prueba');//pide la pagina principal
Route::group(['middleware' => 'cors'], function(){
	Route::any('autenticar', 'HomeController@autenticar');//	
	Route::any('registrar', 'UsuarioController@registrar');

});
//Route::any('autenticar', 'HomeController@autenticar');//


	//Route::any('registrar', 'UsuarioController@registrar');

Auth::routes();

//Route::get('/home', 'HomeController@index');
