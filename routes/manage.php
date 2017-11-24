<?php
/**
 * 管理者
 */

// ホーム
Route::get('/manage', 'Manage\HomeController@index')->name('manager_home');



/**
 * 管理者 - クローラー スケジュール
 */
// ステータス *特殊画面
Route::get('/manage/crawl/home', 'Manage\CrawlScheduleController@home')->name('manager_crawl_home');
// 一覧
Route::get('/manage/crawl', 'Manage\CrawlScheduleController@index')->name('manager_crawl_list');
// 詳細
Route::get('/manage/crawl/1000', 'Manage\CrawlScheduleController@show')->name('manager_crawl_detail');


/**
 * 管理者 ー ニュースサイト
 */
// 一覧
Route::get('/manage/site', 'Manage\SiteController@index');
// 詳細
Route::get('/manage/site/1000', 'Manage\SiteController@show');
// 編集
Route::get('/manage/site/1000/edit', 'Manage\SiteController@edit');
// 更新
Route::post('/manage/site/1000/update','Manage\SiteController@update');


/**
 * 管理者 ー 記事カテゴリ
 */
// 一覧
Route::get('/manage/article/category', 'Manage\ArticlesCategoriesController@index');
// 詳細
Route::get('/manage/article/category/1000', 'Manage\ArticlesCategoriesController@show');
// 編集
Route::get('/manage/article/category/1000/edit', 'Manage\ArticlesCategoriesController@edit');
// 更新
Route::post('/manage/article/category/1000/update','Manage\ArticlesCategoriesController@update');


/**
 * 管理者 ー 記事
 */
// 一覧
Route::get('/manage/article', 'Manage\ArticlesCategoriesController@index');
// 詳細
Route::get('/manage/article/1000', 'Manage\ArticlesCategoriesController@show');
// 編集
Route::get('/manage/article/1000/edit', 'Manage\ArticlesCategoriesController@edit');
// 更新
Route::post('/manage/site/1000/update','Manage\SiteController@update');


/**
 * 管理者 ー ユーザ
 */
// 一覧
Route::get('/manage/user', 'Manage\ArticlesCategoriesController@index');
// 詳細
Route::get('/manage/user/1000', 'Manage\ArticlesCategoriesController@show');
// 編集
Route::get('/manage/user/1000/edit', 'Manage\ArticlesCategoriesController@edit');
// 更新
Route::post('/manage/site/1000/update','Manage\SiteController@update');

/**
 * 管理者 ー 管理者
 */
// 一覧
Route::get('/manage/manager', 'Manage\ArticlesCategoriesController@index');
// 詳細
Route::get('/manage/manager/1000', 'Manage\ArticlesCategoriesController@show');
// 編集
Route::get('/manage/manager/1000/edit', 'Manage\ArticlesCategoriesController@edit');
// 更新
Route::post('/manage/site/1000/update','Manage\SiteController@update');


/**
 * 管理者 - コミュニティ
 */
// 一覧
Route::get('/manage/community', 'Manage\ArticlesCategoriesController@index');
// 詳細
Route::get('/manage/community/1000', 'Manage\ArticlesCategoriesController@show');
// 編集
Route::get('/manage/community/1000/edit', 'Manage\ArticlesCategoriesController@edit');
// 更新
Route::post('/manage/site/1000/update','Manage\SiteController@update');


/**
 * 管理者 - イベント
 */
// 一覧
Route::get('/manage/event', 'Manage\ArticlesCategoriesController@index');
// 詳細
Route::get('/manage/event/1000', 'Manage\ArticlesCategoriesController@show');
// 編集
Route::get('/manage/event/1000/edit', 'Manage\ArticlesCategoriesController@edit');
// 更新
Route::post('/manage/site/1000/update','Manage\SiteController@update');