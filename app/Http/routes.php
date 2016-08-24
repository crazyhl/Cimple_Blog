<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// 认证路由...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// 前台路由
Route::get('/', 'IndexController@index')->name('home'); // 首页
Route::get('/aritlce/{article}', 'ArticleController@show')->name('article.show'); // 文章
Route::get('/page/{article}', 'ArticleController@show')->name('page.show'); // 页面
Route::get('/cate/{cate}', 'CateController@show')->name('cate.show'); // 分类
Route::get('/tag/{tag}', 'TagController@show')->name('tag.show'); // 标签

// 后台路由
Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', 'IndexController@index'); // 首页
    Route::resource('/cate', 'CateController', ['except' => ['show']]); // 分类
    Route::resource('/article', 'ArticleController', ['except' => ['show']]); //文章
    Route::resource('/page', 'PageController', ['except' => ['show']]); // 页面
    Route::get('/setting', 'SettingController@index'); // 设置页面
    Route::post('/setting', 'SettingController@store'); // 设置保存
});
