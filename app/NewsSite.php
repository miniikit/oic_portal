<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsSite extends Model
{
    protected $table = 'news_sites_master';
    protected $fillable = [
        'news_site_name','news_site_url','news_site_tag_title','news_site_tag_url','news_site_tag_text','news_site_tag_image','news_site_category_id'];

    public function news_site_categories()
    {
        return $this->hasMany('App\NewsSiteCategory','news_site_category_id');
    }
}
