@extends('admin.layout')

@section('title')
User Info
@endsection

@section('subTitle')
{{$user->name}} Information
@endsection



@section('mainContent')
<div class="row mt-3 col-12">
    
    <div class="card col-12">
        
        <div class="card-body d-flex justify-content-center">
            @include('massege')

            <div class="col-md-8 ">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                    <div class="text-center">
                        @if($user->img == "")
                        <img src="{{asset('admin/img/avatar.png')}}" class="img-circle elevation-2" alt="User Image">
                        @else
                        <img src="{{asset('uploads/'.$user->img)}}" width="120px" height="120px" class="img-circle elevation-2"
                            alt="User Image">
                        @endif
                    </div>
    
                    <h3 class="profile-username text-center my-3">{{$user->name}}</h3>
    
    
                    <ul class=" list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Email</b><a class="float-right">{{$user->email}}</a>
                        </li>
                        <li class="list-group-item">
                        <b>Phone</b><a class="float-right">{{$user->phone}}</a>
                        </li>
                        @if($user->pharm_name)
                        <li class="list-group-item">
                            <b>Pharm Name</b><a class="float-right">{{$user->pharm_name}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Address</b><a class="float-right">{{$user->adress}}</a>
                                </li>
                                @endif
                        <li class="list-group-item">
                        <b>Created At</b><a class="float-right">{{date_format($user->created_at, 'd-M-Y h:i A')}}</a>
                        </li>
                    </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
            
            </div>

        </div>
        <!-- /.card-body -->
    </div>


</div>

@endsection