<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from tutorio-dark.frontendmatter.com/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jul 2020 23:49:27 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SMP IT AN NAHL -Password Recovery</title>

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
                                <a href="/admin" class="nav-link"><i class="fa fa-home"> Beranda</i></a>
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
                        <h1 class="text-white mb-0">Password Recovery</h1>
                        <p class="lead measure-lead text-white-50"></p>
                    </div>
                    
                </div>
            </div>
            <div class=" pt-32pt pt-sm-64pt pb-32pt">
                <div class="container page__container">
                    <form method="POST" action="/password_update" class="col-md-5 p-0 mx-auto">
                        @csrf
                        <div class="form-group">
                            <label for="password">Password Lama:</label>
                            
                            <input placeholder="Password Saat Ini..."  id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                           
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            {{-- <p class="text-right"><a href="reset-password.html" class="small">Forgot your password?</a></p> --}}
                          
                            <input id="password" type="password" placeholder="Password Anda Saat Ini..."  class="form-control @error('password') is-invalid @enderror" name="new_password" required autocomplete="new-password">

                        </div>
                        <div class="form-group">
                            <label for="password-confirm">Konfirmasi Password:</label>
                            {{-- <p class="text-right"><a href="reset-password.html" class="small">Forgot your password?</a></p> --}}
                          
                            <input id="password-confirm" type="password" placeholder="Konfirmas Password Anda..." class="form-control" name="password_confirmation" required autocomplete="new-password">
                                
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update') }}
                            </button>
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
                            <img class="brand-icon" src="{{ asset('home/assets/images/logo/logo1.png')}}" width="30" alt="SMP IT An-Nahl">SMP IT An-Nahl
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

    <div class="navbar navbar-expand-sm navbar-mini navbar-dark fixed-bottom bg-dark d-none d-md-flex p-0" id="demo-navbar">
        <div class="container">

            <!-- Main Navigation -->
            <ul class="nav navbar-nav flex-nowrap">
                <li class="nav-item dropup">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Catalog</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="index.html">Home page</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="library.html">Library</a>
                        <a class="dropdown-item" href="library-featured.html">Featured</a>
                        <a class="dropdown-item" href="library-development.html">Development</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="library-filters.html">Explore</a>
                        <a class="dropdown-item" href="library-filters-list.html">Explore List</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="paths.html">Learning Paths</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="course.html">Course Details</a>
                        <a class="dropdown-item" href="lesson.html">Lesson Details</a>
                        <a class="dropdown-item" href="path.html">Path Details</a>
                    </div>
                </li>
                <li class="nav-item dropup">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Student</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="student-dashboard.html">Dashboard</a>
                        <a class="dropdown-item" href="student-my-courses.html">My Courses</a>
                        <a class="dropdown-item" href="student-take-course.html">Take Course</a>
                        <a class="dropdown-item" href="student-take-lesson.html">Take Lesson</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="student-take-quiz.html">Take Quiz</a>
                        <a class="dropdown-item" href="student-quiz-result-details.html">Quiz Result</a>
                        <a class="dropdown-item" href="student-quiz-results.html">My Quizzes</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="student-path-assessment.html">Skill Assessment</a>
                        <a class="dropdown-item" href="student-path-assessment-result.html">Skill Result</a>
                    </div>
                </li>
                <li class="nav-item dropup">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Instructor</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="instructor-dashboard.html">Dashboard</a>
                        <a class="dropdown-item" href="instructor-courses.html">Courses</a>
                        <a class="dropdown-item" href="instructor-quizzes.html">Quizzes</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="instructor-edit-course.html">Edit Course</a>
                        <a class="dropdown-item" href="instructor-edit-quiz.html">Edit Quiz</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="instructor-earnings.html">Earnings</a>
                        <a class="dropdown-item" href="instructor-statement.html">Statement</a>
                    </div>
                </li>
                <li class="nav-item dropup">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Community</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="student-discussions.html">Discussions</a>
                        <a class="dropdown-item" href="student-discussion.html">Discussion Details</a>
                        <a class="dropdown-item" href="student-discussions-ask.html">Ask Question</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="student-profile.html">Student Profile</a>
                        <a class="dropdown-item" href="instructor-profile.html">Instructor Profile</a>
                    </div>
                </li>
                <li class="nav-item dropup active">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Account</a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="pricing.html">Pricing</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item active" href="login.html">Login</a>
                        <a class="dropdown-item" href="signup.html">Signup</a>
                        <a class="dropdown-item" href="signup-payment.html">Payment</a>
                        <a class="dropdown-item" href="reset-password.html">Reset Password</a>
                        <a class="dropdown-item" href="change-password.html">Change Password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="student-edit-account.html">Edit Account</a>
                        <a class="dropdown-item" href="student-edit-account-profile.html">Profile &amp; Privacy</a>
                        <a class="dropdown-item" href="student-edit-account-notifications.html">Email Notifications</a>
                        <a class="dropdown-item" href="student-edit-account-password.html">Account Password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="student-billing.html">Subscription</a>
                        <a class="dropdown-item" href="student-billing-upgrade.html">Upgrade Account</a>
                        <a class="dropdown-item" href="student-billing-payment.html">Payment Information</a>
                        <a class="dropdown-item" href="student-billing-history.html">Payment History</a>
                        <a class="dropdown-item" href="student-billing-invoice.html">Invoice</a>
                    </div>
                </li>
                <li class="nav-item dropup">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Components</a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="ui-buttons.html">Buttons</a>
                        <a class="dropdown-item" href="ui-charts.html">Charts</a>
                        <a class="dropdown-item" href="ui-avatars.html">Avatars</a>
                        <a class="dropdown-item" href="ui-forms.html">Forms</a>
                        <a class="dropdown-item" href="ui-loaders.html">Loaders</a>
                        <a class="dropdown-item" href="ui-tables.html">Tables</a>
                        <a class="dropdown-item" href="ui-cards.html">Cards</a>
                        <a class="dropdown-item" href="ui-icons.html">Icons</a>
                        <a class="dropdown-item" href="ui-tabs.html">Tabs</a>
                        <a class="dropdown-item" href="ui-alerts.html">Alerts</a>
                        <a class="dropdown-item" href="ui-badges.html">Badges</a>
                        <a class="dropdown-item" href="ui-progress.html">Progress</a>
                        <a class="dropdown-item" href="ui-pagination.html">Pagination</a>
                    </div>
                </li>
            </ul>
            <!-- // END Main Navigation -->

        </div>
    </div>
    <!-- drawer -->
    <div class="mdk-drawer js-mdk-drawer" id="default-drawer">
        <div class="mdk-drawer__content">
            <div class="sidebar sidebar-dark sidebar-left" data-perfect-scrollbar>
                <div class="sidebar-p-a sidebar-b-b sidebar-m-b pt-0">

                    <!-- Brand -->
                    <a href="index.html" class="sidebar-brand">
                        <img class="sidebar-brand-icon" src="{{ asset('home/assets/images/logo/white-100.svg')}}" width="30" alt="Tutorio">
                        <span>Tutorio</span>
                    </a>
                    <!-- // END Brand -->

                    <!-- Search -->
                    <form action="http://tutorio-dark.frontendmatter.com/library-filters.html" class="search-form search-form--black">
                        <input type="text" class="form-control" placeholder="Search">
                        <button class="btn" type="submit" role="button"><i class="material-icons">search</i></button>
                    </form>

                </div>

                <ul class="sidebar-menu">
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="index.html">Home Page</a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" data-toggle="collapse" href="#catalog_menu">
                            Catalog
                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                        </a>
                        <ul class="sidebar-submenu collapse sm-indent" id="catalog_menu">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="library.html">Library</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="library-featured.html">Featured</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="library-development.html">Development</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="library-filters.html">Explore</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="library-filters-list.html">Explore List</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="paths.html">Learning Paths</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="course.html">Course Details</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="lesson.html">Lesson Details</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="path.html">Path Details</a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <div class="sidebar-heading">Pages</div>
                <ul class="sidebar-menu">
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" data-toggle="collapse" href="#student_menu">
                            Student
                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                        </a>
                        <ul class="sidebar-submenu collapse sm-indent" id="student_menu">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="student-dashboard.html">Dashboard</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="student-my-courses.html">My Courses</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="student-quiz-results.html">My Quizzes</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="student-take-course.html">Take Course</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="student-take-lesson.html">Take Lesson</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="student-take-quiz.html">Take Quiz</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="student-quiz-result-details.html">Quiz Result</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="student-path-assessment.html">Skill Assessment</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="student-path-assessment-result.html">Skill Result</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" data-toggle="collapse" href="#instructor_menu">
                            Instructor
                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                        </a>
                        <ul class="sidebar-submenu collapse sm-indent" id="instructor_menu">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="instructor-dashboard.html">Dashboard</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="instructor-courses.html">Manage Courses</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="instructor-quizzes.html">Manage Quizzes</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="instructor-edit-course.html">Edit Course</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="instructor-edit-quiz.html">Edit Quiz</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="instructor-earnings.html">Earnings</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="instructor-statement.html">Statement</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-menu-item active open">
                        <a class="sidebar-menu-button" data-toggle="collapse" href="#account_menu">
                            Account
                            <span class="sidebar-menu-badge badge badge-primary badge-notifications ml-auto">2</span>
                            <span class="sidebar-menu-toggle-icon"></span>
                        </a>
                        <ul class="sidebar-submenu collapse show sm-indent" id="account_menu">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="pricing.html">Pricing</a>
                            </li>
                            <li class="sidebar-menu-item active">
                                <a class="sidebar-menu-button" href="login.html">Login</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="signup.html">Signup</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="signup-payment.html">Payment</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="reset-password.html">Reset Password</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="change-password.html">Change Password</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="student-edit-account.html">Edit Account</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="student-edit-account-profile.html">Profile &amp; Privacy</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="student-edit-account-notifications.html">Email Notifications</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="student-edit-account-password.html">Account Password</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="student-billing.html">Subscription</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="student-billing-upgrade.html">Upgrade Account</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="student-billing-payment.html">Payment Information</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="student-billing-history.html">Payment History</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="student-billing-invoice.html">Invoice</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" data-toggle="collapse" href="#community_menu">
                            Community
                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                        </a>
                        <ul class="sidebar-submenu collapse sm-indent" id="community_menu">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="student-discussions.html">Discussions</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="student-discussion.html">Discussion Details</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="student-discussions-ask.html">Ask Question</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="student-profile.html">Student Profile</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="instructor-profile.html">Instructor Profile</a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <div class="sidebar-heading">Components</div>
                <ul class="sidebar-menu">
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" data-toggle="collapse" href="#components_menu">
                            Components
                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                        </a>
                        <ul class="sidebar-submenu collapse sm-indent" id="components_menu">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="ui-buttons.html">Buttons</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="ui-charts.html">Charts</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="ui-avatars.html">Avatars</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="ui-forms.html">Forms</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="ui-loaders.html">Loaders</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="ui-tables.html">Tables</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="ui-cards.html">Cards</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="ui-icons.html">Icons</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="ui-tabs.html">Tabs</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="ui-alerts.html">Alerts</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="ui-badges.html">Badges</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="ui-progress.html">Progress</a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="ui-pagination.html">Pagination</a>
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
                        <div class="col-md-8 col-sm-6 col-i8-plus-auto tab-content">


                            <div id="courses-development" class="tab-pane show active">
                                <div class="row no-gutters">
                                    <div class="col-md-6 p-0">
                                        <div class="p-24pt d-flex h-100 flex-column">
                                            <div class="flex">
                                                <h5 class="text-black-100">Courses</h5>
                                                <ul class="nav flex-column mb-24pt">

                                                    <li class="nav-item">
                                                        <a class="nav-link px-0" href="library.html">Web Development</a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link px-0" href="library.html">JavaScript</a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link px-0" href="library.html">HTML</a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link px-0" href="library.html">CSS</a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link px-0" href="library.html">WordPress</a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link px-0" href="library.html">PHP</a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link px-0" href="library.html">iOS Development</a>
                                                    </li>

                                                </ul>
                                            </div>
                                            <div>
                                                <a href="library.html" class="btn btn-block text-center btn-secondary">Library</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-0">
                                        <div class="p-24pt d-flex h-100 flex-column">
                                            <div class="flex">
                                                <h5 class="text-black-100">Learning Paths</h5>
                                                <div class="mb-16pt">
                                                    <a href="path.html" class="media text-black-100">
                                                        <img src="{{ asset('home/assets/images/paths/angular_40x40%402x.png')}}" width="40" height="40" alt="Angular" class="media-left rounded">
                                                        <span class="media-body">
                                                            <span class="card-title d-block mb-0">Angular</span>
                                                            <span class="text-muted text-black-70 d-flex lh-1">24 courses</span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="mb-16pt">
                                                    <a href="path.html" class="media text-black-100">
                                                        <img src="{{ asset('home/assets/images/paths/swift_40x40%402x.png')}}" width="40" height="40" alt="Swift" class="media-left rounded">
                                                        <span class="media-body">
                                                            <span class="card-title d-block mb-0">Swift</span>
                                                            <span class="text-muted text-black-70 d-flex lh-1">22 courses</span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="mb-16pt">
                                                    <a href="path.html" class="media text-black-100">
                                                        <img src="{{ asset('home/assets/images/paths/react_40x40%402x.png')}}" width="40" height="40" alt="React Native" class="media-left rounded">
                                                        <span class="media-body">
                                                            <span class="card-title d-block mb-0">React Native</span>
                                                            <span class="text-muted text-black-70 d-flex lh-1">18 courses</span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="mb-16pt">
                                                    <a href="path.html" class="media text-black-100">
                                                        <img src="{{ asset('home/assets/images/paths/wordpress_40x40%402x.png')}}" width="40" height="40" alt="WordPress" class="media-left rounded">
                                                        <span class="media-body">
                                                            <span class="card-title d-block mb-0">WordPress</span>
                                                            <span class="text-muted text-black-70 d-flex lh-1">13 courses</span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="mb-24pt">
                                                    <a href="path.html" class="media text-black-100">
                                                        <img src="{{ asset('home/assets/images/paths/devops_40x40%402x.png')}}" width="40" height="40" alt="Development Tools" class="media-left rounded">
                                                        <span class="media-body">
                                                            <span class="card-title d-block mb-0">Development Tools</span>
                                                            <span class="text-muted text-black-70 d-flex lh-1">5 courses</span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div>
                                                <a href="paths.html" class="btn btn-block text-center btn-outline-secondary">Learning Paths</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div id="courses-design" class="tab-pane">
                                <div class="row no-gutters">
                                    <div class="col-md-6 p-0">
                                        <div class="p-24pt d-flex h-100 flex-column">
                                            <div class="flex">
                                                <h5 class="text-black-100">Courses</h5>
                                                <ul class="nav flex-column mb-24pt">

                                                    <li class="nav-item">
                                                        <a class="nav-link px-0" href="library.html">Illustration</a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link px-0" href="library.html">Design Skills</a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link px-0" href="library.html">Design Techniques</a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link px-0" href="library.html">Page Layout</a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link px-0" href="library.html">Projects</a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link px-0" href="library.html">Drawing</a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link px-0" href="library.html">Typography</a>
                                                    </li>

                                                </ul>
                                            </div>
                                            <div>
                                                <a href="library.html" class="btn btn-block text-center btn-secondary">Library</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-0">
                                        <div class="p-24pt d-flex h-100 flex-column">
                                            <div class="flex">
                                                <h5 class="text-black-100">Learning Paths</h5>
                                                <div class="mb-16pt">
                                                    <a href="path.html" class="media text-black-100">
                                                        <img src="{{ asset('home/assets/images/paths/angular_40x40%402x.png')}}" width="40" height="40" alt="Angular" class="media-left rounded">
                                                        <span class="media-body">
                                                            <span class="card-title d-block mb-0">Angular</span>
                                                            <span class="text-muted text-black-70 d-flex lh-1">24 courses</span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="mb-16pt">
                                                    <a href="path.html" class="media text-black-100">
                                                        <img src="{{ asset('home/assets/images/paths/swift_40x40%402x.png')}}" width="40" height="40" alt="Swift" class="media-left rounded">
                                                        <span class="media-body">
                                                            <span class="card-title d-block mb-0">Swift</span>
                                                            <span class="text-muted text-black-70 d-flex lh-1">22 courses</span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="mb-16pt">
                                                    <a href="path.html" class="media text-black-100">
                                                        <img src="{{ asset('home/assets/images/paths/react_40x40%402x.png')}}" width="40" height="40" alt="React Native" class="media-left rounded">
                                                        <span class="media-body">
                                                            <span class="card-title d-block mb-0">React Native</span>
                                                            <span class="text-muted text-black-70 d-flex lh-1">18 courses</span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="mb-16pt">
                                                    <a href="path.html" class="media text-black-100">
                                                        <img src="{{ asset('home/assets/images/paths/wordpress_40x40%402x.png')}}" width="40" height="40" alt="WordPress" class="media-left rounded">
                                                        <span class="media-body">
                                                            <span class="card-title d-block mb-0">WordPress</span>
                                                            <span class="text-muted text-black-70 d-flex lh-1">13 courses</span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="mb-24pt">
                                                    <a href="path.html" class="media text-black-100">
                                                        <img src="{{ asset('home/assets/images/paths/devops_40x40%402x.png')}}" width="40" height="40" alt="Development Tools" class="media-left rounded">
                                                        <span class="media-body">
                                                            <span class="card-title d-block mb-0">Development Tools</span>
                                                            <span class="text-muted text-black-70 d-flex lh-1">5 courses</span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div>
                                                <a href="paths.html" class="btn btn-block text-center btn-outline-secondary">Learning Paths</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div id="courses-photography" class="tab-pane">
                                <div class="row no-gutters">
                                    <div class="col-md-6 p-0">
                                        <div class="p-24pt d-flex h-100 flex-column">
                                            <div class="flex">
                                                <h5 class="text-black-100">Courses</h5>
                                                <ul class="nav flex-column mb-24pt">

                                                    <li class="nav-item">
                                                        <a class="nav-link px-0" href="library.html">Cameras</a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link px-0" href="library.html">Raw Processing</a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link px-0" href="library.html">Masking</a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link px-0" href="library.html">Compositing</a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link px-0" href="library.html">Portraits</a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link px-0" href="library.html">Photo Management</a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link px-0" href="library.html">Lighting</a>
                                                    </li>

                                                </ul>
                                            </div>
                                            <div>
                                                <a href="library.html" class="btn btn-block text-center btn-secondary">Library</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-0">
                                        <div class="p-24pt d-flex h-100 flex-column">
                                            <div class="flex">
                                                <h5 class="text-black-100">Learning Paths</h5>
                                                <div class="mb-16pt">
                                                    <a href="path.html" class="media text-black-100">
                                                        <img src="{{ asset('home/assets/images/paths/angular_40x40%402x.png')}}" width="40" height="40" alt="Angular" class="media-left rounded">
                                                        <span class="media-body">
                                                            <span class="card-title d-block mb-0">Angular</span>
                                                            <span class="text-muted text-black-70 d-flex lh-1">24 courses</span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="mb-16pt">
                                                    <a href="path.html" class="media text-black-100">
                                                        <img src="{{ asset('home/assets/images/paths/swift_40x40%402x.png')}}" width="40" height="40" alt="Swift" class="media-left rounded">
                                                        <span class="media-body">
                                                            <span class="card-title d-block mb-0">Swift</span>
                                                            <span class="text-muted text-black-70 d-flex lh-1">22 courses</span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="mb-16pt">
                                                    <a href="path.html" class="media text-black-100">
                                                        <img src="{{ asset('home/assets/images/paths/react_40x40%402x.png')}}" width="40" height="40" alt="React Native" class="media-left rounded">
                                                        <span class="media-body">
                                                            <span class="card-title d-block mb-0">React Native</span>
                                                            <span class="text-muted text-black-70 d-flex lh-1">18 courses</span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="mb-16pt">
                                                    <a href="path.html" class="media text-black-100">
                                                        <img src="{{ asset('home/assets/images/paths/wordpress_40x40%402x.png')}}" width="40" height="40" alt="WordPress" class="media-left rounded">
                                                        <span class="media-body">
                                                            <span class="card-title d-block mb-0">WordPress</span>
                                                            <span class="text-muted text-black-70 d-flex lh-1">13 courses</span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="mb-24pt">
                                                    <a href="path.html" class="media text-black-100">
                                                        <img src="{{ asset('home/assets/images/paths/devops_40x40%402x.png')}}" width="40" height="40" alt="Development Tools" class="media-left rounded">
                                                        <span class="media-body">
                                                            <span class="card-title d-block mb-0">Development Tools</span>
                                                            <span class="text-muted text-black-70 d-flex lh-1">5 courses</span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div>
                                                <a href="paths.html" class="btn btn-block text-center btn-outline-secondary">Learning Paths</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div id="courses-marketing" class="tab-pane">
                                <div class="row no-gutters">
                                    <div class="col-md-6 p-0">
                                        <div class="p-24pt d-flex h-100 flex-column">
                                            <div class="flex">
                                                <h5 class="text-black-100">Courses</h5>
                                                <ul class="nav flex-column mb-24pt">

                                                    <li class="nav-item">
                                                        <a class="nav-link px-0" href="library.html">Small Business</a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link px-0" href="library.html">Marketing</a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link px-0" href="library.html">Enterprise Marketing</a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link px-0" href="library.html">Content Marketing</a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link px-0" href="library.html">Online Marketing</a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link px-0" href="library.html">Social Media Marketing</a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link px-0" href="library.html">Advertising</a>
                                                    </li>

                                                </ul>
                                            </div>
                                            <div>
                                                <a href="library.html" class="btn btn-block text-center btn-secondary">Library</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-0">
                                        <div class="p-24pt d-flex h-100 flex-column">
                                            <div class="flex">
                                                <h5 class="text-black-100">Learning Paths</h5>
                                                <div class="mb-16pt">
                                                    <a href="path.html" class="media text-black-100">
                                                        <img src="{{ asset('home/assets/images/paths/angular_40x40%402x.png')}}" width="40" height="40" alt="Angular" class="media-left rounded">
                                                        <span class="media-body">
                                                            <span class="card-title d-block mb-0">Angular</span>
                                                            <span class="text-muted text-black-70 d-flex lh-1">24 courses</span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="mb-16pt">
                                                    <a href="path.html" class="media text-black-100">
                                                        <img src="{{ asset('home/assets/images/paths/swift_40x40%402x.png')}}" width="40" height="40" alt="Swift" class="media-left rounded">
                                                        <span class="media-body">
                                                            <span class="card-title d-block mb-0">Swift</span>
                                                            <span class="text-muted text-black-70 d-flex lh-1">22 courses</span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="mb-16pt">
                                                    <a href="path.html" class="media text-black-100">
                                                        <img src="{{ asset('home/assets/images/paths/react_40x40%402x.png')}}" width="40" height="40" alt="React Native" class="media-left rounded">
                                                        <span class="media-body">
                                                            <span class="card-title d-block mb-0">React Native</span>
                                                            <span class="text-muted text-black-70 d-flex lh-1">18 courses</span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="mb-16pt">
                                                    <a href="path.html" class="media text-black-100">
                                                        <img src="{{ asset('home/assets/images/paths/wordpress_40x40%402x.png')}}" width="40" height="40" alt="WordPress" class="media-left rounded">
                                                        <span class="media-body">
                                                            <span class="card-title d-block mb-0">WordPress</span>
                                                            <span class="text-muted text-black-70 d-flex lh-1">13 courses</span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="mb-24pt">
                                                    <a href="path.html" class="media text-black-100">
                                                        <img src="{{ asset('home/assets/images/paths/devops_40x40%402x.png')}}" width="40" height="40" alt="Development Tools" class="media-left rounded">
                                                        <span class="media-body">
                                                            <span class="card-title d-block mb-0">Development Tools</span>
                                                            <span class="text-muted text-black-70 d-flex lh-1">5 courses</span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div>
                                                <a href="paths.html" class="btn btn-block text-center btn-outline-secondary">Learning Paths</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div id="courses-business" class="tab-pane">
                                <div class="row no-gutters">
                                    <div class="col-md-6 p-0">
                                        <div class="p-24pt d-flex h-100 flex-column">
                                            <div class="flex">
                                                <h5 class="text-black-100">Courses</h5>
                                                <ul class="nav flex-column mb-24pt">

                                                    <li class="nav-item">
                                                        <a class="nav-link px-0" href="library.html">Business Skills</a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link px-0" href="library.html">Productivity</a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link px-0" href="library.html">Communication</a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link px-0" href="library.html">Leadership</a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link px-0" href="library.html">Management</a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link px-0" href="library.html">Career Development</a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link px-0" href="library.html">Spreadsheets</a>
                                                    </li>

                                                </ul>
                                            </div>
                                            <div>
                                                <a href="library.html" class="btn btn-block text-center btn-secondary">Library</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-0">
                                        <div class="p-24pt d-flex h-100 flex-column">
                                            <div class="flex">
                                                <h5 class="text-black-100">Learning Paths</h5>
                                                <div class="mb-16pt">
                                                    <a href="path.html" class="media text-black-100">
                                                        <img src="{{ asset('home/assets/images/paths/angular_40x40%402x.png')}}" width="40" height="40" alt="Angular" class="media-left rounded">
                                                        <span class="media-body">
                                                            <span class="card-title d-block mb-0">Angular</span>
                                                            <span class="text-muted text-black-70 d-flex lh-1">24 courses</span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="mb-16pt">
                                                    <a href="path.html" class="media text-black-100">
                                                        <img src="{{ asset('home/assets/images/paths/swift_40x40%402x.png')}}" width="40" height="40" alt="Swift" class="media-left rounded">
                                                        <span class="media-body">
                                                            <span class="card-title d-block mb-0">Swift</span>
                                                            <span class="text-muted text-black-70 d-flex lh-1">22 courses</span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="mb-16pt">
                                                    <a href="path.html" class="media text-black-100">
                                                        <img src="{{ asset('home/assets/images/paths/react_40x40%402x.png')}}" width="40" height="40" alt="React Native" class="media-left rounded">
                                                        <span class="media-body">
                                                            <span class="card-title d-block mb-0">React Native</span>
                                                            <span class="text-muted text-black-70 d-flex lh-1">18 courses</span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="mb-16pt">
                                                    <a href="path.html" class="media text-black-100">
                                                        <img src="{{ asset('home/assets/images/paths/wordpress_40x40%402x.png')}}" width="40" height="40" alt="WordPress" class="media-left rounded">
                                                        <span class="media-body">
                                                            <span class="card-title d-block mb-0">WordPress</span>
                                                            <span class="text-muted text-black-70 d-flex lh-1">13 courses</span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="mb-24pt">
                                                    <a href="path.html" class="media text-black-100">
                                                        <img src="{{ asset('home/assets/images/paths/devops_40x40%402x.png')}}" width="40" height="40" alt="Development Tools" class="media-left rounded">
                                                        <span class="media-body">
                                                            <span class="card-title d-block mb-0">Development Tools</span>
                                                            <span class="text-muted text-black-70 d-flex lh-1">5 courses</span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div>
                                                <a href="paths.html" class="btn btn-block text-center btn-outline-secondary">Learning Paths</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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