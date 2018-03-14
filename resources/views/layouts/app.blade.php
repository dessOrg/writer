<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
   <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
   <style>
    .chat {
    list-style: none;
    margin: 0;
    padding: 0;
  }

  .chat li {
    margin-bottom: 10px;
    padding-bottom: 5px;
    border-bottom: 1px dotted #B3A9A9;
  }

  .chat li .chat-body p {
    margin: 0;
    color: #777777;
  }

  .panel-body {
    overflow-y: scroll;
    height: 350px;
  }

  ::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
  }

  ::-webkit-scrollbar {
    width: 12px;
    background-color: #F5F5F5;
  }

  ::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
  }
   </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Versatile
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#howitworks">How It Works</a></li> 
                          <li><a href="#whyus">Why Us</a></li>
                           <li><a href="#contact">Contacts</a></li>                  
    <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}"><span class="btn btn-warning">Signin</span></a></li>
                            
                            @else
                                 <li><a href="{{ url('ad/chat') }}">Chat</a></li>
                               <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                           <span class="btn btn-warning"> Logout</span>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                            
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
<!-- jQuery -->
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

    <!-- Bootstrap JavaScript -->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.1/js/bootstrap.min.js"></script>

    <!-- toastr notifications -->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!-- icheck checkboxes -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>


    <!-- Delay table load until everything else is loaded -->
<script>
$(document).ready(function() {
    $('.calc').click(function (e) {
        e.preventDefault();
//        $('#def').hide();
        var category = $('#category').val();
        var level = $('#level').val();
        var timeline = $('#timeline').val();
        var pages = $('#pages').val();
       console.log(pages); 
        $.ajax({
            dataType: 'json',
            type: "POST",
            url: '/',
            data: {_token: '{{ csrf_token() }}',category: category, level: level,timeline: timeline,pages: pages},
            success: function( response ) {
               $("#ajaxResponse").html('$,'+ response.cost +'.00');
               $("#total").val(response.cost);
               $("#page").val(response.pages);
               $("#rate_id").val(response.rate_id); 
                console.log(response);
            },
            error: function() {
                console.log("erro");
            }
        });
    });

    $('#sendform').click(function (e) {
        e.preventDefault();
//        $('#def').hide();
        var pages = $('#page').val();
        var cost = $('#total').val();
        var rate_id = $('#rate_id').val();
    
       console.log(pages); 
        $.ajax({
            dataType: 'json',
            type: "POST",
            url: '/sendform',
            data: {_token: '{{ csrf_token() }}',pages: pages, cost: cost,rate_id: rate_id},
            success: function( response ) {
              // $("#ajaxResponse").html('$,'+ response +'.00');
                location.href = 'client/project/create'+response;      
                console.log(response);
            },
            error: function() {
                console.log("erro");
            }
        });
    });


});
// handle links with @href started with '#' only
$(document).on('click', 'a[href^="#"]', function(e) {
    // target element id
    var id = $(this).attr('href');

    // target element
    var $id = $(id);
    if ($id.length === 0) {
        return;
    }

    // prevent standard hash navigation (avoid blinking in IE)
    e.preventDefault();

    // top position relative to the document
    var pos = $id.offset().top;

    // animated top scrolling
    $('body, html').animate({scrollTop: pos});
});
</script>

</body>
</html>
