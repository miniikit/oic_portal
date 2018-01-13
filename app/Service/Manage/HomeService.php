<?php

namespace App\Service\Manage;

use Carbon\Carbon;
use App\User;
use App\Course;
use App\profile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class HomeService
{
    public function getNewReports()
    {
        return DB::table('reports_categories_master as rc')
            ->join('reports_risks_categories_master as rrc','rc.report_risk_id','=','rrc.id')
            ->join('reports_table as r','r.report_category_id','=','rc.id')
            ->select('r.id as report_id','report_category_name','report_risk_category_name','report_risk_deal_status_name','r.created_at as created_at')
            ->join('reports_risks_deal_status_master as rrds','rrds.id','=','r.report_deal_status_id')
            ->orderBy('report_deal_status_id','ASC')
            ->orderBy('report_risk_num','DESC')
            ->get();
    }
}