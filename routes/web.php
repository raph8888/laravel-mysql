<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Application web routes.
| Loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group.
|
*/


//Routes calling MainPageController

Route::get('/', 'MainPageController@index');
Route::get('contact', 'MainPageController@contact');
Route::get('address', 'MainPageController@address');
Route::match(['get', 'post'], 'access', 'MainPageController@access');


//Routes calling StatusController

Route::match(['get', 'post'], 'status', 'StatusController@status');
Route::match(['get', 'post'], '/custos', 'StatusController@custos');

//Routes calling CostsController

Route::match(['get', 'post'], '/costs', 'CostsController@status');

//Routes calling CashierInsertController

Route::match(['get', 'post'], 'inserirentrada', 'CashierInsertController@inserirentrada');
Route::match(['get', 'post'], 'inserirsaida', 'CashierInsertController@inserirsaida');


//Routes calling AdminController

Route::match(['get', 'post'], 'admin', 'AdminController@administrator');
Route::match(['get', 'post'], '/administrador/check', 'AdminController@viewday');
Route::match(['get', 'post'], '/adicionar', 'AdminController@create');
Route::get('/allcosts', 'AdminController@allcosts');
Route::get('/alldays', 'AdminController@alldays');
Route::get('/excluir/{name}', 'AdminController@destroy');
Route::get('/editar/{name}', 'AdminController@edit');


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


Route::get('task', function () {
    return view('task');
});

Route::get('/flush', 'GeneralController@flush_session');
Auth::routes();

Route::get('/home', 'HomeController@index');

Route::prefix('api')->group(function() {
    Route::resource('tasks', 'TaskController');
});
