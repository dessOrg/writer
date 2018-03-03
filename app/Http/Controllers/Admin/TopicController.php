<?php

namespace App\Http\Controllers\Admin;

use App\Topic;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;


class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::get();
        return view('admin/topics/index', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            return redirect('admin/topics')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $title = $request->get('title');
         $topic = new Topic([
               'title' => $title,
               ]);

               $topic->save();
               return redirect('admin/topics')->with('success', 'Saved Successfully');

      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $topic = Topic::find($id);
        return view('admin/topics/edit', compact('topic'));
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
            return redirect('admin/topics')
                        ->withErrors($validator)
                        ->withInput();
        }
        
          $topic_obj = new Topic;
          $topic_obj->id = $id;
          $topic = Topic::find($topic_obj->id);
         $topic ->update([
               'title' => $request->get('title'),
               ]);

               return redirect('admin/topics')->with('success', 'Saved Successfully');

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
        $topic = Topic::find($id);
        $topic->delete();
        return redirect('admin/topics')->with('success', 'Deleted Successfully');
    }
}
