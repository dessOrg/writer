
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
     </div>
     <div class="col-md-6 col-xs-12">
      <p>{{ $key->description }}</p>
     </div>
    </div>
    <div class="panel-footer text-center">
      @if($key->status == "Unpublished")
        @if(is_null($key->invoice))
      <span><a href="{{ url('client/wallet/show'.$key->id) }}"><button class="btn btn-success">Order</a></span>
        @else
      <span><a href="{{ url('order/publish'.$key->id) }}"><button class="btn btn-success">Publish</a></span>
       @endif

     @endif
     
     <span><a href="{{ url('client/order/view'.$key->id) }}"><button class="btn btn-default">View</a></span>
     
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

