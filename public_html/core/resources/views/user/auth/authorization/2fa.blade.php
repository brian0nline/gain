<head>
    <title> Authorization | Gainify</title>
</head>
@extends('layouts.theme.default')

@section('2FA | Gainify')

@section('content')

    <div class="row justify-content-center align-items-center mb-5">
        <div class="col-md-2 d-none d-md-block"></div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user.go2fa.verify') }}" method="POST" class="login-form">
                        @csrf
                        <div class="form-group">
                            <p class="text-center">@lang('Current Time'): {{ \Carbon\Carbon::now() }}</p>
                        </div>
                        <div class="form-group" style="margin-top:25px;">
                            <label style="font-size:11px;">@lang('2FA Code')</label>
                            <input type="text" name="code" id="code" class="form-control">
                        </div>
                        <div class="form-group">
                            <div class="d-grid gap-6">
                                <button type="submit" class="btn btn-primary" style="box-shadow: none;font-size:14px;border-radius:10px;">@lang('Submit')</button>
                            </div>
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