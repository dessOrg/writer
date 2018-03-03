<?php

namespace App\Http\Controllers\Admin;

use App\Skill;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skill::get();
        return view('admin/skills/index', compact('skills'));
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
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
         ]);

        if ($validator->fails()) {
            return redirect('admin/skills')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $title = $request->get('title');
         $skill = new Skill([
               'title' => $title,
               ]);

               $skill->save();
               return redirect('admin/skills')->with('success', 'Saved Successfully');


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
        $skill = Skill::find($id);
        return view('admin/skills/edit', compact('skill'));
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
       $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
         ]);

        if ($validator->fails()) {
            return redirect('admin/skills')
                        ->withErrors($validator)
                        ->withInput();
        }
        
          $skill_obj = new Skill;
          $skill_obj->id = $id;
          $skill = Skill::find($skill_obj->id);
           $skill->update([
               'title' => $request->get('title'),
               ]);

               return redirect('admin/skills')->with('success', 'Saved Successfully');

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
        $skill = Skill::find($id);
        $skill->delete();
        return redirect('admin/skills')->with('success', 'Deleted successfully');
    }
}
