<?php

use Illuminate\Http\Request;

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

/* ;
Route::get('/sgsi/create', 'DominiosController@create')->name('create');
Route::get('/sgsi/edit/{id}', 'DominiosController@edit')->name('edit');
Route::get('/sgsi/update/{id}', 'DominiosController@update')->name('update');
Route::delete('/sgsi/destroy/{id}', 'DominiosController@destroy')->name('destroy');
Route::get('/sgsi/show/{id}', 'DominiosController@show')->name('show');
Route::get('/sgsi/store', 'DominiosController@store')->name('store'); */

// Vistas con contenido para el Sitio. Pero además de crear aqui, tambien se debe crear en el Controlador.
//Route::get('/sgsi/listado', 'DominiosController@listado')->name('listado');

// Controladores Globales
Route::get('/sgsi', 'HomeController@index');//url que se coloca en el navegador
Route::resource('sgsi/dominios','DominiosController');//(index, create, edit, delete) una ruta
Route::resource('sgsi/objcontrol','ObjcontrolController');//url que se coloca en el navegador
Route::resource('sgsi/control','ControlController');
Route::resource('sgsi/preguntas','PreguntasController');
Route::resource('sgsi/respuestas','RespuestasController');
Route::resource('sgsi/usuario','UsuarioController');

Route::resource('sgsi/encuesta','EncuestaController');
Route::resource('sgsi/reportepdf','ReportePDFController');

// Ruta Personalizada para llamar una Funcion por Allax
Route::get('sgsi/ajax/objcontrol/{id}', 'ObjcontrolController@findById');

