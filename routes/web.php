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

//user account routes
Route::group(['prefix'=> '/admin', 'middleware' => ['auth'], 'namespace' => 'Admin'], function (){

    Route::get('/', 'AdminController@index')->name('admin');
});

Route::group(['prefix'=> '/manager', 'middleware' => ['auth'], 'namespace' => 'Manager'], function (){

    Route::get('/', 'ManagerController@index')->name('manager.index');

    Route::get('/create', 'ManagerController@create')->name('manager.create');

    Route::post('/store', 'ManagerController@store')->name('manager.store');

    Route::get('/edit/{id}', 'ManagerController@edit')->name('manager.edit');

    Route::patch('/update/{id}', 'ManagerController@update')->name('manager.update');

    Route::post('/delete/{id}', 'ManagerController@destroy')->name('manager.delete');
});

Route::group(['prefix'=> '/station', 'middleware' => ['auth'], 'namespace' => 'Station'], function (){

    Route::get('/', 'StationController@index')->name('station.index');

    Route::get('/create', 'StationController@create')->name('station.create');

    Route::post('/store', 'StationController@store')->name('station.store');

    Route::get('/edit/{id}', 'StationController@edit')->name('station.edit');

    Route::patch('/update/{id}', 'StationController@update')->name('station.update');

    Route::post('/delete/{id}', 'StationController@destroy')->name('station.delete');
});
