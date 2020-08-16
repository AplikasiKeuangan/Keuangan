<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('template/dist/img/logo1.png')}}" />
    <title>SMP IT AN NAHL</title>
    <meta name="robots" content="noindex">
    <link type="text/css" href="{{ asset('home/assets/vendor/perfect-scrollbar.css')}}" rel="stylesheet">
    <link type="text/css" href="{{ asset('home/assets/vendor/fix-footer.css')}}" rel="stylesheet">
    <link type="text/css" href="{{ asset('home/assets/css/material-icons.css')}}" rel="stylesheet">
    <link type="text/css" href="{{ asset('home/assets/css/material-icons.rtl.css')}}" rel="stylesheet">
    <link type="text/css" href="{{ asset('home/assets/css/fontawesome.css')}}" rel="stylesheet">
    <link type="text/css" href="{{ asset('home/assets/css/fontawesome.rtl.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link type="text/css" href="{{ asset('home/assets/css/preloader.css')}}" rel="stylesheet">
    <link type="text/css" href="{{ asset('home/assets/css/preloader.rtl.css')}}" rel="stylesheet">
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

        .whatsapp {
            position: fixed;
            right: 0px;
            top: 52%;
        }

        .whatsapp h5 {
            color: white;
            background: green;
            padding: 12px;
            border-radius: 10px;
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
        <div id="header" class="mdk-header bg-dark js-mdk-header mb-0" data-effects="waterfall blend-background"
            data-fixed data-condenses>
            <div class="mdk-header__content">

                <div class="navbar navbar-expand-sm navbar-dark bg-dark pr-0 pr-md-16pt" id="default-navbar"
                    data-primary>
                    <!-- Navbar Brand -->
                    <a href="" class="navbar-brand">
                        <img class="navbar-brand-icon mr-0 mr-md-8pt"
                            src="{{asset('home/assets/images/logo/logo1.png')}}" width="30">
                        <span class="d-none d-md-block">SMP IT AN NAHL</span>
                    </a>

                    <!-- Main Navigation -->
                    <ul class="nav navbar-nav ml-auto flex-nowrap" style="white-space: nowrap;">
                        @if (Route::has('login'))
                        @if(Auth::guard('siswa')->check())
                        <li class="ml-16pt nav-item">
                            <div class="top-right links">
                                <a href="{{ url('/siswa') }}" style="float: left">
                                    <i class="material-icons">home</i>
                                    Home
                                </a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form-siswa').submit();"
                                    style="float: left">
                                    <i class="material-icons">lock</i>
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form-siswa" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @elseif(Auth::guard(null)->check())
                        <li class="ml-16pt nav-item">
                            <div class="top-right links">
                                <a href="{{ url('/admin') }}" style="float: left">
                                    <i class="material-icons">home</i>
                                    Home
                                </a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                    style="float: left">
                                    <i class="material-icons">lock</i>
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @else
                        <li class="ml-16pt nav-item">
                            <div class="top-right links">
                                <a href="{{route('login')}}" class="nav-link" style="float: left">
                                    <i class="material-icons">lock_open</i>
                                    <span class="sr-only">Login</span>
                                    Petugas
                                </a>
                                <a href="{{route('siswa-login')}}" class="nav-link" style="float: left">
                                    <i class="material-icons">lock_open</i>
                                    <span class="sr-only">Login</span>
                                    Siswa
                                </a>
                            </div>
                        </li>
                        @endif
                        @endif

                    </ul>
                    <!-- // END Main Navigation -->
                </div>

            </div>
        </div>
        <!-- // END Header -->
        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content page-content ">
            <div class="mdk-box mdk-box--bg-gradient-primary bg-dark js-mdk-box position-relative overflow-hidden mb-0"
                data-effects="parallax-background blend-background">
                <div class="mdk-box__bg">
                    <div class="mdk-box__bg-front"
                        style="background-image: url({{ asset('home/assets/images/logo/1.jpg')}});"></div>
                </div>
                <div class="mdk-box__content">
                    <div class="container page__container py-64pt py-md-112pt">
                        <div class="row align-items-center text-center text-md-left">
                            <div class="col-md-6 col-lg-5 order-1 order-md-0">
                                <h3 class="text-white d-md-inline" style=""> <span style=""
                                        class="d-block d-md-inline text-scramble js-text-scramble"></span></h1>
                                <p class="lead mb-32pt mb-lg-48pt text-white" align="justify">SMP IT AN NAHL adalah sebuah lembaga
                                    pendidikan untuk memenuhi tiga ranah pendidikan dalam mendidik siswa siswi...
                                    Pengetahuan siswa dapatkan melalui kegiatan belajar mengajar yang aktif dan
                                    menyenangkan. keterampilan siswa dapatkan melalui learning by doing, sikap dan
                                    nilai-nilai siswa terapkan dengan meneladankan empat sifat rasululloh, sidiq,
                                    amanah, tabliq, dan fathonah... Yang kami sampaikan melalui pendidikan karakter
                                    (character Building)</p>
                            </div>
                            <div class="col-md-6 col-lg-7 order-0 order-md-1 text-center mb-32pt mb-md-0">
                                <img src="{{ asset ('home/assets/images/logo/logo1.png')}}" alt="logo-an-nahl"
                                    class="home-macbook" height="80%" width="80%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="navbar-submenu py-16pt py-sm-24pt py-md-32pt ">
                <div class="container page__container">
                    <div class="row align-items-center">
                        <div
                            class="d-flex col-md align-items-center border-bottom border-md-0 mb-16pt mb-md-0 pb-16pt pb-md-0">
                            <div
                                class="rounded-circle border border-secondary w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="flex">
                                <p class="mb-0"><strong>Kepala Sekolah</strong></p>
                                <p class="text-70 mb-0">-</p>
                            </div>
                        </div>
                        <div
                            class="d-flex col-md align-items-center border-bottom border-md-0 mb-16pt mb-md-0 pb-16pt pb-md-0">
                            <div
                                class="rounded-circle border border-secondary w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
                                <i class="fa fa-medal"></i>
                            </div>
                            <div class="flex">
                                <p class="mb-0"><strong>Akreditasi</strong></p>
                                <p class="text-70 mb-0">-</p>
                            </div>
                        </div>
                        <div class="d-flex col-md align-items-center">
                            <div
                                class="rounded-circle border border-secondary w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
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
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.805040289358!2d100.56041381405521!3d-0.14782949989213703!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd54d88121df407%3A0x5e853e2e650ca25b!2sSmp%20It%20An-nahl!5e0!3m2!1sen!2sid!4v1595942325473!5m2!1sen!2sid"
                                    width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""
                                    aria-hidden="false" tabindex="0"></iframe>
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
                            <a class="carousel-control-next js-mdk-carousel-control mt-n24pt" href="#carousel-feedback"
                                role="button" data-slide="next">
                                <span class="carousel-control-icon material-icons"
                                    aria-hidden="true">keyboard_arrow_right</span>
                                <span class="sr-only">Next</span>
                            </a>
                            <div class="mdk-carousel__content">

                                <div class="col-12 col-md-6">
                                    <div class="card card--elevated card-body">
                                        <blockquote class="mb-0">
                                            <p class="text-70">Mahkota seseorang adalah akalnya. Derajat seseorang
                                                adalah agamanya. Sedangkan kehormatan seseorang adalah budi pekertinya
                                            <div class="media">
                                                <div class="media-body media-middle">
                                                    <p class="mb-0"><strong>Umar Bin Khattab</strong></p>
                                                </div>
                                            </div>
                                        </blockquote>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="card card--elevated card-body">
                                        <blockquote class="mb-0">
                                            <p class="text-70"> Jikalau kita letih karena kebaikan, maka sesungguhnya
                                                keletihan itu akan hilang dan kebaikan akan kekal. Namun jikalau kita
                                                bersenang-senang dengan dosa, maka sesungguhnya kesenangan itu akan
                                                hilang dan dosa itu akan kekal.</p>
                                            <div class="media">
                                                <div class="media-body media-middle">
                                                    <p class="mb-0"><strong>Umar Bin Khattab</strong></p>
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
                    <div class="col-md-12 text-md-right">
                        <p class="text-70 brand justify-content-md-end">
                            <img class="brand-icon" src="{{ asset('home/assets/images/logo/logo1.png')}}" width="30"
                                alt="SMP IT An-Nahl">SMP IT AN NAHL
                        </p>
                        <table border="0" align="right" class="text-md-right text-muted mb-0 mb-lg-16pt">
                                <tr>
                                    <td>NPSN</td>
                                    <td>:</td>
                                    <td>69980914</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>:</td>
                                    <td>Swasta</td>
                                </tr>
                                <tr>
                                    <td>Bentuk Pendidikan</td>
                                    <td>:</td>
                                    <td>SMP</td>
                                </tr>
                                <tr>
                                    <td>Status Kepemilikan</td>
                                    <td>:</td>
                                    <td>Yayasan</td>
                                </tr>
                                <tr>
                                    <td>SK Pendirian Sekolah</td>
                                    <td>:</td>
                                    <td>244/SITU/BPMPPT-LK/XII/2011</td>
                                </tr>
                                <tr>
                                    <td>Tanggal SK Pendirian</td>
                                    <td>:</td>
                                    <td>2011-12-16</td>
                                </tr>
                                <tr>
                                    <td>SK Izin Operasional</td>
                                    <td>:</td>
                                    <td>420/552/3/DPK-LK/VII-2018</td>
                                </tr>
                                <tr>
                                    <td>Tanggal SK Izin Operasional</td>
                                    <td>:</td>
                                    <td>2018-07-11</td>
                                </tr>
                                <tr>
                                </tr>
                        </table>
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
                            <p class="text-white-50 mb-0">Copyright 2020 &copy;.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('home/assets/vendor/jquery.min.js')}}"></script>
    <script src="{{ asset('home/assets/vendor/popper.min.js')}}"></script>
    <script src="{{ asset('home/assets/vendor/bootstrap.min.js')}}"></script>
    <script src="{{ asset('home/assets/vendor/perfect-scrollbar.min.js')}}"></script>
    <script src="{{ asset('home/assets/vendor/dom-factory.js')}}"></script>
    <script src="{{ asset('home/assets/vendor/material-design-kit.js')}}"></script>
    <script src="{{ asset('home/assets/vendor/fix-footer.js')}}"></script>
    <script src="{{ asset('home/assets/js/app.js')}}"></script>
    <script src="{{ asset('home/assets/js/hljs.js')}}"></script>
    <script src="{{ asset('home/assets/js/app-settings.js')}}"></script>
    <script type="text/javascript">
        (function () {
            var options = {
                whatsapp: "+6282387078324", // WhatsApp number
                text: "Assalau'alaikum..",
                position: "right", // Position may be 'right' or 'left'
            };
            var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
            var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
            s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
            var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
        })();
    </script>
</body>

</html>