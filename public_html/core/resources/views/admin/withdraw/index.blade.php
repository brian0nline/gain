@extends('admin.layout.primary')
@section('title', __('Cashout Methods | Freeloot'))
@section('page-title', __('Cashout Methods | Freeloot'))
@section('panel')

    <div class="card">
        <div class="card-header">
            <h4 class="card-title float-start" style="margin-top:10px;">@lang('Manage Cashouts Methods')</h4>
            <a class="btn btn-sm btn-secondary float-end" style="background: #4aa276;border-color: #4aa276;margin-top:5px;box-shadow:none;"
               href="{{ route('moder.withdraw.method.create') }}"><i class="fa fa-fw fa-plus"></i>@lang('Add
                        New')</a>
        </div>
        <div class="card-body">
            <div class="overflow-auto">
                <table class="table custom-table">

                    <thead>
                    <tr>
                        <th>@lang('Method')</th>
                        <th>@lang('Currency')</th>
                        <th>@lang('Charge')</th>
                        <th>@lang('Withdraw Limit')</th>
                        <th>@lang('Processing Time') </th>
                        <th>@lang('Status')</th>
                        <th>@lang('Action')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($methods as $method)
                        <tr>
                            <td data-label="@lang('Method')">
                                <div class="user">
                                    <div class="thumb">
                                        <x-bs::image
                                            src="{{ getImage(imagePath()['withdraw']['method']['path'] . '/' . $method->image,imagePath()['withdraw']['method']['size']) }}"
                                            height="50"/>
                                    </div>

                                    <span class="name">{{ __($method->name) }}</span>
                                </div>
                            </td>

                            <td data-label="@lang('Currency')" class="font-weight-bold">
                                {{ __($method->currency) }}</td>
                            <td data-label="@lang('Charge')" class="font-weight-bold">
                                {{ showAmount($method->fixed_charge) }} {{ __($general->cur_text) }}
                                {{ 0 < $method->percent_charge ? ' + ' . showAmount($method->percent_charge) . ' %' : '' }}
                            </td>
                            <td data-label="@lang('Withdraw Limit')" class="font-weight-bold">
                                {{ $method->min_limit + 0 }}
                                - {{ $method->max_limit + 0 }} {{ __($general->cur_text) }}</td>
                            <td data-label="@lang('Processing Time')">{{ $method->delay }}</td>
                            <td data-label="@lang('Status')">
                                @if ($method->status == 1)
                                    <span
                                        class="text-small badge font-weight-normal bg-success">@lang('Active')</span>
                                @else
                                    <span
                                        class="text-small badge font-weight-normal bg-warning">@lang('Disabled')</span>
                                @endif
                            </td>
                            <td data-label="@lang('Action')">
                                <a href="{{ route('moder.withdraw.method.edit', $method->id) }}"
                                   class="btn btn-sm ml-1" data-toggle="tooltip"
                                   data-original-title="@lang('Edit')" style="box-shadow:none;"><i class="fas fa-pen" style="color:#fff;"></i></a>
                                @if ($method->status == 1)
                                    <a href="javascript:void(0)"
                                       class="btn btn-sm btn-danger deactivateBtn  ml-1" data-toggle="tooltip"
                                       data-original-title="@lang('Disable')" data-id="{{ $method->id }}"
                                       data-name="{{ __($method->name) }}" style="box-shadow:none;">
                                        <i class="fa fa-eye-slash"></i>
                                    </a>
                                @else
                                    <a href="javascript:void(0)"
                                       class="btn btn-sm btn-success activateBtn  ml-1" data-toggle="tooltip"
                                       data-original-title="@lang('Enable')" data-id="{{ $method->id }}"
                                       data-name="{{ __($method->name) }}"  style="box-shadow:none;">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>
                <!- table end ->
            </div>
        </div>
    </div>


    {{-- ACTIVATEMETHODMODAL- --}}
    <div id="activateModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 2px solid #242B27;">
                    <h5 class="modal-title">@lang('Withdrawal Method Activation Confirmation')</h5>
                  
                </div>
                <form action="{{ route('moder.withdraw.method.activate') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <p>@lang('Are you sure to activate') <span class="font-weight-bold method-name"></span>
                            @lang('method')?</p>
                    </div>
                    <div class="modal-footer" style="border-top: 2px solid #242B27;">
                        <button type="button" class="btn btn-dark" style="background:#3B4740;border-color:#3B4740;box-shadow:none;"  data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn-primary" style="background:#4aa276;border-color:#4aa276;box-shadow:none;">@lang('Activate')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- DEACTIVATEMETHODMODAL- --}}
    <div id="deactivateModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius:20px;">
                <div class="modal-header" style="border-bottom: 2px solid #242B27;">
                    <h5 class="modal-title">@lang('Want to disable this method?')</h5>
                   
                </div>
                <form action="{{ route('moder.withdraw.method.deactivate') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <p>@lang('Are you sure to disable') <span class="font-weight-bold method-name"></span>
                            @lang('method')?</p>
                    </div>
                    <div class="modal-footer"  style="border-top: 2px solid #242B27;">
                        <button type="button" class="btn btn-dark" data-dismiss="modal" style="background:#3B4740;border-color:#3B4740;box-shadow:none;">@lang('Close')</button>
                        <button type="submit" class="btn btn-danger" style="background:#e84b3c;border-color:#e84b3c;box-shadow:none;"  >@lang('Disable')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script>
        (function ($) {
            "use strict";
            $('.activateBtn').on('click', function () {
                var modal = $('#activateModal');
                modal.find('.method-name').text($(this).data('name'));
                modal.find('input[name=id]').val($(this).data('id'));
                modal.modal('show');
            });

            $('.deactivateBtn').on('click', function () {
                var modal = $('#deactivateModal');
                modal.find('.method-name').text($(this).data('name'));
                modal.find('input[name=id]').val($(this).data('id'))
                modal.modal('show');
            });
        })(jQuery);
    </script>
@endpush
