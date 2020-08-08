<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from tutorio-dark.frontendmatter.com/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jul 2020 23:49:27 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('template/dist/img/logo1.png')}}" />
    <title>SMP IT AN NAHL - Login</title>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">

    <!-- Perfect Scrollbar -->
    <link type="text/css" href="{{ asset ('home/assets/vendor/perfect-scrollbar.css')}}" rel="stylesheet">

    <!-- Fix Footer CSS -->
    <link type="text/css" href="{{ asset ('home/assets/vendor/fix-footer.css')}}" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="{{ asset ('home/assets/css/material-icons.css')}}" rel="stylesheet">
    <link type="text/css" href="{{ asset ('home/assets/css/material-icons.rtl.css')}}" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link type="text/css" href="{{ asset ('home/assets/css/fontawesome.css')}}" rel="stylesheet">
    <link type="text/css" href="{{ asset ('home/assets/css/fontawesome.rtl.css')}}" rel="stylesheet">

    <!-- Preloader -->
    <link type="text/css" href="{{ asset ('home/assets/css/preloader.css')}}" rel="stylesheet">
    <link type="text/css" href="{{ asset ('home/assets/css/preloader.rtl.css')}}" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="{{ asset ('home/assets/css/app.css')}}" rel="stylesheet">
    <link type="text/css" href="{{ asset ('home/assets/css/app.rtl.css')}}" rel="stylesheet">





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

        <div id="header" class="mdk-header bg-dark js-mdk-header mb-0" data-effects="waterfall blend-background" data-fixed data-condenses>
            <div class="mdk-header__content">

                <div data-primary class="navbar navbar-expand-sm navbar-dark bg-dark p-0" id="default-navbar">
                    <div class="container">

                        <!-- Navbar Brand -->
                        <a href="/" class="sidebar-brand">
                            <img class="sidebar-brand-icon" src="{{ asset('home/assets/images/logo/logo1.png')}}" width="30" alt="SMP IT An-Nahl">
                            <span>SMP IT AN NAHL</span>
                        </a>

                        <!-- Main Navigation -->
                        <ul class="nav navbar-nav ml-auto d-none d-sm-flex">
                            <li class="nav-item">
                                <a href="/" class="nav-link"><i class="fa fa-home"> Beranda</i></a>
                            </li>
                        </ul>
                        <!-- // END Main Navigation -->

                        <!-- Navbar toggler -->
                        <button class="navbar-toggler navbar-toggler-right d-block d-md-none" type="button" data-toggle="sidebar">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                    </div>
                </div>

            </div>
        </div>

        <!-- // END Header -->

        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content page-content pb-0">

















            <div class="bg-gradient-primary py-32pt">
                <div class="container d-flex flex-column flex-md-row align-items-center text-center text-md-left">
                    <img src="{{ asset('home/assets/images/illustration/student/128/white.svg')}}" class="mr-md-32pt mb-32pt mb-md-0" alt="student">
                    <div class="flex mb-32pt mb-md-0">
                        <h1 class="text-white mb-0">Sign In</h1>
                        <p class="lead measure-lead text-white-50"></p>
                    </div>
                    
                </div>
            </div>
            <div class=" pt-32pt pt-sm-64pt pb-32pt">
                <div class="container page__container">
                    <form method="POST" action="{{ route('siswa-login') }}" class="col-md-5 p-0 mx-auto">
                        @csrf
                        <div class="form-group">
                            <label for="nis">NIS:</label>
                            <input id="nis" type="text" class="form-control @error('nis') is-invalid @enderror" name="nis" value="{{ old('nis') }}" required autocomplete="email" autofocus placeholder="Alamat NIS...">
                            

                            @error('nis')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            {{-- <p class="text-right"><a href="reset-password.html" class="small">Forgot your password?</a></p> --}}
                            <input id="password" type="password" placeholder="Password Anda..." class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="text-center">
                            <button class="btn btn-lg btn-accent">Login</button>
                        </div>
                    </form>
                </div>
            </div>
            


        </div>
        <!-- // END Header Layout Content -->

        <div class="js-fix-footer  border-top-2">
            <div class="container page-section py-lg-48pt">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-6 col-md-4 mb-24pt mb-md-0">
                            </div>
                            <div class="col-6 col-md-4 mb-24pt mb-md-0">
                            </div>
                            <div class="col-6 col-md-4 mb-32pt mb-md-0">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-md-right">
                        <p class="text-70 brand justify-content-md-end">
                            <img class="brand-icon" src="{{ asset('home/assets/images/logo/logo1.png')}}" width="30" alt="SMP IT An-Nahl">SMP IT AN NAHL
                        </p>
                        <p class="text-muted mb-0 mb-lg-16pt">NPSN : 69980914 <br>
                            Status : Swasta <br>
                            
                            Bentuk Pendidikan : SMP <br>
                            
                            Status Kepemilikan : Yayasan <br>
                            
                            SK Pendirian Sekolah : 244/SITU/BPMPPT-LK/XII/2011 <br>
                            
                            Tanggal SK Pendirian : 2011-12-16 <br>
                            
                            SK Izin Operasional : 420/552/3/DPK-LK/VII-2018 <br>
                            
                            Tanggal SK Izin Operasional : 2018-07-11</p>
                    </div>
                </div>
            </div>
            <div class="bg-footer page-section py-lg-32pt">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 col-sm-4 mb-24pt mb-md-0"></div>
                        <div class="col-md-6 col-sm-4 mb-24pt mb-md-0 d-flex align-items-center">
                            
                        </div>
                        <div class="col-md-4 text-md-right">
                            <p class="mb-8pt d-flex align-items-md-center justify-content-md-end">
                               
                            </p>
                            <p class="text-white-50 mb-0">Copyright 2020 &copy; All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- // END Header Layout -->

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

    <!-- Chart.js')}} -->
    <script src="{{ asset('home/assets/vendor/Chart.min.js')}}"></script>

    <!-- App JS -->
    <script src="{{ asset('home/assets/js/app.js')}}"></script>

    <!-- Highlight.js')}} -->
    <script src="{{ asset('home/assets/js/hljs.js')}}"></script>

    <!-- App Settings (safe to remove) -->
    <script src="{{ asset('home/assets/js/app-settings.js')}}"></script>




</body>


<!-- Mirrored from tutorio-dark.frontendmatter.com/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jul 2020 23:49:29 GMT -->
</html>