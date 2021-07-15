@extends('admin.layout')

@section('title')
Drugs
@endsection


@section('subTitle')
Add Drug
@endsection



@section('mainContent')
<div class="col-md-12 mt-3">
    <div class="card card-primary">
        <div class="card-body">
            @include('massege')
            <form action="{{url('dashboard/drugs/storeDrug')}}" method="GET">

                @csrf

                <div class="form-group px-1 row ">
                    <!--name-->
                    <div class="col-sm-6 ">
                        <label for="inputName">Drug Name</label>
                        <input type="text" placeholder="Name" name="name" id="inputName" class="form-control">
                    </div>
                    <!--form-->
                    <div class="col-sm-3 col-7 ">
                        <label for="inputName">Drug Form</label>
                        <input type="text" placeholder="Form" id="inputName" class="form-control" name="form">
                    </div>
                    <!--price-->
                    <div class="col-sm-2 col-5 ">
                        <label for="inputName">Price</label>
                        <input type="text" placeholder="price" id="inputName" class="form-control" name="price">
                    </div>
                </div>

                <!--Composition-->
                <div id="compDiv" class="mb-2 form-group px-1 row ">
                    <label class="col-12 " for="inputName">Composition :</label>

                    <div id="compName" class="col-sm-9 col-12 pl-md-4 col-md-6 ">
                        <label for="inputName">Name</label>
                        <input type="text" placeholder="Name" name="compName[]" id="inputName" class="form-control">
                    </div>
                    <div id="compSize" class="col-sm-3 col-6">
                        <label for="inputName">Size</label>
                        <input placeholder="Size" type="text" name="compSize[]" id="inputName" class="form-control">
                    </div>

                </div>
                <a onclick="addComp()" class="mx-4  btn text-info "><i class="fal  fa-plus-circle"></i> Add
                    Composition</a>
                <!--Uses-->
                <div class="form-group px-1">
                    <label for="inputStatus">Drug Uses</label>
                    <select name="uses" placeholder="Select One" class="form-control">
                        <option disabled selected value="">Select one</option>
                        @foreach ($cats as $cat)
                        <option value="{{$cat->id}}">{{$cat->uses}}</option>
                        @endforeach
                    </select>
                </div>


                <button type="submit" class="btn btn-primary px-5 py-2 float-right mr-2">Add</button>

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
@endsection