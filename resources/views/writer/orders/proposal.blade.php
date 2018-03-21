
@extends('client.layout')

@section('content')

<div class="container-fluid">
 <div class="row">
   <div class="col-md-offset-1 col-md-10 col-xs-12">
    <div class="orderscontainer" style="margin-top:20px;">

     <div class="bidscontainer" style="margin-top:20px;">


      <div class="panel panel-default">
       <div class="panel-heading">
        <span><a href="{{ url('writer/order'.$proposal->project_id) }}">{{ $proposal->project->title }}</a></span>
       </div>
       <div class="panel-body">
    
         <p>{{ $proposal->cover }}
       </div>
       <div class="panel-footer">
        @if($proposal->project->status == "Bidding")
        <span>Status <strong style="color:green">Open</strong></span>
        @else
        <span>Status <strong style="color:red">Closed</strong></span>
        @endif
        <span style="margin-left:10px;margin-right:10px;">No Of Proposals: <strong>{{ $proposal->project->proposals->count() }} </strong></span>
       </div>
      </div>
     </div>
  

</div>
</div>
</div>
</div>
@endsection

