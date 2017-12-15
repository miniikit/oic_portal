<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CommunitiesController extends Controller
{
    public function index()
    {
        $communities = DB::table('communities_categories_master')
            ->join('communities_table','communities_categories_master.id','communities_table.community_category_id')
            ->select('communities_table.id','communities_table.community_title','communities_categories_master.community_category_name')
            ->get();

        return view('manage.community.list',compact('communities'));
    }

    public function show($id)
    {
        $community = DB::table('communities_categories_master')
            ->join('communities_table','communities_categories_master.id','communities_table.community_category_id')
            ->join('communities_participants_table','communities_participants_table.community_id','communities_table.id')
            ->join('users','users.id','communities_participants_table.user_id')
            ->join('authorities_master','authorities_master.id','communities_participants_table.authority_id')
            ->where('communities_table.id',$id)
            ->where('communities_participants_table.authority_id',3)
            ->select('communities_table.id','communities_table.community_title','communities_table.community_contents','communities_categories_master.community_category_name','users.name','users.email','communities_table.created_at')
            ->first();

        return view('manage.community.detail',compact('community','id'));
    }

    public function edit()
    {
        return view('manage.community.edit');
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
