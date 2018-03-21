@extends('writer.layout')

@section('content')

<div class="">
  
  <div class="" style="background-color: #fff;margin-left:10vw;margin-right:15vw;">

   <div  class="page-header" style="padding-top:1px;">
    <h3>Active proposals</h3>
   </div>

   @foreach($proposals as $key)
    @if($key->project->status == "Bidding")
   <div class="order" style="border-bottom: ridge;border-color:#e8eaf6;padding:10px;">
    <div class="orderhead">
      <h3><a href="{{ url('writer/proposal'.$key->id) }}"> {{ $key->project->title }}</a></h3>
    </div>
    <div class="orderbody">
      
      <p>{{ $key->cover}}</p>
    </div>
    
   </div>
  @endif
  @endforeach

  </div>


  <div class="" style="background-color: #fff;margin-left:10vw;margin-right:15vw;">

   <div  class="page-header" style="padding-top:1px;">
    <h3>Submitted proposals</h3>
   </div>

   @foreach($proposals as $key)
    @if($key->project->status != "Bidding")
   <div class="order" style="border-bottom: ridge;border-color:#e8eaf6;padding:10px;">
    <div class="orderhead">
      <h3><a href="{{ url('writer/proposal'.$key->id) }}"> {{ $key->project->title }}</a></h3>
    </div>
    <div class="orderbody">
      
      <p>{{ $key->cover}}</p>
    </div>
    
   </div>
   @endif
  @endforeach

  </div>

</div>

@endsection
