<?php

Route::get('/', 'Auth\LoginController@showLoginForm' );
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

//Auth::routes();
//Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//Route::post('password/reset', 'Auth\ResetPasswordController@reset');

//ruta del index de la app
/*Route::get('/', function () {
    return view('welcome');
});*/

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/sgsi/index', 'DominiosController@index')->name('index');
Route::get('/sgsi/create', 'DominiosController@create')->name('create');
Route::get('/sgsi/edit/{id}', 'DominiosController@edit')->name('edit');
Route::get('/sgsi/update/{id}', 'DominiosController@update')->name('update');
Route::delete('/sgsi/destroy/{id}', 'DominiosController@destroy')->name('destroy');
Route::get('/sgsi/show/{id}', 'DominiosController@show')->name('show');
Route::get('/sgsi/store', 'DominiosController@store')->name('store');

// Vistas con contenido para el Sitio. Pero además de crear aqui, tambien se debe crear en el Controlador.
Route::get('/sgsi/listado', 'DominiosController@listado')->name('listado');

// Controladores Globales
Route::resource('dominios','DominiosController');
Route::resource('objcontrol','ObjcontrolController');
Route::resource('control','ControlController');
Route::resource('preguntas','PreguntasController');