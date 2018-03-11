
@extends('client.layout')

@section('content')

<div class="container-fluid">
 <div class="row">
   <div class="col-md-offset-1 col-md-10 col-xs-12">
<div class="orderscontainer" styl="margin-top:20px;">


  <div class="panel panel-default">
    <div class="panel-heading">
    <span>{{ $project->title }}</span>
    
    </div>
    <div class="panel-body">
     <div class="col-md-6 col-xs-12">
      <p>Category: <strong>{{ $project->rate->category }}</strong></p>
      <p>Academic Level: <strong>{{ $project->rate->level }}</strong></p>
      <p>Topic: <strong>{{ $project->topic }}</strong></p>
      <p>Pages: <strong>{{ $project->pages }}</strong></p>
      <p>Status: <strong style="color:green">{{ $project->status }}</strong></p>
     </div>
     <div class="col-md-6 col-xs-12">
      <p>{{ $project->description }}</p>
     </div>
    </div>
    <div class="panel-footer text-center">
      @if($project->status == "Unpublished")
        @if(is_null($project->invoice))
      <span><a href="{{ url('client/wallet/show'.$project->id) }}"><button class="btn btn-success">Order</a></span>
        @else
      <span><a href="{{ url('order/publish'.$project->id) }}"><button class="btn btn-success">Publish</a></span>
       @endif

     @endif
     
     <span><a href="{{ url('/order/cancel'.$project->id) }}"><button class="btn btn-warning">Cancel</a></span>
     
    </div>
  </div>
  

</div>
<hr>
<div class="bidscontainer" style="margin-top:20px;">


  <div class="panel panel-default">
    <div class="panel-heading">
    <span>Bids On This Order</span>
    
    </div>
    <div class="panel-body">
     <div class="bid" style="background-color:gray;">
     <div class="col-md-5 col-xs-12">
      <p>Name: <strong>Njuguna</strong></p>
      <p>Profile Name: <strong>gwriter</strong></p>
      
     </div>
     <div class="col-md-4 col-xs-6">
      <p>Finished Orders: <strong>3</strong></p>
      <p><a href="writer/profile">Visit Profile</a></p>
     </div>
     <div class="col-md-3 col-xs-6">
       <span><i class="fa fa-star"></i></span>
       <span><i class="fa fa-star"></i></span>
       <span><i class="fa fa-star"></i></span>
       <span><i class="fa fa-star"></i></span>
       <span><i class="fa fa-star"></i></span>
       <div>
       <button class="btn btn-warning">Hire</button>
       </div>
     </div>

     <div class="col-md-12 col-xs-12">
       <p>Proposal comes here</p>

     </div>
</div>

    </div>
    
  </div>
  

</div>
</div>
</div>
</div>
@endsection
