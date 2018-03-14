
@extends('client.layout')

@section('content')

<div class="container-fluid">
 <div class="row">
   <div class="col-md-offset-3 col-md-6 col-xs-12" >
     <div class="panel panel-default" style="margin-top: 20px;">
      <div class="panel-heading">Order {{ $project->id }}</div>
      <div class="panel-body">
 @if(Session::has('alert'))

<div class="alert alert-success">

    {{ Session::get('alert') }}

    @php

    Session::forget('alert');

    @endphp

</div>

@endif
                     @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('warning'))
                        <div class="alert alert-warning">
                            {{ session('warning') }}
                        </div>
                    @endif  


             <div class="summary text-center">
              <div class="page-header" style="color:green">
               <h2>Order Summary</h2>
              </div>
               <h4>Rates per page = <strong>${{ $project->rate->rates }}.00</strong></h4>
               <h4>No Of Pages = <strong>{{ $project->pages }}</strong></h4>
               <h3>Grand Total = <strong>${{ $project->cost }}.00</strong></h3>
                <hr>
            </div>       
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/payment/add-funds/paypal') }}">
                        {{ csrf_field() }}

                 
           <div class="form-group{{ $errors->has('cost') ? ' has-error' : '' }}">
              

              <div class="col-md-4 col-xs-4">
                <input id="amount" type="hidden" class="form-control" name="amount" value="{{ $project->cost }}" placeholder="Amount in USD($)" >
               <input name="project_id" type="hidden" class="form-control" value="{{ $project->id }}" > 
                                @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                           <div class="col-md-1 col-xs-1" style="color:#3c8dbc;">
                             <i class="fa fa-paypal fa-2x"></i>
                           </div>
                            <div class="col-md-2 col-xs-2">
                                <button id="" type="submit" class="btn btn-success">
                                    Pay
                                </button>
                            </div>
                         </div>

                    </form>
 
      </div>
     </div>
   </div>
 </div>
</div>

@endsection
