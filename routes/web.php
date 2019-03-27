<?php

Route::get('/', 'HomeController@index');
Route::get('dashboard', 'DashboardController@index');

Route::middleware(['admin'])->group(function () {
    Route::get('admin', 'AdminController@index');
    Route::get('application/{response}/{applicationId}', 'ApplicationController@respond');
    Route::get('user/create', 'UserController@index');
    Route::post('user/create', 'UserController@create');
    Route::get('user/edit/{userId}', 'UserController@edit');
    Route::post('user/edit/{userId}', 'UserController@update');
});

Route::get('admin/response/sent', 'AdminController@sentResponse');

Route::middleware(['employee'])->group(function () {
    Route::get('dashboard', 'EmployeeController@index');
    Route::get('application/create', 'ApplicationController@index');
    Route::post('application/submit', 'ApplicationController@create');
});

Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
