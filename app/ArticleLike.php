<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleLike extends Model
{
    protected $table = 'articles_likes_table';
    protected $fillable = ['article_id','user_id'];

    public function articles()
    {
        return $this->belongsTo('App\Article');
    }
}

