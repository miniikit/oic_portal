<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleFavorite extends Model
{
    protected $table = 'articles_favorites_table';
    protected $fillable = ['user_id', 'article_id'];

    public function articles()
    {
        return $this->belongsTo('App\Article');
    }

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
