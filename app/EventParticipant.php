<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventParticipant extends Model
{
    protected $table = 'events_participants_table';
    protected $fillable = ['event_id','event_user_id','event_authority_id'];
}
