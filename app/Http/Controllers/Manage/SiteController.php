<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function index()
    {
        return view('manage.site.sitemanage');
    }

    public function show()
    {

    }

    public function edit()
    {

    }

    public function update($id,Request $request)
    {
        //dd($id,$request->all());
    }
}
