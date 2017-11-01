<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses_master';
    protected $fillable = [
        'course_name','parent_course_id','course_depth'
    ];
}
