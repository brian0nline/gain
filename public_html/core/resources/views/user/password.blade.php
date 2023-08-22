
    <div class="container card pt-100 pb-100" style="border-radius:10px;">
        <div class="row justify-content-center mt-4">
            <div class="col-md-12">

                <div class="card " style="border:none" >
                    
                    <div class="card-body">

                        <form action="{{route('user.change.password')}}" method="post" class="register">
                            @csrf
                            <div class="form-group">
                                <label for="password" style="margin-left: 10px;font-size:14px;">@lang('Current Password')</label>
                                <input id="password" type="password" class="form-control" name="current_password" required
                                    autocomplete="current-password" placeholder="@lang('Current Password')">
                            </div>
                            <div class="form-group hover-input-popup">
                                <label for="password" style="margin-left: 10px;font-size:14px;">@lang('Password')</label>
                                <input id="password" type="password" class="form-control" name="password" required
                                    autocomplete="current-password" placeholder="@lang('Password')">
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
                                <label for="confirm_password" style="margin-left: 10px;font-size:14px;">@lang('Confirm Password')</label>
                                <input id="password_confirmation" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="current-password"
                                    placeholder="@lang('Confirm Password')">
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" class="mt-4 btn btn-primary" style="box-shadow: none;font-size:14px;" value="@lang('Update')" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@push('script')
    <script src="{{ asset('asset/static/app/js/secure_password.js') }}"></script>

    <script>
        (function($) {
            "use strict";
            @if ($general->secure_password)
                $('input[name=password]').on('input', function () {
                secure_password($(this));
                });
            @endif
        })(jQuery);
    </script>
@endpush
