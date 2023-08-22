@switch($type)
    @case(1)
        <span class="bg-info p-2">@lang('Approved')</span>
    @break

    @case(2)
        <span class="bg-warning p-2">@lang('Based')</span>
    @break

    @case(3)
        <span class="bg-success p-2">@lang('Completed')</span>
    @break

    @case(4)
        <span class="bg-danger p-2">@lang('Rejected')</span>
    @break

    @default
        <span class="bg-secondary p-2">@lang('Pending')</span>
@endswitch
