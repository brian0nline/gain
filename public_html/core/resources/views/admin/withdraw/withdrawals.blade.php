@extends('admin.layout.primary')
@section('title', __('Cashout Requests | Freeloot'))
@section('page-title', __('Cashout Methods | Freeloot'))
@section('panel')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title float-start" style="margin-top:10px;">@lang('Manage Cashouts Requests')</h4>
        </div>
        
        <div class="card-body">
            <div class="row justify-content-center">
                @if (request()->routeIs('moder.withdraw.log') || request()->routeIs('moder.withdraw.method') || request()->routeIs('moder.users.withdrawals') || request()->routeIs('moder.users.withdrawals.method'))
                    <div class="col-xl-4 col-sm-6 mb-30">
                        <div class="card box-shadow2 b-radius-5 bg-success">
                            <div class="text-center">
                                <h2 class="text-white"style="margin-top: 7px;word-spacing:10px;">
                                    <i><img src="{{ asset('asset/img/coins.svg') }}"></i>{{ $withdrawals->where('status', 1)->sum('amount') }}</h2>
                                <p class="text-white">@lang('Approved Withdrawals')</p>
                            </div>
                        </div>
                        <!- card bg-dark end ->
                    </div>
                    <div class="col-xl-4 col-sm-6 mb-30">
                        <div class="card" style="background: #fcc109;border-color: #fcc109;">
                            <div class="text-center">
                                <h2 class="text-white" style="margin-top: 7px;">
                                    <i><img src="{{ asset('asset/img/coins.svg') }}"></i>{{ $withdrawals->where('status', 2)->sum('amount') }}</h2>
                                <p class="text-white">@lang('Pending Withdrawals')</p>
                            </div>
                        </div>
                        <!- card bg-dark end ->
                    </div>
                    <div class="col-xl-4 col-sm-6 mb-30">
                        <div class="card" style="background: #e84b3c;border-color: #e84b3c;">
                            <div class="text-center" >
                                <h2 class="text-white" style="margin-top: 7px;">
                                    <i><img src="{{ asset('asset/img/coins.svg') }}"></i>{{ $withdrawals->where('status', 3)->sum('amount') }}</h2>
                                <p class="text-white">@lang('Rejected Withdrawals')</p>
                            </div>
                        </div>
                        <!- card bg-dark end ->
                    </div>
                @endif
                <div class="col-lg-12">
                    <div class="card b-radius-10 ">
                        <div class="card-body p-0">
                            @if (!request()->routeIs('moder.users.withdrawals') && !request()->routeIs('moder.users.withdrawals.method'))
                            @endif
                            <div class="overflow-auto">
                                <table class="table custom-table">
                                    <thead>
                                    <tr>
                                        
                                        <th>@lang('Initiated')</th>
                                        <th>@lang('User')</th>
                                        <th>@lang('Amount')</th>
                                        <th>@lang('Conversion')</th>
                                        <th>@lang('Status')</th>
                                        <th>@lang('Action')</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($withdrawals as $withdraw)
                                        @php
                                            $details = $withdraw->withdraw_information != null ? json_encode($withdraw->withdraw_information) : null
                                        @endphp
                                        <tr>
                                         
                                            <td data-label="@lang('Initiated')">
                                                {{ showDateTime($withdraw->created_at) }} <br>
                                                {{ diffForHumans($withdraw->created_at) }}
                                            </td>

                                            <td data-label="@lang('User')">
                                                <span class="font-weight-bold">{{ @$withdraw->user->fullname }}</span>
                                                <br>
                                                <span class="small"> <a
                                                        href="{{ route('moder.users.detail', $withdraw->user_id) }}"><span>@</span>{{ @$withdraw->user->username }}</a>
                                            </span>
                                            </td>


                                            <td data-label="@lang('Amount')">
                                                <i><img src="{{ asset('asset/img/coins.svg') }}"></i>{{ showAmount($withdraw->amount) }} - <span
                                                    class="text-danger" data-toggle="tooltip"
                                                    data-original-title="@lang('charge')">{{ showAmount($withdraw->charge) }}
                                            </span>
                                                <br>
                                                <strong data-toggle="tooltip"
                                                        data-original-title="@lang('Amount after charge')">
                                                    {{ showAmount($withdraw->amount - $withdraw->charge) }}
                                                    {{ __($general->cur_text) }}
                                                </strong>

                                            </td>

                                            <td data-label="@lang('Conversion')">
                                                1 {{ __($general->cur_text) }} = {{ showAmount($withdraw->rate) }}
                                                {{ __($withdraw->currency) }}
                                                <br>
                                                <strong>{{ showAmount($withdraw->final_amount) }}
                                                    {{ __($withdraw->currency) }}</strong>
                                            </td>


                                            <td data-label="@lang('Status')">
                                                @if ($withdraw->status == 2)
                                                    <span
                                                        class="text-small badge font-weight-normal bg-warning">@lang('Pending')</span>
                                                @elseif($withdraw->status == 1)
                                                    <span
                                                        class="text-small badge font-weight-normal bg-success">@lang('Approved')</span>
                                                    <br>{{ diffForHumans($withdraw->updated_at) }}
                                                @elseif($withdraw->status == 3)
                                                    <span
                                                        class="text-small badge font-weight-normal bg-danger">@lang('Rejected')</span>
                                                    <br>{{ diffForHumans($withdraw->updated_at) }}
                                                @endif
                                            </td>
                                            <td data-label="@lang('Action')">
                                                <a href="{{ route('moder.withdraw.details', $withdraw->id) }}"
                                                   class="icon-btn ml-1 " data-toggle="tooltip"
                                                   data-original-title="@lang('Detail')">
                                                    <i><img src="{{ asset('asset/img/desktop.svg') }}"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-muted text-center"
                                                colspan="100%">{{ __($emptyMessage) }}</td>
                                        </tr>
                                    @endforelse

                                    </tbody>
                                </table>
                                <!- table end ->
                            </div>
                        </div>

                        <div class="card-footer py-4">
                            {{ paginateLinks($withdrawals) }}
                        </div>
                    </div>
                    <!- card end ->
                </div>
            </div>
        </div>
    </div>
@endsection

