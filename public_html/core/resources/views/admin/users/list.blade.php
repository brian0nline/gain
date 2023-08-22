@extends('admin.layout.primary')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius-10 ">
                <div class="card-body p-0">
                    <form
                        action="{{ route('moder.users.search',$scope =str_replace('admin.users.','',request()->route()->getName()) ?? 'null') }}"
                        method="GET" class="form-inline float-sm-right ">
                        <div class="input-group has_append">
                            <input type="text" name="search" class="form-control" style="border-bottom-left-radius:0px;border-top-left-radius:10px;" placeholder="@lang('Username or email')"
                                value="{{ $search = '' ?? null }}">
                            <div class="input-group-append">
                                <button class="btn btn-primary" style="background: #4aa276;border-color:#4aa276;border-bottom-right-radius:0px;border-top-right-radius:10px;border-bottom-left-radius:0px;border-top-left-radius: 0px;box-shadow:none;" type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>

                    <div class="btn-group-sm" style="margin-top:5px;">
                        <a href="{{ route('moder.users.active') }}" class="btn btn-success" style="border-top-left-radius: 0px;box-shadow:none;">Active users</a>
                        <a href="{{ route('moder.users.banned') }}" class="btn btn-danger" style="box-shadow:none;">Banned users</a>
                        <a href="{{ route('moder.users.email.unverified') }}" class="btn btn-success"style="box-shadow:none;">Email Unverified</a>
                        <a href="{{ route('moder.users.sms.unverified') }}" class="btn btn-success"style="box-shadow:none;">SMS Unverified</a>
                        <a href="{{ route('moder.users.with.balance') }}" class="btn btn-success"style="box-shadow:none;">Have Balance</a>
                    </div>
                    <div class="table custom-table">
                        <table class="table table-light ">
                            <thead>
                                <tr>
                                    <th>@lang('User')</th>
                                    <th>@lang('Country')</th>
                                    <th>@lang('Joined At')</th>
                                    <th>@lang('Balance')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td data-label="@lang('User')">
                                            <span class="font-weight-bold">{{ $user->fullname }}</span>
                                            <br>
                                            <span class="small">
                                                <a
                                                    href="{{ route('moder.users.detail', $user->id) }}"><span>@</span>{{ $user->username }}</a>
                                            </span>
                                        </td>
                                        <td data-label="@lang('Country')">
                                            <span class="font-weight-bold" data-toggle="tooltip"
                                                data-original-title="{{ @$user->address->country }}">{{ $user->country_code }}</span>
                                        </td>
                                        <td data-label="@lang('Joined At')">
                                            {{ showDateTime($user->created_at) }}
                                            <br> {{ diffForHumans($user->created_at) }}
                                        </td>
                                        <td data-label="@lang('Balance')">
                                            <span class="font-weight-bold">

                                                <i><img src="{{ asset('asset/img/coins.svg') }}"></i>{{ showAmount($user->balance) }}
                                            </span>
                                        </td>


                                        <td data-label="@lang('Action')">
                                            <a href="{{ route('moder.users.detail', $user->id) }}" class="icon-btn"
                                                data-toggle="tooltip" title="" data-original-title="@lang('Details')">
                                                <i><img src="{{ asset('asset/img/desktop.svg') }}"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                <div class="card-footer py-4">
                    {{ paginateLinks($users) }}
                </div>
            </div>
        </div>


    </div>
@endsection
