<?php

namespace App\Http\Controllers;

use App\User;
use App\Course;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class MypagesController extends Controller
{
    public function show()
    {
     if(Auth::check()){
        $userId = Auth::user()->id;
        $user = app(User::class)::find($userId);
        $profile = app(Profile::class)::where('id',$user->profile_id)->first();
        $course = app(Course::class)::where('id',$profile->course_id)->first();

        return view('mypage.detail',compact('profile','course'));
      }else{
         return redirect()->route('user_login');
      }
    }

    public function edit()
    {
        return view('mypage.detail');
    }

    public function show_user()
    {
        return view('mypage.detail_other');
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
