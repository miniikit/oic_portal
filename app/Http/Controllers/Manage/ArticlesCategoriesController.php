<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ArticlesCategoriesController extends Controller
{
    public function index()
    {
        return view('manage.article.category.list');
    }

    public function show()
    {
        return view('manage.article.category.detail');
    }

    public function edit()
    {
        return view('manage.article.category.edit');
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
