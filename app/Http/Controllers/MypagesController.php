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

        $userId = Auth::user()->id;
        $data = app(User::class)::where('users.id',$userId)->first();

        $course = join(Course::class,'courses_master','id','=','id')->get();
        dd($course);
        //$result = DB::table('courses_master')->join('courses_master','id','=','id')->get();
        return view('mypage.detail',compact('data','course'));
      }

    public function edit()
    {
        return view('mypage.detail');
    }
}
