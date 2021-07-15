<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <link rel="shortcut icon" href="{{asset('admin/img/logo.png')}}" type="image/png">
    <title>DashBoard - @yield('title')</title>
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('admin/css/all.min.css')}}">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('admin/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/responsive.bootstrap4.min.css')}}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin/css/adminlte.css')}}">

    @yield("style")


</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="justify-content: space-between">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <form method="POST" action="{{url('logout')}}">
                @csrf
                <button type="submit" class="mr-4 btn btn-danger">Sign Out</button>
            </form>

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{url('dashboard')}}" class="brand-link">
                <img src="{{asset('admin/img/logo.png')}}" alt="AdminLTE Logo"
                    class="brand-image bg-wight img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">PharmaGuied</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        @if(Auth::user()->img == "")
                        <img src="{{asset('admin/img/avatar.png')}}" class="img-circle elevation-2" alt="User Image">
                        @else
                        <img src="{{asset('uploads/'.Auth::user()->img)}}" class="img-circle elevation-2"
                            alt="User Image">
                        @endif
                    </div>
                    <div class="info">
                        <a href="{{url('dashboard/profile')}}" class="d-block">{{Auth::user()->name}}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->

                        <li class="nav-item">
                            <a href="{{url('dashboard')}}" class="active nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Home</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{url('dashboard/admins')}}" class="nav-link">
                                <i class="nav-icon fas fa-user-cog"></i>
                                <p>
                                    Admins
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{url('dashboard/users')}}" class="nav-link">
                                <i class="nav-icon fas fa-user-plus"></i>
                                <p>
                                    Users
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{url('dashboard/drugs')}}" class="nav-link">
                                <i class="nav-icon fas fa-capsules"></i>
                                <p>
                                    Drugs
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{url('dashboard/categores')}}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Drug Categores
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{url('dashboard/pharms')}}" class="nav-link">
                                <i class="nav-icon fas fa-prescription-bottle-alt"></i>
                                <p>
                                    Pharmacies
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-disease"></i>
                                <p>
                                    Diseases
                                </p>
                            </a>
                        </li>


                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">

                        <div class="col-sm-12">
                            <h1 class="float-left m-0 text-dark">@yield('subTitle')</h1>
                            <div class="float-right">
                            @yield('addbutton')
                            </div>
                        </div><!-- /.col -->



                        @yield('mainContent')



                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">

                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                PharmaGuied
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2021 <a href="{{url('dashboard')}}">DashBoard</a>.</strong>
        </footer>
    </div>
    <!-- ./wrapper -->


    <!-- REQUIRED SCRIPTS -->
    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{asset('admin/js/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('admin/js/bootstrap.bundle.js')}}"></script>

    <!-- DataTables  & Plugins -->
    <script src="{{asset('admin/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/js/jszip.min.js')}}"></script>
    <script src="{{asset('admin/js/pdfmake.min.js')}}"></script>
    <script src="{{asset('admin/js/vfs_fonts.js')}}"></script>
    <script src="{{asset('admin/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin/js/buttons.colVis.min.js')}}"></script>



    <!-- AdminLTE App -->
    <script src="{{asset('admin/js/adminlte.js')}}"></script>


    <!-- Page specific script -->
    <script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["csv", "excel"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
    </script>
    @yield("script")
</body>

</html>