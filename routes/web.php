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

//お気に入り
Route::get('/like','LikeController@index');

/**
 * マイページ
 */
Route::get('/mypage','MypagesController@show')->name('user_mypage');
Route::get('/mypage/edit','MypagesController@edit')->name('user_mypage_edit');
Route::get('/mypage/confirm','FakeController@fake')->name('');
Route::get('/mypage/follow','FakeController@fake');
Route::get('/mypage/block','FakeController@fake');
Route::get('/user/10484','FakeController@fake');


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
Route::get('/articles/post','ArticlesController@fake')->name('user_article_post');
// 確認
Route::get('/articles/post/confirm','ArticlesController@fake')->name('user_article_post_confirm');
// 完了
Route::get('/articles/post/complete','ArticlesController@fake')->name('user_article_post_complete');

/**
 * 通報
 */
Route::get('/report','FakeController@fake');
Route::get('/report/confirm','FakeController@fake');
Route::get('/report/complete','FakeController@fake');


/**
 * 会員限定
 */
Route::group(['middleware' => ['UserAuth']], function () {
    // CHAT
    Route::get('/chat', 'MessagesController@chat');

    // MESSAGE
    Route::get('/messages', 'MessagesController@getmessages');
    Route::post('/messages', 'MessagesController@postmessages');

/**
 * マイページ
 */
    Route::get('/mypage','MypagesController@show')->name('user_mypage');
    Route::get('/mypage/edit','MypagesController@edit')->name('user_mypage_edit');
    Route::get('/mypage/confirm','FakeController@fake');

    Route::get('/mypage/follow','FakeController@fake');
    Route::get('/user/10484','FakeController@fake');
    Route::get('/mypage/block','FakeController@fake');
});

/**
 *  AUTH
 */


    // 認証
    Route::get('/login/google', 'Auth\LoginController@getGoogleAuth')->name('user_login');
    Route::get('/oauth_callback', 'Auth\LoginController@getGoogleAuthCallback');
    Route::post('/logout','Auth\LoginController@logout')->name('user_logout');

    // 会員登録
    Route::post('/register/complete','Auth\RegisterController@complete')->name('user_register_complete');;

    Auth::routes();
/**
 * Crawler
 */
    // test
    Route::get('/crawl','Crawl\CrawlController@getRss');
    Route::get('/crawl2','Crawl\CrawlController@getImage')->name('getImage');
    Route::get('/crawl/check','Crawl\CrawlController@customeCheck');


  
