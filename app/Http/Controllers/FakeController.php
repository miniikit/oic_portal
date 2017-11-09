<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FakeController extends Controller
{
    public function fake()
    {
        dd('THIS IS FAKE');
        return view('');
    }
}
