<?php

namespace App\Http\Controllers\Client;

use App\User;
use App\Project;
use App\Rate;
use App\Skill;
use App\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Validator;

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
    public function create()
   {
      
       $topics = Topic::get();
       $rate = Rate::first();
       
        return view('client/projects/create', compact('topics','rate'));
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'rate_id' => 'required'            
     ]);

    if ($validator->fails()) {
    return response()->json(["errors"=>$validator->errors()->all()]);
    }
 
       
        if($request->project_id == '0'){
        $project = new Project;
        $project->pages = $request->pages;
        $project->rate_id = $request->rate_id;
        $project->cost = $request->cost;
        $project->user_id = Auth::user()->id;
        $project->title = "0";
        $project->topic = "0";
        $project->description = "0";
        $project->file = "0";
        $project->video = "0";
        $project->dateline = "0";
        $project->save();

        return response()->json($project);
        }else {
         $project_obj = new Project;
         $project_obj->id = $request->project_id;
         $project = Project::find($project_obj->id);
         $project->update(['pages'=>$request->pages, 'rate_id'=>$request->rate_id]);

         return response()->json($project);

        }
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
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            
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
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
            
     ]);

    if ($validator->fails()) {
        return response()->json(['errors'=>$validator->errors()->all()]);
    }
 
        $project_obj = new Project;
        $project_obj->id = $request->project_id;
        $project = Project::find($project_obj->id);

        $project->update(['title' => $request->title, 'topic' => $request->topic, 'description' => $request->description, 'user_id' => Auth::user()->id]);

        return response()->json($project);
    }

    public function finnal(Request $request)
    {
         $project_obj = new Project;
         $project_obj->id = $request->project_id;
      
         $project = Project::find($project_obj->id);
     
         $project->update(['video' => $request->video, 'user_id' => Auth::user()->id]);
        return response()->json($project);
    }



    public function docupload(Request $request)
    {
      
      $extension = $request->file('file');
      $extension = $request->file('file')->getClientOriginalExtension(); // getting excel extension
      $dir = 'public/uploads/';
      $filename = uniqid().'_'.time().'_'.date('Ymd').'.'.$extension;
       $request->file('file')->move($dir, $filename);
     $pat = $dir.$filename;

         $project_obj = new Project;
         $project_obj->id = $request->project_id;
      
         $project = Project::find($project_obj->id);
     
         $project->update(['file' => $pat, 'user_id' => Auth::user()->id]);
        return response()->json($project);
    }

    public function proceed(Request $request)
    {
         
         $project = Project::find($request->project_id);
     
            return response()->json($project);
    }



    public function loadorder($id)
    {
      $project = Project::find($id);
      return view('client/projects/order', compact('project'));
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
