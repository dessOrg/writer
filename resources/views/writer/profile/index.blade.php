@extends('writer.layout')

@section('content');

<div class="container-fluid">
 <div class="row">
  <div class="col-md-offset-1 col-md-8 col-xs-12">
    <div class="profile-body text-center" style="border-style:inset;background-color:#fff;padding:10px;">
      
       <div class="profile-photo">
        <img src="/adminlte/img/user2-160x160.jpg" class="user-image" alt="User Image">
         
        <div> <span class=""><a href="{{ url('/writer/profile/edit').Auth::user()->id }}"><strong><i class="fa fa-pencil"></i>Profile</strong></a></span></div>
       </div>
      
      
       <div class="user-details">
        <h2 style="margin-bottom:1px;margin-top:1px;">{{ Auth::user()->fname }} {{ Auth::user()->lname }}</h2>
        <h3 style="margin-bottom:1px;margin-top:1px;">Online Writer</h3>
        <h4 style="margin-bottom:1px;margin-top:1px;">@<strong>{{ Auth::user()->username }}</strong></h4>
       </div>

      
       <div class="personal-statement" style="border-top:ridge; padding-top:1px;">
        <div class="col-md-12">
         <span class="pull-left" style="margin-top:-2px;"><h3>Bio</h3></span>
         <span class="pull-right"><h3><a href="{{ url('/writer/profile/edit').Auth::user()->id }}"><i class="fa fa-edit"></i></a></h3></span>
        </div>
          @if(is_null($user))
          <p>Update</p>
          @else
          <p>{{ $user->bio }}</p>
          @endif
       </div>
           
    </div>

    <div class="skill-section text-center" style="margin-top:5px; padding:5px; border-style:ridge; border-color:#fff; background-color:#fff;">
    <div class="col-md-12">  
     <span class="pull-left"> <h3 style="text-align:left">Skills </h3> </span>
     <span class="pull-right" style="margin-top:10px;"><a href="{{ url('/writer/profile/edit').Auth::user()->id }}"><i class="fa fa-plus"></i></a></span>
    
    </div>

        <div class="skill" style="margin-top:20px;text-align:left;">
         @if($skills != "0")
           @foreach($skills as $key)
         <span style="background-color:#757575;color:#fff; padding:5px;">{{ $key->title }}</span>
           @endforeach
         @else
           <p>Update your skills</p>
         @endif
        </div>
       </div>
    
       <div class="portfolio" style="margin-top:5px; padding:5px; border-style:ridge; border-color:#fff;background-color:#fff;">
        <div class="col-md-12 col-xs-12">
         <span class="pull-left"><h3>Finished Projects</h3></span>
        </div>

        <div class="port-cont" style="margin-top:3px;">
         <div class="">

          <div class="" style="display:inline-block; width:25vw;padding-left:5px;border-right:inset;">
           <h5><strong>Project Title</strong></h5>
           <span><i class="fa fa-calendar"></i>Feb,25,2018</span>
          </div>
          <div class="" style="display:inline-block">
           <span><i class="fa fa-star"></i></span>
           <span><i class="fa fa-star"></i></span>
           <span><i class="fa fa-star"></i></span>
           <span><i class="fa fa-star"></i></span>
           <span><i class="fa fa-star"></i></span>
          </div>
          <div style="display:inline-block; padding:5px;">
           <i class="fa fa-eye"></i>
          </div>

         </div>
        </div>

       </div>

  </div>
</div>
</div>

@endsection
