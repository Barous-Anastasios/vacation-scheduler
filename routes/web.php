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

Route::get('create_application', 'ApplicationController@index')->middleware('checkIfEmployee');
Route::post('submit_application', 'ApplicationController@create')->middleware('checkIfEmployee');


Route::get('forbidden', function(){
    return view('forbidden');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
