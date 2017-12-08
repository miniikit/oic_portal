<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function index()
    {
        $reports = DB::table('reports_table')
            ->leftJoin('reports_categories_master','reports_categories_master.id','=','reports_table.report_category_id')
            ->leftJoin('reports_risks_categories_master','reports_risks_categories_master.id','=','reports_categories_master.report_risk_id')
            ->leftjoin('reports_risks_deal_status_master','reports_risks_deal_status_master.id','=','reports_table.report_deal_status_id')
            ->leftjoin('reports_deals_table','report_id','=','reports_table.id')
            ->leftjoin('users','users.id','=','reports_deals_table.user_id')
            ->select('reports_table.id','reports_risks_categories_master.report_risk_category_name','reports_categories_master.report_category_name','users.name','reports_risks_deal_status_master.report_risk_deal_status_name','reports_table.created_at')
            ->get();

        return view('manage.report.list',compact('reports'));
    }

    public function show()
    {
        return view('manage.report.detail');
    }

    public function edit()
    {
        return view('manage.report.edit');
    }

    public function update($id,Request $request)
    {
        //dd($id,$request->all());
    }

    public function delete($id,Request $request)
    {
        //dd($id,$request->all());
    }
}
