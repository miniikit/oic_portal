<?php

namespace App\Service;

use App\Community;
use App\NewsSite;
use App\ArticleCategory;
use App\User;
use App\Friend;
use App\Article;
use App\Profile;
use App\ArticleLike;
use App\ArticleComment;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class SQLService
{
    /*
     * 記事
     */
    // 記事挿入
    public function insertArticle($title, $image, $text, $article_url, $original_url,$site_id, $category_id)
    {
        $now = Carbon::now();

        $id = DB::table('articles_table')
            ->insertGetId([
                'article_title' => $title,
                'article_text' => $text,
                'article_image' => $image,
                'article_category_id' => $category_id,
                'article_url' => $article_url,
                'article_original_url' => $original_url,
                'news_site_id' => $site_id,
                'created_at' => $now,
                'updated_at' => $now
            ]);

        if (count($id) > 0) {

            return DB::table('articles_table')
                ->where('id', $id)
                ->update([
                    'article_url' => '/articles/' . $id
                ]);
        } else {
            return "error";
        }


    }

    // ニュースサイトIDよりカテゴリIDを取得
    public function getNewsSiteCategoryId($site_id)
    {
        $result = DB::table('news_sites_master')->where('id', $site_id)->whereNull('deleted_at')->select('id')->first();
        return $result->id;
    }

    /*
     * クローラースケジュール
     */
    // クロールスケジュール取得
    public function getCrawlSchedules()
    {
        return DB::table('crawler_status_master as cStatus')
            ->join('crawler_schedule_table as cSchedule', 'cSchedule.crawl_status_id', 'cStatus.id')
            ->join('users', 'users.id', 'cSchedule.user_id')
            ->select('cSchedule.id as crawler_id', 'cStatus.crawler_status', 'cSchedule.crawl_start_time', 'cSchedule.crawl_end_time', 'cSchedule.added_articles_count', 'users.name')
            ->orderBy('crawl_start_time', 'DESC')
            ->get();
    }

    // クロールスケジュール詳細取得
    public function getCrawlSchedule($id)
    {
        return DB::table('crawler_schedule_table')->where('id', $id)->get();
    }

    // クローラーの動作有無を確認
    public function checkCrawlStatus()
    {
        return DB::table('crawler_schedule_table')->where('crawl_status_id', 2)->first();
    }

    // クローラースケジュールを登録
    public function addCrawler()
    {
        $now = Carbon::now();
        $userId = Auth::user()->id;

        return DB::table('crawler_schedule_table')->insert([
            'crawl_start_time' => $now,
            'crawl_end_time' => null,
            'crawl_status_id' => 2, // 予約中
            'added_articles_count' => 0,
            'user_id' => $userId,
            'created_at' => $now
        ]);
    }

    /**
     * クローラースケジュールをキャンセル
     * @return bool
     */
    public function cancelCrawler()
    {
        $now = Carbon::now();
        $userId = Auth::user()->id;

        $status = DB::table('crawler_schedule_table')->where('crawl_status_id', 2)->get();

        if (count($status) > 0) {
            DB::table('crawler_schedule_table')->where('crawl_status_id', 2)->update([
                'crawl_end_time' => $now,
                'crawl_status_id' => 4, // キャンセル
                'user_id' => $userId,
                'updated_at' => $now
            ]);

            return true;
        } else {
            return false;
        }
    }

    /**
     * クローラーログを作成
     * @param $news_site_id
     * @param $schedule_id
     * @return bool
     */
    public function addCrawlerLog($news_site_id,$schedule_id)
    {
        $now = Carbon::now();

        return $result = DB::table('crawler_logs_table')->insert([
            'news_site_id' => $news_site_id,
            'schedule_id' => $schedule_id,
            'status_id' => 1,   // 1実行中 ※通常0のところ、処理速度向上のため1
            'created_at' => $now,
            'updated_at' => $now
        ]);
    }

    /**
     * クローラーログ　アップデート
     * @param $news_site_id
     * @param $schedule_id
     * @param $status_id
     * @return bool
     */
    public function updateCrawlerLog($news_site_id,$schedule_id,$status_id)
    {
        $now = Carbon::now();

        return $result = DB::table('crawler_logs_table')
            ->where('')
            ->update([
            'news_site_id' => $news_site_id,
            'schedule_id' => $schedule_id,
            'status_id' => $status_id,  // 実行状況 0: 見実行 1: 実行中 2:完了 3:失敗
            'updated_at' => $now
        ]);
    }


    /*
     * クローラー
     */
    // サイト 取得
    public function getOneSite($site_id)
    {
        return DB::table('news_sites_master')->where('id', $site_id)->whereNull('deleted_at')->first();
    }

    // サイト一覧 取得
    public function getAllSites()
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

    /**
     * 新着記事取得（ユーザ・ニュースサイトの両方
     * @return \Illuminate\Support\Collection
     */
    public function getArticle()
    {
        return $article = \DB::table('articles_categories_master')
            ->join('news_sites_master', 'news_sites_master.article_category_id', 'articles_categories_master.id')
            ->rightJoin('articles_table', 'articles_table.news_site_id', 'news_sites_master.id')
            ->where('articles_table.deleted_at', null)
            ->orderBy('articles_table.id', 'DESC')
            ->get();
    }

    //ユーザの記事投稿数を取得
    public function getUserArticleCount()
    {
        $userId = $this->checkAuth();
        return $article = \DB::table('articles_table')
            ->where('articles_table.deleted_at', null)
            ->where('articles_table.user_id', $userId)
            ->get()
            ->count();
    }

    //IT系の記事を表示
    public function getArticleIt()
    {
        return $article = DB::table('news_sites_master')
            ->join('articles_table', 'news_sites_master.id', 'articles_table.news_site_id')
            ->where('news_sites_master.article_category_id', 1)
            ->where('articles_table.deleted_at', null)
            ->orderBy('articles_table.id', 'DESC')
            ->get();
    }

    //ゲーム系の記事を表示
    public function getArticleGame()
    {
        return $article = DB::table('news_sites_master')
            ->join('articles_table', 'news_sites_master.id', 'articles_table.news_site_id')
            ->where('news_sites_master.article_category_id', 2)
            ->where('articles_table.deleted_at', null)
            ->orderBy('articles_table.id', 'DESC')
            ->get();
    }

    //CG・映像・アニメーション系の記事を表示
    public function getArticleDesign()
    {
        return $article = DB::table('news_sites_master')
            ->join('articles_table', 'news_sites_master.id', 'articles_table.news_site_id')
            ->where('news_sites_master.article_category_id', 3)
            ->where('articles_table.deleted_at', null)
            ->orderBy('articles_table.id', 'DESC')
            ->get();
    }

    //デザイン・web系の記事を表示
    public function getArticleArt()
    {
        return $article = DB::table('news_sites_master')
            ->join('articles_table', 'news_sites_master.id', 'articles_table.news_site_id')
            ->where('news_sites_master.article_category_id', 4)
            ->where('articles_table.deleted_at', null)
            ->orderBy('articles_table.id', 'DESC')
            ->get();
    }

    //経済系の記事を表示
    public function getArticleEconomy()
    {
        return $article = DB::table('news_sites_master')
            ->join('articles_table', 'news_sites_master.id', 'articles_table.news_site_id')
            ->where('news_sites_master.article_category_id', 5)
            ->where('articles_table.deleted_at', null)
            ->orderBy('articles_table.id', 'DESC')
            ->get();
    }

    //その他系の記事を表示
    public function getArticleOther()
    {
        return $article = DB::table('news_sites_master')
            ->join('articles_table', 'news_sites_master.id', 'articles_table.news_site_id')
            ->where('news_sites_master.article_category_id', 6)
            ->where('articles_table.deleted_at', null)
            ->orderBy('articles_table.id', 'DESC')
            ->get();
    }

    //コメント数順に記事を取得
    public function getArticleComment()
    {
        return $article = app(ArticleComment::class)
            ->join('articles_table', 'articles_comments_table.article_id', 'articles_table.id')
            ->select(DB::raw('count(*) as count,article_id,articles_table.id,article_title,article_text,article_image,news_site_id,article_url,articles_table.deleted_at'))
            ->where('articles_table.deleted_at', null)
            ->groupBy('article_id')
            ->orderBy('count', 'desc')
            ->limit(21)
            ->get();
    }

    //いいね順に記事を取得
    public function getArticleLike()
    {
        return $article = DB::table('articles_likes_table')
            ->join('articles_table', 'articles_likes_table.article_id', 'articles_table.id')
            ->select(DB::raw('count(*) as count,article_id,articles_table.id,article_title,article_text,article_image,news_site_id,article_url,articles_table.deleted_at'))
            ->where('articles_table.deleted_at', null)
            ->groupBy('article_id')
            ->orderBy('count', 'desc')
            ->limit(21)
            ->get();
    }

    //閲覧数順に記事を取得
    public function getArticleWatch()
    {

    }

    //コミニュティ一覧を取得
    public function getCommunity()
    {
        return $community = app(Community::class)
            ->where('deleted_at',null)
            ->orderBy('id','DESC')
            ->get();
    }
}