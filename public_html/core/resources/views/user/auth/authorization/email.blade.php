@extends('layouts.theme.default')

@section('title', 'Confirm Account | Gainify')

@section('content')
    <div class="row justify-content-center align-items-center mb-5">
        <div class="col-md-2 d-none d-md-block"></div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user.verify.email') }}" method="POST" class="login-form">
                        @csrf

                        <div class="form-group">
                            <p class="text-center">@lang('Your Email'): <strong>{{ auth()->user()->email }}</strong>
                            </p>
                        </div>


                        <div class="form-group" style="margin-top:50px;">
                            <label style="font-size:11px;">@lang('Verification Code')</label>
                            <input type="text" name="email_verified_code" class="form-control" maxlength="7" id="code">
                        </div>


                        <div class="form-group">
                            <div class="d-grid gap-6">
                                <button type="submit" class="btn btn-primary" style="box-shadow: none;border-radius:10px;">@lang('Submit')</button>
                            </div>
                        </div>


                        <div class="form-group text-center" style="margin-top:15px;">
                            <p style="font-size:11px;">@lang('Please check including your Junk/Spam Folder. if not found, you can') <a href="{{ route('user.send.verify.code') }}?type=email"
                                    class="forget-pass">
                                    @lang('Resend code')</a></p>
                            @if ($errors->has('resend'))
                                <br />
                                <small style="text-decoration:none;color:#6FB99F;">{{ $errors->first('resend') }}</small>
                            @endif
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2 d-none d-md-block"></div>
    </div>
@endsection
@push('script')
    <script>
        (function($) {
            "use strict";
            $('#code').on('input change', function() {
                var xx = document.getElementById('code').value;

                $(this).val(function(index, value) {
                    value = value.substr(0, 7);
                    return value.replace(/\W/gi, '').replace(/(.{3})/g, '$1 ');
                });

            });
        })(jQuery)
    </script>
@endpush
