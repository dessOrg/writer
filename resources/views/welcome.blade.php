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
                         <div class="col-md-4">
                          <label class="form-label">Pages</label>
                        </div> 
                         <div class="col-md-6">
                        <input id="pages" type="number" class="form-control calc" name="pages" placeholder="1" value="1">
                          <!--  <select id="pages" class="form-control calc" name="pages">
                             <option value="1">1 Page</option>
                             <option value="2">2 Pages</option>
                             <option value="3">3 Pages</option>
                             <option value="4">4 Pages</option>
                             <option value="5">5 Pages</option>
                           </select>-->
            
                         </div>
                      
                       </div>
                     </form>
                       <div class="text-center" style="background-color:#fff">
                        
                        <!-- <span id="def" class="btn btn-warning">$0.00</span> -->
                         <!-- <input id="cost" class="form-control" style="width:80px;" type="text" placeholder="$0.00" disabled> -->
                         <span id="ajaxResponse" class="">$0.00</span> 
                        <span><a href="{{ url('client/order/create')}}"> <button id="" class="btn btn-warning" style="margin:10px;" >Proceed</button></a></span>
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

<div class="howitworks" id="howitworks">
 <div class="container-fluid">
 <div class="row">
   <div class="col-md-12 text-center">
     <h2 class="how-header">How It Works</h2>
    <div class="seperator_wraper">
      <i class="fa fa-star star"></i>
    </div>
    
   <div class="row how-content">
    <div class="col-md-3 col-xs-12 how-item">
     <div class="how-inside">
      <h3>Step 1</h3>
      <div class="how-img">
       <img src="/images/icons/register.png">       
      </div>
      <div class="how-desc">
        <h4>Create a free account on our platform. </h4>
      </div>
     </div>
    </div>
    <div class="col-md-3 col-xs-12 service-item text-center">
     <div class="how-inside">
      <h3>Step 2</h3>
      <div class="how-img">
        <img src="/images/icons/order.png">
      </div>
      <div class="how-desc">
        <h4>Create an order from our lower rates , add instructions and submit.</h4>
      </div>
     </div>
    </div>
    <div class="col-md-3 col-xs-12 service-item">
     <div class="how-inside">
      <h3>Step 3</h3>
      <div class="how-img">
        <img src="/images/icons/wallet.png" class=""> 
      </div>
      <div class="how-desc">
        <h4>Pay for the order via paypal and publish your order.</h4>
      </div>
     </div>
    </div>
    <div class="col-md-3 col-xs-12 service-item">
     <div class="how-inside ">
      <h3>Step 4</h3>
      <div class="how-img">
        <img src="/images/icons/complete.png" class="">
      </div>
      <div class="how-desc">
       <h4>Hire the best writer who appeals to you.</h4>
      </div>
     </div>
    </div>
   </div>

   <div class="row">
    <div class="col-md-12 text-center how-btn">
     <span> <a href="{{ url('/writer/order/create') }}"><button class="btn btn-success">Order Now</button></a></span>
    </div>
   </div>

   </div>
 </div>
 </div>
</div>

<div class="whyus" id="whyus">
 <div class="container">
  <div class="row">
   <div class="col-md-offset-2 col-md-8">
     <div class="text-center">
       <h2 class="whyus-header">Why Choose Us?</h2>
     <div class="seperator_wraper">
      <i class="fa fa-star star"></i>
    </div>
 </div>

  <div class="whybody">
    <div class="row">

   <div class="whystrip">
    <div class="col-md-6 col-xs-8">
     <div class="why-cont">
      <h3>24/7 SUPPORT</h3>
      <h4>We're always here to help you solve any possible issue. Feel free to give us a call or write a message in chat.</h4>
     </div>
    </div>
    <div class="col-md-6 col-xs-4">
     <div class="why-img">
       <img src="/images/icons/support.png">
     </div>
    </div>
  </div>

 <div class="whystrip">
   <div class="col-md-6 col-xs-4">
     <div class="why-img">
       <img src="images/icons/quality.jpeg" class="pull-right">
     </div>
    </div>
    <div class="col-md-6 col-xs-8">
     <div class="why-cont">
      <h3>QUALITY</h3>
      <h4>As soon as we have completed your work, it will be proofread and given a thorough scan for plagiarism.</h4>
     </div>
    </div>
 </div>

  <div class="whystrip"> 
    <div class="col-md-6 col-xs-8">
     <div class="why-cont">
      <h3>DELIVERY ON TIME</h3>
      <h4>We will complete your paper on time, giving you total peace of mind with every assignment you entrust us with.</h4>
     </div>
    </div>
    <div class="col-md-6 col-xs-4">
     <div class="why-img">
       <img src="/images/icons/time.png">
     </div>
    </div>
</div>

 <div class="whystrip">
   <div class="col-md-6 col-xs-4">
     <div class="why-img">
       <img src="/images/icons/privacy.png" class="pull-right">
     </div>
    </div>
    <div class="col-md-6 col-xs-8">
     <div class="why-cont">
      <h3>STRICT PRIVACY</h3>
      <h4>Our clients' personal information is kept confidential, so rest assured that no one will find out about our cooperation.</h4>
     </div>
    </div>
 </div>

  </div>
 </div>

    </div>
  </div>
 </div>
</div>

<div class="write"></div>

<!--
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
-->

<div class="contact" id="contact">
 <div class="container-fluid">
 <div class="row">
   <div class="col-md-12 text-center">
     <h2 class="cont-header">Contact Us</h2>
    <div class="seperator_wraper">
      <i class="fa fa-star star"></i>
    </div>

    <div class="col-md-offset-3 col-md-6 col-xs-12">

      <h4 style="padding-top:20px; margin:20px;">Do you have any issue , concern or question? Drop us an email and our support team will get back to you in a moment.</h4>
    </div>

     <div class="form">
      <div class="col-md-offset-3 col-md-6 col-xs-12">
@if(Session::has('alert'))

<div class="alert alert-success">

    {{ Session::get('alert') }}

    @php

    Session::forget('alert');

    @endphp

</div>

@endif
                     @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('warning'))
                        <div class="alert alert-warning">
                            {{ session('warning') }}
                        </div>
                    @endif  
                     <form class="form-horizontal" method="POST" action="{{ url('contact/us') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            
                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Full Name" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            
                            <div class="col-md-6 col-xs-12">
                                <input id="email" type="email" class="form-control" name="email" placeholder="Email Address" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        
                            <div class="col-md-6 col-xs-12">
                     
                                        <input type="text" class="form-control" name="phone" placeholder="Mobile No" required> 
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                            
                             <textarea type="text" class="form-control" name="message" rows="5"  required></textarea> 
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                                <button type="submit" class="btn btn-default">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
 
      </div>

     </div>

  </div>
  </div>
 </div>
</div>

</div>
@endsection
