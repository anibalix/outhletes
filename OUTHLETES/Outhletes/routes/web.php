<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/index','IndexController@index');
Route::get('/signup','SignupController@signup');
Route::get('/login','LoginController@login');
Route::get('/faqs','FaqsController@faqs');
Route::get('/profile','ProfileController@profile');
