<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\CheckNewArticles;

class HomeController extends Controller
{
    // ホーム（記事一覧）
    public function index()
    {
        //$hoge = new CheckNewArticles();

        //$this->dispatch(new CheckNewArticles);

        $articles = \DB::table('articles_table')
            ->where('articles_table.deleted_at',null)
            ->orderBy('articles_table.id','DESC')
            ->limit(21)
            ->get();
        return view('home.list',compact('articles'));
    }
}
