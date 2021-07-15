@extends('admin.layout')

@section('title')
Edit Profile
@endsection


@section('subTitle')
Edit Profile
@endsection



@section('mainContent')
<div class="col-md-12 mt-3">
    <div class="card card-primary">
        <div class="card-body">
        @include('massege')
            <form enctype="multipart/form-data" action="{{url('dashboard/profile/handelEdit/'.$user->id)}}" method="get">

                @csrf

                <div class="text-center mb-4">
                    @if($user->img == null)
                    <img src="{{asset('admin/img/avatar.png')}}" class="img-circle elevation-2" alt="User Image">
                    @else
                    <img src="{{asset('uploads/'.$user->img)}}" class="img-circle elevation-2"
                        alt="User Image">   
                    @endif
                </div>
                <div class="form-group px-1 row ">
                    <!--name-->
                    <div class="col-sm-6 ">
                        <label for="inputName">Name</label>
                        <input type="text" name="name" id="inputName" class="form-control" value="{{$user->name}}">
                    </div>
                    <!--phone-->
                    <div class="col-sm-3 col-7 ">
                        <label for="inputName">Phone</label>
                        <input type="text" id="inputName" class="form-control" name="phone" value="{{$user->phone}}">
                    </div>


                    <!--password-->
                    <div class="col-sm-9 mt-2">
                        <label for="inputName">Password</label>
                        <input type="password" id="inputName" class="form-control" name="password">
                    </div>
                </div>

                

                
                

                <button type="submit" class="btn btn-primary px-5 py-2 float-left mr-2">Edit</button>

            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>


@endsection


@section("script")
<script>
$(document).ready(function() {
    $('select').selectize({
        sortField: 'text'
    });
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"
    integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
@endsection


@section("style")
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css"
    integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
@endsection