<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/

//登录退出
Route::get('/','IndexController@index')->name('admin');
Route::get('login','SessionController@login')->name('admin.login');
Route::post('login','SessionController@store')->name('admin.login');
Route::delete('logout','SessionController@logout')->name('admin.logout');

//验证码
Route::get('yzm', 'IndexController@captcha')->name('admin.yzm');

//栏目管理
Route::resource('column','ColumnController',['as' => 'admin']);

//文章管理
Route::resource('article','ArticleController',['as' => 'admin']);
Route::post('article/create','ArticleController@store')->name('admin.article.store');

//文章搜索
Route::post('article','ArticleController@index')->name('admin.article.index');


