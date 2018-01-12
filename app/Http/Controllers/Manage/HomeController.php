<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Manage\HomeService;

class HomeController extends Controller
{
    protected $homesService;

    public function __construct(HomeService $homeService)
    {
        $this->homesService = $homeService;
    }

    public function index()
    {

        return view('manage.home.list');
    }

    public function show()
    {
        return view('manage.home.detail');
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
