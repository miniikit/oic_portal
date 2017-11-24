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
Route::get('/manage/site', 'Manage\SiteController@index')->name('manager_site_list');
// 詳細
Route::get('/manage/site/1000', 'Manage\SiteController@show')->name('manager_site_detail');
// 編集
Route::get('/manage/site/1000/edit', 'Manage\SiteController@edit')->name('manager_site_edit');
// 更新
Route::post('/manage/site/1000/update','Manage\SiteController@update')->name('manager_site_update');


/**
 * 管理者 ー 記事カテゴリ
 */
// 一覧
Route::get('/manage/article/category', 'Manage\ArticlesCategoriesController@index')->name('manager_article_category_list');
// 詳細
Route::get('/manage/article/category/1000', 'Manage\ArticlesCategoriesController@show')->name('manager_article_category_detail');
// 編集
Route::get('/manage/article/category/1000/edit', 'Manage\ArticlesCategoriesController@edit')->name('manager_article_category_edit');
// 更新
Route::post('/manage/article/category/1000/update','Manage\ArticlesCategoriesController@update')->name('manager_article_category_update');


/**
 * 管理者 ー 記事
 */
// 一覧
Route::get('/manage/article', 'Manage\ArticlesCategoriesController@index')->name('manager_article_list');
// 詳細
Route::get('/manage/article/1000', 'Manage\ArticlesCategoriesController@show')->name('manager_article_detail');
// 編集
Route::get('/manage/article/1000/edit', 'Manage\ArticlesCategoriesController@edit')->name('manager_article_edit');
// 更新
Route::post('/manage/site/1000/update','Manage\SiteController@update')->name('manager_article_update');


/**
 * 管理者 ー ユーザ
 */
// 一覧
Route::get('/manage/user', 'Manage\ArticlesCategoriesController@index')->name('manager_user_list');
// 詳細
Route::get('/manage/user/1000', 'Manage\ArticlesCategoriesController@show')->name('manager_user_detail');
// 編集
Route::get('/manage/user/1000/edit', 'Manage\ArticlesCategoriesController@edit')->name('manager_user_edit');
// 更新
Route::post('/manage/site/1000/update','Manage\SiteController@update')->name('manager_user_update');

/**
 * 管理者 ー 管理者
 */
// 一覧
Route::get('/manage/manager', 'Manage\ArticlesCategoriesController@index')->name('manager_employee_list');
// 詳細
Route::get('/manage/manager/1000', 'Manage\ArticlesCategoriesController@show')->name('manager_employee_detail');
// 編集
Route::get('/manage/manager/1000/edit', 'Manage\ArticlesCategoriesController@edit')->name('manager_employee_edit');
// 更新
Route::post('/manage/site/1000/update','Manage\SiteController@update')->name('manager_employee_update');


/**
 * 管理者 - コミュニティ
 */
// 一覧
Route::get('/manage/community', 'Manage\ArticlesCategoriesController@index')->name('manager_community_list');
// 詳細
Route::get('/manage/community/1000', 'Manage\ArticlesCategoriesController@show')->name('manager_community_detail');
// 編集
Route::get('/manage/community/1000/edit', 'Manage\ArticlesCategoriesController@edit')->name('manager_community_edit');
// 更新
Route::post('/manage/site/1000/update','Manage\SiteController@update')->name('manager_community_update');


/**
 * 管理者 - イベント
 */
// 一覧
Route::get('/manage/event', 'Manage\ArticlesCategoriesController@index')->name('manager_event_list');
// 詳細
Route::get('/manage/event/1000', 'Manage\ArticlesCategoriesController@show')->name('manager_event_detail');
// 編集
Route::get('/manage/event/1000/edit', 'Manage\ArticlesCategoriesController@edit')->name('manager_event_edit');
// 更新
Route::post('/manage/site/1000/update','Manage\SiteController@update')->name('manager_event_update');