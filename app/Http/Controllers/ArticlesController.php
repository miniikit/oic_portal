<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


class ArticlesController extends Controller
{
    // 一覧
    public function index()
    {
        return view('articles.index');
    }

    // 詳細
    public function detail($id)
    {
        $article = DB::table('articles_table')->where('id','=',$id)->first();
        //dd($article);

        $a = 1;
        $b = 2;

        return view('articles.detail',compact('article','a'));
    }

    // 編集
    public function edit()
    {
        return view('articles.detail');
    }
}
