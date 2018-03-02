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
Route::group([ 'middleware' => 'auth', 'middleware' => 'isVerified', 'middleware' => 'admin' ], function() {
    // MAIN DASHBOARD
    Route::get('admin', function () {
        return view('admin.dashboard') ;
    }) ;

    Route::get('admin/users', 'UsersController@index')->name('user.index') ;

    Route::get('admin/rates', 'Admin/RateController@index');
    Route::get('admin/create', 'Admin/RateController@create');
    Route::post('admin/store', 'Admin/RateController@store');
    Route::get('admin/show{id}', 'Admin/RateController@show');
    Route::get('admin/edit{id}', 'Admin/RateController@edit');
    Route::post('admin/update{id}', 'Admin/RateController@update');
});
