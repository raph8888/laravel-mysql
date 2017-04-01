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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'MainPageController@index');
Route::get('contact', 'MainPageController@contact');
Route::get('address', 'MainPageController@address');
Route::match(['get', 'post'], 'access', 'MainPageController@access');



//Route::get('home', 'HomeController@index');
//Route::controllers([
//    'auth' => 'Auth\AuthController',
//    'password' => 'Auth\PasswordController',
//]);
//// Authentication routes...
//Route::get('auth/login', 'Auth\AuthController@getLogin');
//Route::post('auth/login', 'Auth\AuthController@postLogin');
//Route::get('auth/logout', 'Auth\AuthController@getLogout');
//// Registration routes...
//Route::get('auth/register', 'Auth\AuthController@getRegister');
//Route::post('auth/register', 'Auth\AuthController@postRegister');
//Route::get('hello', 'Hello@index');
//Route::get('/hello/{name}', 'Hello@show');
//Route::get('copiadora', 'CopiadoraController@index');
//Route::match(['get', 'post'], 'status', 'CopiadoraController@status');
//Route::match(['get', 'post'], 'inserirentrada', 'CopiadoraController@inserirentrada');
//Route::match(['get', 'post'], 'inserirsaida', 'CopiadoraController@inserirsaida');
//Route::match(['get', 'post'], 'administrador', 'CopiadoraController@administrador');
//Route::match(['get', 'post'], '/administrador/check', 'CopiadoraController@viewday');
//Route::match(['get', 'post'], '/adicionar', 'CopiadoraController@create');
//Route::match(['get', 'post'], '/custos', 'CopiadoraController@custos');
//Route::get('/excluir/{name}', 'CopiadoraController@destroy');
//Route::get('/editar/{name}', 'CopiadoraController@edit');
//Route::get('/mensagem', 'CopiadoraController@errors');
//Route::get('/flush', 'CopiadoraController@sair');
//Route::get('/allcosts', 'CopiadoraController@allcosts');
//Route::get('/alldays', 'CopiadoraController@alldays');