<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    protected $table = 'communities_table';
    protected $fillable = [
        'community_title','community_contents','community_image','community_category_id'
    ];
}
