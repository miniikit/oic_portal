<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Service\Manage\ReportService;

class ReportsController extends Controller
{
    protected $reportService;

    public function __construct(ReportService $reportService)
    {
        $this->reportService = $reportService;
    }

    public function index()
    {
        $reports = $this->reportService->getReportLists();

        return view('manage.report.list',compact('reports'));
    }

    public function show($id)
    {
        $report = $this->reportService->getReport($id);

        return view('manage.report.detail',compact('id','report'));
    }

    public function edit($id)
    {
        $report = $this->reportService->getReport($id);

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
