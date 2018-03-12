
@extends('client.layout')

@section('content')

<div class="container-fluid">
 <div class="row">
   <div class="col-md-offset-1 col-md-10 col-xs-12">
<div class="orderscontainer" styl="margin-top:20px;">
 @if($orders->count() > 0 )
 @foreach($orders as $key)
  <div class="panel panel-default">
    <div class="panel-heading">
    <span>{{ $key->title }}</span>
    
    </div>
    <div class="panel-body">
     <div class="col-md-6 col-xs-12">
      <p>Category: <strong>{{ $key->rate->category }}</strong></p>
      <p>Academic Level: <strong>{{ $key->rate->level }}</strong></p>
      <p>Topic: <strong>{{ $key->topic }}</strong></p>
      <p>Pages: <strong>{{ $key->pages }}</strong></p>
      <p>Status: <strong style="color:green">{{ $key->status }}</strong></p>
      <p>Published:{{ date('M j, Y', strtotime($key->created_at)) }}</p>
     </div>
     <div class="col-md-6 col-xs-12">
      <p>{{ str_limit($key->description, $limit = 150, $end = '...') }}
          <a href="{{ url('/order/show'.$key->id) }}">Read More</a>
      </p>
     </div>
    </div>
    <div class="panel-footer text-center">
      @if($key->status == "Unpublished")
        @if(is_null($key->invoice))
      <span><a href="{{ url('client/wallet/show'.$key->id) }}"><span class="btn btn-success">Order</span></a></span>
        @else
      <span><a href="{{ url('order/publish'.$key->id) }}"><span class="btn btn-success">Publish</span></a></span>
       @endif

     @endif
     
     <span><a href="{{ url('/order/show'.$key->id) }}"><span class="btn btn-default">View</span></a></span>
     
    </div>
  </div>
  @endforeach
  @else
   <p>You Have No orders</p>
  @endif

</div>
</div>
</div>
</div>
@endsection

