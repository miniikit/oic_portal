<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Community;

class CommunityController extends Controller
{
    public function index()
    {
        return view('community.list');
    }

    public function show($id)
    {
        $community = app(Community::class)->find($id);
        return view('community.detail', compact('community'));
    }


    //作成
    public function make()
    {
        return view('community.create');
    }

    //完了
    public function complete(Request $request)
    {
        $data = $request->all();
        $community_model = app(Community::class);
        $community_model->create(['community_title' => $data['community_title'], 'community_contents' => $data['community_contents'], 'authority_id' => $data['article_text'],]);

        return view('articles.complete');
    }
}
