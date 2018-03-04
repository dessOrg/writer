@extends('writer.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Set Rates</div>
                <div class="panel-body">
                    
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/profile/update').Auth::user()->id }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
                            <label for="fname" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input id="fname" type="text" class="form-control" name="fname" value="{{ Auth::user()->fname }}" placeholder="" required autofocus>

                                @if ($errors->has('fname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }}">
                            <label for="lname" class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control" name="lname" value="{{ Auth::user()->lname }}" placeholder="" required autofocus>

                                @if ($errors->has('lname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Profile Name</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ Auth::user()->username }}" placeholder="" required>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" placeholder="" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Update Personal Statement</div>
                <div class="panel-body">
                    
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('writer/profile/bio') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }}">
                            
                            <div class="col-md-offset-1 col-md-10">
                                <textarea id="bio" type="text" rows="5" class="form-control" name="bio" placeholder="" required autofocus>@if(!is_null($user))
                                {{ $user->bio }}
                        @endif  
                                </textarea>

                                @if ($errors->has('bio'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bio') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Update Skills</div>
                <div class="panel-body">

                  <div class="skills-box" style="margin: 5px 80px 5px 80px;padding:10px; border-style:solid;">
                    <span style="padding:3px;background-color:gray;">Skill 1 <i class="fa fa-remove" style="color:#fff"></i></span>
                    <span style="padding:3px;background-color:gray;">Skill 2 <i class="fa fa-remove" style="color:#fff"></i></span>
                    <span style="padding:3px;background-color:gray;">Skill 3 <i class="fa fa-remove" style="color:#fff"></i></span>
                  </div>
                  <div style="padding:5px;">
                      <h4>Select Skills </h4>
                  </div>
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/profile/update').Auth::user()->id }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }}">
                            
                            <div class="col-md-offset-1 col-md-10">
                              
                             <div>
                              <input type="checkbox" name="favorite[]" id="south" value="south">
                              <label for="south">Skill 5</label>
                             </div>
                             <div>
                              <input type="checkbox" name="favorite[]" id="north" value="north">
                              <label for="north">Skill 6</label>
                             </div>
                             <div>
                               <input type="checkbox" name="favorite[]" id="east" value="east">
                               <label for="east">Skill 7</label>
                             </div>
                                @if ($errors->has('bio'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bio') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    update
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
