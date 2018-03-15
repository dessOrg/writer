@extends('client.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Confirm Details</div>
                <div class="panel-body">
                   <div class="col-md-6 col-xs-12">
                    <div class="page-header">Order Details</div>
                     <h5>Title: <strong>{{ $proposal->project->title }}</strong></h5>
                     <h5>Burdget: <strong>${{ $proposal->project->cost }}.00</strong></h5>
                   </div>
                   <div class="col-md-6 col-xs-12">
                     <div class="page-header">Writer Details</div>
                     <h5>Profile Name: <strong>{{ $proposal->user->username }}</strong></h5>
                     <h5>Email: <strong>{{ $proposal->user->email }}</strong></h5>

                   </div>
                </div>
             </div>
        </div> 

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Set The Expected Date/Time</div>
                <div class="panel-body">
                    
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('client/hire') }}">
                        {{ csrf_field() }}


                        <div class="form-group{{ $errors->has('dateline') ? ' has-error' : '' }}">
                            <label for="dateline" class="col-md-3 control-label">Dateline</label>

                            <div class="col-md-6">

                             <div class='input-group date' id='datetimepicker1' >
                             <input type='text' class="form-control" name="dateline" required/>
                              <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                            </div>
                             <input type="hidden" class="form-control" name="project_id" value="{{ $proposal->project->id }}">
                             <input type="hidden" class="form-control" name="user_id" value="{{ $proposal->user->id }}">
 
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-3 col-md-2 col-xs-3">
                              <span class="pull-right"><a href="{{ url('/order/proposal'.$proposal->id )}}"><span class="btn btn-warning">Cancel</span></a></span>
                            </div>
                            <div class="col-md-2 col-xs-3">
                                <button type="submit" class="btn btn-success pull-left">
                                    Proceed
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
