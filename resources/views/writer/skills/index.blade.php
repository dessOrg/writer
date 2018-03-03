@extends('admin.layout')

@section('content')

<div style="margin-bottom:10px;">
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Skill</div>
                <div class="panel-body">
                    
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/skills/store') }}">
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
        </div>
    </div>
</div>


</div>
<div class="" style="padding-top:20px;">
    <div class="">
     
     <div id="writing" class="">
      <div id="" class="panel panel-default">
        <div class="panel-heading">
                Registered Skills
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    
                    <th>#</th>
                    <th>Skill Title </th>
                    <th>Created At</th> 
                </thead>

                <tbody>
                    @if($skills->count() > 0)
                        @foreach($skills as $key)
                                <tr>
                                    <td>{{ $key->id }}</td>
                                    <td>{{ $key->title }}</td>
                                    <td>{{ $key->created_at }}</td>
                                    <td><span><a href="{{ url('admin/skills/edit').$key->id }}"><i class="fa fa-edit fa-2x"></i></a><span>
                                     <span class=""><a href="{{ url('admin/skills/destroy').$key->id }}"><i class="fa fa-remove fa-2x" style="color:red"></i><a></span></td>
                                </tr>
                        @endforeach
                    @else
                        <tr>
                                <th colspan="5" class="text-center">There are no registered skills.</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
   </div>

  </div>
</div>

@stop
