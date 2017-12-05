<?php

namespace App\Http\Controllers;

use App\Service\SQLService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Profile;
use App\Friend;
use App\User;

class MypagesController extends Controller
{
    protected $SQLService;

    public function __construct(SQLService $SQLService)
    {
        $this->SQLService = $SQLService;
    }

    public function show()
    {
        if(Auth::check()){
            $profile = $this->SQLService->getUserProfile();
            $course = $this->SQLService->getUserCourse();

            return view('mypage.detail', compact('profile', 'course'));
        }else{
            return redirect()->route('user_login');
        }
    }

    public function edit()
    {
        return view('mypage.detail');
    }

    public function show_user($id)
    {
        $user_id = app(User::class)->find($id);
        $user =app(Profile::class)->where('id', $user_id->profile_id)->first();

        $course = DB::table('courses_master as cm1')
            ->join('courses_master as cm2', 'cm1.parent_course_id', '=', 'cm2.id')
            ->select('cm1.course_name as course_major', 'cm2.course_name')
            ->where('cm1.id', '=', $user->course_id)
            ->first();

        $myuser_id = Auth::user()->id;

        //自分がフォローしているユーザリスト取得
        $result = app(Friend::class)->where('user_id',$myuser_id)->where('user2_id',$id)->first();
        if(count($result)) {
            $user2_id = $result->user2_id;
        } else {
            $user2_id = null;
        }
        return view('mypage.detail_other',compact('user','course','id','user2_id'));
    }

    public function follow()
    {
        return view('mypage.follow');
    }

    public function follower()
    {
        return view('mypage.follower');
    }

    public function add_follow(Request $request)
    {
        $friend_model = app(Friend::class);

        //自分のIDを取得
        $myuser_id = Auth::user()->id;

        //フォローするユーザIDを取得
        $target_id = $request->user_id;

        //自分のIDを追加
        $friend_model->user_id = $myuser_id;

        //フォローするユーザIDを追加
        $friend_model->user2_id = $target_id;

        $friend_model->save();

        return redirect()->route('user_profile',compact('target_id'));

    }

    public function delete_follow(Request $request)
    {
        $friend_model = app(Friend::class);

        //自分のIDを取得
        $myuser_id = Auth::user()->id;

        //フォローを解除するユーザIDを取得
        $target_id = $request->user_id;
        //レコード取得
        $getfollowdata = $friend_model->where('user_id',$myuser_id)->where('user2_id',$target_id)->first();

        //削除(フォロー解除)
        $getfollowdata->delete();

        return redirect()->route('user_profile',compact('target_id'));

    }
}
