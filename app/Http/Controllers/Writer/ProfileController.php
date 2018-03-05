<?php

namespace App\Http\Controllers\Writer;

use APP\User;
use App\Profile;
use App\Skill;
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
        $skills = Profile::find($user->id)->skills()->get();
        return view('writer/profile/index', compact('user','skills'));
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
        $skills = Skill::get();
        $profile_skills = Profile::find($user->id)->skills()->get();
        return view('writer/profile/edit', compact('user','skills','profile_skills'));
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
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'username' => 'required|max:255',
     ]);

    if ($validator->fails()) {
        return redirect('writer/profile/edit'.$id)
                    ->withErrors($validator)
                    ->withInput();
    }
 
        $user_obj = new User;
        $user_obj->id = $id;
        $user = User::find($user_obj->id);
        $user->update(['fname' => $request->get('fname'),
            'lname' => $request->get('lname'),
            'username' => $request->get('username'),
        ]);

        return redirect('writer/profile/edit'.$id);
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
               return redirect('writer/profile/edit'.$id);

 
    }

    public function skill(Request $request, $id) 
    {
       // $request->merge([
         //'profile' => implode(',', (array) $request->get('profile'))
    // ]);

        $user = User::find($id)->profile;
        if(is_null($user)){
           $prof = new Profile;
           $prof->image = '0';
           $prof->bio   = 'Update Your Bio';
           $prof->save();

           $profile = Profile::find($prof->id);
           $profile->skills()->sync($request->get('profile'));
        }else{
               
               // foreach($request->all() as $key){
            $profile = Profile::find($user->id);
                    $req = $request->get('profile');
                    //if(isset($req) && Count($req) >0){
                    $profile->skills()->sync($req, false);
               // }
            
        }
   
        return redirect('writer/profile/edit'.Auth::user()->id);

    }

    public function removeskill($id)
    {
        $user = User::find(Auth::user()->id)->profile;
        $profile = Profile::find($user->id);
     // $skill = Skill::find($id);
      $profile->skills()->detach($id);
  return redirect('writer/profile/edit'.Auth::user()->id.'#skill');

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
