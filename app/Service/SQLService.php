<?php

namespace App\Service;

use Carbon\Carbon;
use App\User;
use App\Course;
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
        return DB::table('crawler_schedule_table')->get();
    }

    // クロールスケジュール詳細取得
    public function getCrawlSchedule($id)
    {
        return DB::table('crawler_schedule_table')->where('id',$id)->get();
    }


    /*
     * クローラー
     */
    // RSSサイト取得
    public function getRssSites()
    {
        return DB::table('news_sites_master')->whereNull('deleted_at')->get();//->where('deleted_at','=','null')->get();
    }

    public function getArticlesTEST()
    {
        return DB::table('articles_table')->get();
    }

    public function getSites()
    {

    }

    public function getOriginalSites()
    {

    }

    //Eloquant

    public function checkAuth()
    {
        return $userId = Auth::user()->id;
    }

    public function getUserData()
    {
        $userId = $this->checkAuth();
        return $user = app(User::class)::find($userId);
    }

    public function getUserProfile()
    {
        $user = $this->getUserData();
        return $profile = app(Profile::class)::where('id', $user->profile_id)->first();
    }

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
}