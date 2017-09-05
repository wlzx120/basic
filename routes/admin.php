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
Route::get('/login','SessionController@login')->name('admin.login');
Route::post('/login','SessionController@store')->name('admin.login');
Route::delete('/logout','SessionController@logout')->name('admin.logout');

//验证码
Route::get('/yzm', 'IndexController@captcha')->name('admin.yzm');

//栏目管理
Route::get('column/index','ColumnController@index')->name('admin.column.index');
Route::get('column/{column}/edit','ColumnController@edit')->name('admin.column.edit');
Route::patch('column/{column}','ColumnController@update')->name('admin.column.update');
Route::get('column/create','ColumnController@create')->name('admin.column.create');
Route::post('column/store','ColumnController@store')->name('admin.column.store');
Route::delete('column/{column}','ColumnController@destroy')->name('admin.column.destroy');
//文章管理
Route::get('article/index','ArticleController@index')->name('admin.article.index');
Route::get('article/{article}','ArticleController@show')->name('admin.article.show');
Route::get('article/{article}/edit','ArticleController@edit')->name('admin.article.edit');
Route::patch('article/{article}','ArticleController@update')->name('admin.article.update');
Route::get('article/create','ArticleController@create')->name('admin.article.create');
Route::post('article/store','ArticleController@store')->name('admin.article.store');
Route::delete('article/{article}','ArticleController@destroy')->name('admin.article.destroy');
//文章搜索
Route::post('article/index','ArticleController@index')->name('admin.article.index');


