@extends('auth.layout')




@section('title')
Log In
@endsection


@section('content')

<body class="login-page" style="min-height: 466px;">
    <a style="position: absolute; right:10px; top:10px;" class=" mr-3 px-3 btn btn-info" href="{{url('/choseD')}}">Diseases Prediction</a>
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a class="h1"><b>Dash</b>Board</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to be in Control</p>
                @include('massege')
                <form action="{{url('/login')}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input name="email" type="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="password" id='pass' type="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="showPass">
                                <label id="showPassLabel">
                                    Show Password
                                </label>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input name="remember" type="checkbox" id="saveMe">
                                <label id="saveMeLabel">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <!-- /.col -->
                    </div>

                    <div class="my-3  col-12">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </form>


                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="{{url('forgot-password')}}">I forgot my password</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    @endsection

    @section('script')
    <script>
    $(document).ready(function() {

        $('#saveMeLabel').click(function() {
            $('#saveMe').trigger('click');
        });

        $('#showPassLabel').click(function() {
            $('#showPass').trigger('click');
        });

        $('#showPass').change(function() {
            if ($(this).is(':checked')) {
                $('#pass').attr('type', 'text');
            } else {
                $('#pass').attr('type', 'password');
            }
        });

    });
    </script>
    @endsection