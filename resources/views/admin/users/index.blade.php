@extends('admin.layout')

@section('content')

<div class="">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#client">Clients</a></li>
    <li><a data-toggle="tab" href="#writers">Writers</a></li>
    <li><a data-toggle="tab" href="#admin">Admins</a></li>
  </ul>

    <div class="tab-content">
 
     <div id="client" class="tab-pane fade in active">
      <div id="" class="panel panel-default">
        <div class="panel-heading">
                Clients
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
