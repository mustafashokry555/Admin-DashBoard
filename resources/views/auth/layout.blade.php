<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('admin/img/logo.png')}}" type="image/png">
    <title>DashBoard | @yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('admin/css/all.min.css')}}">

    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('admin/css/icheck-bootstrap.min.css')}}">

    <!-- Theme style -->  
    <link rel="stylesheet" href="{{asset('admin/css/adminlte.min.css')}}">
</head>
 
@yield('content') 


 <!-- jQuery -->
 <script src="{{asset('admin/js/jquery.min.js')}}"></script>
 <!-- Bootstrap 4 -->
 <script src="{{asset('admin/js/bootstrap.bundle.min.js')}}"></script>
 <!-- AdminLTE App -->
 <script src="{{asset('admin/js/adminlte.min.js')}}"></script>
 
 @yield('script')

 
 
 </body>
 </html>