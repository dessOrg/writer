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

                        <div class="form-group{{ $errors->has('unittime') ? ' has-error' : '' }}">
                            <label for="unittime" class="col-md-4 control-label">Timeline Unit:</label>

                            <div class="col-md-6">
                               <label class="radio-inline"> <input id="unittime" type="radio" class="" name="unittime" value="Hours" {{ $rate->timeunit == 'Hours' ? 'checked' : '' }}>Hours</label>
                               <label class="radio-inline"><input id="unittime" type="radio" class="" name="unittime" value="Days" {{ $rate->timeunit == 'Days' ? 'checked' : '' }}>Days</label>
                               <label class="radio-inline"><input id="unittime" type="radio" class="" name="unittime" value="Weeks" {{ $rate->timeunit == 'Weeks' ? 'checked' : '' }}>Weeks</label>
                               <label class="radio-inline"><input id="unittime" type="radio" class="" name="unittime" value="Months" {{ $rate->timeunit == 'Months' ? 'checked' : '' }}>Months</label>
 
                                @if ($errors->has('unittime'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('unittime') }}</strong>
                                    </span>
                                    @endif
                           </div>
                        </div>


                       <div class="form-group{{ $errors->has('timeline') ? ' has-error' : '' }}">
                            <label for="timeline" class="col-md-4 control-label">Timeline</label>

                            <div class="col-md-6">
                                <select id="" class="form-control" name="timeline" required autofocus>
                                  <option value="{{ $rate->timeline }}">{{ $rate->timeline }}</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                  <option value="6">6</option>
                                  <option value="7">7</option>
                                  <option value="8">8</option>
                                  <option value="9">9</option>
                                  <option value="10">10</option>

                                 </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('hs') ? ' has-error' : '' }}">
                            <label for="hs" class="col-md-4 control-label">High School</label>

                            <div class="col-md-6">
                                <input id="hs" type="text" class="form-control" name="hs" value="{{ $rate->hs }}" placeholder="Rates in $(USD)" required autofocus>

                                @if ($errors->has('hs'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hs') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('ug') ? ' has-error' : '' }}">
                            <label for="ug" class="col-md-4 control-label">Undergraduate Degree</label>

                            <div class="col-md-6">
                                <input id="ug" type="text" class="form-control" name="ug" value="{{ $rate->ug }}" placeholder="Rates in $(USD)" required autofocus>

                                @if ($errors->has('ug'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ug') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       <div class="form-group{{ $errors->has('gm') ? ' has-error' : '' }}">
                            <label for="gm" class="col-md-4 control-label">Graduate Masters</label>

                            <div class="col-md-6">
                                <input id="gm" type="text" class="form-control" name="gm" value="{{ $rate->gm }}" placeholder="Rates in $(USD)" required>

                                @if ($errors->has('gm'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gm') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gd') ? ' has-error' : '' }}">
                            <label for="gd" class="col-md-4 control-label">Graduate Doctorate</label>

                            <div class="col-md-6">
                                <input id="gd" type="text" class="form-control" name="gd" value="{{ $rate->gd }}" placeholder="Rates in $(USD)">

                                @if ($errors->has('gd'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gd') }}</strong>
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
