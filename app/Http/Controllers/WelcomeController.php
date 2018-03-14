<?php

namespace App\Http\Controllers;

use App\Rate;
use App\Project;
use Illuminate\Http\Request;
use Auth;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $category = $request->category;
       $level = $request->level;
       $timeline = $request->timeline;
       $pages = $request->pages;

       $rates = Rate::where('category','=',$category)->where('level','=',$level)->where('timeline','=',$timeline)->get();
       $resp = $this->getrates($rates, $pages);
       $rate_id = $this->getid($rates);
       return response()->json(['category' => $request->category, 'cost' => $resp, 'pages' => $pages, 'rate_id' => $rate_id]);
 
    }

    public function getrates($rates, $pages)
    {
       foreach($rates as $key){
         $results = (int)$key->rates * (int)$pages;
         return $results;
       }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = new Project;
        $project->pages = $request->pages;
        $project->rate_id = $request->rate_id;
        $project->cost = $request->cost;
        $project->user_id = "0";
        $project->title = "0";
        $project->topic = "0";
        $project->description = "0";
        $project->file = "0";
        $project->video = "0";
        $project->dateline = "0";
        $project->save();

        return response()->json($project->id);
    }

    public function getid($rates)
    {
       foreach($rates as $key){
          return $key->id;
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
