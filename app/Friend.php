<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $table = 'friends_table';
    protected $fillable = ['user_id', 'user2_id'];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}