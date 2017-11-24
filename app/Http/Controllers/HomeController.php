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
        return view('home.list');
    }
}
