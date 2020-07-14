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

Route::group(['middleware' => 'auth'], function(){
    Route::get('mypage',  'MypageController@mypage')->name('mypage');
    //プロフィール、パスワード編集画面を作成してここでルーティング
});

Route::group(['prefix' => 'profile'], function(){
    //クリエーター
    Route::group(['middleware' => 'creator'], function(){
        //プロフィール作成
        Route::get('creator/create',  'Creator\ProfileController@creator_add')->name('profile.creator.add');
        Route::post('creator/create','Creator\ProfileController@creator_create')->name('profile.creator.create');
    });
    //プロフィール一覧
    Route::get('creator','Creator\ProfileController@creator_index')->name('profile.creator.index');
    //プロフィール詳細
    Route::get('creator/{id}','Creator\ProfileController@creator_show')->name('profile.creator.show');
    
    //アクター
    Route::group(['middleware' => 'actor'], function(){
        //プロフィール作成
        Route::get('actor/create','Actor\ProfileController@actor_add')->name('profile.actor.add');
        Route::post('actor/create','Actor\ProfileController@actor_create')->name('profile.actor.create');
    });
    //プロフィール一覧
    Route::get('actor','Actor\ProfileController@actor_index')->name('profile.actor.index');
    //プロフィール詳細
    Route::get('actor/{id}','Actor\ProfileController@actor_show')->name('profile.actor.show');
    
});

//クリエーターワーク
Route::group(['middleware' => 'creator','prefix' => 'creator/{creator_id}/work'], function(){
    Route::get('create','Creator\WorkController@creator_add')->name('work.creator.add');
    Route::post('create','Creator\WorkController@creator_create')->name('work.creator.create'); 
    Route::get('{work_id}/edit','Creator\WorkController@creator_edit')->name('work.creator.edit');
    Route::post('{work_id}/edit','Creator\WorkController@creator_update')->name('work.creator.update');
});
//クリエーターワーク一覧
Route::get('creator/work','Creator\WorkController@creator_index')->name('work.creator.index');
//クリエーターワーク詳細
Route::get('creator/{creator_id}/work/{work_id}','Creator\WorkController@creator_show')->name('work.creator.show');

//アクターワーク
Route::group(['middleware' => 'actor','prefix' => 'actor/{actor_id}/work'], function(){
    Route::get('create',  'Actor\WorkController@actor_add')->name('work.actor.add');
    Route::post('create',  'Actor\WorkController@actor_create')->name('work.actor.create'); 
    Route::get('{work_id}/edit',   'Actor\WorkController@actor_edit')->name('work.actor.edit');
    Route::post('{work_id}/edit',   'Actor\WorkController@actor_update')->name('work.actor.update');
});
//アクターワーク一覧
Route::get('actor/work',   'Actor\WorkController@actor_index')->name('work.actor.index');
//アクターワーク詳細
Route::get('actor/{actor_id}/work/{work_id}',   'Actor\WorkController@actor_show')->name('work.actor.show');
        

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

