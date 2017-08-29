<?php

use Illuminate\Support\Facades\Redirect;



/* Test View*/

Route::get('modelo2', ['as' => 'modelosimplex', function () {
	return view('pagina.modelo2');
}]);

Route::get('estadistica2', ['as' => 'estadistica2', function () {
	return view('pagina.estadisticas.estadisticas2');
}]);

Route::get('test', ['as' => 'test', function () {
	//dd('hola');
	return view('pagina.emails.recuperacion');
}]);

Route::get('restablecer', ['as' => 'test', function () {
	//dd('hola');
	return view('pagina.emails.restablecer');
}]);

Route::get('index2', ['as' => 'index2', function () {
	return view('pagina.login');
}]);

Route::get('contactanos', ['as' => 'contactanos', function () {
	return view('pagina.contactanos');
}]);

//Route::get('/', 'Auth\AuthController@getLogin');


// Authentication routes...
Route::resource('inicio', 'inicio_controller');
Route::resource('mail', 'mail_controller');
Route::get('mail/{id}/{hora?}/{rand?}/restablecer', [
	'uses'	=>	'mail_controller@restablecer',
	'as'	=>	'mail.restablecer'
	]);


Route::post('recuperacion', [
	'uses'	=>	'usuarios_controller@recuperacion',
	'as'	=>	'recuperacion'
	]);

Route::post('registrar', [
	'uses'	=>	'usuarios_controller@store2',
	'as'	=>	'registrar'
	]);

Route::get('/', [
	'uses'	=>	'Auth\AuthController@getLogin',
	'as'	=>	'pagina.login'
	]);

Route::post('login', [
	'uses'	=>	'Auth\AuthController@postLogin',
	'as'	=>	'pagina.login'
	]);

Route::get('logout', [
	'uses'	=>	'Auth\AuthController@getLogout',
	'as'	=>	'pagina.logout'
	]);

Route::get('/', [
	'uses'	=>	'Auth\AuthController@inicio',
	'as'	=>	'pagina.index'
	]);

Route::group(['middleware' => 'auth'], function()
{
	Route::resource('usuarios', 'usuarios_controller');
});

/* ---------------------- modelo ---------------------*/

/*Route::group(['middleware' => 'auth'], function()
{*/
	Route::resource('modelo', 'modelo_controller');
//});

	Route::get('variablesPost/{id}', [
		'uses'	=>	'modelo_controller@variables',
		'as'	=>	'modelo.variables'
		])->middleware('auth');

//Route::resource('usuarios', 'usuarios_controller');

	Route::get('usuarios/{id}/destroy', [
		'uses'	=>	'usuarios_controller@destroy',
		'as'	=>	'usuarios.destroy'
		])->middleware('auth');

	Route::post('modificacion', [
		'uses'	=>	'usuarios_controller@modificacion',
		'as'	=>	'modificacion'
		]);

	Route::get('edicion/{periodo}', [
		'uses'	=>	'usuarios_controller@edicion',
		'as'	=>	'edicion'
		]);


	/* Nomina */

	Route::group(['middleware' => 'auth'], function()
	{
		Route::resource('nomina', 'nomina_controller');
	});

	Route::get('usuario/{id}/usuario', [
		'uses'	=>	'nomina_controller@usuario',
		'as'	=>	'usuario.ajax'
		])->middleware('auth');;

	Route::get('nomina/{id}/edit', [
		'uses'	=>	'nomina_controller@edit',
		'as'	=>	'nomina.destroy'
		])->middleware('auth');;

	Route::get('nomina/{id}/destroy', [
		'uses'	=>	'nomina_controller@destroy',
		'as'	=>	'nomina.destroy'
		])->middleware('auth');;

	Route::post('cambioestado', [
		'uses'	=>	'nomina_controller@cambioestado',
		'as'	=>	'nomina.cambioestado'
		])->middleware('auth');;

	Route::get('contabilidad', [
		'uses'	=>	'nomina_controller@contabilidad',
		'as'	=>	'nomina.contabilidad'
		])->middleware('auth');;


	Route::group(['middleware' => 'auth'], function()
	{
		Route::resource('inventario', 'inventario_controller');
	});

	Route::get('inventario/{id}/destroy', [
		'uses'	=>	'inventario_controller@destroy',
		'as'	=>	'inventario.destroy'
		])->middleware('auth');;

	Route::get('inventario/{id}/edit', [
		'uses'	=>	'inventario_controller@edit',
		'as'	=>	'inventario.destroy'
		])->middleware('auth');;

	Route::group(['middleware' => 'auth'], function()
	{
		Route::resource('empleados', 'empleados_controller');
	});

	Route::get('empleados/{id}/destroy', [
		'uses'	=>	'empleados_controller@destroy',
		'as'	=>	'empleados.destroy'
		])->middleware('auth');;

	Route::get('empleados/{id}/destroy', [
		'uses'	=>	'empleados_controller@destroy',
		'as'	=>	'empleados.destroy'
		])->middleware('auth');;



	Route::group(['middleware' => 'auth'], function()
	{
		Route::resource('puc', 'puc_controller');
	});

	Route::get('puc/{id}/destroy', [
		'uses'	=>	'puc_controller@destroy',
		'as'	=>	'puc.destroy'
		])->middleware('auth');;


	Route::group(['middleware' => 'auth'], function()
	{
		Route::resource('transaccion', 'transaccion_controller');
	});

	Route::get('transaccion/{id}/destroy', [
		'uses'	=>	'transaccion_controller@destroy',
		'as'	=>	'transaccion.destroy'
		])->middleware('auth');;

	Route::post('transar', [
		'uses'	=>	'transaccion_controller@transar',
		'as'	=>	'transaccion.transar'
		])->middleware('auth');



	Route::group(['middleware' => 'auth'], function()
	{
		Route::resource('listar', 'listar_controller');
	});


	/* ----------- variables ----------- */

	Route::group(['middleware' => 'auth'], function()
	{
		Route::resource('variables', 'variables_controller');
	});

	Route::get('variables/{id}/destroy', [
		'uses'	=>	'variables_controller@destroy',
		'as'	=>	'variables.destroy'
		])->middleware('auth');

	/* ----------- productos ----------- */

	Route::group(['middleware' => 'auth'], function()
	{
		Route::resource('productos', 'productos_controller');
	});

	Route::get('productos/{id}/destroy', [
		'uses'	=>	'productos_controller@destroy',
		'as'	=>	'productos.destroy'
		])->middleware('auth');


	/* ----------- categorias ----------- */

	Route::group(['middleware' => 'auth'], function()
	{
		Route::resource('categorias', 'categorias_controller');
	});

	Route::get('categorias/{id}/destroy', [
		'uses'	=>	'categorias_controller@destroy',
		'as'	=>	'categorias.destroy'
		])->middleware('auth');



	/* ----------- estadisticas ----------- */

	Route::group(['middleware' => 'auth'], function()
	{
		Route::resource('estadisticas', 'estadisticas_controller');

	});

	Route::get('estadistica_datos/{id1}/{id2?}/{id3?}', [
		'uses'	=>	'estadisticas_controller@modelo',
		'as'	=>	'estadistica.modelo'
		])->middleware('auth');

	Route::get('estadistica_variables', [
		'uses'	=>	'estadisticas_controller@variables',
		'as'	=>	'estadistica.variables'
		])->middleware('auth');