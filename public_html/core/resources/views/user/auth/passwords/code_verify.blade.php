@extends('layouts.theme.default')
@section('content')

    <form class="account-form" method="POST" action="{{ route('user.password.verify.code') }}">
        @csrf

        <input type="hidden" name="email" value="{{ $email }}">
<div class="panel">
        <div class="form-group">
            <label>@lang('Verification Code')</label>
            <input type="text" name="code" id="code" class="form-control">
        </div>

        <button type="submit" class="btn btn-base w-100" style="background:#6FB99F;border-color:#6FB99F;box-shadow:none;color:#fff;border-radius:10px;">@lang('Verify Code') <i class="fas fa-sign-in-alt"></i>
        </button>
        <p class="text-center mt-3"><span class="text-white" style="margin-top:30px;">@lang('Please check including your Junk/Spam Folder.
                        if not found, you can')</span>
            <a href="{{ route('user.password.request') }}"  style="text-decoration:none;color:#6FB99F;">@lang('Try to send again')</a>
        </p>
    </form>
    </div>

    <script>
        (function ($) {
            "use strict";
            $('#code').on('input change', function () {
                var xx = document.getElementById('code').value;
                $(this).val(function (index, value) {
                    value = value.substr(0, 7);
                    return value.replace(/\W/gi, '').replace(/(.{3})/g, '$1 ');
                });
            });
        })(jQuery)
    </script>
@endsection
