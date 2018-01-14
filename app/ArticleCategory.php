<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    protected $table = 'articles_categories_master';
    protected $fillable = ['articles_category_name'];

    public function news_sites()
    {
        return $this->hasMany('App\Article','article_id');
    }
}
