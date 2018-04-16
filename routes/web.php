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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(array('middleware' => ['auth']), function() {
    Route::get('/pages', 'PageController@index');
    Route::get('/page/create', 'PageController@create');
    Route::post('/page/create', 'PageController@store');
    Route::get('/page/{page}', 'PageController@show');
    Route::get('/page/{page}/edit', 'PageController@edit');
    Route::post('/page/{page}/edit', 'PageController@update');
});