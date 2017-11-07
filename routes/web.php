<?php

use app\Http\Controllers\Crawl\CrawlController;
use app\Http\Controllers\ArticlesController;

use App\Events\MessagePosted;

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

/**
 *  一般
 */
// ホーム
Route::get('/','HomeController@index')->name('user_home');

// 問い合わせ

// old
Route::get('/top','TopController@top');

// tmp
Route::get('/details','DetailsController@details');

Route::get('/like/index','FakeController@fake');

/**
 * マイページ
 */
Route::get('/mypage','MypageController@mypage');
Route::get('/mypage/edit','FakeController@fake');
Route::get('/mypage/confirm','FakeController@fake');

Route::get('/mypage/follow','FakeController@fake');
Route::get('/user/10484','FakeController@fake');
Route::get('/mypage/block','FakeController@fake');

/**
 * 記事
 */
// 一覧
Route::get('/articles/index','ArticlesController@index')->name('user_article_list');
// 詳細
Route::get('/articles/999999','ArticlesController@detail')->name('user_article_detail');
// 編集
Route::get('/articles/999999/edit','ArticlesController@edit')->name('user_article_edit');

// TODO : URL設計
Route::get('/articles/2017/03','ArticlesController@fake');

// 投稿
Route::get('/articles/post','ArticlesController@fake');
// 確認
Route::get('/articles/post/confirm','ArticlesController@fake');
// 完了
Route::get('/articles/post/complete','ArticlesController@fake');

/**
 * 通報
 */
Route::get('/report','FakeController@fake');
Route::get('/report/confirm','FakeController@fake');
Route::get('/report/complete','FakeController@fake');


/**
 * 会員限定
 */
Route::group(['middleware' => ['web']], function () {

    // CHAT
    Route::get('/chat', 'MessagesController@chat');

    // MESSAGE
    Route::get('/messages', 'MessagesController@getmessages');
    Route::post('/messages', 'MessagesController@postmessages');

    // 認証
    Route::get('/login/google', 'Auth\LoginController@getGoogleAuth');
    Route::get('/oauth_callback', 'Auth\LoginController@getGoogleAuthCallback');

    // 会員登録
    Route::post('/register/confirm','Auth\RegisterController@confirm');
    Route::post('/register/complete','Auth\RegisterController@complete');

});

/**
 *  AUTH
 */
Auth::routes();


/**
 * Crawler
 */
// test
Route::get('/crawl','Crawl\CrawlController@getRss');
Route::get('/crawl2','Crawl\CrawlController@getImage')->name('getImage');
Route::get('/crawl/check','Crawl\CrawlController@customeCheck');