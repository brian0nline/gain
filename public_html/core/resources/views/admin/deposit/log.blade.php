<div>
    @section('title', __('Manage Deposits'))
    @section('page-title', __('Manage Deposits'))
    <div class="card">
        <div class="card-header">
            <h4 class="card-title float-start">@lang('Manage Deposits')</h4>
            <a class="btn btn-sm btn-secondary float-end"
               href="{{ route('moder.withdraw.method.create') }}"><i class="fa fa-fw fa-plus"></i>@lang('Add
                        New')</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        <input type="search" wire:model="search" class="form-control"
                               :placeholder="__('Search by TRX, Gateway Name, Username')"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <select wire:model="filter" class="form-control" wire:chage="$set('filter', '{{ $filter }}')">
                            <option value="1">@lang('Approved')</option>
                            <option value="3">@lang('Rejected')</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-12">

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
                            @forelse($deposits->where('status' ,  $filter) as $deposit)
                                @php
                                    $details = $deposit->detail ? json_encode($deposit->detail) : null
                                @endphp
                                <tr>
                                    <td data-label="@lang('Gateway | Trx')">
                                        <span class="font-weight-bold">{{ __($deposit->gateway->name) }}
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
                                    <td class="text-muted text-center"
                                        colspan="100%">{{ __('Not Data Avaliable') }}
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                        {{ paginateLinks($deposits) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    