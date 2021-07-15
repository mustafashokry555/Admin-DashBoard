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
    <title>Chose Disease</title>
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('admin/css/all.min.css')}}">

    <link rel="stylesheet" href="{{asset('admin/css/adminlte.css')}}">


</head>

<body class="hold-transition sidebar-mini">
    <a style="position: absolute; right:10px; top:10px; z-index: 1000;" class=" mr-3 px-3 btn btn-info" href="{{url('dashboard')}}">Back</a>
    <h1 class="card-header text-center">Choose the disease you want to predict <br>the possibility of catching it in the future</h1>
<div class="row d-flex justify-content-center mt-3 col-12">

    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-info">
            <div class=" inner">
                <h2>Stroke</h2>
            </div>
            <div class="icon">
                <i class="fas fa-disease"></i>
            </div>
            <a target="_blanck" href="http://127.0.0.1:5000/stroke" class="small-box-footer">
                Check <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>





</div>

</body>

</html>