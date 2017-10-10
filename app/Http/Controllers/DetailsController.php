<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailsController extends Controller
{
  public function details()
  {
    return view('articles.details');
  }
}
