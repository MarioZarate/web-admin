<?php

/*
|--------------------------------------------------------------------------
| 								ADMIN Routes
|--------------------------------------------------------------------------
|
*/
Auth::routes();

Route::prefix('web-adm')->group(function() {
	Route::get('/login' , 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login' , 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::post('/logout-admin', 'Auth\AdminLoginController@logout')->name('admin.logout');
});

Route::group(['prefix' => 'web-adm', 'namespace' => 'Admin' , 'middleware' => 'auth:admin'] , function() {
	Route::any('/dropzone', '\Ems\AdminEms\controllers\DropzoneController@upload')->name('dropzone');


	Route::Resource('banner-adm', 'BannerController');
	Route::Resource('home-adm', 'HomeController');
	Route::Resource('contacto-adm', 'ContactoController');
		
	//CHECKBOX
	Route::post('activar-banner', 'BannerController@activar')->name('activar-banner');

	//DDL
});

