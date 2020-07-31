<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from tutorio-dark.frontendmatter.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jul 2020 23:45:19 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SMP IT AN NAHL</title>

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
                        <span class="d-none d-md-block">SMP IT AN NAHL</span>
                    </a>

                   

                    <!-- Main Navigation -->

                    
                    <ul class="nav navbar-nav ml-auto flex-nowrap" style="white-space: nowrap;">
                        <li class="ml-16pt nav-item">

                            @if (Route::has('login'))
                            <div class="top-right links">
                                @auth
                                    <a href="{{ url('/admin') }}">Home</a>
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

















            <div class="mdk-box mdk-box--bg-gradient-primary bg-dark js-mdk-box position-relative overflow-hidden mb-0" data-effects="parallax-background blend-background">
                <div class="mdk-box__bg">
                    <div class="mdk-box__bg-front" style="background-image: url({{ asset('home/assets/images/logo/1.jpg')}});"></div>
                </div>
                <div class="mdk-box__content">
                    <div class="container page__container py-64pt py-md-112pt">
                        <div class="row align-items-center text-center text-md-left">
                            <div class="col-md-6 col-lg-5 order-1 order-md-0">
                                <h1 class="text-white"> <span class="d-block d-md-inline-block text-scramble js-text-scramble"></span></h1>
                                <p class="lead mb-32pt mb-lg-48pt text-white">SMP IT AN NAHL adalah sebuah lembaga pendidikan untuk memenuhi tiga ranah pendidikan dalam mendidik siswa siswi... Pengetahuan siswa dapatkan melalui kegiatan belajar mengajar yang aktif dan menyenangkan.  keterampilan siswa dapatkan melalui learning by doing, sikap dan nilai-nilai siswa terapkan dengan meneladankan empat sifat rasululloh, sidiq, amanah, tabliq, dan fathonah... Yang kami sampaikan melalui pendidikan karakter (character Building)</p>
                               
                               
                            </div>
                            <div class="col-md-6 col-lg-7 order-0 order-md-1 text-center mb-32pt mb-md-0">
                                <img src="{{ asset ('home/assets/images/logo/logo1.png')}}" alt="macbook" class="home-macbook" height="80%" width="80%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="navbar-submenu py-16pt py-sm-24pt py-md-32pt ">
                <div class="container page__container">
                    <div class="row align-items-center">
                        <div class="d-flex col-md align-items-center border-bottom border-md-0 mb-16pt mb-md-0 pb-16pt pb-md-0">
                            <div class="rounded-circle border border-secondary w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="flex">
                                <p class="mb-0"><strong>Kepala Sekolah</strong></p>
                                <p class="text-70 mb-0">-</p>
                            </div>
                        </div>
                        <div class="d-flex col-md align-items-center border-bottom border-md-0 mb-16pt mb-md-0 pb-16pt pb-md-0">
                            <div class="rounded-circle border border-secondary w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
                                <i class="fa fa-medal"></i>
                            </div>
                            <div class="flex">
                                <p class="mb-0"><strong>Akreditasi</strong></p>
                                <p class="text-70 mb-0">-</p>
                            </div>
                        </div>
                        <div class="d-flex col-md align-items-center">
                            <div class="rounded-circle border border-secondary w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
                                <i class="fa fa-book-open"></i>
                            </div>
                            <div class="flex">
                                <p class="mb-0"><strong>Kurikulum</strong></p>
                                <p class="text-70 mb-0">-</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="page-section border-bottom-2">
                <div class="container page__container">
                    <div class="row align-items-end mb-16pt mb-md-32pt">
                        <div class="col-md-auto mb-32pt mb-md-0">
                            <div class="page-headline page-headline--title text-center text-md-left p-0">
                                <h2>Alamat</h2>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-24 col-md-24 col-lg-12">
                            <div class="responsive-map-container">
                                <iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.805040289358!2d100.56041381405521!3d-0.14782949989213703!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd54d88121df407%3A0x5e853e2e650ca25b!2sSmp%20It%20An-nahl!5e0!3m2!1sen!2sid!4v1595942325473!5m2!1sen!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                            </div>
                        </div>
                       
                    </div>
                    
                </div>
            </div>

            

            <div class="page-section">
                <div class="container page__container">
                    <div class="page-headline text-center">
                        <h2>Quote</h2>
                       
                    </div>

                    <div class="position-relative carousel-card">
                        <div class="row d-block js-mdk-carousel" id="carousel-feedback">
                            <a class="carousel-control-next js-mdk-carousel-control mt-n24pt" href="#carousel-feedback" role="button" data-slide="next">
                                <span class="carousel-control-icon material-icons" aria-hidden="true">keyboard_arrow_right</span>
                                <span class="sr-only">Next</span>
                            </a>
                            <div class="mdk-carousel__content">

                                <div class="col-12 col-md-6">
                                    <div class="card card--elevated card-body">
                                        <blockquote class="mb-0">
                                            <p class="text-70">Mahkota seseorang adalah akalnya. Derajat seseorang adalah agamanya. Sedangkan kehormatan seseorang adalah budi pekertinya <br>......</p>

                                            <div class="media">
                                                <div class="media-left">
                                                  
                                                </div>
                                                <div class="media-left">
                                                
                                                </div>
                                                <div class="media-left">
                                                  -
                                                </div>
                                                
                                                <div class="media-body media-middle">
                                                    <p class="mb-0"><a href="#" class="text-body"><strong>Umar Bin Khattab</strong></a></p>
                                                </div>
                                            </div>
                                        </blockquote>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="card card--elevated card-body">
                                        <blockquote class="mb-0">
                                            <p class="text-70"> Jikalau kita letih karena kebaikan, maka sesungguhnya keletihan itu akan hilang dan kebaikan akan kekal. Namun jikalau kita bersenang-senang dengan dosa, maka sesungguhnya kesenangan itu akan hilang dan dosa itu akan kekal.</p>

                                            <div class="media">
                                                <div class="media-left">
                                                  -
                                                </div>
                                                <div class="media-left">
                                                
                                                </div>
                                                <div class="media-body media-middle">
                                                    <p class="mb-0"><a href="#" class="text-body"><strong>Umar Bin Khattab</strong></a></p>
                                                </div>
                                            </div>
                                        </blockquote>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
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
                        <div class="col-md-2 col-sm-4 mb-24pt mb-md-0">
                            <p class="text-white-70 mb-8pt"><strong>Follow us</strong></p>
                            <nav class="nav nav-links nav--flush">
                                <a href="#" class="nav-link mr-8pt"><img src="{{ asset('home/assets/images/icon/footer/facebook-square%402x.png')}}" width="24" height="24" alt="Facebook"></a>
                                
                            </nav>
                        </div>
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

    <!-- drawer -->
    <div class="mdk-drawer js-mdk-drawer" id="default-drawer">
        <div class="mdk-drawer__content">
            <div class="sidebar sidebar-dark sidebar-left" data-perfect-scrollbar>
                <div class="sidebar-p-a sidebar-b-b sidebar-m-b pt-0">

                    <!-- Brand -->
                    <a href="/" class="sidebar-brand">
                        <img class="sidebar-brand-icon" src="{{ asset('home/assets/images/logo/logo1.png')}}" width="30" alt="SMP IT An-Nahl">
                        <span>SMP IT An-Nahl</span>
                    </a>
                    <!-- // END Brand -->

            
                </div>

                <ul class="sidebar-menu">
                    <li class="sidebar-menu-item active">
                        <a class="sidebar-menu-button" href="/">Beranda</a>
                    </li>
                    <li class="sidebar-menu-item active open">
                        <a class="sidebar-menu-button" data-toggle="collapse" href="#catalog_menu">
                            Kesiswaan
                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                        </a>
                        <ul class="sidebar-submenu collapse show sm-indent" id="catalog_menu">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="library.html">Dashboard</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="library-featured.html">Featured</a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <div class="sidebar-heading">Ekstra</div>
                <ul class="sidebar-menu">
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" data-toggle="collapse" href="#student_menu">
                            Tentang Developer
                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                        </a>
                        <ul class="sidebar-submenu collapse sm-indent" id="student_menu">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="student-dashboard.html">Biodata</a>
                            </li>
                        </ul>
                    </li>
                </ul>

                

            </div>
        </div>
    </div>
    <!-- // END drawer -->
    
    <!-- Modal -->
    <div class="modal courses-modal" id="courses" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-i8-plus bg-body pr-0">
                            <div class="py-16pt pl-16pt menu">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#courses-development" data-toggle="tab">Development</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#courses-design" data-toggle="tab">Design</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#courses-photography" data-toggle="tab">Photography</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#courses-marketing" data-toggle="tab">Marketing</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#courses-business" data-toggle="tab">Business</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

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