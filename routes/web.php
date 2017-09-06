<?php

/*
|--------------------------------------------------------------------------
| Home Routes
|--------------------------------------------------------------------------
|
*/

Route::namespace('Home')->group(function(){

    Route::get('/','IndexController@index')->name('home');






});


//重置密码
Route::get('password/reset','Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email','Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/email/{token}','Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/update','Auth\ResetPasswordController@reset')->name('password.update');