@extends('client.layout')

@section('content')

<div style="margin-bottom:10px;">
<div class="container">

    <div class="row form1">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default ">
                <div class="panel-heading">Create An Order</div>
                <div class="panel-body">
                    
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('writer/project/store') }}">
                        {{ csrf_field() }}

                     
                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="category" class="col-md-2 control-label">Category</label>

                            <div class="col-md-8">
                                <input id="category" type="text" class="form-control" name="category" value="{{ $project->rate->category }}" placeholder="Title">

                                @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                         </div>

                       <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                            <label for="level" class="col-md-2 control-label">Academic Level</label>

                            <div class="col-md-8">
                                <input id="level" type="text" class="form-control" name="level" value="{{ $project->rate->level }}">

                                @if ($errors->has('level'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('level') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       <div class="form-group{{ $errors->has('pages') ? ' has-error' : '' }}">
                            <label for="pages" class="col-md-2 control-label">No Of Pages</label>

                            <div class="col-md-8">
                                <input id="pages" type="text" class="form-control" name="pages" value="{{ $project->pages }}" >

                                @if ($errors->has('pages'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pages') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       <div class="form-group{{ $errors->has('cost') ? ' has-error' : '' }}">
                            <label for="cost" class="col-md-2 control-label">Total Cost</label>

                            <div class="col-md-8">
                                <input id="cost" type="text" class="form-control" name="cost" value="{{ $project->cost }}">

                                @if ($errors->has('cost'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cost') }}</strong>
                                    </span>
                                @endif
                            </div>
                          </div>
                           
                            <div class="col-md-2 ">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                    
                    </form>
                </div>
                <div class="panel-footer">
<span><a href="#" class="next">Next<i class="fa fa-arrow"></i></a></span>
                </div>
              </div>


            </div>
        </div>


    <div class="row form2">
        <div class="col-md-8 col-md-offset-2">
         <div class="panel panel-default">
            <div class="panel-heading">Step 2</div>
                <div class="panel-body">
                    
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('writer/project/store') }}">
                        {{ csrf_field() }}

                     
                       <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="gd" class="col-md-2 control-label">Skill Title</label>

                            <div class="col-md-8">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Title">

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
    
                            <div class="col-md-2 ">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                       </div>
                    </form>
                </div>
                <div class="pane-footer">
                  <span><a href="#" class="prev">Prev<i class="fa fa-arrow"></i></a></span>

                </div>
              </div>



            </div>
        </div>


    </div>
</div>



@endsection
