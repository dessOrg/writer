@extends('admin.layout')

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
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/rates/update').$rate->id }}">
                        {{ csrf_field() }}

                         <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="category" class="col-md-4 control-label">Category</label>

                            <div class="col-md-6">
                                <select id="category" class="form-control" name="category" required autofocus>
                                  <option value="{{ $rate->category }}">{{ $rate->category }}</option>
                                  <option value="Writing">Writing</option>
                                  <option value="Rewriting">Rewriting</option>
                                  <option value="Editing">Editing $ Proofreading</option>
                                  <option value="Translating">Translation</option>
                                  <option value="Polishing">Polishing & Enhancement</option>
                                  <option value="Powerpoint">Power-Point Designs(Slides)</option>
                                 </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                            <label for="level" class="col-md-4 control-label">Level</label>

                            <div class="col-md-6">
                                <select id="level" class="form-control" name="level" required autofocus>
                                  <option value="{{ $rate->level }}">{{ $rate->level }}</option>
                                  <option value="hs"> High School</option>
                                  <option value="ug">Undergraduate</option>
                                  <option value="gm">Graduate Master</option>
                                  <option value="gd">Graduate Doctorate</option>
                                
                                 </select>
                            </div>
                        </div>

                       <div class="form-group{{ $errors->has('timeline') ? ' has-error' : '' }}">
                            <label for="timeline" class="col-md-4 control-label">Timeline</label>

                            <div class="col-md-6">
                                <select id="" class="form-control" name="timeline" required autofocus>
                                  <option value="{{ $rate->timeline }}">{{ $rate->timeline }}</option>
                                  <option value="2 Hours">2 Hours</option>
                                  <option value="6 Hours">6 Hours</option>
                                  <option value="12 Hours">12 Hours</option>
                                  <option value="1 Day">1 Day</option>
                                  <option value="2 Days">2 Days</option>
                                  <option value="3 Days">3 Days</option>
                                  <option value="4 Days">4 Days</option>
                                  <option value="5 Days">5 Days</option>
                                  <option value="6 Days">6 Days</option>
                                  <option value="7 Days">7 Days</option>
                                  <option value="8 Days">8 Days</option>
                                  <option value="9 Days">9 Days</option>
                                  <option value="10 Days">10 Days</option>
                                  <option value="2 Weeks">2 Weeks</option>
                                  <option value="1 Month">1 Month</option>
                                  <option value="2 Months">2 Months</option>

                                 </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('rates') ? ' has-error' : '' }}">
                            <label for="rates" class="col-md-4 control-label">Rates</label>

                            <div class="col-md-6">
                                <input id="rates" type="text" class="form-control" name="rates" value="{{ $rate->rates }}" placeholder="Rates in $(USD)" required autofocus>

                                @if ($errors->has('rates'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
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
