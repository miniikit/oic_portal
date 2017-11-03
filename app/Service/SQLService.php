<?php

namespace App\Service;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class SQLService
{
    public function getRssSites()
    {
        return DB::table('NEWS_SITES_MASTER')->where('deleted_at','!=','NULL')->get();
    }

    public function getOriginalSites()
    {

    }
}
