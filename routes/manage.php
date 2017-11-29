<?php
/**
 * 管理者
 */

// ホーム
Route::get('/manage', 'Manage\HomeController@index')->name('manager_home');


/**
 * 管理者 - レポート
 */
// 一覧
Route::get('/manage/report', 'Manage\ReportsController@home')->name('manager_report_list');
// 詳細
Route::get('/manage/report/{id}', 'Manage\ReportsController@home')->name('manager_report_detail');
// 更新
Route::post('/manage/report/{id}/update', 'Manage\ReportsController@home')->name('manager_report_update');
// 削除
Route::delete('/manage/report/{id}/delete', 'Manage\ReportsController@destroy')->name('manager_report_delete');


/**
 * 管理者 - クローラー スケジュール
 */
// ステータス *特殊画面
Route::get('/manage/crawl/home', 'Manage\CrawlScheduleController@home')->name('manager_crawl_home');
// 一覧
Route::get('/manage/crawl', 'Manage\CrawlScheduleController@index')->name('manager_crawl_list');
// 詳細
Route::get('/manage/crawl/{id}', 'Manage\CrawlScheduleController@show')->name('manager_crawl_detail');
// 更新
Route::post('/manage/crawl/{id}/update','Manage\CrawlScheduleController@update')->name('manager_crawl_update');
// 削除
Route::delete('/manage/crawl/{id}/delete','Manage\CrawlScheduleController@destroy')->name('manager_crawl_delete');


/**
 * 管理者 ー ニュースサイト
 */
// 一覧
Route::get('/manage/site', 'Manage\SiteController@index')->name('manager_site_list');
// 詳細
Route::get('/manage/site/{id}', 'Manage\SiteController@show')->name('manager_site_detail');
// 編集
Route::get('/manage/site/{id}/edit', 'Manage\SiteController@edit')->name('manager_site_edit');
// 更新
Route::post('/manage/site/{id}/update','Manage\SiteController@update')->name('manager_site_update');
// 削除
Route::delete('/manage/site/{id}/delete','Manage\SiteController@destroy')->name('manager_site_delete');


/**
 * 管理者 ー 記事カテゴリ
 */
// 一覧
Route::get('/manage/article/category', 'Manage\ArticlesCategoriesController@index')->name('manager_article_category_list');
// 詳細
Route::get('/manage/article/category/{id}', 'Manage\ArticlesCategoriesController@show')->name('manager_article_category_detail');
// 編集
Route::get('/manage/article/category/{id}/edit', 'Manage\ArticlesCategoriesController@edit')->name('manager_article_category_edit');
// 更新
Route::post('/manage/article/category/{id}/update','Manage\ArticlesCategoriesController@update')->name('manager_article_category_update');
// 削除
Route::delete('/manage/article/category/{id}/delete','Manage\ArticlesCategoriesController@destroy')->name('manager_article_category_delete');


/**
 * 管理者 ー 記事
 */
// 一覧
Route::get('/manage/article', 'Manage\ArticlesController@index')->name('manager_article_list');
// 詳細
Route::get('/manage/article/1000', 'Manage\ArticlesController@show')->name('manager_article_detail');
// 編集
Route::get('/manage/article/1000/edit', 'Manage\ArticlesController@edit')->name('manager_article_edit');
// 更新
Route::post('/manage/site/1000/update','Manage\ArticlesController@update')->name('manager_article_update');
// 削除
Route::delete('/manage/site/1000/delete','Manage\ArticlesController@destroy')->name('manager_article_delete');


/**
 * 管理者 ー ユーザ
 */
// 一覧
Route::get('/manage/user', 'Manage\UserController@index')->name('manager_user_list');
// 詳細
Route::get('/manage/user/1000', 'Manage\UserController@show')->name('manager_user_detail');
// 編集
Route::get('/manage/user/1000/edit', 'Manage\UserController@edit')->name('manager_user_edit');
// 更新
Route::post('/manage/site/1000/update','Manage\UserController@update')->name('manager_user_update');
// 削除
Route::delete('/manage/site/1000/delete','Manage\UserController@destroy')->name('manager_user_delete');


/**
 * 管理者 ー 管理者
 */
// 一覧
Route::get('/manage/manager', 'Manage\EmployeesController@index')->name('manager_employee_list');
// 詳細
Route::get('/manage/manager/1000', 'Manage\EmployeesController@show')->name('manager_employee_detail');
// 編集
Route::get('/manage/manager/1000/edit', 'Manage\EmployeesController@edit')->name('manager_employee_edit');
// 更新
Route::post('/manage/site/1000/update','Manage\EmployeesController@update')->name('manager_employee_update');
// 更新
Route::delete('/manage/site/1000/delete','Manage\EmployeesController@destroy')->name('manager_employee_delete');


/**
 * 管理者 - コミュニティ
 */
// 一覧
Route::get('/manage/community', 'Manage\CommunitiesController@index')->name('manager_community_list');
// 詳細
Route::get('/manage/community/1000', 'Manage\CommunitiesController@show')->name('manager_community_detail');
// 編集
Route::get('/manage/community/1000/edit', 'Manage\CommunitiesController@edit')->name('manager_community_edit');
// 更新
Route::post('/manage/site/1000/update','Manage\CommunitiesController@update')->name('manager_community_update');
// 削除
Route::delete('/manage/site/1000/delete','Manage\CommunitiesController@destroy')->name('manager_community_delete');


/**
 * 管理者 - イベント
 */
// 一覧
Route::get('/manage/event', 'Manage\EventsController@index')->name('manager_event_list');
// 詳細
Route::get('/manage/event/1000', 'Manage\EventsController@show')->name('manager_event_detail');
// 編集
Route::get('/manage/event/1000/edit', 'Manage\EventsController@edit')->name('manager_event_edit');
// 更新
Route::post('/manage/site/1000/update','Manage\EventsController@update')->name('manager_event_update');
// 削除
Route::post('/manage/site/1000/delete','Manage\EventsController@destroy')->name('manager_event_delete');