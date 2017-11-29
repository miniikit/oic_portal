<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('manage.home.homemanage');
    }

    public function show()
    {
        return view('manage.home.detail');
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
