<?php




Route::get('/', 'HomeController@inicio')->name('inicio');
Route::get('/welcome', 'HomeController@welcome')->name('welcome');
Route::get('/carbon', 'HomeController@prucarbon')->name('carbon');

/*Route::get('/conferenciamuchos', 'HomeController@conferenciamuchos')->name('conferenciamuchos');
Route::get('cumples', 'HomeController@cumpless')->name('cumpless');
Route::get('felicitadores', 'HomeController@felicitadores')->name('felicitadores');*/



/*Auth::routes();*/

Route::get('login','Auth\LoginController@showLoginForm')->name('login');

Route::post('login','Auth\LoginController@authenticate')->name('logii');

Route::post('logout','Auth\LoginController@logout')->name('logout');


Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');


Route::get('/home', 'HomeController@index')->name('home');



Route::get('/cumplesmanana', 'HomeController@cumplesmanana')->name('cumplesmanana');
Route::get('conferencias', 'HomeController@conferencias')->name('conferencias');


Route::get('/changestate', 'HomeController@changestate')->name('changestate');


Route::get('/prueba2', 'HomeController@pruebita2')->name('prueba2');
/*
Route::get('prutrue', 'HomeController@prutrue')->name('prutrue');*/

Route::get('cuponera/{id}/image', 'Cuponera\CuponeraController@image')->name('cuponera.image');	
Route::get('confe/{id}/image', 'Conferencias\ConferenciasController@image')->name('confe.image');	 //IMAGEN



Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['admin']], function () {


						/* DASHBOARD */
/*Route::post('send/fcm/general', 'Dashboard\DashboardController@general')->name('general.soli'); 
Route::get('send/fcm/general', 'Dashboard\DashboardController@generalview')->name('general.vista'); */

						/* USUARIOS */																					
Route::resource('usuarios', 'Usuarios\UsuariosController');
Route::resource('jefes', 'Usuarios\JefesController');
Route::put('usu/{idusu}', 'Usuarios\UsuariosController@update2')->name('usu.update2');
Route::put('jef/{idjef}', 'Usuarios\JefesController@update2')->name('jef.update2');

						/* Felicitacioens */
Route::resource('felicitaciones', 'Felicitaciones\FelicitadosController');
Route::put('comfeli/{idfelici}', 'Felicitaciones\FelicitadosController@update2')->name('comfelici.update2');

						/* Cuponera */
Route::resource('cuponera', 'Cuponera\CuponeraController');
Route::put('cup/{idcuponera}', 'Cuponera\CuponeraController@update2')->name('cup.update2');

						/*  Campos */
Route::resource('campos', 'Cuponera\CamposController');
Route::put('camp/{idcamp}',  'Cuponera\CamposController@update2')->name('camp.update2');

					/* Cumpleaños */
Route::resource('cumples', 'Cumples\CumplesController');
Route::get('enviomail/{idcumpleanero}', 'Cumples\CumplesController@enviomail')->name('cumple.enviomail');
/*Route::get('tarjeta/{idcumple}', 'Cumples\CumplesController@tarjeta')->name('cumples.tarjeta');*/


Route::get('cumplespasados', 'Cumples\CumplesController@index2')->name('cumple.index2');
Route::get('cumplespasados/{id}', 'Cumples\CumplesController@show2')->name('cumple.show2');
Route::put('cum/{idcumples}', 'Cumples\CumplesController@update2')->name('cum.update2');
Route::put('comcumple/{idcomcumple}', 'Cumples\CumplesController@update3')->name('comcumple.update2');

					/* Conferencias */
Route::resource('conferencias', 'Conferencias\ConferenciasController');								//RESOURCE
/*Route::put('upda/{id}', 'Conferencias\ConferenciasController@updatestate')->name('confe.updatestate') */
Route::put('confeaceptado/{idconfe}/{idusu}', 'Conferencias\ConferenciasController@aceptado')->name('confe.aceptar');
Route::put('conferechazo/{idconfe}/{idusu}', 'Conferencias\ConferenciasController@rechazado')->name('confe.rechazar');

/*Route::get('confe/{idsoli}/solicitudes', 'Conferencias\ConferenciasController@solicitudes')->name('confe.soli'); LISTADO SOLICITUDES*/
Route::put('confe/{idconfe}', 'Conferencias\ConferenciasController@update2')->name('confe.update2');	//ELIMINAR CONFERENCIA
/*Route::resource('reservas', 'Conferencias\ReservasController');*/




});

