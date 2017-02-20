<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'web'], function () {
    Route::get('login', 'AuthController@show_login_form')->name('login.form');
    Route::post('login', 'AuthController@authenticate')->name('login.attempt');

    Route::get('register', 'AuthController@show_register_form')->name('register.form');
    Route::post('register', 'UserController@create')->name('register.request');

    Route::group(['middleware' => 'auth'],function () {
        Route::get('/', 'UserController@get_all')->name('users.list');

        Route::get('profile/{user}', 'UserController@get')->name('user.profile');

        Route::get('profile/{user}/edit', 'UserController@update_form')->name('user.update.form');
        Route::patch('profile/{user}/edit', 'UserController@update')->name('user.update.request');

        Route::get('profile/{user}/change-password', 'UserController@change_password_form')->name('user.change_password.form');
        Route::patch('profile/{user}/change-password', 'UserController@change_password')->name('user.change_password.request');

        Route::get('logout', 'AuthController@logout')->name('logout');
    });
});
