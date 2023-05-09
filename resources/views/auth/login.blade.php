@extends('layouts.app')
@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="{{ route('admin.home') }}">
           <img src="{{ asset('logo/logo.png') }}" width="50px"><br>
           DAMEX CTP
        </a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">
            Login
        </p>

        @if(session('message'))
            <p class="alert alert-info">
                {{ session('message') }}
            </p>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                <input id="username" type="text" name="username" class="form-control" required autocomplete="username" autofocus placeholder="username" value="{{ old('username', null) }}">

                @if($errors->has('username'))
                    <p class="help-block">
                        {{ $errors->first('username') }}
                    </p>
                @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input id="password" type="password" name="password" class="form-control" required placeholder="Password">

                @if($errors->has('password'))
                    <p class="help-block">
                        {{ $errors->first('password') }}
                    </p>
                @endif
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label><input type="checkbox" name="remember"> Ingat Saya!</label>
                    </div>
                </div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">
                        Login
                    </button>
                </div>
            </div>
        </form>

        <a href="{{ route('register') }}">{{ trans('global.register') }}</a>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
@endsection