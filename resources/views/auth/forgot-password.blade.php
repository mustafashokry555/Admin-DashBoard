@extends('auth.layout')

@section('title')
Forgot-Password
@endsection


@section('content')

<body class="login-page" style="min-height: 320px;">
  <div class="login-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a  class="h1"><b>Dash</b>Board</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
        @include('massege')
        <form action="{{url('forgot-password')}}" method="post">
          @csrf 
          <div class="input-group mb-3">
            <input name="email" type="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Request new password</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <p class="mt-3 mb-1">
          <a href="{{url('login')}}">Login</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
  

@endsection



