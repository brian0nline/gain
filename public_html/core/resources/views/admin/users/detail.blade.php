@extends('admin.layout.primary')

@push('style')
<style>
    body .list-group-item span{
        color: #000 !important;
    }
</style>
@endpush

@section('panel')
    <div class="row mb-none-30">
        <div class="col-xl-3 col-lg-5 col-md-5 mb-30">

            <div class="card b-radius-10 overflow-hidden shadow">
                <div class="card-body p-0" style="background: #3b4740">
                    <a href="{{ route('moder.users.all') }}" class="btn btn-sm btn-primary box-shadow1 text-small" style="background: #4aa276;border-color: #4aa276;box-shadow:none;border-top-right-radius:0px;border-bottom-left-radius:0px;"><i
                            class="fa fa-fw fa-backward"></i> @lang('Go
                                                    Back') </a>
                    <div class="p-3 ">
                        <div class="">
                        </div>
                        <div class="mt-15">
                            <h4 class="">{{ $user->fullname }}</h4>
                            <span class="text-small">@lang('Joined At')
                                <strong>{{ showDateTime($user->created_at, 'd M, Y h:i A') }}</strong></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card b-radius-10 overflow-hidden mt-30 shadow">
                <div class="card-body" style="background: #3b4740">
                    <h5 class="mb-20 text-muted" style="color:#fff !important;">@lang('User Info')</h5>
                    <ul class="list-group" style="background: #3b4740">

                        <li class="list-group-item d-flex justify-content-between align-items-center" style="background: #3b4740;border:none;">
                            @lang('Username')
                            <span class="font-weight-bold">{{ $user->username }}</span>
                        </li>


                        <li class="list-group-item d-flex justify-content-between align-items-center"style="background: #3b4740;border:none;">
                            @lang('Status')
                            @if ($user->status == 1)
                                <span class="badge badge-pill bg-success">@lang('Active')</span>
                            @elseif($user->status == 0)
                                <span class="badge badge-pill bg-danger">@lang('Banned')</span>
                            @endif
                        </li>
                        
                        <li class="list-group-item d-flex justify-content-between align-items-center"style="background: #3b4740;border:none;">
                            @lang('Verification')
                            @if ($user->active_status_by_admin == 1)
                                <span class="badge badge-pill bg-success">@lang('Verified')</span>
                            @elseif($user->active_status_by_admin == 0)
                                <span class="badge badge-pill bg-danger">@lang('Not Verified')</span>
                            @endif
                        </li>
                        

                        <li class="list-group-item d-flex justify-content-between align-items-center" style="background: #3b4740;border:none;">
                            @lang('Balance')
                            <span class="font-weight-bold">{{ showAmount($user->balance) }}
                                {{ __($general->cur_text) }}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center" style="background: #3b4740;border:none;">
                            @lang('Referred By')
                            <span class="font-weight-bold">
                                @if ($reff != null)
                                    <a href="{{ route('moder.users.detail', $reff->id) }}"> {{ $reff->username }} </a>
                                @else
                                    @lang('none')
                                @endif
                            </span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center" style="background: #3b4740;border:none;">
                            @lang('Total Referrals')
                            <span class="font-weight-bold"><a href="{{ route('moder.users.referrals', $user->id) }}">
                                    {{ $user->referral->count() }}</a> </span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center" style="background: #3b4740;border:none;">
                            @lang('Total Referral Commissions')
                            <span class="font-weight-bold"><a
                                    href="{{ route('moder.users.commissions.deposit', $user->id) }}">
                                    {{ $user->commissions->sum('amount') }} {{ $general->cur_text }} </a></span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card b-radius-10 overflow-hidden mt-30 shadow">
                <div class="card-body" style="background: #3b4740;">
                    <h5 class="mb-20 text-muted"  style="color:#fff !important;">@lang('Actions')</h5>
                    <a data-toggle="modal" href="#addSubModal" class="btn btn-success  btn-block my-1 w-100" style="box-shadow:none;background:#299740;border-color:#299740">
                        @lang('Add/Subtract Balance')
                    </a>
                    <a href="{{ route('moder.users.login.history.single', $user->id) }}"
                        class="btn btn-primary  btn-block my-1 w-100"  style="box-shadow:none;background: #e84b3c;border-color:#e84b3c;">
                        @lang('Login Logs')
                    </a>
                    <a href="{{ route('moder.users.email.single', $user->id) }}"
                        class="btn btn-info btn-block my-1 w-100"  style="box-shadow:none;color:#fff;background: #51AEE5;border-color:#51AEE5;">
                        @lang('Send Email')
                    </a>
                    <a href="{{ route('moder.users.login', $user->id) }}" target="_blank"
                        class="btn btn-dark  btn-block my-1 w-100"  style="box-shadow:none;background:#9F9898;border-color:#9F9898">
                        @lang('Login as User')
                    </a>
                    <a href="{{ route('moder.users.email.log', $user->id) }}"
                        class="btn btn-warning  btn-block my-1 w-100"  style="box-shadow:none;background:#F3D55B;border-color:#F3D55B;">
                        @lang('Email Log')
                    </a>
                </div>
            </div>
        </div>

        <div class="col-xl-9 col-lg-7 col-md-7 mb-30">

            <div class="row mb-none-30">
                <div class="col-xl-4 col-lg-6 col-sm-6 mb-30">
                    <div class="panel d-flex justify-content-around align-items-center">
                        <div class="icon">
                           <i><img src="{{ asset('asset/img/depositedadmin.svg') }}"></i>
                        </div>
                        <div class="details">
                            <div class="numbers">
                                <span class="currency-sign"> <i><img src="{{ asset('asset/img/coins.svg') }}"></i></span>
                                <span class="amount">{{ showAmount($totalDeposit) }}</span>
                            </div>
                            <div class="desciption">
                                <span>@lang('Total Deposited')</span>
                            </div>
                            <a class="pane-link" href="{{ route('moder.deposit.user.view', $user->id) }}"
                                class="item-link">Details</a>
                        </div>
                    </div>
                </div><!-- panel end -->


                <div class="col-xl-4 col-lg-6 col-sm-6 mb-30">
                    <div class="panel d-flex justify-content-around align-items-center">
                        <div class="icon">
                            <i><img src="{{ asset('asset/img/withdrawalsadmin.svg') }}"></i>
                        </div>
                        <div class="details">
                            <div class="numbers">
                                <span class="currency-sign"><i><img src="{{ asset('asset/img/coins.svg') }}"></i></span>
                                <span class="amount">{{ showAmount($totalWithdraw) }}</span>
                            </div>
                            <div class="desciption">
                                <span>@lang('Total Withdrawn')</span>
                            </div>
                            <a class="pane-link"
                                href="{{ route('moder.users.withdrawals', $user->id) }}">Details</a>
                        </div>
                    </div>
                </div><!-- panel end -->

                <div class="col-xl-4 col-lg-6 col-sm-6 mb-30">
                    <div class="panel d-flex justify-content-around align-items-center">
                        <div class="icon">
                            <i><img src="{{ asset('asset/img/transactionsadmin.svg') }}"></i>
                        </div>
                        <div class="details">
                            <div class="numbers">
                                <span class="amount">{{ $totalTransaction }}</span>
                            </div>
                            <div class="desciption">
                                <span>@lang('Total Transactions')</span>
                            </div>
                            <a class="pane-link"
                                href="{{ route('moder.users.transactions', $user->id) }}">Details</a>
                        </div>
                    </div>
                </div><!-- panel end -->

            </div>


            <div class="card mt-50">
                <div class="card-body">
                    <h5 class="card-title border-bottom pb-2">@lang('User Information')</h5>

                    <form action="{{ route('moder.users.update', [$user->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="" style="margin-bottom:5px;">@lang('First Name')<span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="firstname"
                                        value="{{ $user->firstname }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label  font-weight-bold" style="margin-bottom:5px;">@lang('Last Name') <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="lastname"
                                        value="{{ $user->lastname }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="" style="margin-bottom:5px;margin-top:8px;">@lang('Email') <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="email" name="email" value="{{ $user->email }}">
                                </div>
                            </div>
                        </div>


                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="" style="margin-bottom:5px;">@lang('Address 1') </label>
                                    <input class="form-control" type="text" name="address[address1]"
                                        value="{{ @$userAddress['address1'] }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="" style="margin-bottom:5px;">@lang('Address 2') </label>
                                    <input class="form-control" type="text" name="address[address2]"
                                        value="{{ @$userAddress['address2'] }}">
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="form-group">
                                    <label class="" style="margin-bottom:5px;margin-top:8px;">@lang('City') </label>
                                    <input class="form-control" type="text" name="address[city]"
                                        value="{{ @$userAddress['city'] }}">
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="form-group ">
                                    <label class="" style="margin-bottom:5px;margin-top:8px;">@lang('State') </label>
                                    <input class="form-control" type="text" name="address[state]"
                                        value="{{ @$userAddress['state'] }}">
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="form-group ">
                                    <label class="" style="margin-bottom:5px;margin-top:8px;">@lang('Zip/Postal') </label>
                                    <input class="form-control" type="text" name="address[zip]"
                                        value="{{ @$userAddress['zip'] }}">
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="form-group ">
                                    <label class="" style="margin-bottom:5px;margin-top:8px;">@lang('Country') </label>
                                    <select name="address[country]" class="form-control">
                                        @foreach ($countries as $country)
                                            <option value="{{ $country }}"
                                                @if ($country == @$userAddress['country']) selected @endif>
                                                {{ __($country) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row mt-3">
                            <div class="form-group row col-md-6 col-sm-12" style="margin-top:5px;">
                                <label class="col-6">@lang('User Status') </label>
                                <input type="checkbox" class="col-6" data-onstyle="success" 
                                    data-offstyle="danger" 
                                    data-on="@lang('Active')"
                                    data-off="@lang('Banned')" name="status"
                                    @if ($user->status) checked @endif>
                            </div>

                            <div class="form-group row col-md-6 col-sm-12" style="margin-top:5px;">
                                <label class="col-6">@lang('Email Verification') </label>
                                <input type="checkbox" class="col-6" data-on="@lang('Verified')"
                                    data-off="@lang('Unverified')" name="ev"
                                    data-onstyle="success" data-offstyle="danger"
                                    @if ($user->ev) checked @endif>

                            </div>

                            <div class="form-group row col-md-6 col-sm-12" style="margin-top:5px;">
                                <label class="col-6" >@lang('SMS Verification') </label>
                                <input type="checkbox" class="col-6" data-on="@lang('Verified')"
                                    data-off="@lang('Unverified')" name="sv"
                                    data-onstyle="success" data-offstyle="danger"
                                    @if ($user->sv) checked @endif>

                            </div>
                            <div class="form-group row col-md-6 col-sm-12" style="margin-top:5px;">
                                <label class="col-6">@lang('2FA Status') </label>
                                <input type="checkbox" class="col-6" data-on="@lang('Active')"
                                    data-off="@lang('Deactive')" name="ts"
                                    data-onstyle="success" data-offstyle="danger"
                                    @if ($user->ts) checked @endif>
                            </div>

                            <div class="form-group row col-md-6 col-sm-12" style="margin-top:5px;">
                                <label class="col-6">@lang('2FA Verification') </label>
                                <input type="checkbox" class="col-6" data-on="@lang('Verified')"
                                    data-off="@lang('Unverified')" name="tv"
                                    data-onstyle="success" data-offstyle="danger"
                                    @if ($user->tv) checked @endif>
                            </div>
                            
                                <div class="form-group row col-md-6 col-sm-12" style="margin-top:5px;">
                                <label class="col-6">@lang('User Verification') </label>
                                <input type="checkbox" class="col-6" data-on="@lang('Verified')"
                                    data-off="@lang('Unverified')" name="active_status_by_admin"
                                    data-onstyle="success" data-offstyle="danger"
                                    @if ($user->active_status_by_admin == 1) checked @endif>
                            </div>
                        </div>


                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-block my-1 w-100" style="box-shadow:none;background: #4aa276;border-color: #4aa276;" disabled>@lang('Save Changes')
                                    </button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    {{-- Add Sub Balance MODAL --}}
    <div id="addSubModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 2px solid #242B27;">
                    <h5 class="modal-title">@lang('Add / Subtract Balance')</h5>
                  
                </div>
                <form action="{{ route('moder.users.add.sub.balance', $user->id) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-6oup col-md-12">
                                <input type="checkbox" class="col-6" 
                                 data-onstyle="success" data-offstyle="danger"
                                data-on="@lang('Add Balance')"
                                    data-off="@lang('Subtract Balance')" name="act" checked>
                            </div>


                            <div class="form-group col-md-12">
                                <label>@lang('Amount')<span class="text-danger">*</span></label>
                                <div class="input-group has_append">
                                    <input type="text" name="amount" class="form-control"
                                        placeholder="@lang('Please provide positive amount')">
                                    <div class="input-group-append">
                                        <div class="input-group-text btn-primary" style="background: #3b4740;border-color: #3b4740"><i><img src="{{ asset('asset/img/coins.svg') }}"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="border-top: 2px solid #242B27;">
                        <button type="button" class="btn btn-dark" data-dismiss="modal" style="background: #3b4740;border-color: #3b4740;box-shadow:none;">@lang('Close')</button>
                        <button type="submit" class="btn btn-success" style="background: #4aa276;border-color: #4aa276;box-shadow:none;" disabled>@lang('Submit')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <link rel="stylesheet" href="{{ asset('asset/static/checkbox/bootstrap-toggle.min.css') }}">
    <style>
        
        .form-control:focus{
            border: 2px solid #4aa276;
            box-shadow: none;
        }
    </style>
@endpush
@push('script')
    <script src="{{ asset('asset/static/checkbox/bootstrap-toggle.min.js') }}"></script>
    <script>
        $(function() {
            $('input[type="checkbox"]').bootstrapToggle({
                // onActiveCls: 'btn-info',
                // offActiveCls: 'btn-dark',
                size: 'small',
            })
        })
    </script>
@endpush
