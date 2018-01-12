<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleComment extends Model
{
    protected $table = 'articles_comments_table';
    protected $fillable = [
        'article_id','user_id','article_comment_text'];

    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
