@extends('layouts.app')

@section('content')

<div class="login-box">
    <div class="login-logo">
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body login-box-yogi">
        <h2>Kelas Visual</h2>
        <p>Sign In</p>

        <form action="{{ route('login') }}" method="post">
            @csrf
        <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
            <input type="email" name="email" class="form-control " value="{{ old('email') }}" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            @if ($errors->has('email'))
                <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
            @endif

        </div>
        <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
            <input type="password" name="password" class="form-control" value="{{ old('password') }}" placeholder="Password" >
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @if ($errors->has('password'))
                <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
            @endif
        </div>
        <div class="row">
            <!-- /.col -->
            <div class="col-xs-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat login-yogi" style="font-weight: 600;">Login</button>
            </div>
            <!-- /.col -->
        </div>
        <div class="row forgot-yogi">
            <div class="col-xs-6">

            </div>
            <div class="col-xs-6">
                <a href="https://themeforest.net/tags/laravel%20admin?view=list">Forgot Password ?</a>
            </div>
        </div>
        </form>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection
