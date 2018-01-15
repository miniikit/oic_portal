<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\SQLService;
use App\Community;
use Carbon\Carbon;

class CommunityController extends Controller
{
    protected $SQLService;

    public function __construct(SQLService $SQLService)
    {
        $this->SQLService = $SQLService;
    }

    public function index()
    {
        $communities = $this->SQLService->getCommunity();
        return view('community.list',compact('communities'));
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

    public function confirm(Request $request)
    {
        $data = $request->all();
        $carbon = Carbon::now();
        $imgfile = $request->file('community_image');
        $filename = $carbon->format('Y-m-d-H-i-s') . '.jpg';
        $imgfile->move(public_path('/images/community_images/'), $filename);
        $community_image = '/images/community_images/' . $filename;

        return view('community.confirm',compact('data','community_image','carbon'));
    }

    //完了
    public function complete(Request $request)
    {
        $data = $request->all();
        $community_model = app(Community::class);
        $community_model->create([
            'community_title' => $data['community_title'],
            'community_contents' => $data['community_contents'],
            'community_image' => $data['community_image'],
            'community_category_id' => $data['community_category'],
            ]);

        return view('community.complete');
    }
}
