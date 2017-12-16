<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'name_kana','authority_id','course_id','profile_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    public function profiles()
    {
        return $this->hasMany('App\Profile','profile_id');
    }

    public function courses()
    {
        return $this->hasMany('App\Course');
    }

    public function authoritys()
    {
        return $this->hasMany('App\Authority');
    }

    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    public function friends()
    {
        return $this->hasMany('App\Friend');
    }

    public function articlelikes()
    {
        return $this->hasMany('App\ArticleLike');
    }

    public function articles()
    {
        return $this->hasMany('App\Article');
    }

}
