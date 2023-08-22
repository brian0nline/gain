<div>
    @section('title', __('Manage Deposits'))

    @section('page-title', __('Manage Deposits'))

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">@lang('Manage Pending deposits')</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <input type="search" wire:model="search" class="form-control"
                       :placeholder="__('Search By Name, TRX and Username')"/>
            </div>
            <div class="overflow-auto">
                <table class="table table-bordered table-striped table-hover table-responsive-sm">
                    <thead>
                    <tr>
                        <th>@lang('Gateway | Trx')</th>
                        <th>@lang('Initiated')</th>
                        <th>@lang('User')</th>
                        <th>@lang('Amount')</th>
                        <th>@lang('Conversion')</th>
                        <th>@lang('Status')</th>
                        <th>@lang('Action')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($deposits as $deposit)
                        @php
                            $details = $deposit->detail ? json_encode($deposit->detail) : null
                        @endphp
                        <tr>
                            <td data-label="@lang('Gateway | Trx')">
                                            <span class="font-weight-bold"> {{ __($deposit->gateway->name) }}
                                            </span>
                                <br>
                                <small> {{ $deposit->trx }} </small>
                            </td>

                            <td data-label="@lang('Date')">
                                {{ showDateTime($deposit->created_at) }}
                                <br>{{ diffForHumans($deposit->created_at) }}
                            </td>
                            <td data-label="@lang('User')">
                                <span class="font-weight-bold">{{ $deposit->user->fullname }}</span>
                                <br>
                                <span class="small">
                                                <a
                                                    href="{{ route('moder.users.detail', $deposit->user_id) }}"><span>@</span>{{ $deposit->user->username }}</a>
                                            </span>
                            </td>
                            <td data-label="@lang('Amount')">
                                {{ __($general->cur_sym) }}{{ showAmount($deposit->amount) }} + <span
                                    class="text-danger" data-toggle="tooltip"
                                    data-original-title="@lang('charge')">{{ showAmount($deposit->charge) }}
                                            </span>
                                <br>
                                <strong data-toggle="tooltip"
                                        data-original-title="@lang('Amount with charge')">
                                    {{ showAmount($deposit->amount + $deposit->charge) }}
                                    {{ __($general->cur_text) }}
                                </strong>
                            </td>
                            <td data-label="@lang('Conversion')">
                                1 {{ __($general->cur_text) }} = {{ showAmount($deposit->rate) }}
                                {{ __($deposit->method_currency) }}
                                <br>
                                <strong>{{ showAmount($deposit->final_amo) }}
                                    {{ __($deposit->method_currency) }}</strong>
                            </td>
                            <td data-label="@lang('Status')">
                                {!! bolToText($deposit->status, true, '', 'Success', 'Pending', 'Rejected') !!}
                                <br>{{ diffForHumans($deposit->updated_at) }}
                            </td>
                            <td data-label="@lang('Action')">
                                <a href="{{ route('moder.deposit.view', $deposit->id) }}"
                                   class="icon-btn ml-1 " data-toggle="tooltip" title=""
                                   data-original-title="@lang('Detail')">
                                    <i class="fa fa-desktop"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-muted text-center" colspan="100%">
                                {{ __('Not Data Avaliable') }}
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <!- table end ->
            </div>
        </div>
        <div class="card-footer py-4">
            {{ paginateLinks($deposits) }}
        </div>
    </div>
</div>

