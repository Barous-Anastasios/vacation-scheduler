<?php

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::get('application/create', 'ApplicationController@index')->middleware('checkIfEmployee');
Route::post('application/submit', 'ApplicationController@create')->middleware('checkIfEmployee');

Route::get('application/approve/{applicationId}', 'ApplicationController@approve')->middleware('checkIfAdmin');
Route::get('application/reject/{applicationId}', 'ApplicationController@reject')->middleware('checkIfAdmin');
Route::get('user/create', 'UserController@index')->middleware('checkIfAdmin');
Route::post('user/create', 'UserController@create')->middleware('checkIfAdmin');
Route::get('user/edit/{userId}', 'UserController@edit')->middleware('checkIfAdmin');
Route::post('user/edit', 'UserController@update')->middleware('checkIfAdmin');

Route::get('forbidden', function () {
    return view('forbidden');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
