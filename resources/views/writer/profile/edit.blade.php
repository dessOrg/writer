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
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('writer/profile/update').Auth::user()->id }}">
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

            <div id="skill" class="panel panel-default">
                <div class="panel-heading">Update Skills</div>
                <div class="panel-body">

                  <div class="skills-box" style="margin: 5px 80px 5px 80px;padding:10px; border-style:solid;">
                     @if($profile_skills == "0")
                        <p>You Have No Skills</p>
                     @else
                       @foreach($profile_skills as $key )
                <span style="padding:3px;background-color:gray;">{{ $key->title }} <a href="{{ url('writer/profile/removeskill'.$key->id) }}"><i class="fa fa-remove" style="color:#fff"></i></a></span>
                       @endforeach
                    @endif
                  </div>
                  <div style="padding:5px;">
                      <h4>Select Skills </h4>
                  </div>
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('writer/profile/skill').Auth::user()->id }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }}">
                            
                            <div class="col-md-offset-1 col-md-10">
                             @foreach($skills as $key)
                                                    
                             <div>
                              <input type="checkbox" name="profile[]" id="{{$key->id }}" value="{{ $key->id }}">
                              <label for="{{ $key->id }}">{{ $key->title }}</label>
                             </div>
                        
                             @endforeach
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
