@extends('layouts.app')

@section('content')
<div class="welcome" style="">
 <div class="container-fluid" style="">

    <div class="row">
        <div class="col-md-12 col-xs-12">
           <div class="" style="margin-top:5vh;height:80vh;">
             <div class="col-md-8 col-xs-12">
               <div class="col-md-12 hidden-sm hidden-xs">
                <div style="height:40px;"></div>
               </div>
               <div class="col-md-offset-1 col-md-7 col-xs-12">
               <h3>WELCOME TO VARSATILE</h3>
               <p>We offer a variety of academic services, ranging from essay writing, proofreading, powerpoint designs to Editing.</p>
                <div style="padding-top:2vh;padding-bottom:1vh;">
                  <span><a href="#"><button class="btn btn-warning">Make An Order</button></a></span>
                </div>
              </div>
            </div>
             <div class="col-md-3 col-xs-12">
                <div class="calculator" style="background-color:#fff;color:#546582;">

                  <div class="" style="padding-top:1px;padding-left:2px;"> <h3 class="text-center">Calculate</h3></div>
                 <div style="padding:5px 10px 10px 10px;">
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
                     </form>
                       <div class="center" style="background-color:#fff">
                        
                        <!-- <span id="def" class="btn btn-warning">$0.00</span> -->
                         <!-- <input id="cost" class="form-control" style="width:80px;" type="text" placeholder="$0.00" disabled> -->
                         <span id="ajaxResponse" class="">$0.00</span> 
                        <span><a href="url('client/order/create')"> <button id="" class="btn btn-warning" style="margin:10px;" >Proceed</button></a></span>
                        <!-- <span id="sendform" class="btn btn-default">Proceed</span> -->
                        </div>
                       </div>
 

               <div class="test">
 
               </div>
             </div>
            </div>
            </div>
           </div>
       </div>
    </div>
 </div>

<div class="services">
 <div class="container-fluid">
 <div class="row">
   <div class="col-md-12 text-center">
     <h2 class="how-header">What We Do</h2>
    <div class="seperator_wraper">
      <i class="fa fa-star star"></i>
    </div>
    
   <div class="row">
    <div class="col-md-4 service-item">
     <div class="service-inside">
      <h3>Header 1</h3>
      <div class="service-img">
       
      </div>
      <div class="service-desc">

      </div>
     </div>
    </div>
    <div class="col-md-4 service-item">
     <div class="service-inside">
      <h3>Header 2</h3>
      <div class="service-img">
       
      </div>
      <div class="service-desc">

      </div>
     </div>
    </div>
    <div class="col-md-4 service-item">
     <div class="service-inside">
      <h3>Header 3</h3>
      <div class="service-img">
       
      </div>
      <div class="service-desc">

      </div>
     </div>
    </div>
   </div>
   </div>
 </div>
 </div>
</div>

<div class="howitworks">
 <div class="container-fluid">
 <div class="row">
   <div class="col-md-12 text-center">
     <h2 class="how-header">How It Works</h2>
    <div class="seperator_wraper">
      <i class="fa fa-star star"></i>
    </div>
    
   <div class="row">
    <div class="col-md-3 col-xs-12 how-item">
     <div class="how-inside">
      <h3>Step 1</h3>
      <div class="how-img">
       
      </div>
      <div class="how-desc">
        Create a free account on a platform. 
      </div>
     </div>
    </div>
    <div class="col-md-3 col-xs-12 service-item">
     <div class="how-inside">
      <h3>Step 2</h3>
      <div class="how-img">
        
      </div>
      <div class="how-desc">
        <p>Create an order with simple steps</p>
      </div>
     </div>
    </div>
    <div class="col-md-3 col-xs-12 service-item">
     <div class="how-inside">
      <h3>Step 2</h3>
      <div class="how-img">
         <i class="fa fa-pencil"><i>
      </div>
      <div class="how-desc">
        <p>Pay for the order via paypal and publish your order.</p>
      </div>
     </div>
    </div>
    <div class="col-md-3 col-xs-12 service-item">
     <div class="how-inside">
      <h3>Step 3</h3>
      <div class="how-img">
        <i class="fa fa-star"></i>       
      </div>
      <div class="how-desc">
       <p>Hire the writer who appeals to you.</p>
      </div>
     </div>
    </div>
   </div>
   </div>
 </div>
 </div>
</div>

</div>
@endsection
