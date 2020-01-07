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
Auth::routes();

Route::namespace('Web')->group(function() {
    //DEFAULTS
    Route::get('/', 'DefaultController@Home')->name('home');
    Route::get('/gracias', 'DefaultController@gracias')->name('gracias');

    //REGISTRAR CONTACTO
    //Route::post('/guardar-contacto', 'FormController@guardarContacto')->name('guardar-contacto');


});
