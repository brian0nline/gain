@extends('layouts.theme.default')
@section('title', __('Shop History | Gainify'))

@push('css')
<style>
    .dashboard{
        display: block !important;
    }
   
</style>
@endpush

@section('content')
    <div class="container card pt-100 pb-100" style="border-radius:20px;">
       
        <div class="text-end mb-3">
            <a href="{{ route('user.withdraw') }}" class="btn btn-primary" style="box-shadow: none;font-size:14px;">
                @lang('Cashout Now')
            </a>
        </div>
       
        <div class="row justify-content-center">
            <div class="col-12 table-responsive">
                <table class="table custom-table">
                    <thead class="thead-dark">
                        <tr>
                            <!--<th>@lang('Transaction ID')</th>-->
                            <th>@lang('Gateway')</th>
                            <th>@lang('Amount')</th>
                            <!--<th>@lang('Charge')</th>-->
                            <!--<th>@lang('After Charge')</th>-->
                            <!--<th>@lang('Rate')</th>-->
                            <!--<th>@lang('Receivable')</th>-->
                            <th>@lang('Status')</th>
                            <!--<th>@lang('Time')</th>-->
                        </tr>
                    </thead>
                    <tbody>

                        @forelse($withdraws as $k=>$data)
                            <tr>
                                <!--<td data-label="#@lang('Trx')">{{ $data->trx }}</td>-->
                                <td data-label="@lang('Gateway')">{{ __($data->method->name) }}</td>
                                <td data-label="@lang('Amount')">
                                    <strong>{{ showAmount($data->amount) }} </strong>
                                </td>
                                <!--<td data-label="@lang('Charge')" class="text-danger">-->
                                <!--    {{ showAmount($data->charge) }} {{ __($general->cur_text) }}-->
                                <!--</td>-->
                                <!--<td data-label="@lang('After Charge')">-->
                                <!--    {{ showAmount($data->after_charge) }} {{ __($general->cur_text) }}-->
                                <!--</td>-->
                                <!--<td data-label="@lang('Rate')">-->
                                <!--    {{ showAmount($data->rate) }} {{ __($data->currency) }}-->
                                <!--</td>-->
                                <!--<td data-label="@lang('Receivable')" class="text-success">-->
                                <!--    <strong>{{ showAmount($data->final_amount) }} {{ __($data->currency) }}</strong>-->
                                <!--</td>-->
                                <td data-label="@lang('Status')">
                                    @if ($data->status == 2)
                                        <span class="text-small badge font-weight-normal bg-warning">@lang('Pending')</span>
                                    @elseif($data->status == 1)
                                        <span class="text-small badge font-weight-normal bg-success">@lang('Completed')</span>
                                        
                                    @elseif($data->status == 3)
                                        <span class="text-small badge font-weight-normal bg-danger">@lang('Rejected')</span>
                                        <button class="btn-danger btn-rounded badge approveBtn"
                                            data-admin_feedback="{{ $data->admin_feedback }}" style="box-shadow:none;border-radius:10px;"><i
                                                class="fa fa-info"></i>
                                        </button>
                                    @endif

                                </td>
                                <!--<td data-label="@lang('Time')">-->
                                <!--    <i class="fa fa-calendar"></i> {{ showDateTime($data->created_at) }}-->
                                <!--</td>-->
                            </tr>
                        @empty
                            <tr>
                                <td class="text-muted text-center" colspan="100%">{{ __('No data found') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
            
             <div class="col-12">
                <div class="mt-2">
                    {{ $withdraws->links() }}
                </div>
            </div>
        </div>
    </div>



    {{-- Detail MODAL --}}
    <div id="detailModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius: 20px;">
                <div class="modal-header"  style="border-bottom: 2px solid #35515F;">
                    <h5 class="modal-title">@lang('Details')</h5>
                   
                </div>
                <div class="modal-body" style="border-bottom: 2px solid #35515F;">

                    <div class="withdraw-detail" style="font-size: 12px;"></div>

                </div>
                <div class="modal-footer" style="border-top: 2px solid #35515F;">
                    <!--<button type="button" class="btn btn-danger" data-dismiss="modal"style="background: #4D6D7D;border-color:#4D6D7D;box-shadow:none;">@lang('Close')</button>-->
                </div>
            </div>
        </div>
    </div>

@endsection
@section('datatable', false)
@push('script')
    <script>
        (function($) {
            "use strict";
            $('.approveBtn').on('click', function() {
                var modal = $('#detailModal');
                var feedback = $(this).data('admin_feedback');
                modal.find('.withdraw-detail').html(`<p> ${feedback} </p>`);
                modal.modal('show');
            });
        })(jQuery);
    </script>
@endpush
