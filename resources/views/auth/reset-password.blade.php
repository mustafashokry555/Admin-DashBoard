@extends('auth.layout')

@section('title')
Reset-Password
@endsection


@section('content')

<body class="login-page" style="min-height: 398px;">
  <div class="login-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a  class="h1"><b>Dash</b>Board</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>
        @include('massege')
        <form action="{{url('reset-password')}}" method="post">
          @csrf
          
            
            <input value="{{request('email')}}" name="email" type="email"  class="d-none form-control" placeholder="Email">
            
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <input name="token" type="hidden" value="{{request()->route('token')}}" class="form-control" placeholder="Email">
         
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Change password</button>
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



