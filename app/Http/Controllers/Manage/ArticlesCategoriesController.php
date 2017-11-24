<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticlesCategoriesController extends Controller
{
    public function index()
    {
        return view('manage.home');
    }

    public function show()
    {
        return view('manage.home');
    }

    public function edit()
    {
        return view('manage.home');
    }

    public function update($id,Request $request)
    {
        //dd($id,$request->all());
    }
}
