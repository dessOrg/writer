<?php

namespace App\Http\Controllers\Admin;

use App\Rate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;

class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $writings = Rate::where('category', '=', 'writing')->get();
        $rewritings = Rate::where('category', '=', 'rewriting')->get();
          $edits = Rate::where('category', '=', 'editing')->get();
        $translates = Rate::where('category', '=', 'translating')->get();
        $polish = Rate::where('category', '=', 'polishing')->get();
        $slides = Rate::where('category', '=', 'powerpoint')->get();
        
        return view('admin/rates/index', compact('writings','rewritings','edits','translates','polish','slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/rates/create');
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
            'category' => 'required|max:255',
            'unittime' => 'required',
            'timeline' => 'required',
            'ug'       => 'required',
            'gm'       => 'required',
            'gd'       => 'required',
            'hs'       => 'required',
         ]);

        if ($validator->fails()) {
            return redirect('admin/rates/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $timeline = (int)Input::get('timeline');
        $unittime = Input::get('unittime');
        $timeinhr = $this->findhours($timeline, $unittime);
         $rate = new Rate([
               'category' => $request->get('category'),
               'timeunit' => $unittime,
               'timeline' => $timeline,
               'ug'       => $request->get('ug'),
               'gm'       => $request->get('gm'),
               'gd'       => $request->get('gd'),
               'hs'       => $request->get('hs'),
               'timeinhr' => $timeinhr,
               ]);

               $rate->save();
               return redirect('admin/rates/create')->with('success', 'Saved Successfully');

    

        }

        public function findhours ($timeline, $unittime){
             if($unittime == "Days"){
                 $t = $timeline * 24;
                 return $t;
              }elseif($unittime == "Weeks"){
                 $t = $timeline * 7 * 24;
                 return $t;

              }elseif($unittime == "Months"){
                $t = $timeline * 24 * 7 * 30;
                return $t;
              }else{
               $t = $timeline;
               return $t;
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rate = Rate::find($id);
        return view('admin/rates/edit', compact('rate'));       
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
            'category' => 'required|max:255',
            'unittime' => 'required',
            'timeline' => 'required',
            'ug'       => 'required',
            'gm'       => 'required',
            'gd'       => 'required',
            'hs'       => 'required',
         ]);

        if ($validator->fails()) {
            return redirect('admin/rates/edit'.$id)
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $timeline = (int)Input::get('timeline');
        $unittime = Input::get('unittime');
        $timeinhr = $this->findhours($timeline, $unittime);

        $rate_obj = new Rate;
        $rate_obj->id = $id;
        $rate = Rate::find($rate_obj->id);
         $rate->update([
               'category' => $request->get('category'),
               'timeunit' => $unittime,
               'timeline' => $timeline,
               'ug'       => $request->get('ug'),
               'gm'       => $request->get('gm'),
               'gd'       => $request->get('gd'),
               'hs'       => $request->get('hs'),
               'timeinhr' => $timeinhr,
               ]);

               
               return redirect('admin/rates/edit'.$id)->with('success', 'Saved Successfully');

 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rate = Rate::find($id);
        $rate->delete($id);
        return redirect('/admin/rates');
    }
}
