@extends('admin.layout')

@section('title')
Profile
@endsection

@section('subTitle')
{{Auth::user()->name}} Profile
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
                        @if(Auth::user()->img == "")
                        <img src="{{asset('admin/img/avatar.png')}}" class="img-circle elevation-2" alt="User Image">
                        @else
                        <img src="{{asset('uploads/'.Auth::user()->img)}}" class="img-circle elevation-2"
                            alt="User Image">
                        @endif
                    </div>
    
                    <h3 class="profile-username text-center my-3">{{Auth::user()->name}}</h3>
    
    
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Email</b><a class="float-right">{{Auth::user()->email}}</a>
                        </li>
                        <li class="list-group-item">
                        <b>Phone</b><a class="float-right">{{Auth::user()->phone}}</a>
                        </li>
                        <li class="list-group-item">
                        <b>Created At</b><a class="float-right">{{date_format(Auth::user()->created_at, 'd-M-Y h:i A')}}</a>
                        </li>
                        
                    </ul>
    
                    <a href="{{url('dashboard/profile/Edit/'.Auth::user()->id)}}" class="btn btn-primary btn-block"><b>Edit</b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
            
            </div>

        </div>
        <!-- /.card-body -->
    </div>


</div>

@endsection