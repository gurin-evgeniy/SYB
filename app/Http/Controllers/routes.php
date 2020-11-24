 <?php

 Route::get('auth/register', 'Auth\AuthController@getRegister');

 Route::post('auth/register', 'Auth\AuthController@postRegister');