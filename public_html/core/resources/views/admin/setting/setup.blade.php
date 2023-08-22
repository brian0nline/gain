@section('title', __('General Settings'))

@push('style')
<style>
    .btn.btn-dark.btn-sm.active.toggle-off{
        background: #c82333 !important;
    }
</style>
@endpush

@section('page-title', __('General'))
<div>
    <div class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 style="margin-top:10px;" class="card-title">@lang('Manage Website') </h2>

                    </div>
                    <div class="card-body" wire:ignore>
                        <!-- start form for validation -->
                        <form id="demo-form" action="{{ route('moder.update.setting.control') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>@lang('Currency')</label>
                                        <input class="form-control" type="text" name="cur_text" wire:model="setting.cur_text" />
                                    </div>
                                    <div class="form-group ">
                                        <label style="margin-top:10px;">@lang('Currency Symbol') </label>
                                        <input class="form-control" type="text" name="cur_sym" wire:model="setting.cur_sym" />
                                    </div>
                                   

                                    <div class="form-group">
                                        <label style="margin-top:10px;" class=""> @lang('Timezone')</label>
                                        <select name="updateTimezone" class="form-control" wire:model="updateTimezone">
                                            @foreach ($timezones as $timezone)
                                                <option value="'{{ @$timezone }}'">
                                                    {{ __($timezone) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label style="margin-top:10px;">@lang('User Registration')</label>
                                        <br>
                                        <input type="checkbox" @if($setting['registration'])  checked @endif data-onstyle="success" data-offstyle="danger"   name="registration" />
                                    </div>

                                    <div class="form-group">
                                        <label style="margin-top:10px;">@lang('Force SSL')</label>
                                        <br>
                                        <input type="checkbox" @if($setting['force_ssl'])  checked @endif data-onstyle="success" data-offstyle="danger"   name="force_ssl" />
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label style="margin-top:10px;">@lang('Withdraw Status')</label>
                                        <br>
                                        <input type="checkbox" @if($setting['withdraw_status'])  checked @endif data-onstyle="success" data-offstyle="danger" name="withdraw_status" />
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >@lang('Force Secure Password')</label>
                                        <br>
                                        <input style="margin-top:10px;" type="checkbox" @if($setting['secure_password'])  checked @endif data-onstyle="success" data-offstyle="danger"   name="secure_password"/>
                                    </div>
                                    <div class="form-group">
                                        <label style="margin-top:10px;"> @lang('Email Verification')</label>
                                        <br>
                                        <input type="checkbox" @if($setting['ev']) checked @endif data-onstyle="success" data-offstyle="danger"   name="ev" />
                                    </div>
                                    <div class="form-group">
                                        <label style="margin-top:10px;">@lang('Email Notification')</label>
                                        <br>
                                        <input type="checkbox" @if($setting['en'])  checked @endif data-onstyle="success" data-offstyle="danger"   name="en" />
                                    </div>
                                    
                                </div>
                            </div>
                            <input type="submit" class="btn btn-success" value="@lang('Save')" style="margin-top:20px;box-shadow:none;" disabled />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('checkbox', true)
