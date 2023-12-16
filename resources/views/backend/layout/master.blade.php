<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <title>Room Management</title>
        <!-- Custom styles for this template -->
        <link href="{{ asset('assets/images/icon/favicon.ico') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/metisMenu.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/slicknav.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/default-css.css') }}">
        <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

        <!-- amchart css -->
        <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css"
            media="all" />
        <!-- others css -->
        <link rel="stylesheet" href="{{ asset('assets/css/typography.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
            integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        {{-- Custom Js  --}}
        <!-- modernizr css -->
        <script src="{{ asset('assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    </head>

    <body>
        <header>
            <div id="preloader">
                <div class="loader"></div>
            </div>
        </header>
  
        <div class="page-container">

            @include('backend.layout.sidebar')

            <div class="main-content">
                <!-- header area start -->
                <div class="header-area">
                    <div class="row align-items-center">
                        <!-- nav and search button -->
                        <div class="col-md-6 col-sm-8 clearfix">
                            <div class="nav-btn pull-left">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- header area end -->
                <!-- page title area start -->
                <div class="page-title-area">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="breadcrumbs-area clearfix">
                                <h4 class="page-title pull-left">Dashboard</h4>
                                <ul class="breadcrumbs pull-left">
                                    <li><a href="{{ route('admin.index') }}">Home</a></li>
                                    <li><span>Dashboard</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 clearfix">
                            <div class="user-profile pull-right">
                                <img class="avatar user-thumb" src="{{ asset(auth()->user()->image) }}"
                                    alt="avatar">

                                {{-- User name  --}}
                                <h4 class="user-name dropdown-toggle" data-toggle="dropdown">
                                    {{ auth()->user()->name }}<i class="fa fa-angle-down"></i></h4>

                                <div class="dropdown-menu">
                                    {{-- Logout --}}
                                    <form method="POST" class="d-inline p-0 m-0" action="{{ route('logout') }}">
                                        @csrf
                                        <div class="nav-item">
                                            <a class="nav-link" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                this.closest('form').submit(); "
                                                role="button">
                                                <i class="fas fa-sign-out-alt"></i>
                                                Logout
                                            </a>
                                        </div>
                                    </form>
                                    {{--  <a class="dropdown-item" href="#">Log Out</a>  --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- page title area end -->

                <div class="main-content-inner">

                    @if (session('message'))
                        <div class="alert mt-3 alert-{{ session('type') }}">
                            {{ session('message') }}
                        </div>
                    @endif
                    @yield('main_content')

                </div>

            </div>
            {{--  End main content   --}}
            <!-- footer area start-->
            <footer>
                <div class="footer-area pb-4 ">
                    <p>© Design & Developed By <a href="https://quicktech-ltd.com">QuickTech IT</a></p>
                </div>
            </footer>
            <!-- footer area end-->
        </div>
        {{--  End page container  --}}

        <!-- offset area end -->
        <!-- jquery latest version -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('assets/js/print.js') }}"></script>
        <!-- bootstrap js -->
        <script src="{{ asset('assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>

        <!-- start chart js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
        <!-- start highcharts js -->
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <!-- start zingchart js -->
        <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
        <script>
            zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
            ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
        </script>
        <!-- all line chart activation -->
        <script src="{{ asset('assets/js/line-chart.js') }}"></script>
        <!-- all bar chart activation -->
        <script src="{{ asset('assets/js/bar-chart.js') }}"></script>
        <!-- all pie chart -->
        <script src="{{ asset('assets/js/pie-chart.js') }}"></script>
        <!-- others plugins -->
        <script src="{{ asset('assets/js/plugins.js') }}"></script>
        <script src="{{ asset('assets/js/scripts.js') }}"></script>

        <style>
            .user-profile .dropdown-menu a {
                padding: 5px;

            }

            .pr {
                position: absolute;
                bottom: 0;
                right: 0;
                left: 0;
            }
        </style>

        @yield('before_body')

    </body>

</html>
