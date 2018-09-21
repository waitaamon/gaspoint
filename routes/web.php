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

    Route::get('/profile', 'AdminController@show')->name('admin.show');

    Route::get('/change-password', 'AdminController@changePassword')->name('admin.change.password');

    Route::patch('/update/{id}', 'AdminController@update')->name('admin.update');

    Route::patch('/update-password', 'AdminController@updatePassword')->name('admin.update.password');
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

Route::group(['prefix'=> '/client', 'middleware' => ['auth'], 'namespace' => 'Client'], function (){

    Route::get('/', 'ClientController@index')->name('client.index');

    Route::get('/create', 'ClientController@create')->name('client.create');

    Route::post('/store', 'ClientController@store')->name('client.store');

    Route::get('/edit/{id}', 'ClientController@edit')->name('client.edit');

    Route::patch('/update/{id}', 'ClientController@update')->name('client.update');

    Route::post('/delete/{id}', 'ClientController@destroy')->name('client.delete');
});

Route::group(['prefix'=> '/message', 'middleware' => ['auth'], 'namespace' => 'Message'], function (){

    Route::get('/', 'MessageController@index')->name('message.index');

    Route::get('/create', 'MessageController@create')->name('message.create');

    Route::post('/store', 'MessageController@store')->name('message.store');

    Route::get('/show/{id}', 'MessageController@show')->name('message.show');

    Route::post('/delete/{id}', 'MessageController@destroy')->name('message.delete');
});
