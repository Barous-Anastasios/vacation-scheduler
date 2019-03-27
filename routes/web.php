<?php

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::middleware(['checkIfAdmin'])->group(function () {
    Route::get('admin', 'AdminController@index');
    Route::get('application/approve/{applicationId}', 'ApplicationController@approve');
    Route::get('application/reject/{applicationId}', 'ApplicationController@reject');
    Route::get('user/create', 'UserController@index');
    Route::post('user/create', 'UserController@create');
    Route::get('user/edit/{userId}', 'UserController@edit');
    Route::post('user/edit', 'UserController@update');
});

Route::middleware(['checkIfEmployee'])->group(function () {
    Route::get('employee', 'EmployeeController@index');
    Route::get('application/create', 'ApplicationController@index');
    Route::post('application/submit', 'ApplicationController@create');
});

Route::get('forbidden', function () {
    return view('forbidden');
});

Auth::routes();
