<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventAuthority extends Model
{
    protected $table = 'events_authorities_table';
    protected $fillable = ['event_authority_name'];
}
