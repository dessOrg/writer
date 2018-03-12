<?php

namespace App\Http\Controllers\Writer;

use App\Project;
use App\User;
use App\Proposal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Validator;

class OrderController extends Controller
{
    public function open ()
    {
       $orders = Project::where('status','=','Bidding')->orderBy('id', 'desc')->get();
       return view('writer/orders/index', compact('orders'));
    }

    public function show ($id)
    {
        $order = Project::find($id);
        return view('writer/orders/order', compact('order'));
    }

    public function bid (Request $request)
    {

        $validator = Validator::make($request->all(), [
            'cover' => 'required',
     ]);

        $id = $request->get('project_id');

    if ($validator->fails()) {
        return redirect('writer/order'.$id)
                    ->withErrors($validator)
                    ->withInput();
    }

        $count = Proposal::where('user_id','=',Auth::user()->id)->where('project_id','=',$id)->count();

        if($count > 0 ){
    
        return redirect('writer/order'.$id)
            ->with('status', 'You have already submitted a proposal on this order..');
        }else{
         $proposal = new Proposal;
        $proposal->user_id = Auth::user()->id;
        $proposal->project_id = $id;
        $proposal->cover = $request->get('cover');
        $proposal->save();

        return redirect('writer/order'.$id)
            ->with('status', 'Proposal submitted successfully.');

        }
    }

    public function proposals ()
    {
        $proposals = Proposal::where('user_id','=', Auth::user()->id)->get();
        return view('writer/orders/proposals', compact('proposals'));
    }
}
