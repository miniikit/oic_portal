<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class MypagesController extends Controller
{

    public function show()
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $userInfo = app(User::class)::where('users.id', $userId)->first();

            return view('mypage.detail', compact('userInfo'));
        } else {

            return view('login.google');
        }
    }

    public function edit()
    {
        return view('mypage.detail');
    }
}
