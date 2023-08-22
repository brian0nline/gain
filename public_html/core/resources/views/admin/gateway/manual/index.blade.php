@section('title', __('Manage manual gateway'))
@section('page-title', __('Manage manual gateway'))
<div>


    <div class="card">
        <div class="card-header">
            <h4 class="card-title float-start">@lang('Manage Manual Deposits')</h4>
            <a class="btn btn-sm btn-light float-end"
               href="{{ route('moder.gateway.manual-create') }}"><i class="fas fa-fw fa-plus"></i>@lang('Add
                        New')</a>
        </div>
        <div class="card-body">
            <div class="form-group">
                <input type="search" wire:model="search" class="form-control" :placeholder="__('Search By Name')"/>
            </div>
            <div class="overflow-auto">
                <table class="table table-bordered table-striped table-hover table-responsive-sm">
                    <thead>
                    <tr>
                        <th>@lang('Gateway')</th>
                        <th>@lang('Status')</th>
                        <th>@lang('Action')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($gateways as $gateway)
                        <tr>
                            <td data-label="@lang('Gateway')">
                                <div class="user">
                                    <div class="thumb">
                                        <x-bs::image height="25"
                                                     src="{{ getImage(imagePath()['gateway']['path'] . '/' . $gateway->image, imagePath()['gateway']['size']) }}"/>
                                    </div>
                                    <span class="name">{{ __($gateway->name) }}</span>
                                </div>
                            </td>

                            <td data-label="@lang('Status')">
                                {!! bolToText($gateway->status, true, 'Inactive', 'Active') !!}
                                <button type="button" class="btn btn-icon btn-sm"
                                        wire:click="updateStatus({{ $gateway->id }}, {{ $gateway->status ? 1 : 0 }})">
                                    <i class="fas fa-exchange-alt text-dark"></i>
                                </button>

                            </td>
                            <td data-label="@lang('Action')">
                                <a href="{{ route('moder.gateway.manual.edit', $gateway->alias) }}"
                                   class="btn btn-icon text-info" data-toggle="tooltip"
                                   title="@lang('Edit')" data-original-title="@lang('Edit')">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <x-bs::button type="button" size="sm"
                                              wire:click="delete('{{ $gateway->id }}')"
                                              class="btn-icon text-danger border-0" icon="trash" title="Delete"
                                              confirm/>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-muted text-center" colspan="100%">{{ __('No Data!') }}</td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
