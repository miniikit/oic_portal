<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


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

    public function show()
    {
        return view('manage.home');
    }

    public function edit()
    {
        return view('manage.home');
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
