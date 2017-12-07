<?php

namespace App\Http\Controllers;

use App\Service\SQLService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
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

            $follow_ct = $this->SQLService->getFollowCount();
            $follower_ct = $this->SQLService->getFollowerCount();

            //入学年度から現在何年生か計算
            $get_dt = new carbon($profile->profile_admission_year);
            $now_dt = new carbon(Carbon::now());

            $sc_year = $get_dt->diffInYears($now_dt);

            return view('mypage.detail', compact('profile', 'course','follow_ct','follower_ct','sc_year'));
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
        $getUserId = app(User::class)->find($id);
        $profile = app(Profile::class)->where('id', $getUserId->profile_id)->first();

        $course = DB::table('courses_master as cm1')
            ->join('courses_master as cm2', 'cm1.parent_course_id', '=', 'cm2.id')
            ->select('cm1.course_name as course_major', 'cm2.course_name')
            ->where('cm1.id', '=', $profile->course_id)
            ->first();

        $userId = $this->SQLService->checkAuth();

        //自分がフォローしているユーザリスト取得
        $result = app(Friend::class)->where('user_id',$userId)->where('user2_id',$id)->first();

        if(count($result)) {
            $user2_id = $result->user2_id;
        } else {
            $user2_id = null;
        }

        //入学年度から現在何年生か計算
        $get_dt = new carbon($profile->profile_admission_year);
        $now_dt = new carbon(Carbon::now());

        $sc_year = $get_dt->diffInYears($now_dt);

        //フォロー数
        $follow_ct = app(Friend::class)->where('user_id',$id)->get()->count();

        //フォロワー数
        $follower_ct = app(Friend::class)->where('user2_id',$id)->get()->count();

        return view('mypage.detail_other',compact('profile','course','id','user2_id','follow_ct','follower_ct','sc_year'));
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
        $userId = $this->SQLService->checkAuth();

        //フォローするユーザIDを取得
        $target_id = $request->user_id;

        //自分のIDを追加
        $friend_model->user_id = $userId;

        //フォローするユーザIDを追加
        $friend_model->user2_id = $target_id;

        $friend_model->save();

        return redirect()->route('user_profile',compact('target_id'));

    }

    public function delete_follow(Request $request)
    {
        $friend_model = app(Friend::class);

        //自分のIDを取得
        $userId = $this->SQLService->checkAuth();

        //フォローを解除するユーザIDを取得
        $target_id = $request->user_id;

        //レコード取得
        $getfollowdata = $friend_model->where('user_id',$userId)->where('user2_id',$target_id)->first();

        //削除(フォロー解除)
        $getfollowdata->delete();

        return redirect()->route('user_profile',compact('target_id'));

    }


}
