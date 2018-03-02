@extends('admin.layout')

@section('content')

<div class="">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#hs">High School</a></li>
    <li><a data-toggle="tab" href="#ug">Undergraduate</a></li>
    <li><a data-toggle="tab" href="#gm">Graduate Masters</a></li>
    <li><a data-toggle="tab" href="#gd">Graduate Doctorate</a></li>
  </ul>

    <div class="tab-content">
 
     <div id="hs" class="tab-pane fade in active">
      <div id="" class="panel panel-default">
        <div class="panel-heading">
                High School Rates
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <th>ID</th>
                    <th></th>
                    <th>MObile No</th>
                    <th>Email</th>
                    <th>isVerified</th>
                </thead>

                <tbody>
                    @if($clients->count() > 0)
                        @foreach($clients as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->fname }}</td>
                                    <td>{{ $user->mobile }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->verified }}
                                </tr>
                        @endforeach
                    @else
                        <tr>
                                <th colspan="5" class="text-center">There are no clients.</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
   </div>

  <div id="writers" class="tab-pane fade">
   <div id="" class="panel panel-default">
        <div class="panel-heading">
                Writers
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>MObile No</th>
                    <th>Email</th>
                    <th>isVerified</th>
                </thead>

                <tbody>
                    @if($writers->count() > 0)
                        @foreach($writers as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->fname }}</td>
                                    <td>{{ $user->mobile }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->verified }}
                                </tr>
                        @endforeach
                    @else
                        <tr>
                                <th colspan="5" class="text-center">There are no writers.</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
   </div>

  <div id="admin" class="tab-pane fade">
   <div id="" class="panel panel-default">
        <div class="panel-heading">
                Admins
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>MObile No</th>
                    <th>Email</th>
                    <th>isVerified</th>
                </thead>

                <tbody>
                    @if($admins->count() > 0)
                        @foreach($admins as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->fname }}</td>
                                    <td>{{ $user->mobile }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->verified }}
                                </tr>
                        @endforeach
                    @else
                        <tr>
                                <th colspan="5" class="text-center">There are no admins.</th>
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
