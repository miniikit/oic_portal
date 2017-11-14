<?php

namespace App\Service;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class SQLService
{
    public function insertArticle($title,$text,$image,$site_id)
    {
        return DB::table('articles_table')->insert(['article_title'=>$title , 'article_text'=>$text , 'article_image'=>$image  , 'news_site_id'=>$site_id]);
    }

    public function getRssSites()
    {
        return DB::table('NEWS_SITES_MASTER')->where('deleted_at','!=','NULL')->get();
    }

    public function getSites()
    {

    }

    public function getOriginalSites()
    {

    }
}