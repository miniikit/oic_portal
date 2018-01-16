<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events_table';
    protected $fillable = [
        'event_title','event_text','event_image','event_spot','event_start_date_time','event_end_date_time','event_capacity','event_maker_id','event_category_id'
    ];
}
