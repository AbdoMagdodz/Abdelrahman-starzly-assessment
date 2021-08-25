<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}"/>
    <title>Starzly</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Sweet Alerts-->
    <link href="{{asset('assets/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link href="{{asset('css-mini/style.css')}}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{asset('css-mini/colors/default.css')}}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .hide-menu {
            font-weight: 500
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
        }

        .error-container {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            padding: 15px 0 15px 15px;
            margin-bottom: 15px;
            text-align: left;
            border-radius: 12px;
        }

        .error-span {
            color: #721c24;
            font-weight: bold;
        }

        .error-message {
            color: #721c24;
            font-weight: 500;
        }

        .error-icon {
            color: #721c24;
            border-radius: 30%;
            animation: shadow-pulse 1s infinite;
        }

        @keyframes shadow-pulse {
            0% {
                box-shadow: 0 0 0 0px rgba(0, 0, 0, 0.2);
            }
            100% {
                box-shadow: 0 0 0 35px rgba(0, 0, 0, 0);
            }
        }

        .page-titles {
            padding: 11px !important;
            margin: 0 -30px 20px !important;
        }

        .sidebar-nav {
            background: #fff;
            padding: 0px;
            padding-top: 10px;
        }

        .sidebar-nav ul li.nav-devider {
            height: 1px;
            background: rgba(120, 130, 140, 0.13);
            display: block;
            margin: 5px 0;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @yield('style')
</head>

<body class="fix-header fix-sidebar card-no-border">
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <!-- ==============================SYSTEM_ADMIN================================ -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <div class="navbar-header">
                <a class="navbar-brand" href="{{url('/home')}}"></a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav mr-auto mt-md-0">
                    <!-- This is  -->
                    <li class="nav-item"><a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark"
                                            href="javascript:void(0)"><i class="mdi mdi-menu"></i></a></li>
                    <li class="nav-item"><a
                            class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark"
                            href="javascript:void(0)"><i class="ti-menu"></i></a></li>
                </ul>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <ul class="navbar-nav my-lg-0">

                    <!-- ============================================================== -->
                    <!-- Profile -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href=""
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                src="{{asset('assets/images/users/admin.png')}}" alt="user"
                                class="profile-pic"/></a>
                        <div class="dropdown-menu dropdown-menu-right scale-up">
                            <ul class="dropdown-user">
                                <li role="separator" class="divider"></li>
                                <form id="logout" method="post" action="{{route('logout')}}">@csrf</form>
                                <li><a href="javascript:void(0)" onclick="$('#logout').submit()"><i
                                            class="fa fa-power-off"></i> Logout</a></li>
                            </ul>
                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- Language -->
                    <!-- ============================================================== -->
                </ul>
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar" data-scroll-to-active="true">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- User profile -->
            <div class="user-profile"
                 style="background: url('{{asset('assets/images/background/user-info.jpg')}}') no-repeat;">
                <!-- User profile image -->
                <div class="profile-img"><img src="{{asset('assets/images/users/admin.png')}}" alt="user"/>
                </div>
                <!-- User profile text-->
                <div class="profile-text">
                    <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown"
                       role="button" aria-haspopup="true" aria-expanded="true">Starzly</a>
                    <div class="dropdown-menu animated flipInY">
                        <a href="javascript:void(0)" onclick="$('#logout').submit()" class="dropdown-item">
                            <i class="fa fa-power-off"></i> Logout
                        </a>
                    </div>
                </div>
            </div>
            <!-- End User profile text-->
            <!-- Sidebar navigation-->
        @include('includes.sidebar')
        <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
        <div class="sidebar-footer">
            <!-- item--><a href="" class="link" data-toggle="tooltip" title="" data-original-title="Settings"
                           aria-describedby="tooltip900156"><i class="ti-settings"></i></a>
            <!-- item--><a href="" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i
                    class="mdi mdi-gmail"></i></a>
            <!-- item--><a href="javascript:void(0)" onclick="$('#logout').submit()" class="link" data-toggle="tooltip"
                           title="" data-original-title="Logout"><i class="mdi mdi-power"></i></a></div>
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-8 col-8 align-self-center">
                    <h3 class="text-themecolor">@yield('parent-breadcrumb')</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a
                                href="@yield('bread-1-link')">@yield('child-1-breadcrumb')</a></li>
                        <li class="breadcrumb-item active">@yield('child-2-breadcrumb')</li>
                        @yield('add-breadcrumb')
                    </ol>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
        @yield('content')
        <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer"> © {{date('Y')}} Starzly</footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('assets/plugins/popper/popper.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{asset('js/jquery.slimscroll.js')}}"></script>

<!--Wave Effects -->
<script src="{{asset('js/waves.js')}}"></script>

<!--Menu sidebar -->
<script src="{{asset('js/sidebarmenu.js')}}"></script>

<script src="{{asset('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
<script src="{{asset('assets/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!--Sweet alert-->
<script src="{{asset('assets/plugins/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/plugins/sweetalert/jquery.sweet-alert.custom.js')}}"></script>
<!--End sweet alert-->

<!--Custom JavaScript -->
<script src="{{asset('js/custom.min.js')}}"></script>
<script src="{{asset('js/validation.js')}}"></script>
@yield('scripts')
<!-- ============================================================== -->
<!-- EndThis page plugins -->
<!-- ============================================================== -->

@if(session()->has('success'))
    <script>
        swal("Good job!", "{{session()->get('success')}}", "success");
    </script>
@endif
@if(session()->has('fail'))
    <script>
        swal("Sorry!", "{{session()->get('fail')}}", "warning");
    </script>
@endif
@if(session()->has('alert'))
    <script>
        swal("Note!", "{{session()->get('alert')}}", "warning");
    </script>
@endif
</body>
</html>
