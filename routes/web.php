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

Route::get('/logout','FakeController@fake');
Route::get('/register','FakeController@fake');
Route::get('/register/confirm','FakeController@fake');
Route::get('/register/complete','FakeController@fake');

Route::get('/like/index','FakeController@fake');

Route::get('/mypage','FakeController@fake');
Route::get('/mypage/edit','FakeController@fake');
Route::get('/mypage/confirm','FakeController@fake');

Route::get('/mypage/follow','FakeController@fake');
Route::get('/user/10484','FakeController@fake');
Route::get('/mypage/block','FakeController@fake');

Route::get('/articles/2017/03','FakeController@fake');
Route::get('/articles/post','FakeController@fake');
Route::get('/articles/post/confirm','FakeController@fake');
Route::get('/articles/post/complete','FakeController@fake');
Route::get('/articles/index','FakeController@fake');
Route::get('/articles/999999/edit','FakeController@fake');
Route::get('/articles/999999','FakeController@fake');

Route::get('/report','FakeController@fake');
Route::get('/report/confirm','FakeController@fake');
Route::get('/report/complete','FakeController@fake');
