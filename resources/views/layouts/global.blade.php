<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kelas Visual | @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">

    @yield('css')

    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    {{-- SweetAlert2 --}}
    <script src="{{ asset('js/sweetalert2/sweetalert2.min.js') }}"></script>
    <link href="{{ asset('js/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('bower_components/select2/dist/css/select2.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="{{asset('dist/css/skins/skin-black.min.css')}}">

    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('bower_components/jvectormap/jquery-jvectormap.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/yogi.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-black sidebar-mini">

<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Kelas Visual</b></span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                @if(\Auth::user())
                {{-- <img src="{{asset('storage/'.Auth::user()->avatar)}}" class="user-image" alt="User Image"> --}}
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">{{Auth::user()->name}}</span>

                </a>
                <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                    {{-- <img src="{{asset('storage/'.Auth::user()->avatar)}}" class="img-circle" alt="User Image"> --}}

                    <p>
                    {{Auth::user()->name}}
                    <small>Member since {{Auth::user()->created_at}}</small>
                    </p>
                </li>
                <!-- Menu Footer-->
                @endif
                <li class="user-footer">
                    <div class="pull-right">
                    <form action="{{route("logout")}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-default btn-flat">Log Out</button>
                    </form>
                    </div>
                </li>
                </ul>
            </li>

            </ul>
        </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel" style="min-height: 70px;">
            <div class="pull-left image">
            @if(\Auth::user())
            {{-- <img src="{{asset('storage/'.Auth::user()->avatar)}}" class="img-circle" alt="User Image"> --}}
            </div>
            <div class="pull-left info">
            <p>{{Auth::user()->name}}</p>

            @endif
            <!-- Status -->
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Navigasi</li>
            <!-- Optionally, you can add icons to the links -->
            {{-- <li class="{{ (request()->is('home*')) ? 'active' : '' }}">
                <a href="{{route('home')}}"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a>
            </li> --}}
            {{-- <li class="header">User</li> --}}

                <!-- Optionally, you can add icons to the links -->
                <li class="{{ (request()->is('users*')) ? 'active' : '' }}">
                    <a href="{{route('users.index')}}"><i class="fa fa-user"></i> <span>Users</span></a>
                </li>

            <li class="header">Lesson</li>

                <!-- Optionally, you can add icons to the links -->
                <li class="{{ (request()->is('lessons*')) ? 'active' : '' }}">
                    <a href="{{route('lessons.index')}}"><i class="fa fa-user"></i> <span>Lesson</span></a>
                </li>

                <!-- Optionally, you can add icons to the links -->
                <li class="{{ (request()->is('pratices*')) ? 'active' : '' }}">
                    <a href="{{route('pratices.index')}}"><i class="fa fa-user"></i> <span>Pratice</span></a>
                </li>

                <!-- Optionally, you can add icons to the links -->
                <li class="{{ (request()->is('course*')) ? 'active' : '' }}">
                    <a href="{{route('course')}}"><i class="fa fa-user"></i> <span>Course</span></a>
                </li>


        <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

    @yield('content')

    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
        Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2019 <a href="#">Kelas Visual</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane active" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
            <li>
                <a href="javascript:;">
                <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                    <p>Will be 23 on April 24th</p>
                </div>
                </a>
            </li>
            </ul>
            <!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
            <li>
                <a href="javascript:;">
                <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="pull-right-container">
                        <span class="label label-danger pull-right">70%</span>
                    </span>
                </h4>

                <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                </div>
                </a>
            </li>
            </ul>
            <!-- /.control-sidebar-menu -->

        </div>
        <!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
        <!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
            <h3 class="control-sidebar-heading">General Settings</h3>

            <div class="form-group">
                <label class="control-sidebar-subheading">
                Report panel usage
                <input type="checkbox" class="pull-right" checked>
                </label>

                <p>
                Some information about this general settings option
                </p>
            </div>
            <!-- /.form-group -->
            </form>
        </div>
        <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
{{-- Validator --}}
<script src="{{ asset('js/validator/validator.min.js') }}"></script>
@yield('js')


<!-- SlimScroll -->
<script src="{{asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('bower_components/fastclick/lib/fastclick.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
    Both of these plugins are recommended to enhance the
    user experience. -->
</body>
</html>
