@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
           <div class="text-center" style="margin-top:20vh;">
             <div class="col-md-6 col-xs-12">
               <h1>ONLINE WRITING PLATFORM</h2>
             </div>
             <div class="col-md-6 col-xs-12">
                <div class="calculator" style="background-color:#fff;padding:10px;">

                  <div style=""> <h3>Calculate</h3></div>
                  <form class="form-horizontal" role="form" action="{{ url('/') }}" method="POST" >

                     

<div class="form-group">
                                                <div class="col-md-12">

                                <select id="category" class="form-control calc" name="category" required autofocus>
                                 
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
                         </div>



                         
                       </div>
                       <div id="form-group">
                         <div class="col-md-offset-4 col-md-2">
                        <!-- <span id="def" class="btn btn-warning">$0.00</span> -->
                         <!-- <input id="cost" class="form-control" style="width:80px;" type="text" placeholder="$0.00" disabled> -->
                         <span id="ajaxResponse" class="">$0.00</span> 
                        <!-- <span id="sendform" class="btn btn-default">Proceed</span> -->
                        </div>
                       </div>
                 
                    </form>
               

                 <form class="form-horizontal" action="{{ url('/sendform') }}" method="POST" >
                   {{ csrf_field() }}
                    
                   <div id="form-group">
                    <input class="form-control" type="hidden" id="rate_id" name="rate_id">
                    <input class="form-control" type="hidden" id="total" name="cost">
                    <input class="form-control" type="hidden" id="page" name="pages">    
                  </div>
                   <div class="form-group">
                     <div class="col-md-offset-3 col-md-4">
                        <button id="sendform" class="btn btn-warning" style="margin:10px;" type="submit">Proceed</button>
                     </div>
                   </div>
 
                 </form>

               <div class="test">
 
               </div>
             </div>
            </div>
           </div>
       </div>
    </div>
</div>
@endsection
