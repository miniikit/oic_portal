<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MypagesController extends Controller
{
    public function show()
    {
      return view('mypage.detail');
    }
    public function edit()
    {
        return view('mypage.detail');
    }
}
