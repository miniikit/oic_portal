<?php
/**
 * 管理者
 */

// ホーム
Route::get('/manage/home', 'FakeController@fake');


/**
 * 管理者 ー ユーザ
 */
// 一覧
Route::get('/manage/user', 'FakeController@index');
// 詳細
Route::get('/manage/user/1000', 'FakeController@show');
// 編集
Route::get('/manage/user/1000/edit', 'FakeController@edit');


/**
 * 管理者 - コミュニティ
 */
// 一覧
Route::get('/manage/community', 'FakeController@index');
// 詳細
Route::get('/manage/community/1000', 'FakeController@show');
// 編集
Route::get('/manage/community/1000/edit', 'FakeController@edit');


/**
 * 管理者 - イベント
 */
// 一覧
Route::get('/manage/event', 'FakeController@index');
// 詳細
Route::get('/manage/event/1000', 'FakeController@show');
// 編集
Route::get('/manage/event/1000/edit', 'FakeController@edit');