@extends('client.layout')

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">

      <div class="ordercontainer text-center" style="padding:10px; background-color: #fff;">

       <div class="walletbalance text-center" style="margin: 10px;">
        <div class="text-center" style="padding-top:2vh;width:60vw; height:20vh;display:inline-block;background-image: url('/images/test-banner-home.jpg');background-size:cover;">
          <span style=""><h2><strong>Balance</strong> $. 0.00</h2></span>
          <span><a href="{{ url('client/wallet/show') }}"><button class="btn btn-derfault">Load Wallet</button></a></span>
        </div> 
        </div>
     
      <div class="orderdetails text-center" style="padding:10px; margin-top:20px;">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('client/order'. $project->id) }}">
                        {{ csrf_field() }}

                 
                       <div class="form-group{{ $errors->has('cost') ? ' has-error' : '' }}">
                            <label for="cost" class="col-md-2 control-label">Cost ($)</label>

                            <div class="col-md-4">
                                <input id="cost" type="text" class="form-control" name="cost" value="{{ $project->cost }}" placeholder="Cost" disabled>
  <input id="project_id" type="hidden" class="form-control" name="project_id" value="{{ $project->id }}">
                                @if ($errors->has('cost'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cost') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-2 ">
                                <button id="projectmiddle" class="btn btn-primary">
                                    Order
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
