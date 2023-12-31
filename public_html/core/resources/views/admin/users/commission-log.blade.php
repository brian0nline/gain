@extends('admin.layout.primary')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius-10 ">

                <div class="card-body">
                    @if (request()->routeIs('admin.users.transactions'))
                        <form action="" method="GET" class="form-inline float-sm-right ">
                            <div class="input-group has_append">
                                <input type="text" name="search" class="form-control" placeholder="@lang('TRX / Username')"
                                    value="{{ $search ?? '' }}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    @else
                        <form action="{{ route('moder.report.commissions.search') }}" method="GET"
                            class="form-inline float-sm-right  mb-3">
                            <div class="input-group has_append">
                                <input type="text" name="search" class="form-control"
                                    placeholder="@lang('TRX / Username')" value="{{ $search ?? '' }}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    @endif
                    <div class="table-responsive-sm table-responsive">
                        <table class="table table-light ">
                            <thead>
                                <tr>
                                    <th scope="col">@lang('Date')</th>
                                    <th scope="col">@lang('Description')</th>
                                    <th scope="col">@lang('Type')</th>
                                    <th scope="col">@lang('Transaction')</th>
                                    <th scope="col">@lang('Level')</th>
                                    <th scope="col">@lang('Percent')</th>
                                    <th scope="col">@lang('Amount')</th>
                                    <th scope="col">@lang('After balance')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($logs as $data)
                                    <tr @if ($data->amount < 0) class="halka-golapi" @endif>
                                        <td data-label="@lang('Date')">{{ showDateTime($data->created_at) }}</td>
                                        <td data-label="@lang('Description')">{{ __($data->title) }}</td>
                                        <td data-label="@lang('Type')">
                                            @if ($data->type == 'deposit')
                                                <span class="badge badge--success">@lang('Deposit')</span>
                                            @elseif($data->type == 'interest')
                                                <span class="badge badge--info">@lang('Interest')</span>
                                            @else
                                                <span class="badge badge--primary">@lang('Invest')</span>
                                            @endif
                                        </td>
                                        <td data-label="@lang('Transaction')">{{ __($data->trx) }}</td>
                                        <td data-label="@lang('Level')">{{ __(ordinal($data->level)) }}</td>
                                        <td data-label="@lang('Percent')">{{ getAmount($data->percent) }} %</td>
                                        <td data-label="@lang('Amount')"><span
                                                class="font-weight-bold">{{ __($general->cur_sym) }}
                                                {{ getAmount($data->commission_amount) }}</span></td>
                                        <td data-label="@lang('After balance')">{{ __($general->cur_sym) }}
                                            {{ getAmount($data->main_amo) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">{{ trans($empty_message) }}
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                <div class="card-footer py-4">
                    {{ $logs->links('admin.partials.paginate') }}
                </div>
            </div><!-- card end -->
        </div>
    </div>
@endsection
@push('breadcrumb-plugins')
    <div class="mb-3">

        <a href="

        @if (request()->routeIs('admin.users.commissions.deposit')) javascript:void(0)
    @else
    {{ route('moder.users.commissions.deposit', $user->id) }} @endif

        " class="btn btn-primary mb-3
    @if (request()->routeIs('admin.users.commissions.deposit')) btn-disabled @endif
    ">@lang('Deposit
            Commission')</a>


        <a href="

        @if (request()->routeIs('admin.users.commissions.buy')) javascript:void(0)
    @else
    {{ route('moder.users.commissions.buy', $user->id) }} @endif

        " class="btn btn-primary mb-3

    @if (request()->routeIs('admin.users.commissions.buy')) btn-disabled @endif

    ">@lang('Buy Lottery
            Commission')</a>


        <a href="

        @if (request()->routeIs('admin.users.commissions.win')) javascript:void(0)
    @else
    {{ route('moder.users.commissions.win', $user->id) }} @endif

        " class="btn btn-primary mb-3 mr-2

    @if (request()->routeIs('admin.users.commissions.win')) btn-disabled @endif

    ">@lang('Win
            Lottery Commission')</a>
    </div>
    <div>

    </div>
@endpush
