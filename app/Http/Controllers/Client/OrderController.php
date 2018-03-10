<?php

namespace App\Http\Controllers\Client;

use App\User;
use App\Project;
use App\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class OrderController extends Controller
{

  public function index($status)
  {

       $orders = Project::where('status','=', $status)->where('user_id','=', Auth::user()->id)->get();
       return view('client/orders/index', compact('orders'));

  }

  public function show ()
  {
    $orders = Project::get();
    return view('client/orders/index', compact('orders'));
  }

  public function publish ($id)
   {
     $project = Project::find($id);    
     if(is_null($project->invoice )){
          return redirect('client/wallet/show'.$id);

      }else{
      $project_obj = new Project;
      $project_obj->id = $id;
      $project = Project::find($project_obj->id);
//      dd($project);
      $project->update(['status' => 'Bidding']);

      return redirect('client/order/Bidding')->with('status', "Published Successfully. Ready for bidding");
      }
  }

}
