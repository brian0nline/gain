@extends('layouts.theme.default')
@section('title', trans('Login | Gainify'))
@section('content')


@if (session()->has('notify'))
    @foreach (session('notify') as $msg)
    @php 
        $alert_type = $msg[0];
    @endphp
        <div class="alert alert-danger alert-dismissible fade show">
          {{$msg[1]}}
          <button type="button" class="btn-close" data-bs-dismiss="alert" style="box-shadow:none;"></button>
        </div>
    @endforeach
@endif


@if(set('enable_google_auth'))
  <a href="{{ url('auth/google') }}">
<div class="d-grid gap-6">
    
  <button class="btn btn-primary" type="button" style="border-radius:10px;box-shadow:none;margin-top:20px;margin-bottom:20px;"><img src="{{ asset('asset/img/googleloginlogo.svg') }}" style="width:25px;"></button>
</div>
</a>

@endif

<form class="account-form" method="POST" action="{{ route('user.login') }}" onsubmit="return submitUserForm();">
    @csrf
    <div class="form-group">
        <label style="font-size:11px;">@lang('Email') <sup class="text-danger">*</sup></label>
        <input type="text" name="username" value="{{ old('username') }}" placeholder="@lang('Email')" class="form-control" required>
    </div>

    <div class="form-group">
        <label  style="font-size:11px;">{{ __('Password') }} <sup class="text-danger">*</sup></label>
        <input id="password" type="password" class="form-control" placeholder="@lang('Enter your password')" name="password" required>
    </div>

    <div class="form-group">
        @if($enabledCaptcha)
        {!! $captcha !!}
        @endif
    </div>

   
    <div class="form-group text-end">
        <a href="{{ route('user.password.request') }}" class="text-drak" style="text-decoration:none;color: #6FB99F">@lang('Forgot Password?')</a>
    </div>
    
    <div class="d-grid gap-6">
        <button type="submit" class="btn btn-primary" style="box-shadow: none;font-size:14px;border-radius:10px;">@lang('Login Now')</button>
    </div>
    <p class="text-center mt-3"><span class="">@lang('New to') Gainify?</span>
        <a href="{{ route('user.register') }}" class="text-base"style="text-decoration:none;color: #6FB99F">@lang('Register here')</a>
    </p>
</form>
@endsection
