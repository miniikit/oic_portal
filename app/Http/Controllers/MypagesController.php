<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use app\User;
use Illuminate\Support\Facades\DB;


class MypagesController extends Controller
{
    public function show()
    {
     if(Auth::check()){
        $userId = Auth::user()->id;
        $data = app(User::class)::where('users.id',$userId)->first();

        //$result = DB::table('courses_master')->join('courses_master','id','=','id')->get();
        return view('mypage.detail',compact('data'));
      }else{
         return redirect()->route('user_login');
      }
    }

    public function edit()
    {
        return view('mypage.detail');
    }

    public function follow()
    {
      return view('mypage.follow');
    }

    public function follower()
    {
      return view('mypage.follower');
    }
}
