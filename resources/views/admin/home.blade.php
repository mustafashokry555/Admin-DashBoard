@extends('admin.layout')

@section('title')
Home
@endsection


@section('subTitle')
Dashboard
@endsection

@section('mainContent')

<div class="row mt-3 col-12">

    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$adminsNum}}</h3>
                <p>Admins</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-cog"></i>
            </div>
            <a href="{{url('dashboard/admins')}}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-secondary">
            <div class="inner">
                <h3>{{$usersNum}}</h3>

                <p>Users</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-plus"></i>
            </div>
            <a href="{{url('dashboard/users')}}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{$drugsNum}}</h3>

                <p>Drugs</p>
            </div>
            <div class="icon">
                <i class="fas fa-capsules"></i>
            </div>
            <a href="{{url('dashboard/drugs')}}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>


    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{$drugCatsNum}}</h3>
                <p>Drug Categores</p>
            </div>
            <div class="icon">
                <i class="fas fa-th"></i>
            </div>
            <a href="{{url('dashboard/categores')}}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>


    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{$pharmsNum}}</h3>

                <p>Pharmacies</p>
            </div>
            <div class="icon">
                <i class="fas fa-prescription-bottle-alt"></i>
            </div>
            <a href="{{url('dashboard/pharms')}}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>


    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-light">
            <div class="inner">
                <h3>0</h3>

                <p>Diseases</p>
            </div>
            <div class="icon">
                <i class="fas fa-disease"></i>
            </div>
            <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>


</div>


@endsection