<?php

namespace App\Http\Controllers\Writer;

use APP\User;
use App\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::user()->id)->profile;

        return view('writer/profile/index', compact('user'));
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
        //
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
        $user = User::find($id)->profile;
        return view('writer/profile/edit', compact('user'));
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
    
    public function bio(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'bio' => 'required|max:255',
         ]);

        if ($validator->fails()) {
            return redirect('writer/profile/edit'.Auth::user()->id)
                        ->withErrors($validator)
                        ->withInput();
        }

        $bio = $request->get('bio');
        $image = '0';
        $id = Auth::user()->id;
        $user = User::find($id)->profile;
        if(is_null($user)){
          $profile = new Profile;
          $profile->bio = $request->get('bio');
          $profile->image = '0';
          $profile->user_id = Auth::user()->id;
          $profile->save();

        }else{
          $prof = User::find($id)->profile;
          $profile_obj = new Profile;
          $profile_obj->id = $prof->id;
          $profile = Profile::find($profile_obj->id);
         $profile ->update([
               'bio' => $request->get('bio'),
               ]);
        }
               return redirect('writer/profile/edit'.$id)->with('success', 'Saved Successfully');

 
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
