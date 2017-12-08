<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class UsersController extends Controller
{
    public function index()
    {
        $users = DB::table('courses_master as cm1')
            ->join('courses_master as cm2','cm2.parent_course_id','=','cm1.id')
            ->join('profiles_table','profiles_table.course_id','=','cm2.id')
            ->join('users','users.profile_id','=','profiles_table.id')
            ->where('users.authority_id', 1)
            ->select('users.id','profiles_table.profile_name','users.name','users.name_kana','users.email','profiles_table.profile_admission_year','profiles_table.profile_image','profiles_table.profile_url','profiles_table.profile_introduction','cm1.course_name as parent_course_name','cm2.course_name as course_name')
            ->get();

        return view('manage.user.list', compact('users'));
    }

    public function show($id)
    {
        $user = DB::table('courses_master as cm1')
            ->join('courses_master as cm2','cm2.parent_course_id','=','cm1.id')
            ->join('profiles_table','profiles_table.course_id','=','cm2.id')
            ->join('users','users.profile_id','=','profiles_table.id')
            ->where('users.id',$id)
            ->where('users.authority_id',1)
            ->select('users.id','profiles_table.profile_name','users.name','users.name_kana','users.email','profiles_table.profile_admission_year','profiles_table.profile_image','profiles_table.profile_url','profiles_table.profile_introduction','cm1.course_name as parent_course_name','cm2.course_name as course_name')
            ->first();

        if(!isset($user)){
            // TODO エラーメッセージ
            return redirect()->route('manager_user_list');
        }

        $nowYear = Carbon::today()->year;
        $admissionYear  = Carbon::parse($user->profile_admission_year);
        $admissionYear = $admissionYear->year;
        $scYear = $nowYear-$admissionYear;
        return view('manage.user.detail',compact('id','user','scYear'));
    }

    public function edit($id)
    {
        $user = DB::table('courses_master as cm1')
            ->join('courses_master as cm2','cm2.parent_course_id','=','cm1.id')
            ->join('profiles_table','profiles_table.course_id','=','cm2.id')
            ->join('users','users.profile_id','=','profiles_table.id')
            ->where('users.id',$id)
            ->where('users.authority_id',1)
            ->select('users.id','profiles_table.profile_name','users.name','users.name_kana','users.email','profiles_table.profile_admission_year','profiles_table.profile_image','profiles_table.profile_url','profiles_table.profile_introduction','cm1.course_name as parent_course_name','cm2.course_name as course_name')
            ->first();

        $nowYear = Carbon::today()->year;
        $admissionYear  = Carbon::parse($user->profile_admission_year);
        $admissionYear = $admissionYear->year;
        $scYear = $nowYear-$admissionYear;

        return view('manage.user.edit',compact('id','user','scYear'));
    }

    public function update($id, Request $request)
    {
        //dd($id,$request->all());
    }

    public function delete($id, Request $request)
    {
        //dd($id,$request->all());
    }
}
