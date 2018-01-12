<?php

namespace App\Service;

use App\NewsSite;
use App\NewsSiteCategory;
use App\User;
use App\Friend;
use App\Article;
use App\Profile;
use App\ArticleLike;
use App\ArticleComment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class SQLService
{
    /*
     * 記事
     */
    // 記事挿入
    public function insertArticle($title, $image, $text, $article_url, $site_id)
    {
        return DB::table('articles_table')
            ->insert([
                'article_title' => $title,
                'article_text' => $text,
                'article_image' => $image,
                'article_url' => $article_url,
                'news_site_id' => $site_id
            ]);
    }

    /*
     * クローラースケジュール
     */
    // クロールスケジュール取得
    public function getCrawlSchedules()
    {
        return DB::table('crawler_schedule_table')
            ->join(
                'crawler_status_master',
                'crawler_schedule_table.crawl_status_id',
                'crawler_status_master.id'
            )->get();
    }

    // クロールスケジュール詳細取得
    public function getCrawlSchedule($id)
    {
        return DB::table('crawler_schedule_table')->where('id', $id)->get();
    }


    /*
     * クローラー
     */
    // サイト取得
    public function getSites()
    {
        return DB::table('news_sites_master')->whereNull('deleted_at')->get();//->where('deleted_at','=','null')->get();
    }

    public function getArticlesTEST()
    {
        return DB::table('articles_table')->get();
    }

    public function getOriginalSites()
    {

    }

    //Eloquant

    //認証しているユーザIDを取得
    public function checkAuth()
    {
        return $userId = Auth::user()->id;
    }

    //ユーザデータを取得
    public function getUserData()
    {
        $userId = $this->checkAuth();
        return $user = app(User::class)::find($userId);
    }

    //プロフィールデータを取得
    public function getUserProfile()
    {
        $user = $this->getUserData();
        return $profile = app(Profile::class)::where('id', $user->profile_id)->first();
    }

    //所属している学科とコースを取得
    public function getUserCourse()
    {
        $profile = $this->getUserProfile();
        return $course = DB::table('courses_master as cm1')
               ->join('courses_master as cm2', 'cm1.parent_course_id', '=', 'cm2.id')
               ->select('cm1.course_name as course_major', 'cm2.course_name')
               ->where('cm1.id', '=', $profile->course_id)
               ->first();
    }

    //フォロー数取得
    public function getFollowCount()
    {
        $userId = $this->checkAuth();
        return $follow_ct = app(Friend::class)->where('user_id', $userId)->get()->count();
    }

    //フォロワー数取得
    public function getFollowerCount()
    {
        $userId = $this->checkAuth();
        return $follower_ct = app(Friend::class)->where('user2_id', $userId)->get()->count();
    }

    //記事取得(新規順)
    public function getArticle()
    {
       return $article = \DB::table('articles_table')
            ->where('articles_table.deleted_at',null)
            ->orderBy('articles_table.id','DESC')
            ->limit(21)
            ->get();
    }

    //ユーザの記事投稿数を取得
    public function getUserArticleCount()
    {
        $userId = $this->checkAuth();
        return $article = \DB::table('articles_table')
            ->where('articles_table.deleted_at',null)
            ->where('articles_table.user_id',$userId)
            ->get()
            ->count();
    }

    //いいね順に記事を取得
    public function getArticleLike()
    {
        return $article = DB::table('articles_likes_table')
            ->select(DB::raw('count(*) as count,article_id,articles_table.id,article_title,article_text,article_image,news_site_id,article_url,articles_table.deleted_at'))
            ->join('articles_table','article_id','articles_table.id')
            ->where('articles_table.deleted_at',null)
            ->groupBy('article_id')
            ->orderBy('count','desc')
            ->limit(21)->get();

    }

    //IT系の記事を表示
    public function getArticleIt()
    {
        return $article = DB::table('news_sites_master')
            ->join('articles_table','news_sites_master.id','articles_table.news_site_id')
            ->where('news_sites_master.news_site_category_id',1)
            ->where('articles_table.deleted_at',null)
            ->orderBy('articles_table.id','DESC')
            ->get();
    }

    //ゲーム系の記事を表示
    public function getArticleGame()
    {
        return $article = DB::table('news_sites_master')
            ->join('articles_table','news_sites_master.id','articles_table.news_site_id')
            ->where('news_sites_master.news_site_category_id',2)
            ->where('articles_table.deleted_at',null)
            ->orderBy('articles_table.id','DESC')
            ->get();
    }

    //デザイン系の記事を表示
    public function getArticleDesign()
    {
        return $article = DB::table('news_sites_master')
            ->join('articles_table','news_sites_master.id','articles_table.news_site_id')
            ->where('news_sites_master.news_site_category_id',3)
            ->where('articles_table.deleted_at',null)
            ->orderBy('articles_table.id','DESC')
            ->get();
    }

    //アート系の記事を表示
    public function getArticleArt()
    {
        return $article = DB::table('news_sites_master')
            ->join('articles_table','news_sites_master.id','articles_table.news_site_id')
            ->where('news_sites_master.news_site_category_id',4)
            ->where('articles_table.deleted_at',null)
            ->orderBy('articles_table.id','DESC')
            ->get();
    }

    //経済系の記事を表示
    public function getArticleEconomy()
    {
        return $article = DB::table('news_sites_master')
            ->join('articles_table','news_sites_master.id','articles_table.news_site_id')
            ->where('news_sites_master.news_site_category_id',5)
            ->where('articles_table.deleted_at',null)
            ->orderBy('articles_table.id','DESC')
            ->get();
    }

    //コメント数順に記事を取得
    public function getArticleComment()
    {
        return $article = app(ArticleComment::class)
                ->where(app(Article::class), 'deleted_at', null)
                ->orderby('article_id', 'desc')
                ->get();
    }

    //閲覧数順に記事を取得
    public function getArticleWatch()
    {

    }
}