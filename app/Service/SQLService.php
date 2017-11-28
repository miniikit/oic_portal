<?php

namespace App\Service;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


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
}