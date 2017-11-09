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

Route::get('/', 'IndexController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/profile','UserController@profile');
Route::get('/profile/user','UserController@profileUser');
Route::post('/profile/user/edit','UserController@editProfile');
Route::post('/profile/user/updateAvatar', 'UserController@updateAvatar');
Route::post('/profile/user/updateProfile', 'UserController@updateProfile');

Route::resource('/calendario','ShowController');
Route::get('/calendarios', 'ShowController@getData');

Route::resource('/profile/banda', 'BandaController');
Route::get('/profile/banda/{id}/historia','BandaController@editHistory');
Route::post('/profile/banda/{id}/historia/update','BandaController@updateHistory');
Route::get('/profile/banda/{id}/discos','BandaController@editDiscos');
Route::post('/profile/banda/{id}/discos/update','BandaController@updateDiscos');
Route::get('/profile/banda/{id}/fechas','BandaController@editFechas');
Route::post('/profile/banda/{id}/fechas/update','BandaController@updateFechas');
Route::get('/profile/ciudades/{id}', 'RegionController@getCiudades');
Route::get('/redirect/{provider}','SocialController@redirect');
Route::get('/callback/{provider}','SocialController@callback');

Route::get('/somos', 'SomosController@index');
Route::get('/contacto', 'ContactoController@index');
Route::get('/sugerencia', 'SugerenciaController@index');

Route::get('/index', 'IndexController@index');
Route::post('cambiarVista', function (){
    return redirect('/home');
});


Route::get('/filtrado', 'FiltradoController@index');

Route::resource('buscar','BusquedaController');
//una nueva ruta para eliminar registros con el metodo get
Route::get('movie/destroy/{id}', ['as' => 'movie/destroy', 'uses'=>'MovieController@destroy']);
//ruta para realizar busqueda de registros.
Route::post('buscar', ['as' => 'buscar/search', 'uses'=>'BusquedaController@search']);
