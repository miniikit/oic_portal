<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use app\User;

class MypagesController extends Controller
{
    public function mypage()
    {
      if(Auth::check()){
        $userId = Auth::user()->id;
        $userInfo = app( User::class)::where('users.id',$userId)->get();

        return view('mypage.top',compact('userInfo'));

      }else{

        return view('login/google');
      }
    }

    public function show()
    {
        /*
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $userInfo = app(User::class)::where('users.id', $userId)->first();

            return view('mypage.detail', compact('userInfo'));
        } else {

            return redirect('login/google');
        }
    }
        */
        return view('mypage.detail');

    public function edit()
    {
        return view('mypage.detail');
    }
}
