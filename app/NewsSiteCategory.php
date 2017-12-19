<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsSiteCategory extends Model
{
    protected $table = 'news_sites_categories_master';
    protected $fillable = ['news_site_category_name'];

    public function news_sites()
    {
        return $this->hasMany('App\NewsSite','news_site_id');
    }
}
