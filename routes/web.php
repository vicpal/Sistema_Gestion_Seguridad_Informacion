<?php

Route::get('/', 'Auth\LoginController@showLoginForm' );
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

//Auth::routes();
//Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//Route::post('password/reset', 'Auth\ResetPasswordController@reset');

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dominios', 'DominiosController@index');
Route::get('/dominios/create', 'DominiosController@create');
Route::get('/dominios/{dominio}', 'DominiosController@show');
Route::get('/dominios', 'DominiosController@store');

//Route::resource('dominios','DominiosController');
Route::resource('objcontrol','ObjcontrolController');
Route::resource('control','ControlController');
Route::resource('preguntas','PreguntasController');