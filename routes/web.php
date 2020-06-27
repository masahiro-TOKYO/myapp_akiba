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

// リダイレクト処理　middleware('auth')
    Route::group(['prefix' => 'work','middleware' =>'creator'], function(){
    
        Route::get('creator/create','Admin\WorkController@creator_add');
        
        Route::post('creator/create','Admin\WorkController@creator_create');    
    
        Route::get('creator','Admin\WorkController@creator_index');
        
        Route::get('creator/edit','Admin\WorkController@creator_edit');
        
        Route::post('creator/edit','Admin\WorkController@creator_update');
        
        Route::get('creator/{id}','Admin\WorkController@creator_show');

});

    Route::group(['prefix' => 'work','middleware' =>'actor'], function(){
        
        Route::get('actor/create','Admin\WorkController@actor_add');

        Route::post('actor/create','Admin\WorkController@actor_create');

        Route::get('actor','Admin\WorkController@actor_index');
        
        Route::get('actor/edit','Admin\WorkController@actor_edit');
        
        Route::post('actor/edit','Admin\WorkController@actor_update');
        
        Route::get('actor/{id}','Admin\WorkController@actor_show');
        
});




    Route::group(['prefix' => 'profile','middleware' =>'creator'], function(){
        
        Route::get('choice_job','Admin\ProfileController@choice_job');
        
        Route::get('creator/create','Admin\ProfileController@creator_add');
        
        Route::post('creator/create','Admin\ProfileController@creator_create');
        
        Route::get('creator','Admin\ProfileController@creator_index');
    
        Route::get('creator/edit','Admin\ProfileController@creator_edit');
        
        Route::get('creator/{id}','Admin\ProfileController@creator_show');
        
});


    Route::group(['prefix' => 'profile','middleware' =>'actor'], function(){

        Route::get('actor/create','Admin\ProfileController@actor_add');
        
        Route::post('actor/create','Admin\ProfileController@actor_create');
        
        Route::get('actor','Admin\ProfileController@actor_index');
        
        Route::get('actor/edit','Admin\ProfileController@actor_edit');
        
        Route::get('actor/{id}','Admin\ProfileController@actor_show');
        
    });        
        
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
