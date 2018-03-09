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
Route::post('/', 'WelcomeController@index');
Route::post('/sendform', 'WelcomeController@store');
Route::get('/form/{id}', function ($id) {
     return redirect('client/project/create{id}');
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

    Route::get('admin/skills', 'Admin\SkillController@index');
    Route::post('admin/skills/store', 'Admin\SkillController@store');
    Route::get('admin/skills/edit{id}', 'Admin\SkillController@edit');
    Route::post('admin/skills/update{id}', 'Admin\SkillController@update');
    Route::get('admin/skills/destroy{id}', 'Admin\SkillController@destroy');
});
// CLIENT GROUP
Route::group(['middleware' => 'auth', 'middleware' => 'client' ], function() {
    Route::get('client', function () {
        return view('client.dashboard') ;
    }) ;

    Route::get('client/project/create{id}', 'Client\ProjectController@create');
    Route::post('/sendcalc', 'Client\ProjectController@store');
    Route::post('/client/project/middle', 'Client\ProjectController@update');
    Route::post('/client/project/finnal', 'Client\ProjectController@finnal');
    Route::post('/client/project/docupload', 'Client\ProjectController@docupload');
});
// WRITER GROUP
Route::group(['middleware' => 'auth', 'middleware' => 'isVerified', 'middleware' => 'writer' ], function() {
    Route::get('writer', function () {
        return view('writer.dashboard') ;
    }) ;


    Route::get('writer/profile', 'Writer\ProfileController@index');
    Route::get('writer/profile/show{id}', 'Writer\ProfileController@show');
    Route::get('writer/profile/edit{id}', 'Writer\ProfileController@edit');   
    Route::post('writer/profile/update{id}', 'Writer\ProfileController@update');
    Route::post('writer/profile/bio', 'Writer\ProfileController@bio');
    Route::post('writer/profile/skill{id}', 'Writer\ProfileController@skill');
    Route::get('writer/profile/removeskill{id}', 'Writer\ProfileController@removeskill');
     
});
