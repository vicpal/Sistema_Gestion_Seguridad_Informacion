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

Route::get('/sgsi/index', 'DominiosController@index')->name('index');
Route::get('/sgsi/create', 'DominiosController@create')->name('create');
Route::get('/sgsi/edit', 'DominiosController@edit')->name('edit');
Route::get('/sgsi/show', 'DominiosController@show')->name('show');

//Route::resource('dominios','DominiosController');
Route::resource('objcontrol','ObjcontrolController');
Route::resource('control','ControlController');
Route::resource('preguntas','PreguntasController');