<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class MypagesController extends Controller
{
    public function mypage()
    {
      if(Auth::check()){
        $userid = Auth::user()->id;
        $userinfo = app( User::class)::where('users.id',$userId)->get();

        return view('mypage.top',compact('userinfo'));
      }else{

        return view('login/google');
      }
    }
}
