<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles_table';
    protected $fillable = [
        'article_title','article_text','article_image','news_site_id','article_url','article_original_url','user_id','article_category_id'
    ];

    public function articlelikes()
    {
        return $this->hasMany('App\ArticleLike');
    }

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function news_sites()
    {
        return $this->hasMany('App\NewsSite');
    }
}
