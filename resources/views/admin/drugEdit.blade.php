@extends('admin.layout')

@section('title')
Drugs
@endsection


@section('subTitle')
Edit Drug
@endsection



@section('mainContent')
<div class="col-md-12 mt-3">
    <div class="card card-primary">
        <div class="card-body">
        @include('massege')
            <form action="{{url('dashboard/drugs/handelEdit/'.$drug->id)}}" method="GET">

                @csrf

                <div class="form-group px-1 row ">
                    <!--name-->
                    <div class="col-sm-6 ">
                        <label for="inputName">Drug Name</label>
                        <input type="text" name="name" id="inputName" class="form-control" value="{{$drug->name}}">
                    </div>
                    <!--form-->
                    <div class="col-sm-3 col-7 ">
                        <label for="inputName">Drug Form</label>
                        <input type="text" id="inputName" class="form-control" name="form" value="{{$drug->form}}">
                    </div>
                    <!--price-->
                    <div class="col-sm-2 col-5 ">
                        <label for="inputName">Price</label>
                        <input type="text" id="inputName" class="form-control" name="price" value="{{$drug->price}}">
                    </div>
                </div>

                <!--Composition-->
                <div class="form-group px-1 row ">
                    <label class="col-12 " for="inputName">Composition :</label>
                    @foreach ($drug->composition as $comp)

                    <div class="col-sm-9 col-12 pl-md-4 col-md-6 ">
                        <label for="inputName">Name</label>
                        <input type="text" name="compName[]" id="inputName" class="form-control" value="{{$comp->name}}">
                    </div>
                    <div class="col-sm-3 col-6">
                        <label for="inputName">Size</label>
                        <input type="text" name="compSize[]" id="inputName" class="form-control" value="{{$comp->size}}">
                    </div>

                    @endforeach

                </div>

                <!--Uses-->
                <div class="form-group px-1">
                    <label for="inputStatus">Drug Uses</label>
                    <select name="uses" class="form-control">
                        @foreach ($cats as $cat)
                        @if($cat->uses == $drug->uses)
                        <option selected value="{{$cat->id}}">{{$cat->uses}}</option>
                        @else
                        <option value="{{$cat->id}}">{{$cat->uses}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <!--Side Effects
                <div class="form-group px-1">
                    <label for="inputDescription">Side Effects</label>
                    <textarea id="inputDescription" name="side_effects" class="form-control" rows="4">{{$drug->side_effects}}</textarea>
                </div>-->
                <!--Contraindications
                <div class="form-group px-1">
                    <label for="inputDescription">Drug's Contraindications</label>
                    <textarea id="inputDescription" name="not_use" class="form-control" rows="4">{{$drug->not_use}}</textarea>
                </div>-->

                <button type="submit" class="btn btn-primary px-5 py-2 float-right mr-2">Edit</button>

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