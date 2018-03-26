@extends('writer.layout')

@section('content')

<div class="">
 
  <div class="" style="background-color: #fff;margin-left:10vw;margin-right:15vw;">

   <div  class="page-header" style="padding-top:1px;">
    <h3>Search Goes Here</h3>
   </div>

   @foreach($hires as $key)
   <div class="order" style="border-bottom: ridge;border-color:#e8eaf6;padding:10px;">
    <div class="orderhead">
      <h3><a href="{{ url('writer/order'.$key->project_id) }}"> {{ $key->project->title }}</a></h3>
    </div>
    <div class="orderbody">
      <div style="color:#7986cb">
       <p><span>Budget: ${{$key->project->cost}}</span>
         <span>-posted on: {{$key->updated_at }}</span>
       </p>
      </div>
      <p>{{ $key->project->description }}</p>
    </div>
    <div class="order-footer">
     <span>Client: <b>Payment verified</b></span>
     <span>
     <span><i class="fa fa-star"></i></span>
     <span><i class="fa fa-star"></i></span>
     <span><i class="fa fa-star"></i></span>
     <span><i class="fa fa-star"></i></span>
     <span><i class="fa fa-star"></i></span>
     </span>
     <span>$400 spent</span>
 
    </div>
   </div>
  @endforeach

  </div>

</div>

@endsection
