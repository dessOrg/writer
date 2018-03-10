
@extends('client.layout')

@section('content')

<div class="container-fluid">
 <div class="row">
   <div class="col-md-12" >
     <div class="panel panel-default" style="margin-top: 20px;">
      <div class="panel-heading">E Wallet</div>
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
       
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/payment/add-funds/paypal') }}">
                        {{ csrf_field() }}

                 
           <div class="form-group{{ $errors->has('cost') ? ' has-error' : '' }}">
              <label for="amount" class="col-md-2 control-label">Amount ($)</label>

              <div class="col-md-4">
                <input id="amount" type="number" class="form-control" name="amount" value="" placeholder="Amount in USD($)" >
                
                                @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-2 ">
                                <button id="" type="submit" class="btn btn-primary">
                                    Load
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
