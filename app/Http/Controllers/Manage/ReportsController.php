<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportsController extends Controller
{
    public function index()
    {
        return view('manage.report.list');
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
