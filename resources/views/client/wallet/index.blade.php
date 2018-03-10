
@extends('client.layout')

@section('content')

<div class="container-fluid">
 <div class="row">
   <div class="col-md-12" >
     <div class="panel panel-default" style="margin-top: 20px;">
      <div class="panel-heading">E Wallet</div>
      <div class="panel-body">
       
        <form class="form-horizontal" role="form" method="POST" action="{{ url('client/order') }}">
                        {{ csrf_field() }}

                 
           <div class="form-group{{ $errors->has('cost') ? ' has-error' : '' }}">
              <label for="cost" class="col-md-2 control-label">Amount ($)</label>

              <div class="col-md-4">
                <input id="cost" type="text" class="form-control" name="cost" value="" placeholder="Amount in USD($)" >
                
                                @if ($errors->has('cost'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cost') }}</strong>
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
