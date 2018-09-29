
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Start-Up</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.9/css/mdb.min.css" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style> 
        html, body {
                background-color: #f7f7f7;
                color: #636b6f;
                font-family: 'Questrial', sans-serif;
                font-weight: 100;
                min-height: 100% !important;
                
            }

        .footer{
           
            /*width: 0%;*/
            bottom:0px;
            background-color: #000d1a;
        }
        
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel navbar-dark " style="background-color:#3367D6;" >
            <div class="container">
                
                <a class="navbar-brand" href="#">
                    Start-Up
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                     <i class="fa fa-bell"><span class="badge badge-light">{{ auth()->user()->unreadNotifications->count() }}</span></i>
                                </a>
                                @if(auth()->user()->notifications->count() === 0)
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">
                                        All caught up! 
                                    </a>
                                </div>
                                @else
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(auth()->user()->unreadNotifications->count() > 0)
                                    <h6>Unread Notification</h6>
                                    <a href="{{ route('markAllAsRead') }}" style="color: green !important">Mark all as Read</a>
                                    <hr> 
                                    @foreach(auth()->user()->unreadNotifications as $notification)
                                    <a class="dropdown-item" href="#">
                                        {{ $notification->data['data'] }}
                                    </a>
                                    @endforeach
                                    @endif
                                    @if(auth()->user()->readNotifications->count() > 0)
                                    <hr>
                                    <a href="" style="text-decoration: none;"><strong>Read Notifications</strong></a>
                                    <hr>
                                    @foreach(auth()->user()->readNotifications as $notification)
                                    <a class="dropdown-item" href="#">
                                        {{ $notification->data['data'] }}
                                    </a>
                                    @endforeach
                                    @endif
                                </div>
                                @endif
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <a class="dropdown-item" href="/changePassword">
                                        Change Password
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

       
<!-- 
        <footer class="footer">
            <div class="footer-copyright text-center py-3" style="color:white;"><strong>© 2018 A & A Team</strong></div>
        </footer> -->
    </div>
    {{-- <div class="container">
            <main class="py-4 row ">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                           <strong>User-Control</strong>
                        </div>
                        <div class="list-group">
                            <a href="{{url('/home')}}" class="list-group-item list-group-item-action" >Dashboard</a>
                            <a href="{{url('user/file')}}" class="list-group-item list-group-item-action">Files Management</a>
                            <a href="{{url('user/projects')}}" class="list-group-item list-group-item-action">Project Management</a>
                            <a href="{{url('user/profile')}}" class="list-group-item list-group-item-action">Profile</a>
                        </div>
                    </div>
                </div>
                    <div class="col-md-9">
                            @yield('content')
                    </div>
                </main>
    </div> --}}
    <script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
    <script >

        $(document).ready(function () {
        toggleFields(); 
        $("#userRole").change(function () {
            toggleFields();
        });

    });
        
        function toggleFields() {
            if ($("#userRole").val() == "user");
                $("#companyTable").show();
            else
                 $("#companyTable").hide();
            }    
    </script>
    <script>
     <div class="control-group" id="fields">
            <label class="control-label" for="field1">Nice Multiple Form Fields</label>
            <div class="controls" id="profs"> 
                <form class="input-append">
                    <div id="field"><input autocomplete="off" class="input" id="field1" name="prof1" type="text" placeholder="Type something" data-items="8"/><button id="b1" class="btn add-more" type="button">+</button></div>
                </form>
            <br>
            <small>Press + to add another form field :)</small>
            </div>
        </div>
    </script>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/todc-bootstrap/3.3.7-3.3.13/js/bootstrap.min.js"></script>
    
    
</body>
</html>
