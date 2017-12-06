<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class UsersController extends Controller
{
    public function index()
    {
        $users = DB::table('users')
            ->join('profiles_table', 'profiles_table.id', '=', 'users.profile_id')
            ->join('courses_master', 'courses_master.id', '=', 'profiles_table.course_id')
            ->join('authorities_master', 'authorities_master.id', '=', 'users.authority_id')
            // TODO : 親カテゴリ結合
            ->where('users.authority_id', '=', 1)
            ->get();

        return view('manage.user.list', compact('users'));
    }

    public function show($id)
    {
        $user = DB::table('profiles_table')
            ->join('courses_master','courses_master.id','=','profiles_table.course_id')
            ->join('users','users.profile_id','=','profiles_table.id')
            ->first();

        return view('manage.user.detail',compact('id','user'));
    }

    public function edit()
    {
        return view('manage.home');
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
