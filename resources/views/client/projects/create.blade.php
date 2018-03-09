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
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('client/project/first') }}">
                        {{ csrf_field() }}

                     
                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="category" class="col-md-2 control-label">Category</label>

                            <div class="col-md-8">
                                <input id="category" type="text" class="form-control" name="category" value="{{ $project->rate->category }}" placeholder="Title" disabled>
                                <input id="project_id" type="hidden" class="form-control" name="project_id" value="{{ $project->id }}">
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
                                <input id="level" type="text" class="form-control" name="level" value="{{ $project->rate->level }}" disabled>

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
                                <input id="pages" type="text" class="form-control" name="pages" value="{{ $project->pages }}" disabled>

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
                                <input id="cost" type="text" class="form-control" name="cost" value="{{ $project->cost }}" disabled>

                                @if ($errors->has('cost'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cost') }}</strong>
                                    </span>
                                @endif
                            </div>
                          </div>
                           
                            <div class="col-md-2 ">
                              <!--  <button type="submit" class="btn btn-primary">
                                    Save
                                </button> -->
                            </div>
                    
                    </form>
                </div>
                <div class="panel-footer text-center">
<span><a href="#" class="next"><button class="btn btn-warning">Next<i class="fa fa-arrow"></i></button></a></span>
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
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('client/project/middle') }}">
                        {{ csrf_field() }}

                     
                       <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-2 control-label">Project Title</label>

                            <div class="col-md-8">
                                <input id="title" type="text" class="form-control" name="title"  placeholder="Title">
  <input id="project_id_m" type="hidden" class="form-control" name="project_id" value="{{ $project->id }}">
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                         </div>
               
                         <div class="form-group">
                              <label for="topic" class="col-md-2 control-label" >Topic</label>

                              <div class="col-md-8">
                                <select id="topic" class="form-control" name="select" required>
                                  <option value="">Select Topic</option>
                                  @foreach($topics as $key)
                                    <option value="{{ $key->title }}">{{$key->title }}</option>
                                  @endforeach
                                </select>                        
                              </div>
                          </div>

                          <div class="form-group">
                             <label for="description" class="col-md-2 control-label" >Description</label>
                            <div class="col-md-8">
                              <textarea id="description" type="text" rows="5" class="form-control"></textarea>
                            </div>
                           </div>

                          <div class="form-group">

                            <div class="col-md-offset-5 col-md-2 ">
                                <button id="projectmiddle" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
               <div class="panel-footer text-center">
                  <span style="margin:4px;"><a href="#" class="prev"><button class="btn-warning">Prev<i class="fa fa-arrow"></i></button></a></span>
                  <span style="margin:4px;"><a href="#" class="last"><button class="btn btn-warning">Next<i class="fa fa-arrow"></i></button></a></span>
                
                </div>
              </div>
            </div>
           </div>

    <div class="row final">
        <div class="col-md-8 col-md-offset-2">
         <div class="panel panel-default">
            <div class="panel-heading">Step 3</div>
                <div class="panel-body">
                    
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('client/project/finnal') }}">
                        {{ csrf_field() }}

                     
                       <div class="form-group{{ $errors->has('document') ? ' has-error' : '' }}">
                            <label for="document" class="col-md-2 control-label">Document File</label>

                            <div class="col-md-8">
                                <input id="document" type="file" class="form-control" name="document" value="{{ $project->document }}" >
 <input id="project_id_f" type="hidden" class="form-control" name="project_id" value="{{ $project->id }}">
                            </div>
                         </div>
               
                         <div class="form-group">
                              <label for="video" class="col-md-2 control-label" >Link To Video</label>

                              <div class="col-md-8">
                                 <input id="video" type="text" class="form-control" name="video" value="{{$project->video }}" >

                                @if ($errors->has('video'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('video') }}</strong>
                                    </span>
                                @endif
                         
                              </div>
                          </div>

                          <div class="form-group">

                            <div class="col-md-offset-5 col-md-2 ">
                                <button id="projectfinnal" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer text-center">
                  <span style="margin:4px;"><a href="#" class="next"><button class="btn-warning">Prev<i class="fa fa-arrow"></i></button></a></span>
                  <span style="margin:4px;"><a href="#" ><button class="btn btn-default">Preview</button></a></span>
                  <span style="margin:4px;"><a href="3"><button class="btn btn-success">Order</button></a></span>
                 <!--  <span style="margin:4px;"><a href="#" class="form3"><button class="btn btn-warning">Next<i class="fa fa-arrow"></i></button></a></span>-->
                
                </div>
              </div>



            </div>
        </div>


    </div>
</div>



@endsection
