<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    // 一覧
    public function index()
    {
        return view('articles.index');
    }

    // 詳細
    public function detail()
    {
        return view('articles.detail');
    }

    // 編集
    public function edit()
    {
        return view('articles.detail');
    }
}
