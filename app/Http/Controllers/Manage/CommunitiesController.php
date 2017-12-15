<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CommunitiesController extends Controller
{
    public function index()
    {
        $communities = DB::table('communities_categories_master')
            ->join('communities_table','communities_categories_master.id','communities_table.community_category_id')
            ->select('communities_table.id','communities_table.community_title','communities_categories_master.community_category_name')
            ->get();

        return view('manage.community.list',compact('communities'));
    }

    public function show()
    {
        return view('manage.community.detail');
    }

    public function edit()
    {
        return view('manage.community.edit');
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
