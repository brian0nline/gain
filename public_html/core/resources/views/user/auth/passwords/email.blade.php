@extends('layouts.theme.default')
@section('content')
    <form class="account-form" method="POST" action="{{ route('user.password.email') }}">
        @csrf
        <div class="panel">
        <div class="form-group">
            <label style="font-size:11px;">@lang('Select One')</label>
            <select class="form-control" name="type">
                <option value="email" style="font-size:11px;">@lang('E-Mail Address')</option>
                <option value="username" style="font-size:11px;">@lang('Username')</option>
            </select>
        </div>
        <div class="form-group">
            <label class="my_value" style="font-size:11px;"></label>
            <input type="text" class="form-control @error('value') is-invalid @enderror" name="value"
                   value="{{ old('value') }}" required autofocus="off">
        </div>

        <button type="submit" class="btn btn-secondary w-100" style="background:#6FB99F;border-color:#6FB99F;box-shadow:none;margin-top:10px;">@lang('Send Password Code')</button>

       
    </form>
    </div>

    <script>
        (function ($) {
            "use strict";

            myVal();
            $('select[name=type]').on('change', function () {
                myVal();
            });

            function myVal() {
                $('.my_value').text($('select[name=type] :selected').text());
            }
        })(jQuery)
    </script>
@endsection
