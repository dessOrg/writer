<?php

namespace App\Http\Controllers;

use App\Rate;
use Illuminate\Http\Request;


class WelcomeController--resource extends Controller
{

   public function index(Request $request)
   {
       $category = $request->category;
       $level = $request->level;
       $timeline = $request->timeline;
       $pages = $reuest->pages;

       $rates = Rate::where('category','=',$category)->where('level','=', $level)->where('timeline','=',"1")->get();
       return response()->json($request->all());
  
   }

}
