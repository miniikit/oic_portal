<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class EmployeesController extends Controller
{
    public function index()
    {
        $employees = DB::table('users')
            ->join('profiles_table', 'profiles_table.id', '=', 'users.profile_id')
            ->join('authorities_master', 'authorities_master.id', '=', 'users.authority_id')
            ->whereIn('users.authority_id',[2,3])
            ->get();

        return view('manage.employee.list',compact('employees'));
    }

    public function show($id)
    {
        $employee = DB::table('courses_master as cm1')
            ->join('courses_master as cm2','cm2.parent_course_id','=','cm1.id')
            ->join('profiles_table','profiles_table.course_id','=','cm2.id')
            ->join('users','users.profile_id','=','profiles_table.id')
            ->join('authorities_master', 'authorities_master.id', '=', 'users.authority_id')
            ->select('users.id','authorities_master.authority_name','profiles_table.profile_name','users.name','users.name_kana','users.email','profiles_table.profile_admission_year','profiles_table.profile_image','profiles_table.profile_url','profiles_table.profile_introduction','cm1.course_name as parent_course_name','cm2.course_name as course_name')
            ->where('users.id',$id)
            ->where('users.authority_id',[2,3])
            ->first();

        if(!isset($employee)){
            // TODO エラーメッセージ
            return redirect()->route('manager_employee_list');
        }
        $nowYear = Carbon::today()->year;
        $admissionYear  = Carbon::parse($employee->profile_admission_year);
        $admissionYear = $admissionYear->year;
        $scYear = $nowYear-$admissionYear;

        return view('manage.employee.detail',compact('id','employee','scYear'));
    }

    public function edit($id)
    {
        $employee = DB::table('courses_master as cm1')
            ->join('courses_master as cm2','cm2.parent_course_id','=','cm1.id')
            ->join('profiles_table','profiles_table.course_id','=','cm2.id')
            ->join('users','users.profile_id','=','profiles_table.id')
            ->join('authorities_master', 'authorities_master.id', '=', 'users.authority_id')
            ->where('users.id',$id)
            ->where('users.authority_id',[2,3])
            ->select('users.id','authorities_master.authority_name','profiles_table.profile_name','users.name','users.name_kana','users.email','profiles_table.profile_admission_year','profiles_table.profile_image','profiles_table.profile_url','profiles_table.profile_introduction','cm1.course_name as parent_course_name','cm2.course_name as course_name')
            ->first();

        $nowYear = Carbon::today()->year;
        $admissionYear  = Carbon::parse($employee->profile_admission_year);
        $admissionYear = $admissionYear->year;
        $scYear = $nowYear-$admissionYear;

        return view('manage.employee.edit',compact('id','employee','scYear'));
    }

    public function update($id,Request $request)
    {
        //dd($id,$request->all());
    }

    public function delete($id,Request $request)
    {
        //dd($id,$request->all());
    }
}
