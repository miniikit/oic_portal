<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles_table';

    protected $fillable = [
        'profile_image', 'profile_name','profile_scyear','course_id', 'profile_admission_year','profile_url', 'profile_introduction'
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
