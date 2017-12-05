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

    public function show()
    {
        return view('manage.home');
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
