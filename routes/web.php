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
Route::get('/', 'HomeController@index')->name('user_home');

//ソート
Route::post('/sort','HomeController@sort')->name('user_sort');

//ジャンルでソート
Route::post('/genre','HomeController@genre')->name('user_genre');

//検索
Route::get('/search','HomeController@search')->name('user_search');


// 問い合わせ
Route::get('/contact','ContactsController@show')->name('user_contact');
Route::post('/contact/complete','ContactsController@complete')->name('user_contact_complete');

/**
 * 記事
 */
// 投稿
Route::get('/articles/user/post', 'ArticlesController@write')->name('user_article_write');
// 確認
Route::post('/articles/user/confirm', 'ArticlesController@confirm')->name('user_article_post_confirm');
// 完了
Route::post('/articles/user/post/complete', 'ArticlesController@complete')->name('user_article_post_complete');

// 一覧
//Route::get('/articles/index', 'ArticleController@index')->name('user_article_list');
// 詳細
Route::get('/articles/user/{id}', 'ArticlesController@detail')->name('user_article_detail');
// 編集
Route::get('/articles/user/{id}/edit', 'ArticlesController@edit')->name('user_article_edit');
Route::get('/articles/user/{id}/delete', 'ArticlesController@delete')->name('user_article_delete');
Route::post('/articles/user/edit/confirm','ArticlesController@edit_confirm')->name('user_article_edit_confirm');
Route::post('/articles/user/edit/complete','ArticlesController@edit_complete')->name('user_article_edit_complete');
// コメント投稿
Route::post('/articles/user/{article_id}/comment', 'ArticlesController@store')->name('user_article_comment');

//お気に入り
Route::get('/user/favorite/list','ArticlesLikesController@index')->name('user_article_favoritelist');
Route::get('/articles/user/{id}/favorite', 'ArticlesLikesController@favorite')->name('user_article_favorite');
Route::get('/articles/user/{id}/unfavorite', 'ArticlesLikesController@Unfavorite')->name('user_article_unfavorite');

// いいね
Route::get('/articles/user/{id}/like', 'ArticlesLikesController@like')->name('user_article_like');
Route::get('/articles/user/{id}/unlike', 'ArticlesLikesController@Unlike')->name('user_article_unlike');

/**
 * 通報
 */
Route::get('/report', 'FakeController@fake')->name('user_report');



Route::group(['middleware' => ['UserAuth']],function()
{
    /**
     * マイページ
     */

    // マイページ
    Route::get('/mypage', 'MypagesController@show')->name('user_mypage');
    // ユーザページ
    Route::get('/user/{id}', 'MypagesController@show_user')->name('user_profile');

    // 編集
    Route::get('/mypage/edit', 'MypagesController@edit')->name('user_mypage_edit');

    //編集完了
    Route::post('/mypage/edit/complete', 'MypagesController@complete')->name('user_mypage_complete');


    /**
     * ユーザページ
     */

    //フォロー
    Route::get('/mypage/follow', 'MypagesController@follow')->name('user_mypage_follow');

    //フォロワー
    Route::get('/mypage/follower', 'MypagesController@follower')->name('user_mypage_follower');

    // ブロック
    Route::get('/mypage/block', 'FakeController@fake')->name('user_mypage_block');

    // チャット
    Route::get('/chat', 'MessagesController@chat')->name('user_mypage_chat');
    Route::get('/chat_other', 'MessagesController@chat_other')->name('user_mypage_chat_other');

    Route::get('/user/{id}/chat', 'MessagesController@user_chat')->name('user_chat');


    // メッセージ
    Route::get('/messages', 'MessagesController@getmessages')->name('user_mypage_message');
    Route::post('/messages', 'MessagesController@postmessages');

    //フォロー、フォロー解除
    Route::post('/follow/request','MypagesController@add_follow')->name('user_follow_request');
    Route::post('/unfollow/request','MypagesController@delete_follow')->name('user_unfollow_request');

});

/**
 * コミュニティ
 */
// 一覧
Route::get('/community', 'CommunityController@index')->name('user_community');
// 詳細
Route::get('/community/{id}', 'CommunityController@show')->name('user_community_detail');

// 更新
Route::get('/community/1000/edit', 'FakeController@edit');
// 更新-確認    TODO : 関数名変更
Route::get('/community/1000/edit/confirm', 'FakeController@edit');
// 更新-確認    TODO : 関数名変更
Route::get('/community/1000/edit/complete', 'FakeController@edit');

// 新規作成
Route::get('/community/new', 'CommunityController@make')->name('user_community_create');

// 新規作成-確認
Route::post('/community/new/confirm', 'CommunityController@confirm')->name('user_community_create_confirm');
// 新規作成-完了
Route::post('/community/new/complete', 'CommunityController@complete')->name('user_community_create_complete');


/**
 *  イベント
 */
// 一覧
Route::get('/event', 'EventController@index')->name('user_event');
// 一覧(終了分)  TODO : URL考える
Route::get('/event/kk', 'FakeController@index');
// 詳細
Route::get('/event/{id}/detail', 'EventController@detail')->name('user_event_detail');

// 更新
Route::get('/event/1000/edit', 'EventController@edit')->name('user_event_edit');
// 更新-確認    TODO : 関数名変更
Route::get('/event/1000/edit/confirm', 'FakeController@edit');
// 更新-確認    TODO : 関数名変更
Route::get('/event/1000/edit/complete', 'FakeController@edit');

// 新規作成
Route::get('/event/new', 'EventController@make')->name('user_event_create');
// 新規作成-確認
Route::get('/event/new/confirm', 'EventController@make_confirm')->name('user_make_confirm');
// 新規作成-完了   TODO : 関数名変更
Route::get('/event/new/complete', 'EventController@make_complete')->name('user_make_complete');

//イベント参加
Route::get('/event/{id}/participants', 'EventController@Participants')->name('user_event_participant');

//イベント参加取り消し
Route::get('/event/{id}/unparticipants', 'EventController@UnParticipants')->name('user_event_unparticipant');


/**
 * Auth
 */
// Googleログイン
Route::get('/login/google', 'Auth\LoginController@getGoogleAuth')->name('user_login');
Route::get('/oauth_callback', 'Auth\LoginController@getGoogleAuthCallback');
// ログアウト
Route::post('/logout', 'Auth\LoginController@logout')->name('user_logout');
// 会員登録
Route::post('/register/complete', 'Auth\RegisterController@complete')->name('user_register_complete');



/**
 * Crawler
 */
// test
Route::get('/crawl', 'Crawl\CrawlController@getRss');
Route::get('/crawl2', 'Crawl\CrawlController@getLists')->name('getImage');
Route::get('/crawl/check', 'Crawl\CrawlController@customeCheck');
Route::get('/crawl3/{site_id}','Crawl\CrawlController@getOneSiteNewArticle');
