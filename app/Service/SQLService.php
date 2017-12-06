<?php

namespace App\Service;

use App\User;
use App\Friend;
use App\profile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class SQLService
{
    /*
     * 記事
     */
    // 記事挿入
    public function insertArticle($title,$text,$image,$article_url,$site_id)
    {
        return DB::table('articles_table')
            ->insert([
                'article_title'=>$title,
                'article_text'=>$text,
                'article_image'=>$image,
                'article_url'=>$article_url,
                'news_site_id'=>$site_id
            ]);
    }

    /*
     * クローラースケジュール
     */
    // クロールスケジュール取得
    public function getCrawlSchedules()
    {
        return DB::table('crawler_schedule_table')->join('crawler_status_master','crawler_schedule_table.crawl_status_id','crawler_status_master.id')->get();
    }

    // クロールスケジュール詳細取得
    public function getCrawlSchedule($id)
    {
        return DB::table('crawler_schedule_table')->where('id',$id)->get();
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
        $course = DB::table('courses_master as cm1')
            ->join('courses_master as cm2', 'cm1.parent_course_id', '=', 'cm2.id')
            ->select('cm1.course_name as course_major', 'cm2.course_name')
            ->where('cm1.id', '=', $profile->course_id)
            ->first();
        return $course;
    }

    //フォロー数取得
    public function getFollowCount()
    {
        $userId = $this->checkAuth();
        return $follow_ct = app(Friend::class)->where('user_id',$userId)->get()->count();
    }

    //フォロワー数取得
    public function getFollowerCount()
    {
        $userId = $this->checkAuth();
        return $follower_ct = app(Friend::class)->where('user2_id',$userId)->get()->count();
    }

}