@extends('admin.layout')

@section('title')
Edit
@endsection

@section('subTitle')
Edit
@endsection


@section('myscript')

<script src="{{asset('admin/js/bootstrap.min.js')}}"></script>

@endsection

@section('mystyle')

<link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">

@endsection






@section('mainContent')
<div class="row mt-3 col-12">
                
                <div class="card col-12">
  
                  <div class="card-body">
  

<form >

      @csrf

        <div class="row mb-3">
          <label >name</label>
          <div>
            <input type="text" class="form-control" name="name" value="{{$drug->name}}" >
          </div>
        </div>
      <div class="row mb-3">
          <label >price</label>
          <div>
            <input type="text" class="form-control" name="price" value="{{$drug->price}}" >
          </div>
        </div>
      <div class="row mb-3">
          <label >form</label>
          <div>
            <input type="text" class="form-control" name="form" value="{{$drug->form}}" >
          </div>
        </div>
        <div>
          <label>composition</label>
          <div>
            <input type="text" class="form-control" name="composition" value="{{$drug->composition}}" >
          </div>
        </div>
      
        <button type="submit">submit</button>

</form>



</div>
                <!-- /.card-body -->
              </div>
            
        
            </div>
@endsection