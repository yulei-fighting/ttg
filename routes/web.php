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
// Route::get('/', function () {
//     return view('welcome');
// //test push
// });

/*后台的路由集合*/
Route::get('admin/public/login','Admin\PublicController@login')->name('login');
Route::post('admin/public/check','Admin\PublicController@check')->name('admin_check_login');

// 后台路由群组
Route::group(['prefix' => 'admin'],function(){
	//后台首页的路由
	Route::get('index/index','Admin\IndexController@index')->name('dashboard');
	Route::get('index/welcome','Admin\IndexController@welcome')->name('welcome');

	//后台运动员模块
	Route::get('player/index','Admin\PlayerController@index')->name('player_index');
	Route::any('player/add','Admin\PlayerController@add')->name('player_add');
	Route::post('player/del','Admin\PlayerController@del')->name('player_del');
	Route::any('player/edit','Admin\PlayerController@edit')->name('player_edit');

	//后台比赛管理模块
	Route::get('match/index','Admin\MatchController@index')->name('match_index');
	Route::any('match/add','Admin\MatchController@add')->name('match_add');
	Route::get('match/del','Admin\MatchController@del')->name('match_del');
	Route::any('match/edit','Admin\MatchController@edit')->name('match_edit');
	Route::get('match/getPlayerB','Admin\MatchController@getPlayerB')->name('match_getPlayerB');
});