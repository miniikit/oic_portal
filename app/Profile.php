<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles_master';

    protected $fillable = [
        'profile_image','profile_name','course_id'
    ];
}
