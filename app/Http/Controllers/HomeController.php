<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // ホーム（記事一覧）
    public function index()
    {
        return view('home.list');
    }
}
