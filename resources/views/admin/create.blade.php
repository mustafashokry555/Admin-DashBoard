@extends('admin.layout')

@section('title')
Add Druge
@endsection

@section('mainContent')

<form method="post" action="{{ url('dashboard/drugs/store') }}">

  @csrf

    <div class="row mb-3">
      <label >name</label>
      <div>
        <input type="text" class="form-control" name="name"  >
      </div>
    </div>
  <div class="row mb-3">
      <label >price</label>
      <div>
        <input type="text" class="form-control" name="price"  >
      </div>
    </div>
  <div class="row mb-3">
      <label >form</label>
      <div>
        <input type="text" class="form-control" name="form"  >
      </div>
    </div>
    <div>
      <label>composition</label>
      <div>
      <input type="text" class="form-control" name="composition"  >
      </div>
    </div>
  
    <button type="submit">Add</button>
</form>



@endsection


@section('subTitle')
Add Drug
@endsection