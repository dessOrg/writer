<?php

namespace App\Http\Controllers\Client;

use App\User;
use App\Project;
use App\Profile;
use App\Proposal;
use App\Hire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;
use DateTime;

class OrderController extends Controller
{

  public function index($status)
  {

       $orders = Project::where('status','=', $status)->where('user_id','=', Auth::user()->id)->orderBy('id', 'desc')->get();
       return view('client/orders/index', compact('orders'));

  }

  public function show ($id)
  {
    $project = Project::find($id);
    return view('client/orders/show', compact('project'));
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

 public function profile ($id)
 {
     $user = User::find($id)->profile;
     $skills = Profile::find($user->id)->skills()->get();
     $profile = User::find($id);

     return view('client/profile/index', compact('skills','profile'));
 }  

  public function proposal ($id)
  {
    $proposal = Proposal::find($id);
    return view('client/orders/proposal', compact('proposal'));
  }

  public function hire ($id)
  {
    $proposal = Proposal::find($id);
    return view('client/orders/hire', compact('proposal'));
  }

  public function store (Request $request)
  {
    $hire = new Hire;
    $hire->user_id = $request->get('user_id');
    
    $hire->project_id = $request->get('project_id');
  //   $dateline = Carbon::parse($request->get('dateline'))->format('Y-d-m H:i');
    $dateline =  date('Y-m-d H:i:s', strtotime($request->get('dateline')));
    $hire->dateline = $dateline;
    $hire->status = "Active";
    $hire->save();

    $project_obj = new Project;
    $project_obj->id = $request->get('project_id');
    $project = Project::find($project_obj->id);
    $project->update(['status' => "Inprogress"]);

    return redirect('/client/order/Inprogress');
  }

  public function cancel ($id)
  {

      $order_obj = new Project;
      $order_obj->id = $id;
      $order = Project::find($order_obj->id);
      $order->update(['status'=>"Cancelled"]);

      if($order->hires->count() > 0){
          $hire = Hire::where('status','=','Active')->where('project_id','=', $id)->first();
         
          $hire_obj = new Hire;
          $hire_obj->id = $hire->id;
          $hir = Hire::find($hire_obj->id);
          $hir->update(['status'=> 'Cancelled']);
      }

      return redirect('/order/show'.$id)->with('status', 'Order Cancelled');

  }

 public function destroy ($id)
 {
    $order = Project::find($id);
    $order->delete();
    return redirect('client/order/Unpublished')->with('status', 'Deleted Successfully');
 }

}
