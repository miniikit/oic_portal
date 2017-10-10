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

Route::get('/','IndexController@index');

Route::get('/top','TopController@top');

Route::get('/login/google', 'Auth\LoginController@getGoogleAuth');
Route::get('/oauth_callback', 'Auth\LoginController@getGoogleAuthCallback');

Auth::routes();
