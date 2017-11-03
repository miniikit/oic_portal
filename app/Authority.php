<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Authority extends Model
{
    protected $table = 'authorities_master';
    protected $fillable = ['authority_name'];
}
