@extends('layouts.theme.default')

@section('title', __('Support | Freeloot'))

@section('content')
    <div class="card pt-100 pb-100">
        <div class="card-header">
            <h4 class="card-title">@lang('Contact Us')</h4>
        </div>
        <div class="card-body">
            <div class="text-end mb-3">
                <a href="{{ route('ticket.open') }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus"></i> @lang('New Ticket')
                </a>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 overflow-auto">
                    <table class="table table-bordered table-hover table-striped">
                        <thead >
                        <tr>
                            <th>@lang('Subject')</th>
                            <th>@lang('Status')</th>
                            <th>@lang('Priority')</th>
                            <th>@lang('Last Reply')</th>
                            <th>@lang('Action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($supports as $key => $support)
                            <tr>
                                <td data-label="@lang('Subject')"><a href="{{ route('ticket.view', $support->ticket) }}"
                                                                     class="font-weight-bold">
                                        @lang('Ticket')
                                        {{ __($support->subject) }} </a></td>
                                <td data-label="@lang('Status')">
                                    @if ($support->status == 0)
                                        <span class="badge badge-success py-2 px-3">@lang('Open')</span>
                                    @elseif($support->status == 1)
                                        <span class="badge badge-primary py-2 px-3">@lang('Answered')</span>
                                    @elseif($support->status == 2)
                                        <span class="badge badge-warning py-2 px-3">@lang('Customer Reply')</span>
                                    @elseif($support->status == 3)
                                        <span class="badge badge-dark py-2 px-3">@lang('Closed')</span>
                                    @endif
                                </td>
                                <td data-label="@lang('Priority')">
                                    @if ($support->priority == 1)
                                        <span class="badge badge-dark py-2 px-3">@lang('Low')</span>
                                    @elseif($support->priority == 2)
                                        <span class="badge badge-success py-2 px-3">@lang('Medium')</span>
                                    @elseif($support->priority == 3)
                                        <span class="badge badge-primary py-2 px-3">@lang('High')</span>
                                    @endif
                                </td>
                                <td data-label="@lang('Last Reply')">
                                    {{ \Carbon\Carbon::parse($support->last_reply)->diffForHumans() }} </td>

                                <td data-label="@lang('Action')">
                                    <a href="{{ route('ticket.view', $support->ticket) }}"
                                       class="btn btn-primary btn-sm">
                                        <i class="fa fa-file" title="{{ __('Read') }}"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="100%" class="text-center"> @lang('No results found')!</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{ $supports->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

