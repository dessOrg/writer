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

// ADMIN GROUP
Route::group(['middleware' => 'auth', 'middleware' => 'isVerified', 'middleware' => 'admin' ], function() {
    // MAIN DASHBOARD
    Route::get('admin', function () {
        return view('admin.dashboard') ;
    }) ;

    Route::get('admin/users', 'UsersController@index')->name('user.index') ;

    Route::get('admin/rates', 'Admin\RateController@index');
    Route::get('admin/rates/create', 'Admin\RateController@create');
    Route::post('admin/rates/store', 'Admin\RateController@store');
    Route::get('admin/rates/show{id}', 'Admin\RateController@show');
    Route::get('admin/rates/edit{id}', 'Admin\RateController@edit');
    Route::post('admin/rates/update{id}', 'Admin\RateController@update');
    Route::get('admin/rates/destroy{id}', 'Admin\RateController@destroy');

    Route::get('admin/topics', 'Admin\TopicController@index');
    Route::post('admin/topics/store', 'Admin\TopicController@store');
    Route::get('admin/topics/edit{id}', 'Admin\TopicController@edit');
    Route::post('admin/topics/update{id}', 'Admin\TopicController@update');
    Route::get('admin/topics/destroy{id}', 'Admin\TopicController@destroy');
});
