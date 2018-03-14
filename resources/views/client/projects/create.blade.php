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
                        <p class="error text-center alert alert-danger hidden"></p>
                   <div >
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('client/project/first') }}">
                        {{ csrf_field() }}

                                        
                     <div class="form-group">
                            <div class="col-md-12">
                                <select id="category" class="form-control calc" name="category" required autofocus>                       
                                 <option value="">Select Category</option>
                                 <option value="Writing">Writing</option>
                                  <option value="Rewriting">Rewriting</option>
                                  <option value="Editing">Editing $ Proofreading</option>
                                  <option value="Translating">Translation</option>
                                  <option value="Polishing">Polishing & Enhancement</option>
                                  <option value="Powerpoint">Power-Point Designs(Slides)</option>
                                 </select>
 
                         </div>
                      </div>
                      <div class="form-group">

                          <div class="col-md-12">
                                <select id="level" class="form-control calc" name="level" required autofocus>
                                  <option value="High School">High School</option>
                                  <option value="Undergraduate">Undergraduate</option>
                                  <option value="Graduate Masters">Masters</option>
                                  <option value="Graduate Doctorate">Phd's</option>
                                </select> 
                          </div>
                        </div> 
                        <div class="form-group">
                            
                             <div class="col-md-12">
                                <select id="timeline" class="form-control calc" name="timeline" required autofocus>
                                 
                                  <option value="2 Hours">2 Hours</option>
                                  <option value="6 Hours">6 Hours</option>
                                
                                  <option value="1 Day">1 Day</option>
                                  <option value="2 Days">2 Days</option>
                             

                                 </select>
                            </div>
                        </div>
                        <div class="form-group">
                     
                         <div class="col-md-12">
                         <!-- <input type="text" class="form-control calc" name="pages"> -->
                            <select id="pages" class="form-control calc" name="pages">
                             <option value="1">1 Page</option>
                             <option value="2">2 Pages</option>
                             <option value="3">3 Pages</option>
                             <option value="4">4 Pages</option>
                             <option value="5">5 Pages</option>
                           </select>

                      <input id="total" name="total" type="hidden" value="">
                      <input id="rate_id" name="rate_id" type="hidden" value="">
                      <input id="project_id" name="project_id" type="hidden" value="0">
                         </div>
                      
                       </div>

                       <div class="center" style="background-color:#fff">
                        
                        <!-- <span id="def" class="btn btn-warning">$0.00</span> -->
                         <!-- <input id="cost" class="form-control" style="width:80px;" type="text" placeholder="$0.00" disabled> -->
                         <span id="ajaxResponse" class="">$0.00</span> 
                       <!-- <span id="sendform" class="btn btn-default">Proceed</span> -->
                        </div>
                          
                    
                    </form>
                 </div>

                </div>
               <div class="panel-footer text-center" >
                 
                      <span id="sendform" class="btn btn-success " style="" >Submit </span>        
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

        <p class="error2 text-center alert alert-danger hidden"></p>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('client/project/middle') }}">
                        {{ csrf_field() }}

                     
                       <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-2 control-label">Project Title</label>

                            <div class="col-md-8">
                                <input id="title" type="text" class="form-control" name="title" value="" placeholder="Title">
  <input id="project_id_m" type="hidden" class="form-control" name="project_id_m" value="">
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
                                <select id="topic" class="form-control" name="topic" required>
                                  
                                  @foreach($topics as $key)
                                    <option value="{{ $key->title }}">{{$key->title }}</option>
                                  @endforeach
                                </select>                        
                              </div>
                          </div>

                          <div class="form-group">
                             <label for="description" class="col-md-2 control-label .required" >Instructions</label>
                            <div class="col-md-8">
                              <textarea id="description" type="text" rows="5" class="form-control">
                                
                             </textarea>
                            </div>
                           </div>

                          <div class="form-group">

                            <div class="col-md-offset-5 col-md-2 ">
                                                      </div>
                        </div>
                    </form>
                </div>
               <div class="panel-footer text-center">
                  <span class="" ><a href="#" class="prev"><button class="btn-success">Previous</button></a></span>
                   <span class=""><button id="projectmiddle" class="btn btn-success">Next Step </button></span>

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
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('client/project/docupload') }}">
                        {{ csrf_field() }}

                     
                       <div class="form-group{{ $errors->has('document') ? ' has-error' : '' }}">
                            <label for="document" class="col-md-2 control-label">Document File</label>

                            <div class="col-md-8">
                                <input id="document" type="file" class="form-control" name="document" >
 <input id="project_id_f" type="hidden" class="form-control" name="project_id_f" value="">
                                
                            </div>
                         </div>
                         
                        <div id="docpreview"></div>
                        <div class="form-group">
                             <div class="col-md-offset-5 col-md-2 ">
                                <button id="docupload" class="btn btn-primary">
                                    Upload
                                </button>
                            </div>
                         
                        </div>  

                      </form>

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('client/project/finnal') }}">
                        {{ csrf_field() }}


                         <div class="form-group">
                              <label for="video" class="col-md-2 control-label" >Link To Video</label>

                              <div class="col-md-8">
                                 <input id="video" type="text" class="form-control" name="video" value="" >
                                 
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

                <div class="text-center" style="padding-top:10px;">
                  <h3><strong>Your Order Summary</strong></h3>
                  <p>Pages: <strong><span class="pages"></span></strong></p>
                   <h4>Grand Total= <strong>$<span class="total"></span></stropng></h4>
                </div>
                </div>
                <div class="panel-footer text-center">
                  <span class="" style="margin:4px;"><a href="#" class="next"><button class="btn btn-success">Previous</button></a></span>
                  <span class="" id="orderlink" style="margin:4px;"><button class="btn btn-success order">Procee And Order</button></span>

                 <!--  <span style="margin:4px;"><a href="#" class="form3"><button class="btn btn-warning">Next<i class="fa fa-arrow"></i></button></a></span>-->
                
                </div>
              </div>



            </div>
        </div>

   <div class="row view">
        <div class="col-md-8 col-md-offset-2">
         <div class="panel panel-default">
            <div class="panel-heading">Order Preview</div>
                <div class="panel-body">

                 <div style="">
                   <h3><strong>Title: </strong></h3>
                   <h3><strong>Topic: </strong></h3>
                   <h3><strong>Category: </strong></h3>
                   <h3><strong>Level: </strong></h3>
                   <h3><strong>Timeline: </strong></h3>
                   <h3><strong>Cost: </strong>$.</h3>
                    
                 </div>
                   <hr>
                 <div style="">
                   <span ><h3><strong>Description: </strong></span>
                   <span><p></p>
                 </div>                   
                  <hr>
                 <div style="">
                   
                 </div>
                
                </div>
                <div class="panel-footer text-center">
                  <span style="margin:4px;"><a href="#" class="next"><button class="btn-warning">Prev<i class="fa fa-arrow"></i></button></a></span>
                  <span style="margin:4px;"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#projectpreview" >Preview</button></span>
                  <span style="margin:4px;"><a href="{{ url('client/wallet/show') }}"><button class="btn btn-success">Order</button></a></span>
                 <!--  <span style="margin:4px;"><a href="#" class="form3"><button class="btn btn-warning">Next<i class="fa fa-arrow"></i></button></a></span>-->
                
                </div>
              </div>



            </div>
        </div>

    </div>
</div>



@endsection
