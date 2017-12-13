<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles_table';
    protected $fillable = [
        'article_title','article_text','article_image','news_site_id','article_url'
    ];

    public function articlelikes()
    {
        return $this->hasMany('App\ArticleLike');
    }
}
