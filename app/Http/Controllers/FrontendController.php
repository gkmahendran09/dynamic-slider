<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFormRequest;
use App\Http\Controllers\Controller;

use DB;


class FrontendController extends Controller
{
  public function index()
  {
    $images = \App\CarouselMaster::all();
        
    return view('index')->with("images",$images);
  }
}
