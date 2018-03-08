<?php

namespace App\Http\Controllers\Client;

use App\User;
use App\Project;
use App\Rate;
use App\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
   {
        $project = Project::find($id);
        return view('client/projects/create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pages' => 'required|max:255',
            'cost' => 'required|max:255',
            'rate_id' => 'required|max:255',
     ]);

    if ($validator->fails()) {
        return redirect('/d')
                    ->withErrors($validator)
                    ->withInput();
    }
   
       $rate_id = $request->get('rate_id');
       $pages = $request->get('pages');
       $cost = $request->get('cost');

       $project = new Project;
       $project->user_id = Auth::user()->id;
       $project->rate_id = $rate_id;
       $project->cost =  $cost;
       $project->pages = $pages;
       $project->save();

       return redirect('client/project/create'.$project->id);
 
       //
    }

    public function getrates($rates, $pages)
    {
       foreach($rates as $key){
         $results = (int)$key->rates * (int)$pages;
         return $results;
       }

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
