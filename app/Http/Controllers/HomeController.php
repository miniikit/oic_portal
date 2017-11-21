<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // ホーム（記事一覧）
    public function index()
    {
        $articles = \DB::table('articles_table')
            ->where('articles_table.deleted_at',null)
            ->orderBy('articles_table.id','DESC')
            ->get();
        return view('home.list',compact('articles'));
    }
}
