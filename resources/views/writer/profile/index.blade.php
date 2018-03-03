@extends('writer.layout')

@section('content');

<div class="container-fluid">
 <div class="row">
  <div class="col-md-offset-1 col-md-8 col-xs-12">
    <div class="profile-body text-center" style="border-style:inset;background-color:#fff;padding:10px;">
      
       <div class="profile-photo">
        <img src="/adminlte/img/user2-160x160.jpg" class="user-image" alt="User Image">
         <div style="padding:4px;"><button class="btn btn-default">Update </button> </div>
       </div>
      
      
       <div class="user-details">
        <h2>{{ Auth::user()->fname }} {{ Auth::user()->lname }}</h2>
        <h3>Online Writer</h3>
        <h4>@<strong>{{ Auth::user()->username }}</strong></h4>
       </div>

<hr>
      
       <div class="personal-statement">
         <p>About me</p>
       </div>
           
    </div>

    <div class="skill-section text-center" style="margin-top:5px; padding:5px; baorder-style:ridge; border-color:#fff; background-color:#fff;">
    <div class="col-md-12">  
    <div class="col-md-6">
      <h3 style="text-align:left">Skills </h3>
     </div>
     <div class="col-md-6">
      <span style="margin-top:10px;"><i class="fa fa-plus"></i></span>
      
     </div>
    </div>
<br>
    <hr>
      
        <div class="skill" style="margin-top:20px;">
         <span style="background-color:gray; padding:3px;">Essay Writer<a href="#"><i class="fa fa-remove" style="background-color:white;"></i></a></span>
        </div>
       </div>
    
    
  </div>
</div>
</div>

@endsection
