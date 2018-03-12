@extends('writer.layout')

@section('content')

<div class="">
  <div class="top" style="padding-left: 10vw;">
   <h3>Submit Proposal</h3>
          @if(session()->has('status'))
          <div class="alert alert-success">
             {{ session()->get('status') }}
          </div>
         @endif
 
  </div>  
  <div class="" style="background-color: #fff;margin-left:10vw;margin-right:15vw;">

   <div  class="page-header" style="padding-top:1px;">
    <h3>Order Details</h3>
   </div>

   <div class="order" style="border-bottom: ridge;border-color:#e8eaf6;padding:10px;">
    <div class="orderhead">
      <h4> {{ $order->title }}</h4>
    </div>
    <div class="orderbody">
      <div style="color:#7986cb">
       <p><span>Budget: ${{$order->cost}}</span>
         <span>-posted on: {{$order->updated_at }}</span>
       </p>
       <p>Topic: {{ $order->topic }}</p>
       <p>Duration: {{ $order->rate->timeline }}</p>
      </div>
      <p>{{ $order->description }}</p>
    </div>
    <div class="order-footer">
    
 
    </div>
   </div>
  
  </div>


  <div class="" style="background-color: #fff;margin-left:10vw;margin-right:15vw;">

   <div  class="page-header" style="padding-top:1px;">
    <h3>Draft Proposal</h3>
   </div>

   <div class="order" style="border-bottom: ridge;border-color:#e8eaf6;padding:10px;">
    <div class="orderhead">

    </div>
    <div class="orderbody">
      <div style="color:#000">
       <p>cover letter  </p>
        <form class="form-horizontal" role="form" method="POST" action="{{ url('writer/proposal') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('cover') ? ' has-error' : '' }}">
                            
                            <div class="col-md-offset-1 col-md-10">
                                <textarea id="cover" type="text" rows="8" class="form-control" name="cover" >  
                                </textarea>
                                <input type="hidden" name="project_id" value="{{ $order->id }}">
                                
                                @if ($errors->has('cover'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cover') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

<div style="border-top: ridge; border-color:#fafafa;margin-left:-10px;margin-right:-10px;padding-top:10px;">
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    Submit Proposal
                                </button>
                            </div>
                        </div>
</div>
                    </form>
  
      </div>
      
    </div>
    <div class="order-footer">
    
 
    </div>
   </div>
  
  </div>


</div>

@endsection
