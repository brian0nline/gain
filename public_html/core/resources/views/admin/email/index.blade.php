
<div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title" style="margin-top:5px;">@lang('Manage Email Templates')</h4>
        </div>
        <div class="card-body">
            
            <div class="overflow-auto">
                <table class="table custom-table">
                    <thead>
                    <tr>
                        <th>@lang('Name')</th>
                        <th>@lang('Subject')</th>
                        <th>@lang('Status')</th>
                        <th>@lang('Action')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($templates as $template)
                        <tr>
                            <td data-label="@lang('Name')">{{ __($template->name) }}</td>
                            <td data-label="@lang('Subject')">{{ __($template->subj) }}</td>
                            <td data-label="@lang('Status')">
                                {!! bolToText($template->email_status, true, 'Disabled', 'Enabled') !!}
                                <button type="button" class="btn btn-icon btn-sm"
                                        wire:click="updateStatus({{ $template->id }}, {{ $template->email_status }})">
                                    <i class="fas fa-exchange-alt text-dark"></i>
                                </button>
                            </td>
                            <td data-label="@lang('Action')">
                                <a href="#" wire:click.prevent="edit({{ $template->id }})"
                                   class="btn btn-icon text-info  ml-1 editGatewayBtn" data-toggle="tooltip" title=""
                                   data-original-title="@lang('Edit')" style="box-shadow:none;">
                                    <i class="fas fa-edit" style="color: #6FB99F;"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-muted text-center" colspan="100%">{{ __('No Data Yet!') }}</td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>
                <!- table end ->
                {{ $templates->links() }}
            </div>
        </div>
    </div>
</div>

