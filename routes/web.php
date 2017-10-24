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

Route::get('/busqueda', function () {
    return view('busqueda');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/profile','UserController@profile');
Route::get('/profile/user','UserController@profileUser');
Route::post('/profile/user/edit','UserController@editProfile');
Route::post('/profile/user/updateAvatar', 'UserController@updateAvatar');
Route::post('/profile/user/updateProfile', 'UserController@updateProfile');

Route::resource('/profile/banda', 'BandaController');
Route::get('profile/ciudades/{id}', 'RegionController@getCiudades');
Route::get('/redirect/{provider}','SocialController@redirect');
Route::get('/callback/{provider}','SocialController@callback');

Route::get('somos', 'SomosController@index');
Route::get('contacto', 'ContactoController@index');
Route::get('sugerencia', 'SugerenciaController@index');

Route::get('calendario', 'CalendarioController@index');

Route::get('filtrado', 'FiltradoController@index');
Route::get('buscar', 'BusquedaController@index');
