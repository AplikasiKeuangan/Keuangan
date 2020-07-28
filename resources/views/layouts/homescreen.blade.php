<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from tutorio-dark.frontendmatter.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jul 2020 23:45:19 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>An-Nahl</title>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">

    <!-- Perfect Scrollbar -->
    <link type="text/css" href="{{ asset('home/assets/vendor/perfect-scrollbar.css')}}" rel="stylesheet">

    <!-- Fix Footer CSS -->
    <link type="text/css" href="{{ asset('home/assets/vendor/fix-footer.css')}}" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="{{ asset('home/assets/css/material-icons.css')}}" rel="stylesheet">
    <link type="text/css" href="{{ asset('home/assets/css/material-icons.rtl.css')}}" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link type="text/css" href="{{ asset('home/assets/css/fontawesome.css')}}" rel="stylesheet">
    <link type="text/css" href="{{ asset('home/assets/css/fontawesome.rtl.css')}}" rel="stylesheet">

    <!-- Preloader -->
    <link type="text/css" href="{{ asset('home/assets/css/preloader.css')}}" rel="stylesheet">
    <link type="text/css" href="{{ asset('home/assets/css/preloader.rtl.css')}}" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="{{ asset('home/assets/css/app.css')}}" rel="stylesheet">
    <link type="text/css" href="{{ asset('home/assets/css/app.rtl.css')}}" rel="stylesheet">
    <style>
        .responsive-map-container {
        position: relative;
        padding-bottom: 56.25%;
        padding-top: 30px;
        height: 0;
        overflow: hidden;
    }

    .responsive-map-container iframe,   
    .responsive-map-container object,  
    .responsive-map-container embed {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
    </style>




</head>

<body class="layout-navbar-mini-fixed-bottom">

































    <div class="preloader">
        <div class="sk-double-bounce">
            <div class="sk-child sk-double-bounce1"></div>
            <div class="sk-child sk-double-bounce2"></div>
        </div>
    </div>

    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">

        <!-- Header -->

        <div class="navbar navbar-expand-sm navbar-mini navbar-dark fixed-bottom bg-dark d-none d-md-flex p-0" id="demo-navbar">
            <div class="container-fluid">
    
                <!-- Main Navigation -->
                <ul class="nav navbar-nav flex-nowrap">
                    <li class="nav-item dropup active">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Kesiswaan</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item active" href="/">Dashboard</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="library.html">Library</a>
                            
                        </div>
                    </li>
                    <li class="nav-item dropup">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Tentang Developer</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="student-dashboard.html">Biodata</a>
                            
                        </div>
                    </li>
                    
                </ul>
                <!-- // END Main Navigation -->
    
            </div>
        </div>
        <div id="header" class="mdk-header bg-dark js-mdk-header mb-0" data-effects="waterfall blend-background" data-fixed data-condenses>
            <div class="mdk-header__content">

                <div class="navbar navbar-expand-sm navbar-dark bg-dark pr-0 pr-md-16pt" id="default-navbar" data-primary>

                    <!-- Navbar toggler -->
                    <button class="navbar-toggler navbar-toggler-right d-block d-md-none" type="button" data-toggle="sidebar">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Navbar Brand -->
                    <a href="/" class="navbar-brand">
                    <img class="navbar-brand-icon mr-0 mr-md-8pt" src="{{asset('home/assets/images/logo/logo1.png')}}" width="30">
                        <span class="d-none d-md-block">SMP IT An-Nahl</span>
                    </a>

                   

                    <!-- Main Navigation -->

                    
                    <ul class="nav navbar-nav ml-auto flex-nowrap" style="white-space: nowrap;">
                        <li class="ml-16pt nav-item">

                            @if (Route::has('login'))
                            <div class="top-right links">
                                @auth
                                    <a href="{{ url('/home') }}">Home</a>
                                @else
                                    <a href="{{route('login')}}" class="nav-link">
                                        <i class="material-icons">lock_open</i>
                                        <span class="sr-only">Login</span>
                                    </a>
                                @endauth
                            </div>
                        @endif
                            
                        </li>
                        
                    </ul>


                    <!-- // END Main Navigation -->

                </div>

            </div>
        </div>

        <!-- // END Header -->

        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content page-content ">



            @yield('content')

    <!-- jQuery -->
    <script src="{{ asset('home/assets/vendor/jquery.min.js')}}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('home/assets/vendor/popper.min.js')}}"></script>
    <script src="{{ asset('home/assets/vendor/bootstrap.min.js')}}"></script>

    <!-- Perfect Scrollbar -->
    <script src="{{ asset('home/assets/vendor/perfect-scrollbar.min.js')}}"></script>

    <!-- DOM Factory -->
    <script src="{{ asset('home/assets/vendor/dom-factory.js')}}"></script>

    <!-- MDK -->
    <script src="{{ asset('home/assets/vendor/material-design-kit.js')}}"></script>

    <!-- Fix Footer -->
    <script src="{{ asset('home/assets/vendor/fix-footer.js')}}"></script>

    <!-- Chart.js -->
    <script src="{{ asset('home/assets/vendor/Chart.min.js')}}"></script>

    <!-- App JS -->
    <script src="{{ asset('home/assets/js/app.js')}}"></script>

    <!-- Highlight.js -->
    <script src="{{ asset('home/assets/js/hljs.js')}}"></script>

    <!-- App Settings (safe to remove) -->
    <script src="{{ asset('home/assets/js/app-settings.js')}}"></script>




</body>


<!-- Mirrored from tutorio-dark.frontendmatter.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jul 2020 23:47:54 GMT -->
</html>