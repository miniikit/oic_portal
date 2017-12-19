<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SitesController extends Controller
{
    public function index()
    {
        $sites = DB::table('news_sites_categories_master')
            ->join('news_sites_master','news_sites_master.news_site_category_id','news_sites_categories_master.id')
            ->select('news_sites_master.id','news_sites_master.news_site_name','news_sites_master.news_site_url','news_sites_categories_master.news_site_category_name','news_sites_master.updated_at')
            ->get();

        return view('manage.site.list',compact('sites'));
    }

    public function show($id)
    {
        $site = DB::table('news_sites_categories_master')
            ->join('news_sites_master','news_sites_master.news_site_category_id','news_sites_categories_master.id')
            ->where('news_sites_master.id',$id)
            ->first();

        return view('manage.site.detail',compact('id','site'));
    }

    public function edit($id)
    {
        $site = DB::table('news_sites_categories_master')
            ->join('news_sites_master','news_sites_master.news_site_category_id','news_sites_categories_master.id')
            ->where('news_sites_master.id',$id)
            ->first();

        return view('manage.site.edit',compact('id','site'));
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
