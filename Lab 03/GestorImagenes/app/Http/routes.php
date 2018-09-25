<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@getIndex');

Route::get('home', 'HomeController@getIndex');

Route::controllers([
	'validacion' => 'validacion\ValidacionController',
	'validado/fotos' => 'FotoController',
	'validado/albumes' => 'AlbumController',
	'validado/usuario' => 'UsuarioController',
	'validado' => 'InicioController',
	'/' => 'BienvenidaController'
]);
