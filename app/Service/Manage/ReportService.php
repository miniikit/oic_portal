<?php

namespace App\Service\Manage;

use Carbon\Carbon;
use App\User;
use App\Course;
use App\profile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ReportService
{
    public function getReportLists()
    {
        return DB::table('reports_table')
            ->select(
                'reports_table.id as report_id',
                'reports_table.deleted_at',
                'reports_categories_master.*',
                'reports_risks_categories_master.report_risk_category_name',
                'reports_risks_categories_master.report_risk_num'
            )
            ->join('reports_categories_master','reports_categories_master.id','=','reports_table.report_category_id')
            ->join('reports_risks_categories_master','reports_risks_categories_master.id','=','reports_categories_master.report_risk_id')
            //->leftjoin('reports_risks_deal_status_master','reports_risks_deal_status_master.id','=','reports_table.report_deal_status_id')
            //->leftjoin('reports_deals_table','report_id','=','reports_table.id')
            //->leftjoin('users','users.id','=','reports_deals_table.user_id')
            //->select('reports_table.id','reports_risks_categories_master.report_risk_category_name','reports_categories_master.report_category_name','users.name','reports_risks_deal_status_master.report_risk_deal_status_name','reports_table.created_at')
            ->get();
    }

    public function getReport($iid)
    {
        return DB::table('reports_table')
            ->leftJoin('reports_categories_master','reports_categories_master.id','=','reports_table.report_category_id')
            ->leftJoin('reports_risks_categories_master','reports_risks_categories_master.id','=','reports_categories_master.report_risk_id')
            ->leftjoin('reports_risks_deal_status_master','reports_risks_deal_status_master.id','=','reports_table.report_deal_status_id')
            ->leftjoin('reports_deals_table','report_id','=','reports_table.id')
            ->leftjoin('users','users.id','=','reports_deals_table.user_id')
            ->select('reports_table.id','reports_risks_categories_master.report_risk_category_name','reports_categories_master.report_category_name','users.name','reports_risks_deal_status_master.report_risk_deal_status_name','reports_table.created_at','reports_table.report_contents')
            ->first();
    }



}