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

Route::get('/', function () {
    if(auth()->check()){
        return view('home');
    } else {
        return redirect('login');
    }
});

Route::get('application/create', 'ApplicationController@index')->middleware('checkIfEmployee');
Route::post('application/submit', 'ApplicationController@create')->middleware('checkIfEmployee');
Route::get('application/approve/{applicationId}', 'ApplicationController@approve')->middleware('checkIfAdmin');
Route::get('application/reject/{applicationId}', 'ApplicationController@reject')->middleware('checkIfAdmin');

Route::get('forbidden', function(){
    return view('forbidden');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
