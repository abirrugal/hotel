<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Room Management</title>
    <!-- Custom styles for this template -->
    <link href="{{asset('assets/images/icon/favicon.ico')}}" rel="stylesheet">
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/font-awesome.min.css')}}" rel="stylesheet">


    <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/metisMenu.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slicknav.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/default-css.css')}}">
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>


    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />

    <!-- others css -->
    <link rel="stylesheet" href="{{asset('assets/css/typography.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    {{-- Custom Js  --}}
   <!-- modernizr css -->
   <script src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
 
  </head>

  <body>

    <header>

        <div id="preloader">
            <div class="loader"></div>
        </div>

    </header>


{{--  Side bar   --}}


<div class="page-container">


<div class="sidebar-menu">
<div class="sidebar-header">
    <div class="logo">
        <a href="{{route('admin.index')}}"><img src="{{asset(auth()->user()->image)}}" alt="logo"></a>
    </div>
</div>

<div class="main-menu">
<div class="menu-inner">
    <nav>
        <ul class="metismenu" id="menu">


            {{--  Room   --}}
            <li>
                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Room Information
                    </span></a>
                <ul class="collapse">
                    <li><a href="{{route('admin.room.create')}}">Add</a></li>
                    <li><a href="{{route('admin.room')}}">Manage</a></li>
          

                </ul>
            </li>


            {{--  Reservation   --}}
            <li>
                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Reservation
                    </span></a>
                <ul class="collapse">
                    <li><a href="{{route('admin.reservation.create')}}">Add</a></li>
                    <li><a href="{{route('admin.reservation')}}">Manage</a></li>
          

                </ul>
            </li>

            {{--  Check In   --}}
            <li>
                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Check In
                    </span></a>
                <ul class="collapse">
                    <li><a href="{{route('admin.check_in.create')}}">Add</a></li>
                    <li><a href="{{route('admin.check_in')}}">Manage</a></li>
          

                </ul>
            </li>


          {{--  Front Desk   --}}
          <li>
            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Hotel Front Desk
                </span></a>
            <ul class="collapse">
                <li><a href="{{route('admin.reservation_list')}}">Reservation List</a></li>
                <li><a href="{{route('admin.room_list')}}">All Room List</a></li>
                <li><a href="{{route('admin.room.free')}}">Free Room Info</a></li>
                <li><a href="{{route('admin.check_in_list')}}">Check In List</a></li>
                <li><a href="{{route('admin.check_out.list')}}">Check Out List</a></li>
      

            </ul>
        </li>

            {{--  Voucher   --}}
            <li>
                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Voucher
                    </span></a>
                <ul class="collapse">
                    {{--  <li><a href="{{route('admin.voucher.create')}}">Add</a></li>  --}}
                    <li><a href="{{route('admin.voucher')}}">Active Voucher</a></li>
                    <li><a href="{{route('admin.voucher.inactive')}}">Inactive Voucher</a></li>
                    <li><a href="{{route('admin.trans_mode')}}">Trans Mode</a></li>
                    <li><a href="{{route('admin.voucher_type')}}">Voucher type</a></li>

                     
          

                </ul>
            </li>


            {{--  Account   --}}
            <li>
                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Accounts
                    </span></a>
                <ul class="collapse">

                     
                    <li><a href="{{route('admin.collect')}}">Room wise Collection Deatail</a></li>
                    <li><a href="{{route('admin.balance.sheet')}}">Balance Sheet</a></li>
                    <li><a href="{{route('admin.total_balance.sheet')}}">Total Balance Sheet</a></li>
                    <li><a href="{{route('admin.voucher.list')}}">Voucher List</a></li>
                    <li><a href="{{route('admin.expense')}}">Expense List</a></li>
                    
          

                </ul>
            </li>

            {{--  Employee   --}}
            <li>
                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>HR
                    </span></a>
                <ul class="collapse">

                     
                    {{--  <li><a href="{{route('admin.employee.create')}}">Add</a></li>  --}}
                    <li><a href="{{route('admin.employee')}}">Active Employee</a></li>
                    <li><a href="{{route('admin.employee.list')}}">Inactive Employee</a></li>
                    <li><a href="{{route('admin.salary')}}">Salary</a></li>
                    
          

                </ul>
            </li>

            {{--  All Room Info   --}}
            <li>
                <a href="{{route('admin.room_info')}}" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>All Room Information
                    </span></a>
            

              
            </li>

                {{--  Room Clean Status   --}}
                <li>
                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Room Clean Status
                        </span></a>
                    <ul class="collapse">

                        {{--  <li><a href="{{route('admin.room_clean.create')}}">Add</a></li>  --}}
                        <li><a href="{{route('admin.room_clean')}}">Manage</a></li>
              
    
                    </ul>
                </li>
      

                          

  {{--  Create User   --}}

  @if (Illuminate\Support\Facades\Auth::check() &&
  auth()->user()->role_as === 'superadmin')
  <li>
      <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Create User
          </span></a>
      <ul class="collapse">

          <li><a href="{{route('admin.account')}}">Add</a></li>
          <li><a href="{{route('admin.user')}}">Manage</a></li>


      </ul>
  </li>
  @endif

  {{--  Create User Branch  --}}

  @if (Illuminate\Support\Facades\Auth::check() &&
  auth()->user()->role_as === 'branch')
  <li>
      <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Create User
          </span></a>
      <ul class="collapse">

          <li><a href="{{route('admin.branch.create')}}">Add</a></li>
          <li><a href="{{route('admin.branch.user')}}">Manage</a></li>


      </ul>
  </li>
  @endif

           {{--  Create Branch   --}}

           @if (Illuminate\Support\Facades\Auth::check() &&
           auth()->user()->role_as === 'superadmin')
           <li>
               <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Create Branch
                   </span></a>
               <ul class="collapse">

                   <li><a href="{{route('admin.branch.new')}}">Add</a></li>
                   <li><a href="{{route('admin.branch.list')}}">Manage</a></li>
         

               </ul>
           </li>
           @endif







  

 

        </ul>
    </nav>
</div>
</div>
</div>
{{--  End Side menu  --}}

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
            {{-- <div class="search-box pull-left">
                <form action="#">
                    <input type="text" name="search" placeholder="Search..." required>
                    <i class="ti-search"></i>
                </form>
            </div> --}}
        </div>
        <!-- profile info & task notification -->
        {{--  <div class="col-md-6 col-sm-4 clearfix">
            <ul class="notification-area pull-right">
                <li id="full-view"><i class="ti-fullscreen"></i></li>
                <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                <li class="dropdown">
                    <i class="ti-bell dropdown-toggle" data-toggle="dropdown">
                        <span>2</span>
                    </i>
                    <div class="dropdown-menu bell-notify-box notify-box">
                        <span class="notify-title">You have 3 new notifications <a href="#">view all</a></span>
                        <div class="nofity-list">
                            <a href="#" class="notify-item">
                                <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                <div class="notify-text">
                                    <p>You have Changed Your Password</p>
                                    <span>Just Now</span>
                                </div>
                            </a>
                            <a href="#" class="notify-item">
                                <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i></div>
                                <div class="notify-text">
                                    <p>New Commetns On Post</p>
                                    <span>30 Seconds ago</span>
                                </div>
                            </a>
                            <a href="#" class="notify-item">
                                <div class="notify-thumb"><i class="ti-key btn-primary"></i></div>
                                <div class="notify-text">
                                    <p>Some special like you</p>
                                    <span>Just Now</span>
                                </div>
                            </a>
                            <a href="#" class="notify-item">
                                <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i></div>
                                <div class="notify-text">
                                    <p>New Commetns On Post</p>
                                    <span>30 Seconds ago</span>
                                </div>
                            </a>
                            <a href="#" class="notify-item">
                                <div class="notify-thumb"><i class="ti-key btn-primary"></i></div>
                                <div class="notify-text">
                                    <p>Some special like you</p>
                                    <span>Just Now</span>
                                </div>
                            </a>
                            <a href="#" class="notify-item">
                                <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                <div class="notify-text">
                                    <p>You have Changed Your Password</p>
                                    <span>Just Now</span>
                                </div>
                            </a>
                            <a href="#" class="notify-item">
                                <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                <div class="notify-text">
                                    <p>You have Changed Your Password</p>
                                    <span>Just Now</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="dropdown">
                    <i class="fa fa-envelope-o dropdown-toggle" data-toggle="dropdown"><span>3</span></i>
                    <div class="dropdown-menu notify-box nt-enveloper-box">
                        <span class="notify-title">You have 3 new notifications <a href="#">view all</a></span>
                        <div class="nofity-list">
                            <a href="#" class="notify-item">
                                <div class="notify-thumb">
                                    <img src="assets/images/author/author-img1.jpg" alt="image">
                                </div>
                                <div class="notify-text">
                                    <p>Aglae Mayer</p>
                                    <span class="msg">Hey I am waiting for you...</span>
                                    <span>3:15 PM</span>
                                </div>
                            </a>
                            <a href="#" class="notify-item">
                                <div class="notify-thumb">
                                    <img src="assets/images/author/author-img2.jpg" alt="image">
                                </div>
                                <div class="notify-text">
                                    <p>Aglae Mayer</p>
                                    <span class="msg">When you can connect with me...</span>
                                    <span>3:15 PM</span>
                                </div>
                            </a>
                            <a href="#" class="notify-item">
                                <div class="notify-thumb">
                                    <img src="assets/images/author/author-img3.jpg" alt="image">
                                </div>
                                <div class="notify-text">
                                    <p>Aglae Mayer</p>
                                    <span class="msg">I missed you so much...</span>
                                    <span>3:15 PM</span>
                                </div>
                            </a>
                            <a href="#" class="notify-item">
                                <div class="notify-thumb">
                                    <img src="assets/images/author/author-img4.jpg" alt="image">
                                </div>
                                <div class="notify-text">
                                    <p>Aglae Mayer</p>
                                    <span class="msg">Your product is completely Ready...</span>
                                    <span>3:15 PM</span>
                                </div>
                            </a>
                            <a href="#" class="notify-item">
                                <div class="notify-thumb">
                                    <img src="assets/images/author/author-img2.jpg" alt="image">
                                </div>
                                <div class="notify-text">
                                    <p>Aglae Mayer</p>
                                    <span class="msg">Hey I am waiting for you...</span>
                                    <span>3:15 PM</span>
                                </div>
                            </a>
                            <a href="#" class="notify-item">
                                <div class="notify-thumb">
                                    <img src="assets/images/author/author-img1.jpg" alt="image">
                                </div>
                                <div class="notify-text">
                                    <p>Aglae Mayer</p>
                                    <span class="msg">Hey I am waiting for you...</span>
                                    <span>3:15 PM</span>
                                </div>
                            </a>
                            <a href="#" class="notify-item">
                                <div class="notify-thumb">
                                    <img src="assets/images/author/author-img3.jpg" alt="image">
                                </div>
                                <div class="notify-text">
                                    <p>Aglae Mayer</p>
                                    <span class="msg">Hey I am waiting for you...</span>
                                    <span>3:15 PM</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="settings-btn">
                    <i class="ti-settings"></i>
                </li>
            </ul>
        </div>  --}}
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
                            <li><a href="{{route('admin.index')}}">Home</a></li>
                            <li><span>Dashboard</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 clearfix">
                    <div class="user-profile pull-right">

                         <img class="avatar user-thumb" src="{{asset(auth()->user()->image)}}" alt="avatar"> 


{{-- User name  --}}
                        <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{auth()->user()->name}}<i class="fa fa-angle-down"></i></h4>

                        <div class="dropdown-menu">
                            {{--  <a class="dropdown-item" href="#">Message</a>
                            <a class="dropdown-item" href="#">Settings</a>  --}}


{{-- Logout --}}


                            <form method="POST" class="d-inline p-0 m-0" action="{{ route('logout') }}">
                                @csrf
                                <div class="nav-item">
                                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit(); " role="button">
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
            <div class="alert mt-3 alert-{{session('type')}}">
              {{session('message')}}
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
    <script src="{{asset('assets/js/print.js')}}"></script>
    <!-- bootstrap js -->
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.slicknav.min.js')}}"></script>

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
    <script src="{{asset('assets/js/line-chart.js')}}"></script>
    <!-- all bar chart activation -->
    <script src="{{asset('assets/js/bar-chart.js')}}"></script>
    <!-- all pie chart -->
    <script src="{{asset('assets/js/pie-chart.js')}}"></script>
    <!-- others plugins -->
    <script src="{{asset('assets/js/plugins.js')}}"></script>
    <script src="{{asset('assets/js/scripts.js')}}"></script>


   <!-- SELECT MULTIPLE  -->

<!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
<style>
.user-profile .dropdown-menu a{
    padding: 5px;
    
}
.pr{
    position: absolute;
    bottom: 0;
    right:0;
    left:0;
}
</style>

@yield('before_body')


  </body>
</html>