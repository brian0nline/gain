@extends('layouts.theme.default')
@section('content')
    <form class="account-form" method="POST" action="{{ route('user.password.update') }}">
        @csrf

        <input type="hidden" name="email" value="{{ $email }}">
        <input type="hidden" name="token" value="{{ $token }}">
<div class="panel">
        <div class="account-thumb-area text-center">
            <h3 class="title">@lang('Reset Password')</h3>
        </div>

        <div class="form-group hover-input-popup">
            <label for="password" style="font-size:11px;">@lang('Password')</label>
            <input id="password" type="password" class="form-control" name="password" required>
            @if ($general->secure_password)
                <div class="input-popup">
                    <p class="error lower">@lang('1 small letter minimum')</p>
                    <p class="error capital">@lang('1 capital letter minimum')</p>
                    <p class="error number">@lang('1 number minimum')</p>
                    <p class="error special">@lang('1 special character minimum')</p>
                    <p class="error minimum">@lang('6 character password')</p>
                </div>
            @endif
        </div>
        
        <div class="form-group">
            <label for="password-confirm" style="font-size:11px;">@lang('Confirm Password')</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                   required autocomplete="new-password">
        </div>

        <button type="submit" class="btn btn-primary w-100" style="border-radius:10px;box-shadow:none;margin-top:15px;">@lang('Reset Password')</button>
    </form>
    </div>

@endsection

@push('script-lib')
    <script src="{{ asset('asset/template/dash/secure_password.js') }}"></script>
@endpush
@push('script')
    <script>
        (function ($) {
            "use strict";
            @if ($general->secure_password)
            $('input[name=password]').on('input', function () {
                secure_password($(this));
            });
            @endif
        })(jQuery);
    </script>
@endpush
