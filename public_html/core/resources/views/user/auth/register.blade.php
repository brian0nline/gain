@extends('layouts.theme.default')
@section('title', trans('Register | Gainify'))
@section('content')

@if(set('enable_google_auth'))
 <a href="{{ url('auth/google') }}">
<div class="d-grid gap-2">
    
  <button class="btn btn-primary" type="button" style="border-radius:10px;box-shadow:none;margin-top:20px;margin-bottom:20px;"><img src="{{ asset('asset/img/googleloginlogo.svg') }}" style="width:25px;"></button>
</div>
</a>
@endif
    <form class="account-form w-100" action="{{ route('user.register') }}" method="POST">
        @csrf
        @if (session()->get('reference') != null)
            <div class="form-group">
                <label for="referenceBy">@lang('Reference By') <sup class="text-danger">*</sup></label>
                <input type="text" name="referBy" id="referenceBy" class="form-control"
                    value="{{ session()->get('reference') }}" readonly>
            </div>
        @endif
         <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="username" style="font-size:11px;">{{ __('Username') }}</label>
                        <input id="username" type="text" class="form-control checkUser" name="username"
                            value="{{ old('username') }}" tabindex="1" required placeholder="@lang('Username')">
                    </div>
                </div>
                
                <div class="col-12">
                     <div class="form-group">
                        <label for="email" style="font-size:11px;">@lang('E-Mail Address')</label>
                        <input id="email" type="email" tabindex="2" class="form-control checkUser" name="email"
                            value="{{ old('email') }}" required placeholder="@lang('E-Mail Address')">
                    </div>
                </div>
                
                
                <div class="col-12">
                    <div class="form-group">
                        <label for="password" style="font-size:11px;">@lang('Password')</label>
                        <input id="password" type="password" tabindex="3" class="form-control" name="password" required
                            placeholder="@lang('Password')">
                        @if ($general->secure_password)
                            <div class="input-popup">
                                <p class="error lower">@lang('1 small letter minimum')</p>
                                <p class="error capital">@lang('1 capital letter minimum')</p>
                                <p class="error number">@lang('1 number minimum')</p>
                                <p class="error special">@lang('1 special character minimum')</p>
                                <p class="error minimum">@lang('6 character password')</p>
                            </div>
                        @endif
                        @error('password')
                            <span class="text-danger">{{ __($message) }}</span>
                        @enderror
                    </div>
                </div>
                
                <div class="col-12">
                    <div class="form-group">
                        <label for="password-confirm" style="font-size:11px;">@lang('Confirm Password')</label>
                        <input id="password-confirm" tabindex="4" type="password" class="form-control" name="password_confirmation" required
                            autocomplete="new-password" placeholder="@lang('Confirm Password')">
                    </div>
                </div>
                
                <div class="col-12">
                    <div class="form-group">
                        @if ($enabledCaptcha)
                            {!! $captcha !!}
                        @endif
                    </div>
                </div>
                
                 <div class="col-12">
                    <div class="form-group">
                        <input type="checkbox" checked required class="custom-form-input" />
                        <label class="custom-form-label">@lang('Signing up you agree to the ')
                            <a href="{{ route('tos') }}" style="text-decoration:none;color: #6FB99F">@lang('Terms of Service')</a> and 
                            <a href="{{ route('policy') }}" style="text-decoration:none;color: #6FB99F">@lang('Privacy Policy')</a>
                        </label>
                    </div>
                </div>
                
                <div class="d-grid gap-6">
                    <button type="submit" class="btn btn-primary mt-3" style="box-shadow: none;border-radius:10px;font-size:14px" >@lang('Register
                                        Now')</button>
             <div class="col-12 text-center">
                    <p class="text-center mt-3"><span class="">@lang('Have an account?')</span> <a
                            href="{{ route('user.login') }}" class="text-base"style="text-decoration:none;color: #6FB99F">@lang('Login here')</a></p>
                </div>
            </div>
        </div>

    </form>
@endsection
@section('modal')
    <div class="modal fade" id="existModalCenter" tabindex="-1" role="dialog" aria-labelledby="existModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 2px solid #242B27;">
                    <h5 class="modal-title" id="existModalLongTitle" style="color: #e84b3c !important;">@lang('Warning')</h5>
                   
                </div>
                <div class="modal-body">
                    <h6>@lang('You already have an account please Sign in ')</h6>
                </div>
                <div class="modal-footer"  style="border-top: 2px solid #242B27;">
                   
                    <a href="{{ route('user.login') }}" class="btn btn-primary" style="background: #6FB99F;border-color:#6FB99F;box-shadow:none;">@lang('Login')</a>
                </div>
            </div>
        </div>
    </div>
    </div>

        
       
@endsection
@push('style')
    <style>
        .login_wrapper {
            max-width: 720px;
        }
        
   </style>
@endpush

@push('script')
    @if ($general->secure_password)
        <script src="{{ asset('asset/static/app/js/secure_password.js') }}"></script>
    @endif
    <script>
        "use strict";

        (function($) {

            @if ($general->secure_password)
                $('input[name=password]').on('input', function() {
                    secure_password($(this));
                });
            @endif

            $('.checkUser').on('focusout', function(e) {
                var url = '{{ route('user.checkUser') }}';
                var value = $(this).val();
                var token = '{{ csrf_token() }}';

                if ($(this).attr('name') == 'email') {
                    var data = {
                        email: value,
                        _token: token
                    }
                }
                if ($(this).attr('name') == 'username') {
                    var data = {
                        username: value,
                        _token: token
                    }
                }
                $.post(url, data, function(response) {
                    if (response['data'] && response['type'] == 'email') {
                        $('#existModalCenter').modal('show');
                    } else if (response['data'] != null) {
                        $(`.${response['type']}Exist`).text(`${response['type']} already exist`);
                    } else {
                        $(`.${response['type']}Exist`).text('');
                    }
                });
            });

        })(jQuery);
    </script>
@endpush
