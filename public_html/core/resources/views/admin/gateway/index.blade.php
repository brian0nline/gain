<div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">@lang('Manage Gateways')</h4>
        </div>
        <div class="card-body">
            <div class="form-group">
                <input type="search" wire:model="search" class="form-control" placeholder="Search By Name"/>
            </div>
            <div class="overflow-auto">
                <table class="table table-bordered table-striped table-hover table-responsive-sm">
                    <thead>
                    <tr>
                        <th>@lang('Gateway')</th>
                        <th>@lang('Supported Currency')</th>
                        <th>@lang('Enabled Currency')</th>
                        <th>@lang('Status')</th>
                        <th>@lang('Action')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($gateways->sortBy('alias') as $k=>$gateway)
                        <tr>
                            <td data-label="@lang('Gateway')">
                                <div class="user">
                                    <div class="thumb">
                                        <x-bs::image height="24" rounded
                                                     src="{{ getImage(imagePath()['gateway']['path'] . '/' . $gateway->image, imagePath()['gateway']['size']) }}"/>
                                    </div>
                                    <span class="name">{{ __($gateway->name) }}</span>
                                </div>
                            </td>


                            <td data-label="@lang('Supported Currency')">
                                {{ count(json_decode($gateway->supported_currencies, true)) }}
                            </td>
                            <td data-label="@lang('Enabled Currency')">
                                {{ $gateway->currencies->count() }}
                            </td>


                            <td data-label="@lang('Status')">

                                {!! bolToText($gateway->status, true, 'Inactive', 'Active') !!}

                                <button type="button" class="btn btn-icon btn-sm"
                                        wire:click="updateStatus({{ $gateway->id }}, {{ $gateway->status ? 1 : 0 }})">
                                    <i class="fas fa-exchange-alt text-dark"></i>
                                </button>

                            </td>
                            <td data-label="@lang('Action')">
                                <a href="#" class="btn btn-icon text-info" data-toggle="tooltip"
                                   data-original-title="@lang('Edit')"
                                   wire:click.prevent="edit('{{ $gateway->alias }}')">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}
                            </td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>
                {{ paginateLinks($gateways) }}
            </div>
        </div>
    </div>
</div>

