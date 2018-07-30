@extends('layouts.auth')

@section('htmlheader_title')
    Log in
@endsection
@section('content')
    <body class="hold-transition login-page">

        <div class="login-box">
            <div class="login-logo">
                <a href="{{ url('/') }}"><b>Blogs</b>LTE</a>
            </div><!-- /.login-logo -->

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong><br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="login-box-body">
                <p class="login-box-msg">  </p>
                <form action="{{ url('/login') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group has-feedback {{$errors->has('email')? 'has-error':'' }}">
                        <input type="text" class="form-control" placeholder="email" name="email"/>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        @if($errors->has('email'))
                            <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                        @endif
                    </div>
                    <div class="form-group has-feedback {{$errors->has('password')? 'has-error':'' }}">
                        <input type="password" class="form-control" placeholder="Password" name="password"/>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        @if($errors->has('password'))
                            <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-6">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                            </div><!-- /.col -->
                        </div>

                    </div>
                </form>

                <a href="{{ url('/password/reset') }}">I forgot my password</a><br>
                <a href="{{ url('/register') }}" class="text-center">Register</a>

            </div><!-- /.login-box-body -->

        </div><!-- /.login-box -->



    </body>

@endsection

