@extends('admin.layout')

@section('title')
Admins
@endsection


@section('subTitle')
Add Admin
@endsection



@section('mainContent')
<div class="col-md-12 mt-3">
    <div class="card card-primary">
        <div class="card-body">
            @include('massege')
            <form action="{{url('dashboard/admins/storeAdmin')}}" method="POST">

                @csrf

                <div class="form-group px-1 row ">
                    <!--name-->
                    <div class="col-12 my-2">
                        <label for="inputName">Name</label>
                        <input type="text" placeholder="Name" name="name" id="inputName" class="form-control">
                    </div>
                    <!--Email-->
                    <div class="col-12 my-2">
                        <label for="inputName">Email</label>
                        <input type="email" placeholder="Email" name="email" id="inputName" class="form-control">
                    </div>
                    <!--phone-->
                    <div class="col-12 my-2">
                        <label for="inputName">Phone</label>
                        <input type="text" placeholder="Phone" name="phone" id="inputName" class="form-control">
                    </div>
                    <!--password-->
                    <div class="col-12 my-2">
                        <label for="inputName">Password</label>
                        <input type="password" placeholder="Password" name="password" id="inputName" class="form-control">
                    </div>
                    <!--password Confirmation-->
                    <div class="col-12 my-2">
                        <label for="inputName">Password Confirmation</label>
                        <input type="password" placeholder="Password Confirmation" name="password_confirmation" id="inputName" class="form-control">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary px-5 py-2 float-right mr-2">Add</button>

            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>


@endsection

{{-- 
@section("script")
<script>
$(document).ready(function() {
    $('select').selectize({
        sortField: 'text'
    });
});

function addComp() {
    $("#compDiv").append(`
    <div  class="col-sm-9 col-12 pl-md-4 col-md-6 ">
                        <label for="inputName">Name</label>
                        <input type="text" placeholder="Name" name="compName[]" id="inputName" class="form-control">
                    </div>
                    <div  class="col-sm-3 col-6">
                        <label for="inputName">Size</label>
                        <input placeholder="Size" type="text" name="compSize[]" id="inputName" class="form-control">
                    </div>
    `);
}
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"
    integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
@endsection


@section("style")
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css"
    integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
@endsection --}}