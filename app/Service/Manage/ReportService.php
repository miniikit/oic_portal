<?php

namespace App\Service\Manage;

use Carbon\Carbon;
use App\User;
use App\Course;
use App\profile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Service\Manage\HomeService;


class ReportService
{
    public function getReportLists()
    {
        $HomeService = new HomeService();
        return $HomeService->getNewReports();
    }

    public function getReport($id)
    {
        return DB::table('reports_table as r')
            ->where('r.id',$id)
            ->select('r.id as report_id', 'rrc.report_risk_category_name', 'rc.report_category_name', 'u.name', 'rrds.report_risk_deal_status_name', 'r.created_at as report_created_at', 'r.report_contents')
            ->join('reports_categories_master as rc', 'rc.id', '=', 'r.report_category_id')
            ->join('reports_risks_categories_master as rrc', 'rrc.id', '=', 'rc.report_risk_id')
            ->join('reports_risks_deal_status_master as rrds', 'rrds.id', '=', 'r.report_deal_status_id')
            ->join('reports_deals_table as rd', 'rd.report_id', '=', 'report_id')
            ->join('users as u', 'u.id', '=', 'rd.user_id')
            ->first();
    }


}