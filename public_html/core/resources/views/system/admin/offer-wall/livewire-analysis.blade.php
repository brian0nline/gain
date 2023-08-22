

<div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-2">
                <input type="search" wire:model="search" class="form-control"
                    placeholder="Search By Username, TRX" />
            </div>
            <div class="col-md-6 mb-2">
                <div class="form-group">
                    <select class="form-control" name="isPaid" wire:change="$set('isPaid', $event.target.value)">
                        <option value="">@lang('Filter By Paid')</option>
                        <option value="paid">@lang('Paid')</option>
                        <option value="not_paid">@lang('Not Paid')</option>
                    </select>
                </div>
            </div>
        </div>
        <table class="table table-responsive-sm">
            <thead>
                <tr>
                    <th>@lang('Offer Name')</th>
                    <th>@lang('Username')</th>
                    <th>@lang('TRX')</th>
                    <th>@lang('Rewards')</th>
                    <th>@lang('Status')</th>
                    <th>@lang('Action')</th>
                </tr>
            </thead>
            <tbody>
                @forelse($offers as $offer)
                    <tr>
                        <td data-label="@lang('Offer Name')">{{ $offer->offers->name }}
                            <a href="{{ route('moder.offer.index') }}" class="text-danger"></a>
                        </td>
                        <td data-label="@lang('SubId')">
                            {{ __(@$offer->users->fullname) }}
                            <br />
                            <span class="text-warning">@ {{ @$offer->users->username }}</span>
                        </td>

                        <td data-label="@lang('TRX')">{{ __(@$offer->trx) }}
                        </td>

                        <td data-label="@lang('Rewards')">{{ __(@$offer->amount) }}<i><img src="{{ asset('asset/img/coins.svg') }}"></i>
                        </td>

                        <td data-label="@lang('Status')">
                            {!! bolToText($offer->isPaid, true, 'Not Paid', 'Paid') !!}
                        </td>


                        <td data-label="@lang('Action')" class="d-flex">
                            @if (!$offer->isPaid)
                            <x-bs::button href="#" wire:click="sendPayment({{ $offer->id }})" icon="share" title="Send Payment" size="sm" color="info" style="box-shadow:none;" />
                            @else
                            <x-bs::button href="#" wire:click="reversePayment({{ $offer->id }})" icon="share" title="Reverse" size="sm" color="danger" style="box-shadow:none;" />                             
                            @endif
                            <x-bs::button href="#" wire:click="delete({{ $offer->id }})" icon="trash" title="Delete" size="sm" color="warning" confirm style="box-shadow:none;"/>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-muted text-center" colspan="100%">{{ __('No Data Yet!') }}</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
        
                @if($offers->hasPages())
            {{ $offers->links('pagination::bootstrap-4') }}
            
            @endif
    </div>
</div>
