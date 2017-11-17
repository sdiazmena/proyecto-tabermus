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

Route::get('/index', 'IndexController@index');
Route::post('cambiarVista', function (){
    return redirect('/home');
});

Route::get('/', 'IndexController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/profile','UserController@profile');
Route::get('/profile/user','UserController@profileUser');
Route::post('/profile/user/edit','UserController@editProfile');
Route::post('/profile/user/updateAvatar', 'UserController@updateAvatar');
Route::post('/profile/user/updateProfile', 'UserController@updateProfile');

Route::resource('/calendario','ShowController');
Route::get('/calendarios/banda/{id}', 'ShowController@getDataBanda');
Route::get('/calendarios', 'ShowController@getData');
Route::get('/calendarios/delete/{id}', 'ShowController@showDelete');

Route::resource('/profile/banda', 'BandaController');
Route::get('/profile/banda/{id}/historia','BandaController@editHistory');
Route::post('/profile/banda/{id}/historia/update','BandaController@updateHistory');
Route::get('/profile/banda/{id}/discos','BandaController@editDiscos');
Route::post('/profile/banda/{id}/discos/update','BandaController@updateDiscos');
Route::post('/profile/banda/{id}/discos/editar','BandaController@editarDiscos');


Route::get('/profile/banda/{id}/fechas','BandaController@editFechas');
Route::post('/profile/banda/{id}/fechas/update','BandaController@updateFechas');
Route::get('/profile/ciudades/{id}', 'RegionController@getCiudades');
Route::get('/region/{id}', 'RegionController@getRegion');
Route::get('/ciudad/{id}', 'RegionController@getCiudad');
Route::get('/profile/banda/disco/{id}', 'BandaController@getDisco');
Route::get('/profile/banda/disco/canciones/{id}', 'BandaController@getCanciones');
Route::get('/redirect/{provider}','SocialController@redirect');
Route::get('/callback/{provider}','SocialController@callback');

Route::get('/somos', 'SomosController@index');
Route::get('/contacto', 'ContactoController@index');

Route::resource('filtrado','FiltradoController');
Route::post('filtradoRegional', ['as'=>'filtrado/regional', 'uses'=>'FiltradoController@filtradoRegional']);
Route::post('filtradoNacional', ['as'=>'filtrado/nacional', 'uses'=>'FiltradoController@filtradoNacional']);
Route::post('filtrado', ['as'=>'filtrado/resultado', 'uses'=>'FiltradoController@filtrado']);

Route::resource('buscar','BusquedaController');
//una nueva ruta para eliminar registros con el metodo get
Route::get('buscar/banda/{id}', ['as' => 'buscar/banda', 'uses'=>'BusquedaController@resultado']);
Route::get('/buscar/banda/{id}/discos','BusquedaController@discos');
Route::get('/buscar/banda/{id}/historia','BusquedaController@historia');
Route::get('/buscar/banda/{id}/fechas','BusquedaController@fechas');
//ruta para realizar busqueda de registros.
Route::post('buscar', ['as' => 'buscar/search', 'uses'=>'BusquedaController@search']);

Route::get('banda/{id}', ['as' => 'banda/ver', 'uses'=>'BusquedaController@verBanda']);
Route::get('banda/{id}/historia', ['as' => 'banda/ver/historia', 'uses'=>'BusquedaController@verHistoria']);
Route::get('banda/{id}/discografia', ['as' => 'banda/ver/discografia', 'uses'=>'BusquedaController@verDiscos']);
Route::get('banda/{id}/fechas', ['as' => 'banda/ver/fechas', 'uses'=>'BusquedaController@verFechas']);
Route::get('/home/show', 'HomeController@store');