<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommunityController extends Controller
{
    public function index()
    {
      return view('community.list');
    }

    public function show()
    {
      return view('community.detail');
    }

    public function make()
    {
      return view('community.creat');
    }
}
