<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = DB::table('news_sites_master')
            ->join('articles_table','articles_table.news_site_id','news_sites_master.id')
            ->select('articles_table.id','articles_table.article_title','news_sites_master.news_site_name','articles_table.created_at')
            ->get();

        return view('manage.article.list',compact('articles'));
    }

    public function show($id)
    {
        $article = DB::table('')
            ->first();

        return view('manage.article.detail',compact('id','article'));
    }

    public function edit()
    {
        return view('manage.article.edit');
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
