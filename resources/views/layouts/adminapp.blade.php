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
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        html, body {
                /* background-color: #f1f1f1; */
                background: linear-gradient(to bottom, #fff,#F09820);
                position: relative;
                background-repeat: repeat;
                background-size: cover;
                height : 100%;
                min-width: 100%;
                min-height: 100%;
              

                /* color: #636b6f; */
                font-family: 'Questrial', sans-serif;
                font-weight: 100;
                min-height: 100% !important;
                
            }

        .footer{
           
            /* width: 0%; */
            bottom:0px;
            background-color: #000d1a;
        }
        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            /* background-color: #fff; */
            background: linear-gradient(to bottom,#104878, #F09820);
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #fff;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #3367D6;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
            align-items: center;
        }

        #main {
            transition: margin-left .5s;
            
        }
        

        @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
        }
        .card { background-color:rgba(255,253,231,0.8) ; }
        .card-header, .card-footer { opacity: 5}

        table.table-bordered >tr> th{
         border:1px solid blue;
        }
        
    </style>
</head>
<body>
    <div id="main">
            <div id="app">
                    <nav class="navbar navbar-expand-md navbar-light navbar-laravel navbar-dark " style="background-color:#104878;" >
                        <div class="container-fluid">
                            
                            <a class="navbar-brand" href="#">
                                <div>
                                    <span style="font-size:20px;cursor:pointer" onclick="openNav()">&#9776;</span> <span style="font-size:20px;">  Start-Up</span>
                                </div>
                                
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
                                            <img src="{{ asset('/images/notification.png') }}" alt=""><span class="badge badge-light">{{ auth()->user()->unreadNotifications->count() }}</span>
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
                    <div id="mySidenav" class="sidenav"  >
                        <a  href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                        <a style="font-size:18px ;" href="{{ url('/admin') }}" > <span><img  src="{{ asset('/images/sidebar/home.png') }}" alt="image"></span> Home</a>
                        <a style="font-size:18px" href="{{url('/admin/manage-startup')}}" ><span><img  src="{{ asset('/images/sidebar/dashboard.png') }}" alt="image"></span> Dashboard</a> 
                        <a style="font-size:18px" href="{{ url('/admin/role')}}" ><span><img  src="{{ asset('/images/sidebar/role.png') }}" alt="image"></span>  Role</a>
                        <a style="font-size:18px" href="{{url('/admin/permission')}}"><span><img  src="{{ asset('/images/sidebar/permission.png') }}" alt="image"></span>  Permission</a>
                        <a style="font-size:18px" href="{{url('/admin/company')}}" ><span><img  src="{{ asset('/images/sidebar/startup.png') }}" alt="image"></span>  Company</a>
                        <a style="font-size:18px" href="{{url('/admin/user')}}" ><span><img  src="{{ asset('/images/sidebar/user.png') }}" alt="image"></span>  User</a>
                    </div>
                    <main class="py-4">
                        @yield('content')
                    </main>
                </div>
    </div>
    <script>
$(document).ready(function (e) {
     $("input#autosave").click(function (e) {
         $("#form").submit();
     });
});
</script>
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }
            
        function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";            }
    </script>
    {{-- ChartJS   --}}
    <script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
        <script>
                var myChart = document.getElementById('myChart').getContext('2d');
            
                // Global Options
                Chart.defaults.global.defaultFontFamily = 'Lato';
                Chart.defaults.global.defaultFontSize = 18;
                Chart.defaults.global.defaultFontColor = '#777';
            
                var massPopChart = new Chart(myChart, {
                  type:'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
                  data:{
                    labels:['Boston', 'Worcester', 'Springfield', 'Lowell', 'Cambridge', 'New Bedford'],
                    datasets:[{
                      label:'Population',
                      data:[
                        617594,
                        181045,
                        153060,
                        106519,
                        105162,
                        95072
                      ],
                      //backgroundColor:'green',
                      backgroundColor:[
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(255, 99, 132, 0.6)'
                      ],
                      borderWidth:1,
                      borderColor:'#777',
                      hoverBorderWidth:3,
                      hoverBorderColor:'#000'
                    }]
                  },
                //   options:{
                //     title:{
                //       display:true,
                //       text:'Largest Cities In Massachusetts',
                //       fontSize:25
                //     },
                //     legend:{
                //       display:true,
                //       position:'right',
                //       labels:{
                //         fontColor:'#000'
                //       }
                //     },
                //     layout:{
                //       padding:{
                //         left:50,
                //         right:0,
                //         bottom:0,
                //         top:0
                //       }
                //     },
                //     tooltips:{
                //       enabled:true
                //     }
                //   }
                });
              </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/todc-bootstrap/3.3.7-3.3.13/js/bootstrap.min.js"></script>
</body>
</html>
