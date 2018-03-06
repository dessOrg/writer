@extends('admin.layout')

@section('content')

<div style="margin-bottom:10px;">
 <span class="pull-right"><a href="{{ url('admin/rates/create')}}"><button class="btn btn-primary">SET RATES</button></a></span>
</div>
<div class="" style="padding-top:20px;">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#writing">Writing</a></li>
    <li><a data-toggle="tab" href="#rewriting">Rewriting</a></li>
    <li><a data-toggle="tab" href="#ep">Editing & Proofreading</a></li>
    <li><a data-toggle="tab" href="#translation">Translation</a></li>
    <li><a data-toggle="tab" href="#polish">Polishing & Enhancement</a></li>
    <li><a data-toggle="tab" href="#slide">Power-point Designs(Slides)</a></li>
  </ul>

    <div class="tab-content">
     
     <div id="writing" class="tab-pane fade in active">
      <div id="" class="panel panel-default">
        <div class="panel-heading">
                Writing Rates
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    
                    <th>Timeline</th>
                    <th>Academic Level</th>
                    <th>Rates</th>
                    
                </thead>

                <tbody>
                    @if($writings->count() > 0)
                        @foreach($writings as $key)
                                <tr>
                                    <td>{{ $key->timeline }}</td>
                                    <td>{{ $key->level }}</td>
                                    <td>{{ $key->rates }}</td>
                                    
                                    <td><span><a href="{{ url('admin/rates/edit').$key->id }}"><i class="fa fa-edit fa-2x"></i></a><span>
                                     <span class=""><a href="{{ url('admin/rates/destroy').$key->id }}"><i class="fa fa-remove fa-2x" style="color:red"></i><a></span></td>
                                </tr>
                        @endforeach
                    @else
                        <tr>
                                <th colspan="5" class="text-center">There are no rates for this category.</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
   </div>


     <div id="rewriting" class="tab-pane fade">
      <div id="" class="panel panel-default">
        <div class="panel-heading">
                Rewriting Rates
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    
                    <th>Timeline</th>
                    <th>Academic Level</th>
                    <th>Rates</th>
                    
                </thead>

                <tbody>
                    @if($rewritings->count() > 0)
                        @foreach($rewritings as $key)
                                <tr>
                                    <td>{{ $key->timeline }}</td>
                                    <td>{{ $key->level }}</td>
                                    <td>{{ $key->rates }}</td>
                            
                                    <td><span><a href="{{ url('admin/rates/edit').$key->id }}"><i class="fa fa-edit fa-2x"></i></a><span>
                                     <span class=""><a href="{{ url('admin/rates/destroy').$key->id }}"><i class="fa fa-remove fa-2x" style="color:red"></i><a></span></td>                                </tr>
                        @endforeach
                    @else
                        <tr>
                                <th colspan="5" class="text-center">There are no rates for this category.</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
   </div>


     <div id="ep" class="tab-pane">
      <div id="" class="panel panel-default">
        <div class="panel-heading">
                Editing Rates
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    
                    <th>Timeline</th>
                    <th>Academic Level</th>
                    <th>Rates</th>
                    
                </thead>

                <tbody>
                    @if($edits->count() > 0)
                        @foreach($edits as $key)
                                <tr>
                                    <td>{{ $key->timeline }} </td>
                                    <td>{{ $key->level }}</td>
                                    <td>{{ $key->rates }}</td>
                                    
                                     <td><span><a href="{{ url('admin/rates/edit').$key->id }}"><i class="fa fa-edit fa-2x"></i></a><span>
                                     <span class=""><a href="{{ url('admin/rates/destroy').$key->id }}"><i class="fa fa-remove fa-2x" style="color:red"></i><a></span></td>
                                </tr>
                        @endforeach
                    @else
                        <tr>
                                <th colspan="5" class="text-center">There are no rates for this category.</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
   </div>


     <div id="translation" class="tab-pane fade">
      <div id="" class="panel panel-default">
        <div class="panel-heading">
                Translation Rates
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    
                    <th>Timeline</th>
                    <th>Academic Level</th>
                    <th>Rates</th>
    
                </thead>

                <tbody>
                    @if($translates->count() > 0)
                        @foreach($translates as $key)
                                <tr>
                                    <td>{{ $key->timeline }} </td>
                                    <td>{{ $key->level }}</td>
                                    <td>{{ $key->rates }}</td>
                                    
                                    <td><span><a href="{{ url('admin/rates/edit').$key->id }}"><i class="fa fa-edit fa-2x"></i></a><span>
                                     <span class=""><a href="{{ url('admin/rates/destroy').$key->id }}"><i class="fa fa-remove fa-2x" style="color:red"></i><a></span></td>
                                </tr>
                        @endforeach
                    @else
                        <tr>
                                <th colspan="5" class="text-center">There are no rates for this category.</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
   </div>


     <div id="polish" class="tab-pane fade ">
      <div id="" class="panel panel-default">
        <div class="panel-heading">
                Polishing Rates
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    
                    <th>Timeline</th>
                    <th>Academic Level</th>
                    <th>Rates</th>
            
                </thead>

                <tbody>
                    @if($polish->count() > 0)
                        @foreach($polish as $key)
                                <tr>
                                    <td>{{ $key->timeline }} </td>
                                    <td>{{ $key->level }}</td>
                                    <td>{{ $key->rates }}</td>
                                    
                                    <td><span><a href="{{ url('admin/rates/edit').$key->id }}"><i class="fa fa-edit fa-2x"></i></a><span>
                                     <span class=""><a href="{{ url('admin/rates/destroy').$key->id }}"><i class="fa fa-remove fa-2x" style="color:red"></i><a></span></td>
                                </tr>
                        @endforeach
                    @else
                        <tr>
                                <th colspan="5" class="text-center">There are no rates for this category.</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
   </div>


     <div id="slide" class="tab-pane fade ">
      <div id="" class="panel panel-default">
        <div class="panel-heading">
                Power-point Rates
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    
                    <th>Timeline</th>
                    <th>Academic Level</th>
                    <th>Rates</th>
                    
                </thead>

                <tbody>
                    @if($slides->count() > 0)
                        @foreach($slides as $key)
                                <tr>
                                    <td>{{ $key->timeline }}</td>
                                    <td>{{ $key->level }}</td>
                                    <td>{{ $key->rates }}</td>
                                    
                                    <td><span><a href="{{ url('admin/rates/edit').$key->id }}"><i class="fa fa-edit fa-2x"></i></a><span>
                                     <span class=""><a href="{{ url('admin/rates/destroy').$key->id }}"><i class="fa fa-remove fa-2x" style="color:red"></i><a></span></td>
                                </tr>
                        @endforeach
                    @else
                        <tr>
                                <th colspan="5" class="text-center">There are no rates for this category.</th>
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
