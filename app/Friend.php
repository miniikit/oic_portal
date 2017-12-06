<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Friend extends Model
{
    use SoftDeletes;

    protected $table = 'friends_table';
    protected $fillable = ['user_id', 'user2_id'];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}