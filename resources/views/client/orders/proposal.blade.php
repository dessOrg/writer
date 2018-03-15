
@extends('client.layout')

@section('content')

<div class="container-fluid">
 <div class="row">
   <div class="col-md-offset-1 col-md-10 col-xs-12">
<div class="orderscontainer" style="margin-top:20px;">

<div class="bidscontainer" style="margin-top:20px;">


  <div class="panel panel-default">
    <div class="panel-heading">
    <span>Order Proposal</span>
    
    </div>
    <div class="panel-body">
    
     <div class="bid" style="background-color:gray;">
     <div class="col-md-5 col-xs-12">
      <p>Name: <strong>{{ $proposal->user->fname }} {{ $proposal->user->lname }}</strong></p>
      <p>Profile Name: <strong>{{ $proposal->user->username }}</strong></p>
      
     </div>
     <div class="col-md-4 col-xs-6">
      <p>Finished Orders: <strong>3</strong></p>
      <p><a href="{{ url('writer/profile'.$proposal->user_id) }}">Visit Profile</a></p>
     </div>
     <div class="col-md-3 col-xs-6">
       <span><i class="fa fa-star"></i></span>
       <span><i class="fa fa-star"></i></span>
       <span><i class="fa fa-star"></i></span>
       <span><i class="fa fa-star"></i></span>
       <span><i class="fa fa-star"></i></span>
       <div>
       <span><a href="{{ url('/ad/chat'.Auth::user()->id) }}"><span class="btn btn-info">Contact</span></a></span>
       <span><a href="{{ url('/client/hire'.$proposal->id) }}"><span class="btn btn-warning">Hire</span></a></span>
       </div>
     </div>

     <div class="col-md-12 col-xs-12">
       <hr>     
      <p>{{ $proposal->cover }}  </p>

     </div>
   </div>
  
    </div>
    
  </div>
  

</div>
</div>
</div>
</div>
@endsection

