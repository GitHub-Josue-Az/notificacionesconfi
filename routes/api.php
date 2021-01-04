<?php


use Illuminate\Http\Request;

Route::post('login','Api\AuthController@login');

//RESOURCE TIENE VARIAS RUTAS
Route::resource('productos', 'Api\ProductosController');

Route::get('cumpleslist', 'Api\CumpleanosController@cumpleslist');
Route::get('conferenciaslist', 'Api\ConferenciasController@conferenciaslist');

Route::middleware('auth:api')->group(function () 
{

	/* login */
	Route::get('usuario', 'Api\AuthController@usuario');
	Route::post('logout', 'Api\AuthController@logout');

	/* Conferencias */
	/*Route::get('conferenciaslist', 'Api\ConferenciasController@conferenciaslist');*/
	Route::get('historial', 'Api\ConferenciasController@historial');
	/*Route::post('conferenciasolicitud','Api\ConferenciasController@solicitudes');*/

	/* FELICITACIONES */
	Route::get('felicitadoreslist', 'Api\FelicitacionesController@felicitadoreslist');
	Route::get('users', 'Api\AuthController@users');
	Route::post('sendfelicitacion', 'Api\FelicitacionesController@sendfelicitacion');

	/* CUMPLEAÑOS */
	/*Route::get('cumpleslist', 'Api\CumpleanosController@cumpleslist');*/
	Route::post('cumplesfelicitar', 'Api\CumpleanosController@cumplesfelicitar');

	/* TOKEN */
	Route::post('fcm/token','Api\FirebaseController@postToken');

});


